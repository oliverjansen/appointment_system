<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use Carbon\Carbon;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IndexController extends Controller
{
    function index(){
        $current_date = Carbon::today()->format('Y-m-d');

        $announcement_delete = DB::table('announcement')
        ->get();

        $announcement = DB::table('announcement')
        ->where('publish_date',"<=", $current_date)
        ->groupBy('id')
        ->get();

        foreach ($announcement_delete as $value) {
            if($value->unpublish_date < $current_date){
                $id = Announcement::find($value->id);
                $id->delete();
            }
         
            
        }


        //services
        $service_otherservices = DB::table('services')
        ->get();

        //Vaccine
        $vaccine =  DB::table('categories_vaccine')
        ->where('category_availability',"Yes")
        ->get();

        $pediatric = DB::table('vaccine')
        ->where('service_id',"1")
        ->where('category_id',"1")
        ->where('vaccine_availability',"Yes")
        ->get();

        $covid = DB::table('vaccine')
        ->where('service_id',"1")
        ->where('category_id',"2")
        ->where('vaccine_availability',"Yes")
        ->groupBy('dose')
        ->get();
        
        $other_vaccine = DB::table('vaccine')
        ->where('service_id',"1")
        ->where('category_id',">",2)
        ->where('vaccine_availability',"Yes")
        ->get();

        
        
        
        //others
        $medicine =  DB::table('other_services')
        ->where('other_services_availability',"Yes")
        ->where('service_id',"=",2)
        ->get();

        $checkup =  DB::table('other_services')
        ->where('other_services_availability',"Yes")
        ->where('service_id',"=",3)
        ->get();

        $sevices = DB::table('services')
        ->where('availability',"Yes")
        ->where('id',">",3)
        ->get();



        return view('index',compact('announcement','current_date','service_otherservices','vaccine','sevices','medicine','checkup','pediatric','covid','other_vaccine'));
    }
}
