
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

                                @foreach ($appointment_service as $value)

                                {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                    <option value="{{ $value->service }}"> 
                                    {{ $value->service }} 
                            
                                </option>
                            
                              @endforeach  
                            </select>
                        </div>

                        <div class="mt-3" id="div_appointmentPerson">
                            <label for="" >Category</label>
                            <select name="appointmentPerson" id="appointmentPerson" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($category as $value)

                                {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                    <option value="{{ $value->category }}"> 
                                    {{ $value->category }} 
                            
                                </option>
                            
                              @endforeach  
                            </select>
                        </div>
                                
                        <div class="mt-3" id="div_vaccine_type_kids">
                            <label for="">Vaccine Type</label>
                                <select name="appointmentvaccinetypekids" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    @foreach ($vaccine_kids as $value)

                                    {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                        <option value="{{ $value->vaccine_type }}"> 
                                        {{ $value->vaccine_type }} 
                                
                                    </option>
                                
                                  @endforeach  
                                </select>
                            </div>
                            <div class="mt-3" id="div_vaccine_type_adult">
                                <label for="">Vaccine</label>
                                    <select name="vaccine_category" id="vaccine_category" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        {{-- <option value="tuberculosis">booster </option>
                                        <option value="inactivated">first dose </option>
                                        <option value="tuberculosis">second dose </option> --}}
                                        @foreach ($vaccine_adult as $value)

                                        {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                            <option value="{{ $value->vaccine_type }}"> 
                                            {{ $value->vaccine_type }}
                                            
                                            
                    
                                    
                                        </option>
                                    
                                      @endforeach  

                                    </select>
                                </div>
                                
                                <div class="mt-3" id="div_vaccine_type_covid">
                                    <label for="">Dose</label>
                                        <select name="dose_type" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="measles">First Dose</option>
                                            <option value="tuberculosis">Second Dose </option>
                                            <option value="inactivated">Booster </option>
                                         
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
                                    <label for="">Purpose</label>
    
                                        <select name="appointmentvaccinetype" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            @foreach ($medicine as $value)       
                                                <option value="{{ $value->medicine_type }}"> 
                                                {{ $value->medicine_type }}
                                                
                                            </option>
                                        
                                          @endforeach  
                                           
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
         
            if($(this).val()=="checkup"){
                $("#div_appointmentPerson").hide();  
                $("#div_vaccine_type_kids").hide();  
                $("#div_vaccine_type_adult").hide();  

                $("#div_appointmentPerson").hide();
                $("#div_laboratory").hide();
                $("#div_medicine").hide();
                $("#div_vaccine_type_covid").hide();  
                $("#div_information").show();

            }else if($(this).val()=="vaccine"){
                $("#div_appointmentPerson").show();
                $("#div_vaccine_type").show();  
                $("#div_appointmentPerson").show();
                $("#div_information").hide(); 
                $("#div_laboratory").hide();
                $("#div_medicine").hide();
                $("#div_vaccine_type_covid").hide();  

                $("#appointmentPerson").on('change',function(e){ 
                    if($(this).val()=="kids"){
                        $("#div_vaccine_type_kids").show();  
                        $("#div_vaccine_type_adult").hide();  
                       $("#div_vaccine_type_covid").hide();  

                    }else if ($(this).val()=="adult"){
                        console.log($(this).val());
                        $("#div_vaccine_type_kids").hide();  
                        $("#div_vaccine_type_adult").show();
                        $("#div_vaccine_type_covid").hide();

                        $("#vaccine_category").on('change',function(e){ 
                            if ($(this).val()=="covid"){
                                console.log($(this).val());
                                 $("#div_vaccine_type_covid").show();  
                            }else {
                                $("#div_vaccine_type_covid").hide(); 
                            }
                        }).change();
                    }else{
                        $("#div_appointmentPerson").hide();  
                        $("#div_vaccine_type_kids").hide();  
                        $("#div_vaccine_type_adult").hide();  

                        $("#div_appointmentPerson").hide();
                        $("#div_laboratory").hide();
                        $("#div_medicine").hide();
                        $("#div_vaccine_type_covid").hide();  
                        $("#div_information").show();
                    }
                }).change();
                    
            }else if($(this).val()=="medicine"){
                $("#div_appointmentPerson").hide();  
                $("#div_vaccine_type_kids").hide(); 
                $("#div_vaccine_type_adult").hide(); 
                $("#div_appointmentPerson").hide();
                $("#div_information").hide(); 
                $("#div_medicine").show(); 
                $("#div_vaccine_type_covid").hide();  



            }else{
                
                $("#div_information").show(); 
                $("#div_medicine").hide(); 
                $("#div_appointmentPerson").hide();  
                $("#div_vaccine_type_kids").hide(); 
                $("#div_vaccine_type_adult").hide(); 
                $("#div_laboratory").hide();
               
            }
         

        }).change();

       
});
  
</script>

</body>
</html>



 
</x-app-layout>