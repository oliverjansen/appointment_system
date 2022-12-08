<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}" >
    
    <link>
   
</head>
<style>
.first-row{

}
.col{
    margin-bottom: 10px;
}

.wrapper{
width:200px;
padding:20px;
height: 150px;
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
        
{{-- 
     @if(session()->has('yes'))
     
            <script>
                  $(document).ready(function() {
                $('#anti_privacy_act_modal').modal('hide');

            });
            </script>
        @else
            <script>
                 $(document).ready(function() {
                $('#anti_privacy_act_modal').modal('show');
            });
            </script>
        @endif --}}





    <div class="modal fade" id="anti_privacy_act_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog  modal-xl  modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header mb-2 mt-4" >
              <p class="text-center">
                <h1 class="font-weight-bold">DATA PRIVACY CONSENT FORM
                </h1>
               
                
              </p>
            </div>
            <div class="modal-body overflow-auto" style="height: 400px">
              <div class="container ">
             <div class="row"> 
                <div class="col col-12 ">
                    <div class="col text-justify">
                       <ol>
                        <i>
                            <li> 
                                Dapitan Health Center is committed to ensuring the confidentiality, security and protection of personal data. This document gives details on how the Health Center uses and protects personal data for the purpose of obtaining the consent of data subjects, in pursuant with RA 10173 also known as the Data Privacy Act (DPA) of 2012, its Implementing Rules and Regulation (IRR), and other relevant laws of the Philippines.
                            </li><br>
                            <li> 
                                As a patient and resident of the covered barangay of Dapitan Health Center you are considered as a data subject. Please read the details of this document carefully to ensure informed consent. 
                            </li><br>
                            <li> 
                                <b>I. About Personal Data</b><br>
                                <li>Personal data refers to all types of :</li><br>
                                <div class="pl-3 mb-2">
                                    <ol>
                                    <li>
                                       <b> 1.	Personal Information –</b> Referring to any data or information  recorded in a material form or not, from which the identity of the individual is evident or can be reasonably and directly ascertained by the entity holding the information, or when put together with other data or information would directly and certainly identify an individual.
                                    </li><br>
                                    <li>
                                        <b> 2.	Sensitive Information – </b>Referring to (i) An individual’s 	age, gender, birthdate, contact number address, and email (ii) Data or information issued by government agencies which are peculiar to an individual. Includes but not limited to the following: National ID, Driver’s license, Passport, Philhealth, PRC ID, SSS, Umid and Voters ID (iii) Data or Information which are specifically established by an executive order or an Act of Congress to be kept classified.
                                    </li><br>
                                    <li>
                                        <b>  3.	Privileged Information – </b>Referring to any and all forms of personal data which under the Rules of the Court and other pertinent laws constitute a privileged communication.
                                    </li><br>
                                
                                
                                </ol>
                                </div>
                                <li> <b>II. Collection and Use of Personal Data:  </b>Dapitan Health Center generally do not collect personal data unless it is provided to us voluntarily by you directly. We may use the personal data or information in order to perform service processes effectively and efficiently in conformity with corporate policies. In this regard, the Health Center may collect your personal data in order to: 
                                    <div class="pl-3 mb-2 mt-2"><br>
                                        <ol>
                                            <li>1.	Proof that you are resident of the covered barangay of Dapitan health center</li>
                                            <li>2.	Provide you with the information of the availability of the medicine</li>
                                            <li>3.	Provide you latest services</li>
                                        </ol>
                                    </div>

                                </li><br>
                            </li>
                            <li> 
                               <b>III. Type of Personal Data Collected: </b>  The Health Center may collect the following personal data:
                                <div class="pl-3 mb-2 mt-2">
                                    <ol>
                                        <li>1.	Name</li>
                                        <li>2.	Age</li>
                                        <li>3.	Sex</li>
                                        <li>4.	Birthday</li>
                                        <li>5.	Contact Number</li>
                                        <li>6.	Email Address</li>
                                        <li>7.	Identification</li>
        
        
                                     </ol>
                                </div>
                      
                            </li><br>
                            <li><b> IV. Confidentiality of Data:</b> Dapitan Health Center shall operate and hold personal data under strict confidentiality. The Dapitan Health Center shall not disclose or share personal information in its possession other entities without your expressed written consent.</li><br>
                            <li><b>V. Data Protection:</b>
                                 Dapitan Health Center shall implement appropriate organizational, physical and technical security measures in order to ensure the privacy and protection of personal data in its possession. The security shall aim to protect and secure data from loss, misuse, unauthorized modification, unauthorized access or disclosure , alteration or destruction. The following are the Health Center safeguards:
                                 <div class="pl-3 mb-2 mt-2">
                                    <ul>
                                        <li>• Strict implementation of information security policies</li>
                                        <li>• Access Restriction to unauthorized personnel</li>
                                        <li>• Use of secured servers and firewalls</li>
                                        <li>• Data encryption on computing devices</li>
    
                                     </ul>
                                 </div>
                             
                            </li><br>
                            <li><b>VI. Data Retention: </b>All personal data or information that the Health Center had obtained shall not be retained for a period as specified by law and after the period, all hard and soft copies of personal data or information shall be disposed of and destroyed, through secured means.</li><br>
                            <li><b>VII. Rights of Data Subjects :</b> As a data subject you have the following rights under Data Privacy Act of 2012: Right to be informed, Right to object, Right to access, Right to rectify or correct erroneous data, Right to erase or block, Right to secure data portability, Right to indemnified for damages, Right to file a complaint.</li><br>

                        </i>
                    
                       </ol>
                    </div>
    
                 
             
                    
                </div>

            
             
            </div>
   

            <div class="border border-bottom border-dark mt-3">
                
            </div>

      
                @csrf
                {{ csrf_field() }}
            <div class="col mt-5 mb-5"> <i><b>
                
                <input type="checkbox" id="choice" name="choice" value="yes" required> 
                <small class="text-danger" id="require_check"></small>
                &nbsp;&nbsp;
                I have read this form and understand its content and voluntarily give my consent for the collection, use, processing, storage and retention of my personal data or information to Dapitan Health Center for the purpose(s) described in this document. I also understand  that my consent does not prevent the existence of other criteria for lawful processing of personal data and does not waive any of my rights under RA 10173 – Data Privacy Act of 2012 and other applicable laws.</b>
                </i>
             
            </div>
              </div>
            </div>
            <div class="modal-footer">
              <button  onclick="proceed()" id="proceed" value=""class="bg-primary p-1 rounded text-white ">Proceed</button>
            </div>
     
        <script  type="text/javascript">
            function proceed(){
                var remember = document.getElementById("choice")
                if(remember.checked == true){
                    $('#anti_privacy_act_modal').modal('hide');
                    
                }else{
                    $('#anti_privacy_act_modal').modal('show');
                     $('#require_check').text("Required field.");

           
                    

                }
            }
        </script>
          </div>
        </div>
      </div>

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

                    <input type="date" id="birthdate" max="{{\Carbon\Carbon::today()->format('Y-m-d')}}" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </div>
            
                </div>

        
                <div class="mb-2 mt-3">
                    <x-jet-label for="contactnumber" class="mt-3 " value="{{ __('CellPhone No') }}" />
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        +63
                        </span>
                        <input type="text" id="contactnumber" name="contactnumber" :value="old('contactnumber')" required autofocus autocomplete="contactnumber" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:ring-indigo-200 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-opacity-50 dark:focus:ring-indigo-200" placeholder="">
                    </div>
                    
                </div>

                
                <div class="row">
                    {{-- <div class="col-12 col-lg-6">
                        <x-jet-label for="contactnumber" class="mt-3 " value="{{ __('Contact Number') }}" />
                        <x-jet-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber" :value="old('contactnumber')" required autofocus autocomplete="contactnumber" />
                    </div> --}}
                     <div class="col-12 col-lg-8">
                        <x-jet-label for="address" class="mt-3" value="{{ __('Address') }}" />
                        <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                    </div>
                    <div class="col-12 col-lg-4">
                        <x-jet-label for="barangay" class="ml-1 mt-3" value="{{ __('Barangay') }}" />
                        <x-jet-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" :value="old('barangay')" required autofocus autocomplete="barangay" />
                    </div>
                </div>
                <div class="row">
                 
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
                    <div class="col  " style="">
                        <x-jet-label for="identificationtype" class="" value="{{ __('Identification Type') }}" />
                        <select name="identificationtype" id="identificationtype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :value="old('identificationtype')"  autofocus autocomplete="identificationtype">
                            <option value="">Select Identification.. </option>
                            <option value="drivers license">National ID </option>
                            <option value="drivers license">Driver’s License </option>
                            <option value="Passport">Passport </option>
                            <option value="PhilHealth Card">PhilHealth Card </option>
                            <option value="PRC ID">PRC ID </option>
                            <option value="SSS ID">SSS ID</option>
                            <option value="UMID">UMID</option>
                            <option value="Voter’s ID">Voter’s ID</option>
                            <option value="PSA">PSA</option>
                            <option value="1">Others</option>

                        </select>
              
                    
                    </div>
                  
                               
                                
                </div> 
                <div class="row  mb-4" id="others">
                    <div class="col  " style="" >
                        <x-jet-label for="identificationtype" class="" value="{{ __('Enter Identification') }}" />
                        <x-jet-input id="identificationtypeothers" class="block mt-1 w-full" type="text" name="identificationtypeothers"  :value="old('identificationtypeothers')"   />
                    </div>
                </div>
                        
                <script>
 
 
 $(document).ready(function () {
//     let mybutton = document.getElementById("myBtn");
//     window.onscroll = function() {scrollFunction()};
//    proceed
//     function scrollFunction() {
//             if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//                 mybutton.style.display = "block";
//             } else {
//                 mybutton.style.display = "none";
//             }
// }

    $("#others").hide();

    

            $(document).on('change', '#identificationtype',function (e) {
                    e.preventDefault();

                    console.log($(this).val());
                   
                    if($(this).val() == "1"){
                        $("#others").show();
                        
                        $("#identificationtype").prop('required',false);

                        $("#identificationtypeothers").prop('required',true);
                        
                    }else{
                        $("#others").hide();
                        $("#identificationtypeothers").val("");
                        $("#identificationtypeothers").prop('required',false);
                        $("#identificationtype").prop('required',true);

                    }


                });

    });


                </script>
                                    
                <div class="row mt-4">
                    <div class="col">
                        
                    <input type="file" id="identification" name="identification" class="" required>
                    </div>
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

   

        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register_action') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contactnumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                    <div class="col-md-6">
                                        <input id="contactnumber" type="tel" class="form-control @error('contactnumber') is-invalid @enderror" name="contactnumber" value="{{ old('contactnumber') }}" required>
                                        @error('contactnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </x-jet-authentication-card>
</x-guest-layout>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
     $(document).ready(function() {
                $('#anti_privacy_act_modal').modal('show');
        });

</script>
</body>
</html>