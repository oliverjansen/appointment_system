<?php

namespace App\Http\Controllers;

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
}
