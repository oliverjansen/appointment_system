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
        
        $appointments1 = DB::table('users')
        ->join('appointments','users.id',"=",'appointments.user_id')
        ->where('users.id',$id)
        ->get();

        $schedules_all = appointments::all();

        $category = Category::all();
        // $medicine = Medicine::all();

        $vaccine = Vaccine::all();
        $services = services::all();


       
        if($services->isEmpty()){
            $yes = 0;
        }else{
            $yes = 1;

        }
       
        
        $appointment_service = services::all(); 
        $current_date =Carbon::now()->toDateTimeString();

        // appointments::where('post_id',$id)->delete();

        $appointment_expire = appointments::all(); 
        $pending = "pending";
        
      appointments::where('appointment_expiration_date',"<=",$current_date)->where('appointment_status',$pending)->delete();
        
    
        // foreach ($appointment_expire as $value) {
           
        //     if($value->appointment_expiration_date){
        //         if($value->appointment_expiration_date <= $current_date){
        //             $delete_expired_appointment = appointments::find($value->id);
        //             // dd($delete_expired_appointment);
        //             $delete_expired_appointment->delete();
        //         }
                
        //     }else{
                
        //     }
        // }

        $vaccine_kids= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',1)
        ->get();

        $vaccine_covid= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',2)
        ->get();
        
        $vaccine_others= DB::table('categories')
        ->join('vaccine','categories.id',"=",'vaccine.category_id')
        ->where('categories.id',">",2)
        ->get();

        $data3 = Other_Services::pluck('service_id','other_services');

        foreach ($appointments1 as $appointment2) {
            $schedules[] = [
                'id' =>  $appointment2->id,
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }

        foreach ($schedules_all as $appointment2) {
            $schedulesall[] = [
                'id' =>  $appointment2->id,
                'title' => $appointment2->appointment_services,
                'start' => $appointment2->appointment_date,
                // 'vaccinetype' => $appointment2->vaccinetype,
                // 'person' => $appointment2->person,
        ];  

        }
     
        if(Auth::User()->account_type=='admin'){
            return view ('calendar', compact('schedulesall','schedules','appointment_service','category','vaccine','yes') );
        // console.log($appointment_service);
         }else{
            $qrcode = 13;
            // return view ('calendar', ['schedules' =>  $schedules]);
            return view ('calendar', compact('schedulesall','schedules','appointment_service','vaccine_kids','vaccine_others','category','qrcode','vaccine','vaccine_covid','yes','data3') );
         }
    }


    public function action(Request $request){
        // if($request->ajax()){
        //     if(request->){

        //     }
        // }

    }

    public function get_other_services ($id){
        echo json_encode (DB::table('other_services')->where('service_id',$id)->get());
        // $other_services = DB::table('other_services')->where('service_id',$id)->get();
        
        // return response()->json([
        //     'other_services'=> $other_services,
        // ]);
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
       
        
        $update_slot = DB::table('appointments')->where('id',$id)->get();
       
        foreach($update_slot as $value){
            $appointment_date = $value->appointment_date;
            $service_id = $value->service_id;
            $appointment_slot = $value->appointment_availableslot;
           
        }
        $update = appointments::where("appointment_date",$appointment_date)->where("service_id",$service_id)->update(['appointment_availableslot' => $appointment_slot+1]);
        
       

        // appointments::where("appointment_date",$appointmentDate)
        // ->update(['appointment_availableslot' => $appointment_slot]);

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
