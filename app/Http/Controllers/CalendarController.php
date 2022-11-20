<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\appointments;
use App\Models\services;
use App\Models\Vaccine;
use App\Models\Category;
// use App\Models\Medicine;
use App\Models\Other_Services;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



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

        if(Auth::User()->account_type=='user'){    
        $schedule_calendar = DB::table('appointments')
        ->where('user_id',$id)
        ->where('appointment_status',"pending")
        ->get();

       
        $hide_appointment_form = DB::table('appointments')
        ->where('user_id',$id)
        ->where('appointment_status',"pending")
        ->get();

        if($hide_appointment_form->isEmpty()){
                $hide = "no";
        }else{
                $hide = "yes";
        }

 

        }else{
                    
            $schedule_calendar = DB::table('appointments')->get();

        }

    

        $category = Category::all();
        $vaccine = Vaccine::all();
        $services = services::all();

        $vaccine_dose = DB::table('categories_vaccine')
        ->join('vaccine','categories_vaccine.id',"=",'vaccine.category_id')
        ->where('category_id',2)
        ->groupBy('dose') 
        ->get();

        // $vaccine_dose = DB::table('appointments')
        // ->join('vaccine','appointments.service_category_id',"=",'vaccine.id')
        // ->where('user_id',$id)
        // ->whereNotIn('appointment_status',["success"])
        // ->get();

  

        if($services->isEmpty()){
            $yes = 0;
        }else{
            $yes = 1;

        }


       
        
        $appointment_service = services::all(); 
        $current_date =Carbon::now()->format('Y-m-d');

    
   
        $appointment_expire = appointments::all(); 
        $pending = "pending";
        
      appointments::where('appointment_date',"<",$current_date)
      ->where('appointment_status',$pending)
      ->update(['appointment_status' => "expired"]);
        


        $vaccine_kids= DB::table('categories_vaccine')
        ->join('vaccine','categories_vaccine.id',"=",'vaccine.category_id')
        ->where('categories_vaccine.id',1)
        ->get();

       

        
     

       
        $vaccine_covid= DB::table('categories_vaccine')
        ->join('vaccine','categories_vaccine.id',"=",'vaccine.category_id')
        ->where('categories_vaccine.id',2)
        ->get();
        
        $vaccine_others= DB::table('categories_vaccine')
        ->join('vaccine','categories_vaccine.id',"=",'vaccine.category_id')
        ->where('categories_vaccine.id',">",2)
        ->get();

        // dd($vaccine_others);


        $others_services= DB::table('categories_vaccine');

        $data3 = Other_Services::pluck('service_id','other_services');
        
       
        $color = '#0AA52B';

        foreach ($schedule_calendar as $value) {
            $color = null;
            if ($value->service_id == 1){
                $color = '#008000';
            }else if ($value->service_id == 2){
                $color = '#6495ED';
            }else if ($value->service_id == 3){
                $color = '#F39C12 ';
            }else if ($value->service_id == 4){ 
                $color = '##3D9AF7';
            }else if ($value->service_id == 5){
                $color = '#F73DE4 ';
            }else if ($value->service_id == 6){
                $color = '#F78F3D';
            }else{
                $color = '#6ED8F1';
            }
           
            $schedules[] = [
                'id' =>  $value->id,
                'title' => $value->appointment_services,
                'start' => $value->appointment_date,
                'color' => $color,
                'textColor'=> 'white'
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }

     //account
        if(Auth::User()->account_type=='admin'){
            return view ('calendar', compact('schedules','others_services','appointment_service','category','vaccine','yes') );
        // console.log($appointment_service);
        
         }elseif(Auth::User()->account_type=='user'){
            $qrcode = 13;
            // return view ('calendar', ['schedules' =>  $schedules]);
            return view ('calendar', compact('schedules','hide','current_date','vaccine_dose','appointment_service','vaccine_kids','vaccine_others','category','qrcode','vaccine','vaccine_covid','yes','data3') );
         }elseif(Auth::User()->account_type=='staff'){
            return view ('scanner');

         }
    }


    public function action(Request $request){
        // if($request->ajax()){
        //     if(request->){

        //     }
        // }

    }

    public function get_dose($id){
        echo json_encode (DB::table('vaccine')->where('dose',$id)->get());
    }

    public function get_other_services ($id){
        echo json_encode (DB::table('services')
        ->join('other_services','services.id',"=",'other_services.service_id')
        ->where('other_services.service_id',$id)
        ->get());
       
    }

    public function get_service($id){
    $id = services::find($id);

    return response()->json([
        'services'=> $id,
    ]);

    }


    // public function fetch_data(Request $request)
    // {
    //     $select = $request->get('select');
    //     $value = $request->get('value');
    //     $dependent = $request->get('dependent');
    
    //     $data = DB::table('other_services')->where('service_id',$value)->get();
    
    //     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
    //     foreach($data as $row)
    //     {
    //     $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
    //     }
    //     echo $output;
    //     var_dump($output);
    // }



public function delete_appointment(Request $request){

        $id = $request ->input ('calendar_id');
        $delete_appointment= appointments::find($id);
       

        $check_id = DB::table('appointments')
        ->where('id',$id)
        ->where('appointment_status',"pending")
        ->get();

       $service_category_id = null;
       $service_id =null;
       $appointment_date =null;
       $appointment_slot = null;
        $appointment_dose = null;

        foreach($check_id as $value){
            $service_id = $value->service_id;
            $service_category_id = $value->service_category_id;
            $pediatic_id = $value->pediatic_id; 

        }

        
        
        if($service_id == 1){
         
            //categories_vaccine table
            if($pediatic_id !== null){
                $update_slot = DB::table('categories_vaccine')
                ->where('id',$pediatic_id)
                ->where('service_id',$service_id)
                ->get('category_vaccine_slot');
                
               foreach ($update_slot as $value) {
                $slot = $value->category_vaccine_slot;
               }

               DB::table('categories_vaccine')
               ->where('id',$pediatic_id)
               ->where('service_id',$service_id)
               ->update(['category_vaccine_slot'=> $slot+1]);
               
            
            //vaccine table
            }else if($service_category_id !== null){

                $update_slot = DB::table('vaccine')
                ->where('id',$service_category_id)
                ->where('service_id',$service_id)
                ->get(['vaccine_slot']);

           
               foreach ($update_slot as $value) {
                $slot = $value->vaccine_slot;
               }

               DB::table('vaccine')
               ->where('id',$service_category_id)
               ->where('service_id',$service_id)
               ->update(['vaccine_slot'=> $slot+1]);
            }
        }else{

            $update_slot = DB::table('other_services')
            ->where('id',$service_category_id)
            ->where('service_id',$service_id)
            ->get(['other_services_slot']);

            foreach ($update_slot as $value) {
                $slot = $value->other_services_slot;
               }
        
             $kk = DB::table('other_services')
            ->where('id',$service_category_id)
            ->where('service_id',$service_id)
            ->update(['other_services_slot'=> $slot+1]);


        }

   
        // else{
        //     $update_category = DB::table('appointments')
        //     ->where('service_category_id',$service_category_id)
        //     ->where('service_id',$service_id)
        //     ->where('appointment_date',$appointment_date)
        //     ->get();
        // }
           
        // $update_category = DB::table('appointments')
        // ->where('service_category_id',$service_category_id)
        // ->where('service_id',$service_id)
        // ->where('appointment_date',$appointment_date)
        // ->where('appointment_status',"pending")
        // ->get();


            

            $delete_appointment->delete();
      
        if(Auth::User()->account_type=='admin'){
          return redirect()->back()->with('danger', 'Successfully Deleted');
        }else{
         return redirect()->route('calendar');
        }

    }

    public function preview_appointment($id){

        $id = appointments::find($id);
        // $service_id = User::find($id);

        $appointment =  response()->json(['appointment'=> $id,]);
        return $appointment ;

        
    }

    public function preview_qrcode($id){
        // $data = appointments::find(13);
        $qrcode = QrCode::size(120)->generate('123123');
        // return  ('calendar',['qrcode'=>$qrcode]);
        return redirect()->back()->with('qrcode',$qrcode);
    }

}
