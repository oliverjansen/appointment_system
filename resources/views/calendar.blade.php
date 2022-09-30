
<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
</head>
<body>

  <div class="container mt-5 mb-5" >

  
    <div class="row">


    @if(Auth::User()->account_type=='admin')
    <div id ="calendar" class=" col col-lg-12 col-12 h-50"> 
    @else
    <div id ="calendar" class=" col col-lg-8 col-12"> 
    @endif

       
        @if(Auth::User()->account_type=='user')
         </div>
                <div class=" col col-lg-4 col-12 align-items-center justify-content-center" >
                    <form action="{{ url('insert_data') }}" method="POST" class= "w-100">

                        {{ csrf_field() }}

                        <div class="mt-3">
                            <label for="">Service</label>
                            
                            <select name="appointmentservice" id="appointmentservice" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                {{-- <option value="vaccine">Vaccine</option>
                                <option value="inquiries">Inquiry</option> --}}

                                @foreach ($appointment_service as $key => $value)

                                {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                    <option value="{{ $value->service }}"> 
                                    {{ $value->service }} 
                            
                                </option>
                            
                              @endforeach  
                            </select>
                        </div>

                        <div class="mt-3" id="div_appointmentPerson">
                            <label for="" >Person</label>
                            <select name="appointmentPerson" id="appointmentPerson" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="kids">Kids</option>
                                <option value="adult">Adult</option>
                            </select>
                        </div>
                                
                        <div class="mt-3" id="div_vaccine_type_kids">
                            <label for="">Vaccine Type</label>
                                <select name="appointmentvaccinetypekids" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="measles">All</option>
                                    <option value="measles">Measles</option>
                                    <option value="tuberculosis">Tuberculosis </option>
                                    <option value="inactivated">Inactivated polio </option>
                                    <option value="tuberculosis">Tuberculosis </option>
                                </select>
                            </div>
                            <div class="mt-3" id="div_vaccine_type_adult">
                                <label for="">Vaccine Type</label>
                                    <select name="appointmentvaccinetypeadult" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="tuberculosis">booster </option>
                                        <option value="inactivated">first dose </option>
                                        <option value="tuberculosis">second dose </option>
                                    </select>
                                </div>
                            <div class="mt-3" id="div_information">
                                <label for="" >Information</label>
                                <textarea name="" id="information" cols="30" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                                </textarea>
                            </div>
                            <div class="mt-3" id="div_laboratory">
                                <label for="">Already have laboratory?</label>

                                    <select name="appointmentvaccinetype" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="measles">Measles</option>
                                        <option value="tuberculosis">Tuberculosis </option>
                                        <option value="inactivated">Inactivated polio </option>
                                        <option value="tuberculosis">Tuberculosis </option>
                                    </select>
                                </div>
                                <div class="mt-3" id="div_medicine">
                                    <label for="">Free medecine</label>
    
                                        <select name="appointmentvaccinetype" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="measles">diabetes</option>
                                            <option value="tuberculosis">highblood </option>
                                           
                                        </select>
                                    </div>
                        <div class="mt-4"id="div_appointment_date">
                                <label for="">Appointment Date</label>
                                <input type="date" id="appointmentdate" name="appointmentdate" :value="old('appointmentdate')" required autofocus autocomplete="appointmentdate" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>
                        

                                <div class="mt-5 d-flex align-items-center justify-content-center">
                                <button type="submit" class="btn btn-secondary text-align-center w-50">Submit</button>
                                </div>
                    </form>
                        



                </div>
            </div>

        </div>
        
        @endif   
    </div>
</div>

<script>

$(document).ready(function () {
    var schedules = @json($schedules);
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaweek, agendaDay',
            },
            events: schedules
        })


        $("#appointmentservice").on('change',function(e){
            e.preventDefault();
            // alert($(this).val());
            if($(this).val()=="inquiries"){
                $("#div_appointmentPerson").hide();  
                $("#div_vaccine_type_kids").hide();  
                $("#div_vaccine_type_adult").hide();  

                $("#div_appointmentPerson").hide();
                $("#div_laboratory").hide();
                $("#div_medicine").hide();

                $("#div_information").show();

            }else if($(this).val()=="vaccine"){
                $("#div_appointmentPerson").show();
                $("#div_vaccine_type").show();  
                $("#div_appointmentPerson").show();
                $("#div_information").hide(); 
                $("#div_laboratory").hide();
                $("#div_medicine").hide();

                $("#appointmentPerson").on('change',function(e){ 
                    if($(this).val()=="kids"){
                        $("#div_vaccine_type_kids").show();  
                        $("#div_vaccine_type_adult").hide();  

                    }else if ($(this).val()=="adult"){
                        $("#div_vaccine_type_kids").hide();  
                        $("#div_vaccine_type_adult").show(); 
                     
                    }
                }).change();
                    
            }
   
            else if($(this).val()=="free medicine"){
                $("#div_appointmentPerson").hide();  
                $("#div_vaccine_type").hide();  
                $("#div_appointmentPerson").hide();
                $("#div_information").hide(); 
                $("#div_medicine").show(); 


            }else{
                
                $("#div_information").show(); 

            }
                // $("").hide();
                // $("#" + $(this).val()).fadeIn(700);
                

        }).change();

       
});
  
</script>

</body>
</html>



 
</x-app-layout>