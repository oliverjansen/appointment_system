<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function insert(Request $request){
      $appointment = new appointments();
      // $current_id = Auth::User()->id();
        if(Auth::User()->id){
          $current_id = Auth::User()->id;
        }
        $appointment ->user_id = $current_id;

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
      
     
      
       
       $appointment ->appointment_date = $request ->input ('appointmentdate');

       $appointment->save();
       if(Auth::User()->account_type=='admin'){
        return view('services');
        }else{
          return redirect()->route('calendar');
        }
    
       



    }
}