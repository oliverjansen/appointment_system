<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\appointments;



class AppointmentsController extends Controller
{
    public function appointment()
    {
        
            return view ('appointment');

      
    }
    public function add(){

        return view ('');
    }

    // public function insert(Request $request){

    // //    $appointments = new appointment();
    // //    $appointments ->service = $request ->input ('service');
    // //    $appointments ->person = $request ->input ('person');
    // //    $appointments ->vaccinetype = $request ->input ('vaccinetype');
    // //    $appointments ->appointmentdate = $request ->input ('appointmentdate');

    // //    $appointments->save();
    // //    return view ('calendar');
       



    // }
}