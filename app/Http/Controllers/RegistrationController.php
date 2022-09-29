<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vaccine;
class RegistrationController extends Controller
{
    function registration(){
         $data = User::all();

        if(Auth::User()->account_type=='admin'){
            return view ('registration',compact('data'));
            }else{
                return redirect()->route('calendar');
    }
    }

    function approve(){
        
    }
}
