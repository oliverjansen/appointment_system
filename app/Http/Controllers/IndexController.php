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
        $service = DB::table('services')
        ->join('vaccine','services.id',"=",'vaccine.service_id')
        ->join('other_services','services.id',"=",'other_services.service_id')
        ->groupBy('services.id')
        ->get();



        return view('index',compact('announcement','current_date'));
    }
}
