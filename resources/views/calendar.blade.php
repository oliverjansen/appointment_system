
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
    <script  type="text/javascript" src="{{ URL::asset('js/qrcode.min.js') }}"></script>
</head>
<body>

    <div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
          
            <div class="col">
                <form>
                        @csrf
                        {{ csrf_field() }}
                        <input type="text" id="calendar_id" name="calendar_id" hidden >
                        <input type="text" id="appointment_date" name="appointment_date"hidden >
                        <input type="text" id="qrcode" name="qrcode" hidden>
                        <input type="text" id="delete_medicine_id" name="delete_medicine_id" hidden > 
                        <div class="modal-body">

                        <div class="row mb-5">
                            <div class="col  mb-5 mb-sm-0">
                                <div class="row col-12 d-flex justify-content-center" > 
                                    <a href="" id="hide_qrcode"  name="hide_qrcode" style="visibility: hidden;">Hide</a>
                                </div>
                                <div class="row col-12 d-flex justify-content-center" >
                                    <input type="text" id="input_text" name="input_text" autocomplete="off" hidden>
                                    <div class="qr-code text-center" style >
                                    </div>
                                    <a href="" id="preview_qrcode" class="" name="preview_qrcode" >View QR code</a>
                                </div>        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th scope="col">Service</th>
                                        <th scope="col">Category</th>
                                        <th scope="col" style="display:none" id="th_vaccine_type" name="th_vaccine_type">Vaccine</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td><p id="service" name="service"></p> </td>
                                            <td><p id="category" name="category"></p></td>
                                            <td style="display:none" id="vaccine_type_text_td" name="vaccine_type_text_td"><p style="display:none" id="vaccine_type_text" name="vaccine_type_text"><p></td>
                                            <td><p id="date" name="date"></p> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                    
                </form>   
                <div class="modal-footer">
                    {{-- <button type="submit" id="delete_appointment"class="btn btn-danger btn-sm bi bi-x-lg" style="width: 100px"> Cancel --}}
                    <button id="cancel_appointment_btn"class="btn btn-danger btn-sm bi bi-x-lg" style="width: 100px"> Cancel
                </button>   
                    {{-- <button type="button" class="btn btn-primary btn-sm w-25" id="cancel" data-dismiss="modal">Back</button> --}}
                </div>   
                     
            </div>
        </div>
       
        </div>
        </div>
    </div>

    <div class="modal fade" id="preview_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{route('delete_appointment') }}  " method="POST">
                @csrf
                {{ csrf_field() }}
                <input type="text" id="check" name="check">
                <div class="modal-body">
                    <input type="text" name="preview_appointmentservice" id="preview_appointmentservice">
                  </div>
            <div class="modal-footer">
                <button type="button" id="delete_appointment"class="btn btn-primary btn-sm w-50">Download QR Code</button>
                <button type="button" class="btn btn-warning btn-sm w-25" id="cancel" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
        </div>
    </div>

    <div class="modal fade" id="canceled_appointment_modal" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            
            <form action="{{ route('delete_appointment')}}" method="POST">
                @csrf
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
               
                </div>
                <div class="modal-body text-center">
                  <input type="text"  id="appointment_id_delete" name="appointment_id_delete" hidden >
                  Are you sure you want to Cancel this Appointment?
                </div>
                <div class="modal-footer">
                
                  <button type="submit" class="btn btn-danger btn-sm w-25 delete_announcement_class ">Yes</button>
                  <button type="button" class="btn btn-primary btn-sm w-25" data-dismiss="modal">No</button>
                </div>
             </form>
    
          </div>
        </div>
      </div>
    
    
      @if(Auth::User()->account_type=='admin')
        <div class="container-fluid text-center p-5 mt-4 mb-4">
            <h3 class="fw-bolder bg-dark bg-opacity-10 text-light p-4">CALENDAR</h3>
        </div>
    @elseif(Auth::User()->account_type=='user')
    <div class="container text-center p-4">
        <div class="alert alert-info alert-dismissible fade show m-4" role="alert">
            <strong>Reminder: </strong> Make sure you had General Checkup before making an appointment on Medicine
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>  
        {{-- <h1 class="fw-bolder bg-opacity-10">CREATE APPOINTMENT</h1> --}}
    </div>
    @endif
  <div class="container mt-3 mb-5" >
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('danger') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
            </div>
        @elseif(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
            </div>
        @endif
    
        <div class="row">
      
            @if(Auth::User()->account_type=='admin')
                <div id ="calendar_admin" class=" col  col-lg-12 col-12 h-50 shadow-lg p-4"> 
            @else
            
                @if($hide == "no")
                
                    <div id ="calendar" class=" col col-lg-7  mb-5 col-12 shadow-lg p-4 "> 
                @else
                
                    <div id ="calendar" class=" col col-lg-12 mb-5 col-12 shadow-lg p-5"> 

                @endif
            
            @endif
            
        
            @if(Auth::User()->account_type=='user')
            </div>
            @if($yes != 0)

                {{-- DIVIDION FOR SIDE FORM--}}

                @if($hide == "no")
                    <div class=" mb-5 col col-lg-4 offset-lg-1 col-12 align-items-center justify-content-center  text-dark  shadow p-4" >
                        
                        <form action="{{ url('insert_data') }}" id="insert" method="POST" class= "w-100">

                            {{ csrf_field() }}
                            <input type="text" name="selected_service_id" id="selected_service_id" hidden>
                            <div class="mt-3">
                                <label for="">Service</label>
                                
                                <select name="appointmentservice" id="appointmentservice" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                                    <option value="" disabled selected hidden>Select Service...</option>
                                    @foreach ($appointment_service as $value)
                                        @if($value->availability == "Yes")
                                            <option value="{{ $value->id }}"> 
                                                {{ $value->service }} 
                                            </option>
                                        @endif
                                @endforeach  
                                </select>
                            </div>
                                <div class="mt-3" id="div_appointmentCategory">
                                    <label for="" >Vaccine Category</label>
                                    <select name="appointmentCategory" id="appointmentCategory" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="" disabled selected hidden>Select Vaccine Category...</option>
                                        @foreach ($category as $value)
                                            @if($value->category_availability == "Yes")
                                                <option value="{{ $value->id }}"> 
                                                    {{ $value->category }} 
                                                </option>
                                            @endif
                                    @endforeach  
                                    </select>
                                </div>
                    
                                <div class="mt-3" id="div_vaccine_type_kids">
                                    <label for="">Vaccine</label>
                                    <select name="vaccine_type_kids" id="vaccine_type_kids" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="" disabled selected hidden>Select Others...</option>
                                        @foreach ($vaccine_kids as $value)
                                            @if($value->vaccine_availability == "Yes")
                                                <option value="{{ $value->id }}"> 
                                                {{ $value->vaccine_type }} 
                                            @endif   
                                        </option>
                                    
                                    @endforeach  
                                    </select>
                                </div>
                                <div class="mt-3" id="div_vaccine_dose">
                                    <label for="">Dose</label>
                                    <select name="vaccine_dose_select" id="vaccine_dose_select" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="" disabled selected hidden>Select Dose...</option>
                                        @foreach ($vaccine_dose as $value)
                                            @if($value->dose == "1")
                                            <option value="{{ $value->dose }}">1st Dose</option>
                                            @elseif($value->dose == "2")
                                            <option value="{{ $value->dose }}">2nd Dose</option>
                                            @elseif($value->dose == "3")
                                            <option value="{{ $value->dose }}">Booster</option>
                                            @endif

                                        @endforeach  

                                    </select>
                                </div>
                                <div class="mt-3" id="div_vaccine_type_covid">

                                    <label for="">Brand</label>
                                        <select name="vaccine_type_covid" id="vaccine_type_covid" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                                        </select>
                                </div>
                            
                                    <div class="mt-3" id="div_vaccine_type_others">
                                        <label for="">Others</label>
                                            <select name="vaccine_type_others" id="vaccine_type_others" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                                <option value="" disabled selected hidden>Select Others...</option>
                                                @foreach ($vaccine_others as $value)
                                                    @if($value->vaccine_availability == "Yes")
                                                        <option value="{{ $value->id }}"> 
                                                            {{ $value->vaccine_type }}
                                                        </option>
                                                    @endif
                                            @endforeach 
                                            
                                            </select>
                                        </div>
                                    <div class="mt-3" id="div_other_services">
                                        <input type="text" id="other_services_name_input" name="other_services_name_input" hidden>
                                        <label id="other_services_input" name="other_services_input"></label>

                                            <select name="appointment_service_others" id="appointment_service_others" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                                           
                                            </select> 

                                    
                                        </div>
                            <div class="mt-4"id="div_appointment_date">
                                    <label for="">Appointment Date</label>
                                    <input type="date" min="{{$current_date}}" max="{{$currentday_plus_30days}}" id="appointmentdate" name="appointmentdate" :value="old('appointmentdate')" required autofocus autocomplete="appointmentdate" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                            </div>
                            <div class="mt-5"id="div_appointment_date">
                                <label for=""><b>Available Slot</b></label>
                                <input type="text" id="available_slot" name="available_slot" :value="old('available_slot')"  autofocus autocomplete="available_slot" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" hidden>
                                <div class="p-2">

                                    <b class=""><p id="availableslot" class="text-center bg-primary text-white mt-2" name="availableslot" ></p></b>
                                </div>

                            </div>
                                    <div class="mt-2 d-flex align-items-centerz justify-content-center" >
                                    <button type="submit" id="button1" class="btn btn-primary btn-sm  text-align-center w-50 create_appointment_btn" >Submit</button>
                                    </div>

                                    {{-- <div class="mt-5 d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-primary btn-sm  text-align-center w-50 btn_preview" >Preview Appointment</button>
                                
                                </div> --}}

                        </form>
                    </div>
                @endif
            @endif

                </div>
            </div>
            
            @endif   
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>

$(document).ready(function () {

    hide_qrcode = document.querySelector("#hide_qrcode");
    let view_qrcodes = document.querySelector(".view_qrcodes");
    let qr_code_element = document.querySelector(".qr-code");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var schedules = @json($schedules);
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaweek',
            },
            
            events: schedules,
            selectable:true,
            selectHelper:true,
            select: function (start, end, allDays){

            }, 
            eventClick: function(event){
                var id = event.id;
                // console.log(id);
                hide_qrcode.style = "visibility: hidden";
                preview_qrcode.style = "display:block";
                qr_code_element.style = "display: none";
                var vaccine_type_text = document.getElementById("vaccine_type_text");
                var th_vaccine_type = document.getElementById("th_vaccine_type");
                var vaccine_type_text_td = document.getElementById("vaccine_type_text_td");


                $('#edit_modal').modal('show');

                $('#calendar_id').val(id);

                $.ajax({
                    type: "GET",
                    url: "/preview_appointment/"+ id,
                    success: function (response) {
                        // console.log(response);
                       
                       $('#qrcode').val(response.appointment.appointment_id);
                       $('#service').text(response.appointment.appointment_services);
                       $('#category').text(response.appointment.appointment_vaccine_category);
                
                       if(response.appointment.service_id == 1){
    
                        vaccine_type_text.style="display:block";
                        th_vaccine_type.style="display:block";
                        vaccine_type_text_td.style="display:block";
                        if(response.appointment.appointment_dose){

                            if (response.appointment.appointment_dose == "1"){
                                $request_dose = "1st Dose";
                            }else if (response.appointment.appointment_dose == "2"){
                                $request_dose = "2nd Dose";
                            }else if(response.appointment.appointment_dose == "3") {
                                $request_dose = "Booster";
                            }
                            
                            $('#vaccine_type_text').text(response.appointment.appointment_vaccine_type+", "+$request_dose);
                        }else{
                            $('#vaccine_type_text').text(response.appointment.appointment_vaccine_type);
                        }
                       

                       }
                       

                       $('#date').text(response.appointment.appointment_date);
                       $('#input_text').val(response.appointment.appointment_id);
                        
                        }
                    });


            }
        });

        var schedules = @json($schedules);
        $('#calendar_admin').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaweek ',
            },
            events: schedules,
            selectable:true,
            selectHelper:true,
            select: function (start, end, allDays){

            }, 
            eventClick: function(event){
                // event.jsEvent.preventDefault();
                // var id = event.id;
                
                // // console.log(id);
                // $('#edit_modal').modal('show');
                // $('#calendar_id').val(id);
                  
                }
        });


   
        $("#appointmentservice").on('change',function(e){
            e.preventDefault();
           $id_selected_service = $("#appointmentservice").val();
            
        //    console.log($id_selected_service);
       

             
             $("#selected_service_id").val($id_selected_service);
          
            $('#available_slot').val("");
            $('#availableslot').text("");
            $('#appointmentdate').val("");


            // if($("#appointmentservice").val() == ""){
            //     // console.log("100");
            // }
             
            var other_services_name = document.getElementById("other_services_name");
                $("#div_vaccine_type").hide();  
                $("#div_appointmentCategory").hide();
                $("#div_laboratory").hide();
                $("#div_other_services").hide();
                $("#div_vaccine_type_covid").hide();   
                $("#div_other_services").hide();
                $("#div_vaccine_type_kids").hide();  
                $("#div_vaccine_type_others").hide();  
                $("#div_vaccine_dose").hide();
                $("#appointment_service_others").hide();

                

            if($(this).val()== "1"){
                
                $("#div_vaccine_type").show();  
                $("#div_appointmentCategory").show();
    
                $("#div_laboratory").hide();
                $("#div_other_services").hide();
                $("#div_vaccine_type_covid").hide();  
                $("#appointmentCategory").on('change',function(e){ 
                    e.preventDefault();
                    $('#appointmentdate').val("");
                    $('#appointmentdate').val("");
                    $('#available_slot').val("");
                    $('#availableslot').text("");
                    // console.log($(this).val());
                        if($(this).val()== "1"){
                            // console.log($(this).val());
                            $("#div_vaccine_type").show();  
                            $("#div_appointmentCategory").show();
                            $("#div_vaccine_type_kids").show();  
                            $("#div_vaccine_type_others").hide();  
                            $("#div_vaccine_type_covid").hide();  
                            $("#div_vaccine_dose").hide(); 
                            $("#vaccine_type_kids").on('change',function(e){ 
                                e.preventDefault();
                                // $('#appointmentdate').val("");
                                $('#appointmentdate').val("");
                                $('#available_slot').val("");
                                $('#availableslot').text("");
                            });
                                        


                        //covid
                        }else if ($(this).val()== "2"){
                            // console.log($(this).val());
                            $("#div_vaccine_type").show();  
                            $("#div_appointmentCategory").show();
                            $("#div_vaccine_type_kids").hide();  
                            $("#div_vaccine_type_others").hide();
                           vaccine_type_covid
                            $("#div_vaccine_dose").show();  
                            //covid dose select
                            $("#vaccine_dose_select").on('change',function(e){
                                e.preventDefault();
                                $("#div_vaccine_type_covid").show();
                                $("#vaccine_dose_select").on('change',function(e){
                                    e.preventDefault();
                                    $('#appointmentdate').val("");
                                    $('#available_slot').val("");
                                     $('#availableslot').text("");
                                    
                                });

                                $("#vaccine_type_covid").on('change',function(e){
                                    e.preventDefault();
                                    $('#appointmentdate').val("");
                                    $('#available_slot').val("");
                                     $('#availableslot').text("");
                                    
                                });
                                
                                $('#appointmentdate').val("");
                            //    console.log($(this).val());
                                let dose = $(this).val();
                               $.ajax({
                                type: "GET",
                                url: "/get_dose/"+dose,
                                success: function (response) {
                                var response = JSON.parse(response);
                                // console.log(response);   
                                // console.log(response[0].service);
                                    $('#vaccine_type_covid').empty();
                                    $('#vaccine_type_covid').append(`<option value="0" disabled selected>Select Vaccine Brand...</option>`);
                                    response.forEach(element => {
                                    $('#vaccine_type_covid').append(`<option value="${element['id']}">${element['vaccine_type']}</option>`);
                                    $('#other_services_input').text(response[0].service +" Categories");
                                    });
                                    
                                }
                            });
                            });

                
                        }else if ($(this).val()== "3"){
                            // console.log($(this).val());

                            $("#div_vaccine_type").show();  
                            $("#div_appointmentCategory").show();
                            $("#div_vaccine_type_kids").hide();  
                            $("#div_vaccine_type_others").show();
                            $("#div_vaccine_type_covid").hide();
                            $("#div_vaccine_dose").hide();  

                        }else{
                            
                            $("#div_vaccine_type_others").show();  
                            $("#div_vaccine_type").hide();  
                            $("#div_appointmentCategory").show();
                            $("#div_vaccine_type_kids").hide();  
                            $("#div_vaccine_type_covid").hide();
                            $("#div_vaccine_dose").hide();  

                        }
                    
                }).change();
                    
            
            }else{
                $('#vaccine_type_covid').empty();
                $("#div_appointmentCategory").hide();

                if($(this).val() !== null){
                    $("#div_other_services").show();
                    $("#appointment_service_others").show(); 

                }

                $("#div_vaccine_type_kids").hide();  
                $("#div_vaccine_type_others").hide();  
                $("#div_appointmentCategory").hide();
                $("#div_laboratory").hide();
                $("#div_vaccine_type_covid").hide(); 
                $("#appointment_service_others").on('change',function(e){
                                    e.preventDefault();
                                    $('#appointmentdate').val("");
                                    $('#available_slot').val("");
                                    $('#availableslot').text("");
                                    
                        });
                
                // console.log($(this).val());
                let id = $(this).val();
                $('#appointment_service_others').empty();
                $('#appointment_service_others').append(`<option value="0" disabled selected>Processing...</option>`);

                $.ajax({
                    type: "GET",
                    url: "/get_other_services/"+id,
                    success: function (response) {
                        var response = JSON.parse(response);
                        //  console.log(response);   
                         $('#appointment_service_others').empty();
                         $('#appointment_service_others').append(`<option value="0" disabled selected>Select Category...</option>`);

                         response.forEach(element => {
                        if(response[0].other_services_availability == "Yes"){
                            $('#appointment_service_others').append(`<option value="${element['id']}">${element['other_services']}</option>`);
                
                        }
                        
                        $('#other_services_input').text(response[0].service +" Categories");
                        });
                           
                    }
                });

              
               
            }
         

        }).change();

         
        $("#appointment_service_others").on('change',function(e){
            e.preventDefault();
            // console.log($(this).val());
            var date = $(this).val();
            // console.log(date);
        
        
    }).change();


        $("#appointmentdate").on('change',function(e){
            e.preventDefault();
            $vaccine_id = $('#vaccine_type_covid').val();
        

            $('#available_slot').val("");
            $('#availableslot').text("");

            $other_services_id = $('#appointment_service_others').val();
            var date = $(this).val();
            $service_id = $('#appointmentservice').val();
        
          

            if($service_id != "1"){
                if(date == null || date == ""){
                   
                }else{
                    $other_service = $('#appointment_service_others').val();
                    

                    $.ajax({
                            type: "GET",
                            url: "/get_slot_other_services/"+date+"/"+$other_service,
                            success: function (response) {
                                // console.log(response);  
                                // console.log(response.vaccine);
                                $('#available_slot').val(response.otherservices);
                                $('#availableslot').text(response.otherservices);
                            }
                        });
                }
            }else{
                if(date == null || date == ""){
                // console.log("ano daw");
                }else{
                    var current_type_covid = JSON.parse($('#vaccine_type_covid').val());

                $vaccine_category = $('#appointmentCategory').val();
               
                if($vaccine_category == "1"){
                    //vaccine category 
                    //this code is for the functionality for pediatric
                            $id_kids =$('#vaccine_type_kids').val();
                            // console.log( $id_kids);
                            $.ajax({
                            type: "GET",
                            url: "/get_slot_pediattic_slot/"+date+"/"+$id_kids,
                            success: function (response) {
                                // console.log(response);  
                                // console.log(response.vaccine);
                                $('#available_slot').val(response.pediatic);
                                $('#availableslot').text(response.pediatic);
                            }
                        });
                        
                 
                }else if ($vaccine_category == "2"){

                    //vaccine category 
                    //this code is for the functionality of the covid category
                    $request_dose = $('#vaccine_dose_select').val();
                    $vaccine_type_covid = $('#vaccine_type_covid').val();
                    var current_type_covid = JSON.parse($('#vaccine_type_covid').val());
                  

                    
                    if($vaccine_id==null || $vaccine_id==""){
            
                    }else{
                                $.ajax({
                                type: "GET",
                                url: "/get_appointment_slot_vaccine/"+date+"/"+current_type_covid,
                                success: function (response) {
                                    // console.log(response);  
                                    // console.log(response.vaccine);
                                    $('#available_slot').val(response.vaccine);
                                    $('#availableslot').text(response.vaccine);
                                    }
                                });
                        
                    }
                }else if ($vaccine_category == "3"){
                        $id_kids =$('#vaccine_type_others').val();
                            console.log( $id_kids);
                            $.ajax({
                            type: "GET",
                            url: "/get_slot_other_vaccine/"+date+"/"+$id_kids,
                            success: function (response) {
                                // console.log(response);  
                                // console.log(response.vaccine);
                                $('#available_slot').val(response.otherservices);
                                $('#availableslot').text(response.otherservices);
                            }
                        });
                }

               

               
        
                
             }
            }
      
          
    }).change();

    $('.btn_preview').on('click', function (e) {
        e.preventDefault();
 

    }); 
    
   
    var preview = "off";

    $('#cancel').on('click', function (e) {
        e.preventDefault();
        preview = "off";
        
        qr_code_element.style = "display: none";
     
            preview_qrcode.style = "display:block";
            hide_qrcode.style = "visibility: hidden";
    });   
    
    $('#hide_qrcode').on('click', function (e) {
        e.preventDefault();
 
        preview_qrcode.style = "display:block-inline";
        qr_code_element.style = "display: none";
        hide_qrcode.style = "visibility: hidden";



     });   

     $('#cancel_appointment_btn').on('click',function(e){
        e.preventDefault();
            console.log("ii");  
            
            $('#appointment_id_delete').val($('#calendar_id ').val());

            $('#edit_modal').modal('hide');
            $('#canceled_appointment_modal').modal('show');


     });

    $('#preview_qrcode').on('click', function (e) {
        e.preventDefault();
            qr_code_element.style = "display: none";

            //displaying

            preview = "on";

            var user_input = $('#input_text').val();
            preview_qrcode.style = "display:block";
            hide_qrcode.style = "visibility: visible";
           if(preview == "off" ){
                qr_code_element.style = "display: none";
            
           }else{
          
                if (user_input != "") {
                    if (qr_code_element.childElementCount == 0) {
                    generate(user_input);
                    } else {
                    qr_code_element.innerHTML = "";
                    generate(user_input);
                    }
                } else {
                    // console.log("not valid input");
                    qr_code_element.style = "display: none";
                }
           }
            


            //generating
            
            function generate(user_input) {
                preview_qrcode.style = "display:none";
                num = 1;
                qr_code_element.style = "";
                // console.log(user_input);
                    
                var qrcode = new QRCode(qr_code_element, {
                    text: user_input,
                    width: 140, //128
                    height: 140,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });

                // download 
                let download = document.createElement("a");
                qr_code_element.appendChild(download);

                let download_link = document.createElement("a");
                download_link.setAttribute("download", "qr_code.jpeg");
                download_link.innerHTML = `Download <i></i>`;

                download.appendChild(download_link);

                let qr_code_img = document.querySelector(".qr-code img");
                let qr_code_canvas = document.querySelector("canvas");

                if (qr_code_img.getAttribute("src") == null) {
                    setTimeout(() => {
                    download_link.setAttribute("href", `${qr_code_canvas.toDataURL()}`);
                    }, 300);
                } else {
                    setTimeout(() => {
                    download_link.setAttribute("href", `${qr_code_img.getAttribute("src")}`);
                    
                    }, 300);
                    
                }
            
            }
         
        
    }); 


    

});



  
</script>

</body>
</html>



 
</x-app-layout>