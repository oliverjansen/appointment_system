<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    protected function create(Request $request)
    {

       
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contactnumber' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['contactnumber'], "sms");
            
        User::create([
            
            'email' => $data['name']."@gmail.com",
            'contactnumber' => $data['contactnumber'],
            'password' => Hash::make($data['password']),
        ]);

       
        return redirect()->route('verify')->with(['contactnumber' => $data['contactnumber']]);
    }




    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'contactnumber' => ['required', 'string'],
        ]);

       

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create(['code'=> $data['verification_code'],'to' => $data['contactnumber']]);


            if ($verification->valid) {

             
            //     $user = tap(User::where('contactnumber', $data['contactnumber']));
               
            // /* Authenticate user */

            // Auth::login($user->first());
            return redirect()->route('login');
        }

        
        return back()->with(['contactnumber' => $data['contactnumber'], 'error' => 'Invalid verification code entered!']);
    }
}
