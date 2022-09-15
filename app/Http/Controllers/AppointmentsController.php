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

    public function insert(Request $request){

       $appointment = new appointments();
       $appointment ->service = $request ->input ('service');
       $appointment ->person = $request ->input ('person');
       $appointment ->vaccinetype = $request ->input ('vaccinetype');
       $appointment ->appointmentdate = $request ->input ('appointmentdate');

       $appointment->save();
       return redirect()->route('calendar');
       



    }
}