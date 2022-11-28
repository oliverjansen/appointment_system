<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class appointment_PDF extends Controller
{
    public function index (){
        $appointments_admin = DB::table('users')
        ->join('appointments','users.id',"=",'appointments.user_id')
        ->get();
        
        return view ('pdf.appointment_pdf',compact('appointments_admin'));
    }
}
