<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    public function index (){

        //Total number of available slot for vaccine

        $total_vaccine_slot = DB::table('vaccine')
        ->sum('vaccine_slot');

       
        //Total number of vaccinated residents
        $total_covid_vaccinated_residents = DB::table('appointments')
        ->orwhere('appointment_dose',1)
        ->orwhere('appointment_dose',2)
        ->orwhere('appointment_dose',3)
        ->where('appointment_status',"success")
        ->groupBy('appointment_dose')
        ->count();

       
        // dd($total_vaccinated_residents);

        //Total number of available slot for medicine

        $total_available_slot_medicine = DB::table('other_services')
        ->where('service_id',2)
        ->sum('other_services_slot');


        //Total number of distributed medicine

        $total_distributed_medicine= DB::table('appointments')
        ->where('service_id',2)
        ->where('appointment_status',"success")
        ->count();

      
        //Total number of slot for consulation
        $total_slot_checkup = DB::table('other_services')
        ->where('service_id',3)
        ->sum('other_services_slot');

        //Total number of consulted resident


        //=============== APOINTMENTS===============
        //Total Appointments per months
        

        // Most frequent service appointed - pie


        //Total number of successfull appointment 
        $total_appointment_success = DB::table('appointments')
        ->where('appointment_status',"success")
        ->count();

        //Total number of Expired appointment
        $total_appointment_expired = DB::table('appointments')
        ->where('appointment_status',"expired")
        ->count();

        //Total number of Canceled appointment

        $total_appointment_canceled = DB::table('appointments')
        ->where('appointment_status',"canceled")
        ->count();

        //total registered Residets 


        $year = ['2015','2016','2017','2018','2019','2020','2021','2022'];
      
        $user = [];
       

        foreach ($year as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
        $year = json_encode($year,JSON_NUMERIC_CHECK);
        $user = json_encode($user,JSON_NUMERIC_CHECK);



    	return view('analytic',compact('year','user','total_vaccine_slot','total_covid_vaccinated_residents','total_available_slot_medicine','total_distributed_medicine','total_slot_checkup','total_appointment_success','total_appointment_canceled','total_appointment_expired'));
    } 
}
