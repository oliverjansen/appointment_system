<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Other_Services;
use App\Models\Vaccine;
use App\Models\appointments;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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


        $year = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'];
      
        $user = [];
       

        foreach ($year as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
        $year = json_encode($year,JSON_NUMERIC_CHECK);
        $user = json_encode($user,JSON_NUMERIC_CHECK);


        //REGISTERED RESIDENTS
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $user_line_labels = $users->keys();
        $user_line_data = $users->values();

        



        //pie chart user 
        $pie_user_pending = User::where('status','pending')->count();
    	$pie_user_approved = User::where('status','approved')->count();
    	$pie_user_rejected = User::where('status','rejected')->count();

        $pie_user_pending1 = $pie_user_pending;
        $pie_user_approved1 = $pie_user_approved;
        $pie_user_rejected1 = $pie_user_rejected;


        $sum = User::select('id')->count();

        $pie_user_pending = round(($pie_user_pending/$sum)*100.0);
        $pie_user_approved = round(($pie_user_approved/$sum)*100.0);
        $pie_user_rejected = round(($pie_user_rejected/$sum)*100.0);



        //pie chart slot per pervice
    	$pie_slot_service = Vaccine::where('service_id','1')->sum('vaccine_slot');

        $pie_slot_medicine = Other_Services::where('service_id','2')->sum('other_services_slot');
    	$pie_slot_checkup = Other_Services::where('service_id','3')->sum('other_services_slot');
      
   
        //Covid Vaccine Slot

        $total_available_slot_codiv_vaccine = Vaccine::orwhere('dose',1)
        ->orwhere('dose',2)
        ->orwhere('dose',3)
        ->sum('vaccine_slot');

        //vaccine pie dose 
        
        $vaccine_slot_dose1 = Vaccine::where('dose',1)->sum('vaccine_slot');

        $vaccine_slot_dose2 = Vaccine::where('dose',2)->sum('vaccine_slot');
        $vaccine_slot_dose3 = Vaccine::where('dose',3)->sum('vaccine_slot');

        //vaccinated not vaccinated

        $vaccincate_covid_user = DB::table('appointments')
        ->where('appointment_dose',"!=",null)
        ->where('appointment_status',"success")
        ->groupBy('user_id')
        ->count();


        $all_user= DB::table('users')
        ->where('status',"approved")
        ->groupBy('status')
        ->count('id');
      

        $unVaccinated_covid_user = $all_user - $vaccincate_covid_user;

        $vaccincate_covid_user = round(($vaccincate_covid_user/$all_user)*100);

        $unVaccinated_covid_user = round(($unVaccinated_covid_user/$all_user)*100);


        //Appointments per months
      
        $users = appointments::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(appointment_date) as month_name"))
        ->whereYear('appointment_date', date('Y'))
        ->where('appointment_status', "success")
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $appointment_permonth_line_labels = $users->keys();
        $appointment_permonth_line_data = $users->values();

        //most frequent serive 

        $frequent_service = appointments::select(DB::raw("COUNT(*) as count"), DB::raw("appointment_services as service"))
        ->where('appointment_status', "success")
        ->groupBy(DB::raw("id"))
        ->orderBy('id','ASC')
        ->pluck('count', 'service');

        $appointment_most_frequent_labels = $frequent_service->keys();
        $appointment_most_frequent_data = $frequent_service->values();

      
        //appointment_status ==============

        $appointment_status = appointments::select(DB::raw("COUNT(*) as count"), DB::raw("appointment_status as service"))
        ->groupBy(DB::raw("appointment_status"))
        ->orderBy('id','ASC')
        ->pluck('count', 'service');

        $appointment_status_labels = $appointment_status->keys();
        $appointment_status_data = $appointment_status->values();

     


        //distributed undistributed medicine

        // $vaccinated_unVaccinated = DB::table('appontmnets')
        // ->orwhere('appointment_dose',1)
        // ->orwhere('appointment_dose',2)
        // ->orwhere('appointment_dose',3)
        // ->count();
   
        // dd($pie_user_pending);
    	// $fruit_count = count($fruit);    	
    	// $veg_count = count($veg);
    	// $grains_count = count($grains);

        // dd($approved);

        //PENDING RESIDENTS REGISTRATION

        // $users_pending = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        // ->whereYear('created_at', date('Y'))
        // ->where('status',"pending")
        // ->groupBy(DB::raw("month_name"))
        // ->orderBy('id','ASC')
        // ->pluck('count', 'month_name');

        // $user_line_labels = $users_pending->keys();
        // $user_line_data = $users_pending->values();


        // $data = User::select('id','created_at')->get()->groupBy(function($data){
        //    return Carbon::parse($data->created_at)->format('M');
        // });

        // $months=[];
        // $monthcounts=[];

        // foreach ($data as $month => $values) {
        //     $months[]=$month;
        //     $monthcounts[]=count($values);
        // }
        
    	return view('analytic',compact('appointment_status_labels','appointment_status_data','appointment_most_frequent_labels','appointment_most_frequent_data','appointment_permonth_line_labels','appointment_permonth_line_data','vaccincate_covid_user','unVaccinated_covid_user','vaccine_slot_dose1','vaccine_slot_dose2','vaccine_slot_dose3','total_available_slot_codiv_vaccine','pie_slot_service','pie_slot_medicine','pie_slot_checkup','pie_user_pending','pie_user_pending1','pie_user_approved1','pie_user_rejected1','pie_user_approved','pie_user_rejected','user_line_labels', 'user_line_data','year','user','total_vaccine_slot','total_covid_vaccinated_residents','total_available_slot_medicine','total_distributed_medicine','total_slot_checkup','total_appointment_success','total_appointment_canceled','total_appointment_expired'));
    } 
}
