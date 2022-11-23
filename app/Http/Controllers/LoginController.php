<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::User()->account_type=='user'){ 
            return redirect()->route('calendar');
            
        }else if(Auth::User()->account_type=='admin'){
            Alert::warning('Warning Title', 'Warning Message');
            return redirect()->route('admin.scanner');

        }else if(Auth::User()->account_type=='staff'){
            return view ('scanner');
        }else{
            return redirect()->route('login');
        }
    }
}
