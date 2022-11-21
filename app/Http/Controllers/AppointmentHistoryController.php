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
        ->where('user_id',$id)->
        where('appointment_status',"success")->get();

        }else{
                    
        $appointment = DB::table('appointments')->get();

        }
        return view('history',compact('appointmentss'));
    
    }
}
