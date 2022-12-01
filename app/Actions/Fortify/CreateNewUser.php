<?php

namespace App\Actions\Fortify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use RealRashid\SweetAlert\Facades\Alert;
use Twilio\Rest\Client;
use Illuminate\Foundation\Auth\RegistersUsers;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'max:255'],
            'barangay'=> ['required', 'integer', 'min:1'],
            'birthdate' => ['required', 'string', 'max:255'],
            'identification' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'identificationtype' => ['required', 'string', 'max:255'],
            'contactnumber' => 'required|regex:/^[9][0-9]{9}$/|unique:users',
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // $request->file('image')->getClientOriginalName();
        // $request->identification->store('images','public');
        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);

        if (request()->hasFile('identification')){
            $identification = request()->file('identification')->getClientOriginalName();
            $identificationName = request()->file('identification')->store('images','public');
            // $file = request->file('identification');
            // $extention = $file->getClientOriginalExtension();
            // $filename = time().'.'.$extention;
            // $file->

        }

        // $contactno = "+63".$input['contactnumber'];

        // dd($contactno);
        // $request->file('identification')->getClientOriginalName();
        
        Alert::success('Success Title', 'Success Message');
        


        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio = new Client($twilio_sid, $token);
        // $twilio->verify->v2->services($twilio_verify_sid)
        //     ->verifications
        //     ->create($contactno, "sms");




        return User::create([
            'firstname' => $input['firstname'],
            'middlename' => $input['middlename'],
            'lastname' => $input['lastname'],
            'gender' => $input['gender'],
            'lastname' => $input['lastname'],
            'age' => $input['age'],
            
            'birthdate' => $input['birthdate'],
            'contactnumber' => "+63".$input['contactnumber'],
            'identification' => $identificationName,
            'identificationtype' => $input['identificationtype'],
            'address' => $input['address'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

       
        
   
    }

    // protected function verify(Request $request)
    // {
    //     $data = $request->validate([
    //         'verification_code' => ['required', 'numeric'],
    //         'phone' => ['required', 'string'],
    //     ]);
    //     /* Get credentials from .env */
    //     $token = getenv("TWILIO_AUTH_TOKEN");
    //     $twilio_sid = getenv("TWILIO_SID");
    //     $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
    //     $twilio = new Client($twilio_sid, $token);
    //     $verification = $twilio->verify->v2->services($twilio_verify_sid)
    //         ->verificationChecks
    //         ->create($data['verification_code'], array('to' => $data['phone']));
    //     if ($verification->valid) {
    //         $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
    //         /* Authenticate user */
    //         Auth::login($user->first());
    //         return redirect()->route('home')->with(['message' => 'Phone number verified']);
    //     }
    //     return back()->with(['phone' => $data['phone'], 'error' => 'Invalid verification code entered!']);
    // }
}
