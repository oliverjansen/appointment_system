<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Models\services;
use App\Models\Vaccine;
use App\Models\User;
use App\Models\appointments;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\VerifyAppointment;
use Illuminate\Http\Request;

class VerifyAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->account_type=='admin'){
            return view ('scanner');
            }else{
              return redirect()->route('calendar');
        }
      
    }

    function get_appointment_id($content){
        // $service_id = User::find($id);
        $data1 = DB::table('appointments')->where('appointment_id',$content)->get();
        return response()->json([
              'data'=> $data1
            ]);
    }

    function verify_appointment(Request $request){
      $appointment_id = $request ->input ('appointment_id_hidden');
      $appointment_date = $request ->input ('appointment_date_hidden');
      
      $service = $request->input('appointment_services_hidden');


    //   $canceled_appointment_id = appointments::find($id);
    $queue = DB::table('appointments')->where('appointment_date','=',$appointment_date)
    ->get()->max('appointment_queue');
        if($queue == null){
            appointments::where("appointment_id",$appointment_id)
            ->update(['appointment_queue' => 1]);
        }else{
            appointments::where("appointment_id",$appointment_id)
            ->update(['appointment_queue' => $queue+1]);
        }

        //sendin message 
        $message1 = "Your appointment for ".$service." has been verified!";
        $message2 = "Your Queue # is : ".$queue;
        $messages = $message1."\n\n".$message2;
        $recipient = $request->input('user_contactnumber_hidden');

        $this->sendMessage($messages, $recipient);
        
        return back()->with(['success' => $recipient]);

    }
  /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients Number of recipient
     */
    private function sendMessage($messages, $recipient)
    {
      
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_number, 'body' => $messages]);
    }
}