
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
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Preview Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class=" col mt-2 mb-2  float-right">
                {{-- <div class="row ">
                    <button type="button" id="qrcode_btn"class="btn btn-primary btn-sm w-25">View QR Code</button>
                    <button type="button" id="qrcode_btn"class="btn btn-primary btn-sm w-25">Download QR Code</button>
                </div> --}}
             
            </div>
            <div class="col">
                <form action="{{route('delete_appointment') }}  " method="POST">
                    @csrf
                    {{ csrf_field() }}
                    <input type="text" id="calendar_id" name="calendar_id" hidden >

                    <input type="text" id="appointment_date" name="appointment_date"hidden >
                    <input type="text" id="qrcode" name="qrcode" hidden>
                    <input type="text" id="delete_medicine_id" name="delete_medicine_id" hidden > 
                    <div class="modal-body">

                    <div class="row">
                        <div class="col col-12 col-sm-3 mb-5 mb-sm-0">
                             <div class="row col-12 d-flex justify-content-center" > 
                                    <a href="" id="hide_qrcode"  name="hide_qrcode" style="visibility: hidden;">Hide</a>
                             </div>
                            <div class="row col-12 d-flex justify-content-center" > 
                            
                               
                                <input type="text" id="input_text" name="input_text" autocomplete="off" hidden>
                                <div class="qr-code text-center" style >

                                </div>
                                <a href="" id="preview_qrcode" class="" name="preview_qrcode" >View Qr Code</a>
                            </div>
                          
                           
                            {{-- {!! QrCode::size(120)->generate($qrcode) !!} 
                            <div class="row col-12 d-flex justify-content-center"> 
                                <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate($qrcode)) !!} " download class="">Downloads</a>
                            </div>
                               
                            @if (session('qrcode'))
                          
                                {!! session('qrcode') !!}
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('qrcode') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>

                                <img src="  {{!! session('qrcode') !!}}" alt="" srcset="">
                                   
                            @endif --}}

                            {{-- {!! QrCode::size(110)->generate('oliverjansen') !!} --}}
                       
                        </div>
                        <div class="col col-12 col-sm-9">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Date</th>
                               
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                               

                                    {{-- <option value="{{ $value->service }}" {{ ( $value->service =='vaccine') ? 'selected' : '' }}>  --}}
                                        <td><p id="service" name="service"></p> </td>
                                        <td><p id="details" name="details"></p> </td>
                                        <td><p id="date" name="date"></p> </td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>  
                        
                                {{-- {{$students}} --}}
                        
                       
                    </div>
                </div>



                <div class="modal-footer">
                
                    <button type="submit" id="delete_appointment"class="btn btn-danger btn-sm w-25">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm w-25" id="cancel" data-dismiss="modal">cancel</button>
                    
                </div>
                </form>
                            
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
                    
                    <script type="text/javascript">
                        function service ($service){
                           
                        }  
                        
        
                    </script>
                    
                   
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

  <div class="container mt-5 mb-5" >
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
    @endif
   
    <div class="row">
   
    @if(Auth::User()->account_type=='admin')
    <div id ="calendar_admin" class=" col col-lg-12 col-12 h-50"> 
    @else
    <div id ="calendar" class=" col col-lg-8 col-12"> 
    @endif

       
        @if(Auth::User()->account_type=='user')
         </div>
         
                <div class=" col col-lg-4 col-12 align-items-center justify-content-center" >
                    
                    <form action="{{ url('insert_data') }}" id="insert" method="POST" class= "w-100">

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

                        <div class="mt-3" id="div_appointmentCategory">
                            <label for="" >Category</label>
                            <select name="appointmentCategory" id="appointmentCategory" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                                <select name="vaccine_category" id="vaccine_category" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                                    <select name="vaccine_type" id="vaccine_type" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                                        <select name="appointment_dose" id="appointment_dose" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                            <div class="mt-3" id="div_checkup"> 
                                <label for="" >Concern</label>
                                <textarea name="concern" id="concern" cols="30" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                                </textarea>
                            </div>
                            
                                {{-- <div class="mt-3" id="div_laboratory">
                                    <label for="">Already have laboratory?</label>
                                        
                                        <option value="measles">Measles</option>
                                        <option value="tuberculosis">Tuberculosis </option>
                                        <option value="inactivated">Inactivated polio </option>
                                        <option value="tuberculosis">Tuberculosis </option>
                                    </select>
                                </div> --}}

                                <div class="mt-3" id="div_medicine">
                                    <label for="">Medicine</label>
    
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
                        <div class="mt-5"id="div_appointment_date">
                            <label for="">Availableslot</label>
                            <input type="text" id="available_slot" name="available_slot" :value="old('available_slot')"  autofocus autocomplete="available_slot" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" hidden>

                            {{-- <input type="text" id="availableslot_id" name="availableslot_id" :value="old('availableslot_id')" required autofocus autocomplete="availableslot_id" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" > --}}

                            <p id="availableslot" name="availableslot" ></p>
                    </div>
                        
                                <div class="mt-5 d-flex align-items-centerz justify-content-center" >
                                <button type="submit" id="button1" class="btn btn-primary btn-sm  text-align-center w-50" >Submit</button>
                                </div>

                                {{-- <div class="mt-5 d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary btn-sm  text-align-center w-50 btn_preview" >Preview Appointment</button>
                               
                            </div> --}}

                    </form>
                        



                </div>
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
                right: 'month, agendaweek, agendaDay',
            },
            events: schedules,
            selectable:true,
            selectHelper:true,
            select: function (start, end, allDays){
                // console.log(start);

                // $('#edit_modal').modal('show');

                // $('#delete_appointment').click(function(e) {
                //     e.preventDefault();
                    

                // });
                

            }, 
            eventClick: function(event){
                var id = event.id;
                console.log(id);
                hide_qrcode.style = "visibility: hidden";
                preview_qrcode.style = "display:block";
                qr_code_element.style = "display: none";

                $('#edit_modal').modal('show');

                $('#calendar_id').val(id);

                $.ajax({
                    type: "GET",
                    url: "/preview_appointment/"+ id,
                    success: function (response) {
                        console.log(response);

                       $('#qrcode').val(response.appointment.appointment_id);
                       $('#service').text(response.appointment.appointment_services);
                       $('#date').text(response.appointment.appointment_date);
                       $('#input_text').val(response.appointment.appointment_id);
                        
                        }
                    });


            }
        });

        var schedulesall = @json($schedulesall);
        $('#calendar_admin').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaweek, agendaDay',
            },
            events: schedulesall,
            selectable:true,
            selectHelper:true,
            select: function (start, end, allDays){
                // console.log(start);

                // $('#edit_modal').modal('show');

                // $('#delete_appointment').click(function(e) {
                //     e.preventDefault();
                    

                // });
                

            }, 
            eventClick: function(event){
                event.jsEvent.preventDefault();
                var id = event.id;
                
                console.log(id);
                $('#edit_modal').modal('show');
                $('#calendar_id').val(id);

                  
                }
        });



        // $('#button1').click(function(){
        //     let text;
        //     if (confirm("Are you sure you") == true) {
        //             $('#insert').submit();
        //             //   document.getElementById("demo").innerHTML = text;
        //     } else {
        //         text = "You canceled!";
        //     }
           
        // });



        $("#appointmentservice").on('change',function(e){
            e.preventDefault();
      
          

            if($(this).val()=="checkup"){
                $("#div_appointmentCategory").hide();  
                $("#div_div_informationvaccine_type_kids").hide();  
                $("#div_vaccine_type_adult").hide();  

                $("#div_appointmentCategory").hide();
                $("#div_laboratory").hide();
                $("#div_medicine").hide();
                $("#div_vaccine_type_covid").hide();  
                $("#div_information").hide();
                $("#div_checkup").show();

            
            }else if($(this).val()=="vaccine"){
            
                console.log($(this).val());
                $("#div_vaccine_type").show();  
                $("#div_appointmentCategory").show();
                $("#div_information").hide(); 
                $("#div_laboratory").hide();
                $("#div_medicine").hide();
                $("#div_vaccine_type_covid").hide();  
                $("#div_checkup").hide();
                

                $("#appointmentCategory").on('change',function(e){ 
                    e.preventDefault();
                    console.log($(this).val());
                    if($(this).val()=="kids"){
                        $("#div_vaccine_type").show();  
                        $("#div_appointmentCategory").show();
                        $("#div_vaccine_type_kids").show();  
                        $("#div_vaccine_type_adult").hide();  
                       $("#div_vaccine_type_covid").hide();  

                    }else if ($(this).val()=="adult"){
                        console.log($(this).val());
                        $("#div_vaccine_type").show();  
                        $("#div_appointmentCategory").show();
                        $("#div_vaccine_type_kids").hide();  
                        $("#div_vaccine_type_adult").show();
                        $("#div_vaccine_type_covid").hide();

                        $("#vaccine_type").on('change',function(e){ 
                            e.preventDefault();
                            console.log($(this).val());
                            if ($(this).val()=="covid"){
                                $("#div_vaccine_type").show();  
                                 $("#div_appointmentCategory").show();
                                 $("#div_vaccine_type_covid").show();  
                            }else {
                                $("#div_vaccine_type_covid").hide(); 
                            }
                        }).change();
                    }else{
                        $("#div_appointmentCategory").hide();  
                        $("#div_vaccine_type_kids").hide();  
                        $("#div_vaccine_type_adult").hide();  
                        $("#div_appointmentCategory").hide();
                        $("#div_laboratory").hide();
                        $("#div_medicine").hide();
                        $("#div_vaccine_type_covid").hide();  
                        $("#div_information").show();
                    
                    }
                }).change();
                    
            }else if($(this).val()=="medicine"){
                $("#div_appointmentCategory").hide();  
                $("#div_vaccine_type_kids").hide(); 
                $("#div_vaccine_type_adult").hide(); 
                $("#div_appointmentCategory").hide();
                $("#div_information").hide(); 
                $("#div_medicine").show(); 
                $("#div_vaccine_type_covid").hide();  
                $("#div_checkup").hide();



            }else{
                
                $("#div_information").show(); 
                $("#div_medicine").hide(); 
                $("#div_appointmentCategory").hide();  
                $("#div_vaccine_type_kids").hide(); 
                $("#div_vaccine_type_adult").hide(); 
                $("#div_laboratory").hide();
                $("#div_checkup").hide();
               
            }
         

        }).change();

        
        $("#appointmentdate").on('change',function(e){
            e.preventDefault();

            var date = $(this).val();
            console.log(date);
            $.ajax({
                type: "GET",
                url: "/get_appointmentDate/"+date,
                success: function (response) {
                    console.log(response);

                    if(response.validDate == "yes"){
        
                        var len = 0;
                        if(response['data'] != null){

                            len = response['data'].length;
                            
                            if(len > 0){
                            for(var i=0; i<1; i++){
                        
                            $('#available_slot').val(response['data'][i].availableslot);
                            $('#availableslot').text(response['data'][i].availableslot);
                            $('#availableslot_id').val(response['data'][i].id);

                                
                                }
                            }else{
                                $('#available_slot').val("50");
                                $('#availableslot').text("50");
                            }
                        }else {
                            $('#available_slot').val("50");
                            $('#availableslot').text("50");
                        }
                    }else {
                        $('#available_slot').val("None!");
                        $('#availableslot').text("0");

                    }

               
           

                }
            });
        
    }).change();

    $('.btn_preview').on('click', function (e) {
        e.preventDefault();

        // $('#preview_modal').modal('show');
        // $('#preview_appointmentservice').val($('#appointmentservice').val());
        // console.log();



        

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
    $('#preview_qrcode').on('click', function (e) {
        e.preventDefault();
        // var kk = $(this).val();
        // console.log(kk);
        //      $.ajax({
        //             type: "GET",
        //             url: "/preview_qrcode/"+kk,
        //             success: function (response) {
        //                 console.log(response);

        //                 }
        //             });
          
           
       
      

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
                    console.log("not valid input");
                    qr_code_element.style = "display: none";
                }
           }
            


            //generating
            
            function generate(user_input) {
                preview_qrcode.style = "display:none";
                num = 1;
                qr_code_element.style = "";
                console.log(user_input);
                    
                var qrcode = new QRCode(qr_code_element, {
                    text: user_input,
                    width: 200, //128
                    height: 200,
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
  
    //Display and download QRCODE

    

});



  
</script>

</body>
</html>



 
</x-app-layout>