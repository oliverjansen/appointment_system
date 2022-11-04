<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Calendar;
use App\Models\appointments;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
 

    public function appointment()
    {
        if(Auth::User()->account_type=='admin'){
            return view('services');
            }else{
              return redirect()->route('appointment');
            }
           
    }

    public function appointments_admin()
    {

      // $appointments = appointments::all();
      $user = User::with('appointments')->get();
      $appointments = appointments::with('users')->get();


      // $appointments = DB::table('users')
      // ->join('appointments','users.id',"=",'appointments.user_id')
      // ->select('appointments.*')
      // ->get();

        if(Auth::User()->account_type=='admin'){
            return view('appointment',compact('appointments','user'));
            }else{
              return redirect()->route('appointment');
            }
      
    }
    protected $global_appointmentDate;
    protected $global_today=null;
   
    public function insert(Request $request){
      $appointment = new appointments();
      // $current_id = Auth::User()->id();
        if(Auth::User()->id){
          $current_id = Auth::User()->id;
          $contactnumber = Auth::User()->contactnumber;

        }


        $appointment ->user_id = $current_id;
        $appointment ->user_contactnumber= $contactnumber;

        $randomAppointmentId=rand(0,999999999999);

        $today = \Carbon\Carbon::today()->format('Y/m/d');
        $appointmentDate = \Carbon\Carbon::parse($request ->input ('appointmentdate'))->format('Y/m/d');

        $global_appointmentDate = $appointmentDate;
        $global_today = $today;

        if($appointmentDate < $today){
          return redirect()->back()->with('danger', "Invalid Appointment Date!");
        }else{

        if($request ->input ('appointmentservice') == "vaccine" ){
          $appointment ->appointment_services = $request ->input ('appointmentservice');
          $appointment ->appointment_category = $request ->input ('appointmentCategory');
    
            if($request ->input ('appointmentCategory') == "kids"){
              $appointment ->appointment_vaccine_category = $request ->input ('vaccine_category');
            }else if ($request ->input ('appointmentCategory') == "adult"){
              $appointment ->appointment_vaccine_type = $request ->input ('vaccine_type');
              $appointment ->appointment_covid_dose = $request ->input ('appointment_dose');
              
            }  
          }elseif ($request ->input ('appointmentservice') == "medicine"){
            $appointment ->appointment_services = $request ->input ('appointmentservice');
            $appointment ->appointment_vaccine_type = $request ->input ('appointmentvaccinetype');
          }else if($request ->input ('appointmentservice') == "checkup"){
            $appointment ->appointment_services = $request ->input ('appointmentservice');
              $appointment ->appointment_concern = $request ->input ('concern');
          }else{
            $appointment ->appointment_services = $request ->input ('appointmentservice');
            $appointment ->appointment_information = $request ->input ('information');
          }
      
    
        // echo $mytime->toDateTimeString();
      
      
            $message = $request ->input ('appointmentservice');
          $appointment ->appointment_date = $appointmentDate;
          $appointment ->appointment_id = $randomAppointmentId;

       



  
              $kk = null;
              if ($appointmentDate == $today) {
                // $this->$validDate = "yes";
                // $appointment_slot = appointments::find($today);
                // $appointment_slot = appointments::find(3);
                  // $available_slot = $request ->input ('available_slot');
                  if( DB::table('appointments')->where('availableslot',null)->get()){
                    $appointment ->availableslot = 49;
                  }
                    $appointment_slot = $request ->input ('available_slot');
                    $minus = $appointment_slot -1;
                    // $appointment_slot ->availableslot = 4;
                    appointments::where("appointment_date",$appointmentDate)
                    ->update(['availableslot' => $minus]);
  
                    // $appointment_slot->update();
                    // $kk = "may laman";
                  
              } else {
                // $this->$validDate = "no";
                  $appointment ->availableslot = "49";
                  $appointment_slot = $request ->input ('available_slot');
                  $minus = $appointment_slot -1;
                  appointments::where("appointment_date",$appointmentDate)
                  ->update(['availableslot' => $minus]);
                  
              }
          $appointment->save();  
          if(Auth::User()->account_type=='admin'){
            return view('services');
            }else{
              return redirect()->route('calendar')->with('success', $kk);
            }
    
       
      }


    }
    public function cancel_appointment($id){
        $user_id = appointments::find($id);
        // $service_id = User::find($id);

        return response()->json([
              'status'=>200,
              'user_id'=> $user_id,
      
        ]);
    }

    public function get_appointmentDate($date){

      // return redirect()->back()->with('danger', $global_today);

      // $service_id = User::find($id);
      // $date = appointments::search($date);
       

        
      //  $userData['data'] = $date1;
     
      // $validdate = '1-2-3';
      $today = \Carbon\Carbon::today()->format('Y/m/d');
     $newdate = \Carbon\Carbon::parse($date)->format('Y/m/d');
      if($newdate < $today){
        $validDate = "no";
      }else{
        $validDate = "yes";
      }
     
        $date1 = DB::table('appointments')->where('appointment_date',$date)->get();

        return response()-> json([
          'validDate'=> $validDate,
          'data'=>$date1,
        ]);

      

 
      
    
  }
  

  // public function date_checker($appointment_date,$today_date){

  //   if ($appointment_date < $today_date ){
  //     return redirect()->back()->with('danger', 'Invalid Appointment Date!');

  //   }else{
  //     return true;
  //   }
  // }
    

    public function canceled_appointment(Request $request){
      $id = $request ->input ('calcel_id');
      $canceled_appointment_id = appointments::find($id);
      $service = $request ->input ('service');

    
      if($request ->input ('cancel_message') == null){
        $message ="Your " . $service . " Appointment has been canceled!";
      }else{
        $message = $request->input('cancel_message');
      }
      $canceled_appointment_id ->appointment_message = $message;
      $canceled_appointment_id->update();
    
// ------------------------------------------------------------------------------------
      $recipient = $request->input('user_phoneNo');

        $this->sendMessage($message, $recipient);


      // ------------------------------------------------------------------------------------
      if(Auth::User()->account_type=='admin'){
        return redirect()->back()->with('success', 'Notification Sent!');
      }else{
        return redirect()->route('login');
      }
    
    }  

    public function sendCustomMessage(Request $request)
    {
        // $validatedData = $request->validate([
        //     'users' => 'required|array',
        //     'body' => 'required',
        // ]);

        $recipients = $validatedData["users"];
        // iterate over the array of recipients and send a twilio request for each
        foreach ($recipients as $recipient) {
            $this->sendMessage($validatedData["body"], $recipient);
        }
        return back()->with(['success' => "Notification Sent!"]);
    }
    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients Number of recipient
     */
    
    private function sendMessage($message, $recipient)
    {
      
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_number, 'body' => $message]);
    }


    public function service_appointment($id){
      $service_id = appointments::find($id);
      // $service_id = User::find($id);

      return response()->json([
            'status'=>200,
            'service_id'=> $service_id,
    
      ]);
  }


  public function delete_scheduled_appointment (Request $request){

    $id = $request ->input ('delete_id');
    $appointment_delete= appointments::find($id);
    
    $appointment_delete->delete();

    if(Auth::User()->account_type=='admin'){
      return redirect()->back()->with('danger', 'Successfully Deleted');
    }else{
    return redirect()->route('calendar');
    }

  }
  
    
}