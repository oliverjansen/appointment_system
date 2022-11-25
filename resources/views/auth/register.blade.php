<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
     {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
</head>
<style>
.first-row{

}
.col{
    margin-bottom: 10px;
}

.second-row{

}
.reg-textlogo{
    font-size: 24px;
    text-align: center;
}
</style>
<body >
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <div class="reg-textlogo">
               </div>
               <div class="text-center d-block">
            
                <b><h5 class="text-color"> Dapitan Health Center</h5></b>
                
            </div> 
        </x-slot> 
    <x-jet-validation-errors class="mb-4" />
        <div class="alert alert-warning alert-dismissible fade show m-4" role="alert">
            <strong>Reminder: </strong> After you register, We will verify first your account before you can access the system.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mt-5">
            @csrf
        <div class="container">
          <div class="row">
                <div class="col col-12 col-lg-4">
                    <x-jet-label for="firstname" class="mt-2" value="{{ __('First Name') }}" />
                    <x-jet-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                </div>
                <div class="col-12 col-lg-4">
                    <x-jet-label for="middlename" class="mt-2" value="{{ __('Middle Name') }}" />
                    <x-jet-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autofocus autocomplete="middlename" />
               </div>
                <div class="col-12 col-lg-4 ">
                    <x-jet-label for="lastname" class="mt-2" value="{{ __('Last Name') }}" />
                    <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                </div>
            </div>
            <div class="row">
            <div class="col-12 col-lg-4 second-row">
                <x-jet-label for="age"  class="mt-2" value="{{ __('Age') }}" />
                <x-jet-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autofocus autocomplete="age" />
            </div>
            <div class="col-12 col-lg-4 mt-2">
                <x-jet-label for="gender" class="" value="{{ __('Gender') }}" />
                <select name="gender" id="gender" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col-12 col-lg-4">
                <x-jet-label for="birthdate" class="mt-2" value="{{ __('Birthdate') }}" />

                <input type="date" id="birthdate" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </div>
        
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <x-jet-label for="contactnumber" class="mt-3" value="{{ __('Contact Number') }}" />
                    <x-jet-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus autocomplete="contactnumber" />
                </div>
                <div class="col-12 col-lg-6">
                    <x-jet-label for="address" class="mt-3" value="{{ __('Address') }}" />
                    <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col col-12">
                    <x-jet-label for="email" class="mt-2" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
            </div>
          
            <div class="row ">
            <div class="col">
                <x-jet-label for="password" class="mt-2" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-jet-label for="password_confirmation" class="mt-2" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
            <div class="row mt-2">
                <div class="col">
                    <x-jet-label for="identificationtype" class="" value="{{ __('Identification Type') }}" />
                    <x-jet-input id="identificationtype" class="block mt-1 w-full" type="text" name="identificationtype" :value="old('identificationtype')" required autofocus autocomplete="identificationtype" />
                </div>
            </div> 
            <div class="row mt-2">
                <div class="col">
                <input type="file" id="identification" name="identification" class="">

                </div>
                {{-- <x-jet-label for="identification" value="{{ __('Identification') }}" />
                <!-- <x-jet-input id="identification" class="block mt-1 w-full" type="text" name="identification" :value="old('identification')" required /> --> --}}
            </div>
        </div>
 

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>