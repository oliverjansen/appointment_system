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
}
