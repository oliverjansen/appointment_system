<?php

namespace App\Http\Controllers;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Models\Residents;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResidentImport;


class AccountController extends Controller
{
    public function index(){
        return view ('accounts');
    }
   


    public function newaccount_admin (Request $request){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'emailaddress' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'account_type' => 'required',
        ]);
   
        
        if ($validator->passes()) { 
      
      
            $aa = User::create([
               'email' => $request->input('emailaddress'),
                'firstname' => $request->input('name'),
                'contactnumber' => Str::random(10),
                'middlename' => $request->input('account_type'),
                'lastname' => $request->input('account_type'),
                'gender' => $request->input('account_type'),
                'age' => $request->input('account_type'),
                'identification' => $request->input('account_type'),
                'identificationtype' => $request->input('account_type'),
                'birthdate' => $request->input('account_type'),
                'address' => $request->input('account_type'),
                'status' => "approved",
                'password' => bcrypt($request->input('password')),
                'account_type' => $request->input('account_type')
            ]);
         

                
        // //         // $addaccount->firstname = $request->input('name');
        // //         // $addaccount->middlename = $request->input('account_type');
        // //         // $addaccount->lastname = $request->input('account_type');
        // //         // $addaccount->gender = $request->input('account_type');
        // //         // $addaccount->age = $request->input('account_type');
        // //         // $addaccount->identification = $request->input('account_type');
        // //         // $addaccount->identificationtype = $request->input('account_type');
        // //         // $addaccount->birthdate = $request->input('account_type');
        // //         // $addaccount->contactnumber = $request->input('account_type');
        // //         // $addaccount->address = $request->input('account_type');
        // //         // $addaccount->status = "approved";
        // //         // $addaccount->password = bcrypt($request->input('password'));
        // //         // $addaccount->email = $request->input('emailaddress');
        // //         // $addaccount->account_type = $request->input('account_type');
        // //         // $addaccount->save();
                
        // //         // return redirect()->back()->with('success', "DataSave");
                return response()->json(['valid'=>'yes']);
    
           
        }
            return response()->json(['error'=>$validator->errors()->all()]);

        
     
        
    }

    public function add_residents(Request $request){

        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'barangay' => 'required',
        ]);

      
        
        if ($validator->passes()) { 

           Residents::create([
                'resident_firstname' => $request->input('firstname'),
                'resident_middlename' => $request->input('middlename'),
                'resident_lastname' => $request->input('lastname'),
                'resident_gender' => $request->input('gender'),
                'resident_birthdate' => $request->input('birthday'),
                'resident_age' => $request->input('age'),
                'resident_address' => $request->input('address'),
                'resident_barangay' => $request->input('barangay')
            ]);


            return response()->json(['valid'=>'yes']);

        }else{
         return response()->json(['error'=>$validator->errors()->all()]);

        }


    }



    public function update_residents(Request $request){

        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'barangay' => 'required',
        ]);

      
        
        if ($validator->passes()) { 

            // dd($request->input('id'));
            $resident = Residents::find($request->input('id'));

          
            $resident->resident_firstname = $request->input('firstname');
            $resident->resident_middlename = $request->input('middlename');
            $resident->resident_lastname = $request->input('lastname');
            $resident->resident_age = $request->input('age');
            $resident->resident_gender = $request->input('gender');
            $resident->resident_birthdate = $request->input('birthday');
            $resident->resident_address = $request->input('address');
            $resident->resident_barangay = $request->input('barangay');
            $resident->update();


          alert()->success('Successfully Updated')->showConfirmButton(false)->buttonsStyling(false)->autoClose(1500);

            return redirect()->back();
        }else{
            return redirect()->back();
         

        }


    }

    
    public function import_residents(Request $request){


        $data = $request->validate([
            'file' => 'required|mimes:xlsx, xls',
        ]);
 
        Excel::import(new ResidentImport, $request->file('file'));

        
        alert()->success('Successfully Imported')->showConfirmButton(false)->buttonsStyling(false)->autoClose(1500);

        return redirect()->back();
    }

    public function delete_resident(Request $request){

        $id = Residents::find($request->input('resident_id'));
        $id->delete();
        alert()->success('Successfully Deleted')->showConfirmButton(false)->buttonsStyling(false)->autoClose(1500);

        return redirect()->back();
    }
}
