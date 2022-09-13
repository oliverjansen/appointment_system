<?php

namespace App\Http\Controllers;

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
                
                'title' => $appointment2->service,
                'date' => $appointment2->Appointmentdate,
                'vaccinetype' => $appointment2->vaccinetype,
                'person' => $appointment2->person,

        ];  

        }
        return view ('calendar', ['schedules' =>  $schedules]);

    }

   
}
