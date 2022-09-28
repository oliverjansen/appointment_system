<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\appointments;


class CalendarController extends Controller
{
    
    public function calendar ()
    {

        $schedules = array();
        $appointments1 = appointments::all();
        foreach ($appointments1 as $appointment2) {
            $schedules[] = [
                
                'title' => $appointment2->appointment_service,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,

        ];  

        }
        if(Auth::User()->account_type=='admin'){
        return view ('calendar', ['schedules' =>  $schedules]);
         }else{
            return view ('calendar', ['schedules' =>  $schedules]);
         }
    }

   
}
