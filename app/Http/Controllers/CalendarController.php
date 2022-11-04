<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\appointments;
use App\Models\services;
use App\Models\Vaccine;
use App\Models\Category;
use App\Models\Medicine;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;





class CalendarController extends Controller
{
    
    public function calendar ()
    {

        $schedules = array();
        $schedulesall = array();

        // $appointments1 = appointments::all();
        
        if(Auth::User()->id){
            $id = Auth::User()->id;
        }
        
        $appointments1 = DB::table('users')
        ->join('appointments','users.id',"=",'appointments.user_id')
        ->where('users.id',$id)
        ->get();

        $schedules_all = appointments::all();

        $category = Category::all();
        $medicine = Medicine::all();
        
        $appointment_service = services::all(); 

        $vaccine_kids= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',1)
        ->get();

        $vaccine_adult= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',2)
        ->get();

        foreach ($appointments1 as $appointment2) {
            $schedules[] = [
                'id' =>  $appointment2->id,
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }

        foreach ($schedules_all as $appointment2) {
            $schedulesall[] = [
                'id' =>  $appointment2->id,
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }
      
        if(Auth::User()->account_type=='admin'){
            return view ('calendar', compact('schedulesall','schedules','appointment_service','medicine') );
        // console.log($appointment_service);
         }else{
            $qrcode = 13;
            // return view ('calendar', ['schedules' =>  $schedules]);
            return view ('calendar', compact('schedulesall','schedules','appointment_service','vaccine_kids','vaccine_adult','category','medicine','qrcode') );
         }
    }


    public function action(Request $request){
        // if($request->ajax()){
        //     if(request->){

        //     }
        // }

    }
    public function delete_appointment(Request $request){

        $id = $request ->input ('calendar_id');
        $delete_appointment= appointments::find($id);
        $delete_appointment->delete();
      
        if(Auth::User()->account_type=='admin'){
          return redirect()->back()->with('danger', 'Successfully Deleted');
        }else{
         return redirect()->route('calendar');
        }

    }

    public function preview_appointment($id){

        $id = appointments::find($id);
        // $service_id = User::find($id);

        $appointment =  response()->json(['appointment'=> $id,]);
        return $appointment ;

        
    }

    public function preview_qrcode($id){
        // $data = appointments::find(13);
        $qrcode = QrCode::size(120)->generate('123123');
        // return  ('calendar',['qrcode'=>$qrcode]);
        return redirect()->back()->with('qrcode',$qrcode);
    }

}
