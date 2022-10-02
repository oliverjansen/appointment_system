<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;
use App\Models\Vaccine;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{

 
  function sample(){
    return view ('dashboard');
  }

   function services(){
  
    $service = services::all();
    $vaccine = vaccine::all();
    $category = Category::all();


    
    if(Auth::User()->account_type=='admin'){
      return view('services',compact('service','vaccine','category'));
      }else{
        return redirect()->route('calendar');
      }
   }



// add 
   public function add_services(Request $request){


      $services_add = new services();
      $services_add ->service = $request ->input ('add_service_input');
      $services_add->save();
  
      if(Auth::User()->account_type=='admin'){
        return redirect()->route('services');
      }else{
        return redirect()->route('calendar');
      }

 }

 public function add_vaccine(Request $request){


     

      if($request ->input ('add_vaccine_input_id') != null && $request ->input ('add_vaccine_input') != null){
        $vaccine_add = new vaccine();
        $vaccine_add ->person = $request ->input ('add_vaccine_input_id');
        $vaccine_add ->vaccine_type = $request ->input ('add_vaccine_input');
        $vaccine_add->save();
      }
      if ($request ->input ('add_vaccine_category_input') != null){
          $vaccine_category_add = new Category();
          $vaccine_category_add ->category = $request ->input ('add_vaccine_category_input');
          $vaccine_category_add->save();
      }
    

      if(Auth::User()->account_type=='admin'){
        return redirect()->route('services');
      }else{
        return redirect()->route('calendar');
      }

 }




 //edit 

 public function edit_services($id){
  $services_id = services::find($id);
  return response()->json([
        'status'=>200,
        'service'=> $services_id,

  ]);
 }  

 public function edit_vaccine($id){
  $vaccine_id = Vaccine::find($id);
  return response()->json([
        'status'=>200,
        'vaccine_id'=> $vaccine_id,

  ]);
 }  

 public function edit_category($id){
  $category_id = Category::find($id);
  return response()->json([
        'status'=>200,
        'category_id'=> $category_id,

  ]);
 }  



 //update
 

 public function update_category(Request $request){
 
  $id = $request ->input ('category_update_id');
  $category = Category::find($id);
  $category ->category = $request ->input ('category_update');
  $category->update();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('success', 'Successfully Edited');
  }else{
    return redirect()->route('login');
  }

}  

 public function update_services(Request $request){
 
  $id = $request ->input ('id');
  $appointment = services::find($id);
  $appointment ->service = $request ->input ('service');
  $appointment->update();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('success', 'Successfully Edited');
  }else{
    return redirect()->route('login');
  }

}  

public function update_vaccine(Request $request){

  $vaccine_id = $request ->input ('vaccine_del_id');
  $vaccine = Vaccine::find($vaccine_id);

  $vaccine ->vaccine_type = $request ->input ('vaccine');
  $vaccine->update();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('success', 'Successfully Edited');
  }else{
    return redirect()->route('login');
  }

} 

//delete services
 public function delete_services (Request $request){
  $id = $request ->input ('service_del_id');
  $service_del= services::find($id);
  $service_del->delete();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('danger', 'Successfully Deleted');
  }else{
   return redirect()->route('calendar');
  }
  // return redirect()->back()->with('danger', 'Successfully Deleted');

 }

//delete vaccine
 public function delete_vaccine (Request $request){
  $id = $request ->input ('delete_vaccine_id');
  $service_del= vaccine::find($id);
  $service_del->delete();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('danger', 'Successfully Deleted');
  }else{
   return redirect()->route('calendar');
  }

 }

 
 public function delete_category (Request $request){
  $id = $request ->input ('category_del_id');
  $category_del= vaccine::find($id);
  $category_del= Category::find($id);

  $category_del->delete();

  if(Auth::User()->account_type=='admin'){
    return redirect()->back()->with('danger', 'Successfully Deleted');
  }else{
   return redirect()->route('calendar');
  }

 }

   
}
