<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WorkersController extends Controller
{
    function workers(){
        if(Auth::User()->account_type=='admin'){
            return view ('workers');
            }else{
                return redirect()->route('calendar');
            }
        
    }
}
