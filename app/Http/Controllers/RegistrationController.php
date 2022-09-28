<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function registration(){
        if(Auth::User()->account_type=='admin'){
            return view ('registration');
            }else{
                return redirect()->route('calendar');
    }
    }
}
