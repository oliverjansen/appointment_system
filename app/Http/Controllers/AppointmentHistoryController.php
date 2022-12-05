<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Calendar;
use App\Models\appointments;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;

class AppointmentHistoryController extends Controller
{
    public function index(){

        if(Auth::User()->id){
            $id = Auth::User()->id;
        }
        if(Auth::User()->account_type=='user'){   
        
     
            $appointmentss = DB::table('appointments')
            ->where('user_id',$id)
            ->get();
        
        
    

        }else{
                    
        $appointment = DB::table('appointments')->get();

        }
        return view('history',compact('appointmentss'));
    
    }

    //  function sort_history ($id){

    //     if($id !== null){
           
    //         if($id == "1"){
    //             $appointmentss = DB::table('appointments')
    //             ->where('user_id',$id)
    //             ->orwhere('appointment_status',"!=","success")
    //             ->orderBy('service_id')
    //             ->paginate(10);
              
    //         }else if ($id == "2"){
    //             $appointmentss = DB::table('appointments')
    //             ->where('user_id',$id)
    //             ->orwhere('appointment_status',"!=","success")
    //             ->orderBy('service_id')
    //             ->paginate(10);
    //         }else if($id == "3"){
    //             $appointmentss = DB::table('appointments')
    //             ->where('user_id',$id)
    //             ->orwhere('appointment_status',"!=","success")
    //             ->orderBy('service_id')
    //             ->paginate(10);
    //         }
    //     }else{
    //         $appointmentss = DB::table('appointments')
    //         ->where('user_id',$id)
    //         ->orwhere('appointment_status',"!=","success")
    //         ->paginate(10);
    //     }

    //     return view('history',compact('appointmentss'));
    // }
}
