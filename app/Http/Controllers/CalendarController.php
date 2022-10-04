<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\appointments;
use App\Models\services;
use App\Models\Vaccine;
use App\Models\Category;
use App\Models\Medicine;

use Illuminate\Support\Facades\DB;





class CalendarController extends Controller
{
    
    public function calendar ()
    {

        $schedules = array();
        $schedulesall = array();

        // $appointments1 = appointments::all();
        
        if(Auth::User()->id){
            $id = Auth::User()->id;
        }
        
        $appointments1 = DB::table('users')
        ->join('appointments','users.id',"=",'appointments.user_id')
        ->where('users.id',$id)
        ->get();

        $schedules_all = appointments::all();

        $category = Category::all();
        $medicine = Medicine::all();
        
        $appointment_service = services::all(); 

        $vaccine_kids= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',1)
        ->get();

        $vaccine_adult= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',2)
        ->get();

        foreach ($appointments1 as $appointment2) {
            $schedules[] = [
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }

        foreach ($schedules_all as $appointment2) {
            $schedulesall[] = [
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }
      
        if(Auth::User()->account_type=='admin'){
            return view ('calendar', compact('schedulesall','schedules','appointment_service','medicine') );
        // console.log($appointment_service);
         }else{
            // return view ('calendar', ['schedules' =>  $schedules]);
            return view ('calendar', compact('schedulesall','schedules','appointment_service','vaccine_kids','vaccine_adult','category','medicine') );
         }
    }


    public function action(){
        
    }

   
}
