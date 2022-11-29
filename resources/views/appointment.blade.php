<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <title>Document</title>


    <style>




    </style>
</head>
<body>
  
  <!-- modal view-->


<!-- Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header mb-2 mt-4" >
        <p class="text-center">
          <h5>
           <small class="font-weight-light ">IDENTIFICATION CARD</small>
          </h5>
         
          
        </p>
      </div>
      <div class="modal-body">
        <div class="container">
         
          <div class="row">
            <input type="text" id="image_id" name="image_id" hidden>
            {{-- <input type="text" id="image" name="image"> --}}
            <img id="view_image" src="" alt=".." class="w-100 h-75" >
            {{-- <img src="storage/images/dsgLLgapwjZkOGRWmspJX9t2vIbnnv2kJaYWvEYq.jpg" alt=".." > --}}
          </div>
          <div class="row d-flex justify-content-center mt-4 mb-2">
            <div class="text-center">
              <div class="row">
                ID type:<p id="id_type" class="text-center ml-2 font-weight-bold text-lowercase h5"></p></p>
              </div>
    

            </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- modal delete-->
  <div class="modal fade" id="delete_appointment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route ('delete_appointment_admin') }}  " method="POST">
            @csrf
              
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="text"  id="delete_id" name="delete_id" hidden>
              Are you sure you want to delete this Appointment?
            </div>
            <div class="modal-footer">
            
              <button type="submit" class="btn btn-danger btn-sm w-25">Yes</button>
              <button type="button" class="btn btn-primary btn-sm w-25" data-dismiss="modal">No</button>
            </div>
         </form>

      </div>
    </div>
  </div>
<!-- reject modal -->

  <div class="modal fade" id="cancel_appointment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route ('canceled_appointment') }} " method="POST">
            @csrf
            {{ csrf_field() }}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="calcel_id" name="calcel_id" hidden>
          <input type="text"  id="user_id" name="user_id" hidden>

          <input type="text"  id="user_phoneNo" name="user_phoneNo" hidden>
          <input type="text"  id="message" name="message" hidden>
          <input type="text"  id="service" name="service" hidden>


          <div class="form-group">
            <label for="service" class="col-form-label">Message</label>
            <select name="message_select" id="message_select" class ="mb-3 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                  <option value="default_message" selected>Cancel Appointment</option>
                  <option value="add_message">Customize Message  </option>
          </select>
            <textarea name="cancel_message" id="cancel_message" cols="30" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

            </textarea>
        </div>
          
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-danger reject_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-primary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>
  <!-- reschedule modal -->

  <div class="modal fade" id="reschedule_appointment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">

        <form action="{{ url ('reschedule_appointment') }} " method="POST">
            @csrf
            {{ csrf_field() }}
            <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalLabel" class="text-center"> Reschedule</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body p-5">
                <div class="bg-danger text-white text-center mt-2 shadow-sm invalid_date_warning">
                    <div class="">
                      <div class="d-flex justify-content-center">
                        <div class="mt-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                          </svg> 
                        </div>
                        <div class=" ml-4">
                                 Invalid Date!
                        </div>
                      </div>
                   
                    </div>
                </div>
                <div class="bg-warning text-dark text-center mt-2 shadow-sm warning_date_warning">
                  <div class="">
                    <div class="d-flex justify-content-center">
                      <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                          <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                          <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg> 
                      </div>
                      <div class=" ml-4">
                               Same Date is selected!
                      </div>
                    </div>
                 
                  </div>
              </div>
                  <label for="" class="" > Pick a Date</label>
           
                <input type="text" id="appointment_id" name="appointment_id" hidden>
                <input type="text" id="service_id" name="service_id" hidden>
                <input type="text" id="new_appointment_date" name="new_appointment_date" hidden>
                <input type="text" id="old_appointment_date" name="old_appointment_date" hidden>
                


                <div class="form-group">
                  <input type="date" id="datepicker" name="datepicker" class="form-control shadow-sm rounded" >
                    {{-- <input type="date" class="form-control"  id="reschedule_date" name="reschedule_date" > --}}
                  
                    <div class="container-fluid mt-5 rounded">
                      <div class="card text-white text-center bg-warning shadow rounded" style="height: 90px">
                          <div class="card-body">
                          <h5 class="card-title text-dark h-5">Available Slot</h5>
                          <input type="text" class="text-dark" id="available_slot_reschedule" name="available_slot_reschedule" hidden>
                          <b><p class="text-dark h5" id="available_slot_reschedule_text" name="available_slot_reschedule_text"></p></b>
                          </div>
                      </div>
                      
                  </div>
              </div>
              
            </div>
            <div class="modal-footer">
            
              <button type="submit" class="btn btn-primary reschedule_btn btn-sm w-25">Edit</button>
              <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
            </div>
         </form>

      </div>
    </div>
  </div>

     <!-- approve modal -->

<div class="modal fade" id="approve_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route ('admin.approve_registration') }} " method="POST">
            @csrf
           
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="approve_id" name="approve_id" hidden>
        
          Are you sure you want to approve this registration?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary approve_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>

  <div class="container-fluid text-center p-5 mt-4 mb-4">
      <h3 class="fw-bolder bg-dark bg-opacity-10 text-light p-4
      ">APPOINTMENTS</h3>
  </div>

  <div class="container    mb-5 table-responsive mb-4" style="width: 90%; height:100%;">
    <div>
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
    
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
    </div>
    @if(Auth::User()->account_type == 'admin')
    <div class="container-fluid mb-2">
        <div class="row justify-content-end ">
          <form action="{{route('appointment_pdf')}}" method="POST" class="" target="__blank">
            @csrf
              {{ csrf_field() }}
            <button type="submit" class="btn btn-sm btn-primary  bi bi-filetype-pdf" > Generate PDF</button>

          </form>

          <form action="{{route('appointment_excel')}}" method="POST" class=" ml-2 " target="__blank">
            @csrf
            {{ csrf_field() }}
            <button class="btn btn-sm btn-primary  bi bi-file-earmark-spreadsheet" style=""> Generate Excel</button> 
          </form>
       
        </div>

     
    </div>
    @endif
    <div class="row">
      <div class=" col col-12 col-lg-12">
        <div class="card shadow-sm mb-5" style="">
          <div class=" card-header text-center p-3 font-weight-bold bg-semi-grey">
            Records
          </div>
          <div class="card-body table-responsive w-100" >
                <table class="table table-hover table-striped " id="appointment_table" >
                  <thead class="">
                      <tr class="">
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Services</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Appoitnment Date</th>
                        <th scope="col" class="text-center">Status</th>
                        @if(Auth::User()->account_type == 'admin')
                        <th scope="col" class="text-center">Action</th>
                        @endif
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($appointments_admin as $data)
                        <tr class="text-center ">
                          <td>{{$data->email}}</td>
                          <td>{{$data->appointment_services}}</td>
                          <td>{{$data->appointment_vaccine_category}}
                              @if($data->appointment_dose != null)
                                @if($data->appointment_dose == "1")
                                     , 1st Dose
                                @elseif($data->appointment_dose == "2")
                                     , 2nd Dose
                                @elseif($data->appointment_dose == "3")
                                    , Booster
                                @else
                                , {{$data->appointment_vaccine_type}} 
                                @endif
                                 
                              @elseif($data->appointment_dose == null && $data->appointment_vaccine_type != null )
                                , {{$data->appointment_vaccine_type}}
                              @endif
                          </td>
                          <td>{{$newDateFormat3 = \Carbon\Carbon::parse($data->appointment_date)->format('d/m/Y');}}</td>
                          <td>
                            @if($data->appointment_status == "success")
                            <small class="bg-success px-1 rounded text-white">   {{$data->appointment_status}}</small>
                            @elseif($data->appointment_status == "expired")
                            <small class="color-orange px-1 rounded text-white">   {{$data->appointment_status}}</small>
                            @elseif($data->appointment_status == "pending")
                            <small class="bg-warning px-1 rounded text-white">   {{$data->appointment_status}}</small>
                            @elseif($data->appointment_status == "canceled")
                            <small class="bg-danger  px-1 rounded text-white">   {{$data->appointment_status}}</small>

                            @endif
                            @if(Auth::User()->account_type == 'admin')
                          </td>
                          <td scope="row" colspan=2 class="d-flex justify-content-center ">
                            @if ($data->appointment_status == "pending") 
                                <button class="btn btn-sm p-0 btn-warning mt-2 mt-lg-0 ml-2 p-1 cancel_btn bi bi-x-circle text-white" value="{{$data->id}}" style="width: 80px"> Cancel</button>
                            @else
                            <button class="btn btn-sm  btn-danger mt-2 mt-lg-0 ml-2 delete_btn bi bi-trash3 " value="{{$data->id}}" style=""></button>
                            @endif
                            @endif
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
          </div> 
        </div> 
     </div>    
    </div>    
</div>


{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>

<script>

  $(document).ready(function () {


    $(document).on('click', '.cancel_btn',function (e) {
        e.preventDefault();
        $("#cancel_message").hide();
          var cancel_id = $(this).val();
       
            // alert(service); 
            $('#calcel_id').val(cancel_id);
      

            
            $('#cancel_appointment_modal').modal('show');
            
            $.ajax({
                type: "GET",
                url: "/admin/cancel_appointment/"+cancel_id,
                success: function (response) {
                    // console.log(response);
                    $('#user_phoneNo').val(response.user_id.user_contactnumber);
                    $('#service').val(response.user_id.appointment_services);
                    $('#user_id').val(response.user_id.user_id);

                    
                    // $('#calcel_id').val(response.service.id)

                }
            });
          
      });

      $(document).on('click', '.reschedule',function (e) {
        $('.reschedule_btn').hide();
        e.preventDefault();
        $("#cancel_message").hide();
          var id = $(this).val();
            console.log(id);
            $('#reschedule_appointment_modal').modal('show');
            $('.invalid_date_warning').hide("0");
            $('.warning_date_warning').hide("0");
            $.ajax({
                type: "GET",
                url: "/admin/get_available_slot/"+id,
                success: function (response) {
                    console.log(response);
                    $('#appointment_id').val(response.date[0].appointment_id);
                    $('#old_appointment_date').val(response.date[0].appointment_date);
                    $('#service_id').val(response.date[0].service_id);
                    $('#datepicker').val(response.date[0].appointment_date);
                    $('#available_slot_reschedule').val(response.date[0].appointment_availableslot);
                    $('#available_slot_reschedule_text').text(response.date[0].appointment_availableslot);
                    $('#new_appointment_date').val(response.date[0].appointment_date);
                    $Mindate =  0;
                  if(response.today){
                    $Mindate= response.today;
                 
                  }
                  console.log(response);
            

                }
            });
          
      });

      $(document).on('change','#datepicker', function (e) {
        e.preventDefault();
        $appointmentdate = $(this).val();
        $service_id = $('#service_id').val();
        $appointment_id = $('#appointment_id').val();
        $old_appointment_date = $('#old_appointment_date').val();
        $datepicker_date = $(this).val();
        $invalid_date_warning =(document).getElementById("invalid_date_warning");
        $('.warning_date_warning').hide("0");
        $.ajax({
          type: "GET",
          url: "/admin/get_appointmentDate_reschedule/"+$appointment_id+"/"+$appointmentdate,
          success: function (response) {
            console.log(response);
            // var len = 0;
            // len = response['appointmentslot'].length;
            // var leng = 0;

          

              if(response.validDate == "yes"){
              $('.invalid_date_warning').hide("0");

                if($datepicker_date == $old_appointment_date){
                  $('.warning_date_warning').show("0");
                    $('.reschedule_btn').hide("0");
                    $('.invalid_date_warning').hide("0");

                } else{
                    $('.warning_date_warning').hide("0");
                    $('#available_slot_reschedule').val(response.slotschedule);
                    $('#available_slot_reschedule_text').text(response.slotschedule);
                    $('.reschedule_btn').show();
                }
             
              }else{
              $('#available_slot_reschedule').val("0");
              $('#available_slot_reschedule_text').text("0");
              $('.invalid_date_warning').show("0");
              $('.warning_date_warning').hide("0");
              $('.reschedule_btn').hide();

            }
            // if(response.validDate == "yes"){
            //   $('.invalid_date_warning').hide("0");
             

            //   $('.reschedule_btn').show();
            //         if (len > 0) {
            //           for(var i=0; i<1; i++){ 
            //               if(response['appointmentslot'][i].appointment_availableslot != 0){
            //                   $('#available_slot_reschedule').val(response['appointmentslot'][i].appointment_availableslot);
            //                   $('#available_slot_reschedule_text').text(response['appointmentslot'][i].appointment_availableslot);
            //                   $('#new_appointment_date').val(response['appointmentslot'][i].appointment_date);

            //                   if($datepicker_date == $old_appointment_date){
            //                       $('.warning_date_warning').show("0");
            //                       $('.reschedule_btn').hide("0");

            //                 } 
                      

            //               }else{
            //                   $('#available_slot_reschedule').val("0");
            //                   $('#available_slot_reschedule_text').text("0");
            //                   $('.reschedule_btn').hide("0");
            //                   $('.warning_date_warning').show("0");
                          

                            
            //               }
            //             }
            //         } else {
            //           leng = response['individualserviceslot'].length;
            //                 console.log("pumasok sa service table");
            //                 $service_id =  $('#service_id').val();
            //                 $('#new_appointment_date').val($datepicker_date);
                        

                          
            //                   for(var i=0; i<leng; i++){
                      
            //                       if($service_id == response['individualserviceslot'][i].id){
            //                           // console.log($service_id);
            //                           $('#available_slot_reschedule').val(response['individualserviceslot'][i].availableslot);
            //                           $('#available_slot_reschedule_text').text(response['individualserviceslot'][i].availableslot);
                                        
            //                       }
                                
            //                     }
                                           

            //         }
                  
            // }else{
            //   $('#available_slot_reschedule').val("0");
            //   $('#available_slot_reschedule_text').text("0");
            //   $('.invalid_date_warning').show("0");
            //   $('.warning_date_warning').hide("0");
            //   $('.reschedule_btn').hide();

            // }
          }
        });

        
      });
      
    $(document).on('click', '.delete_btn',function (e) {
        e.preventDefault();
          var del_id = $(this).val();
            // alert(service); 
            $('#delete_id').val(del_id);
            $('#delete_appointment_modal').modal('show');
        
      });

      $('#message_select').on('change','', function (e) {
        e.preventDefault();
        $("#cancel_message").hide();
        
        if($(this).val() == "default_message"){
        //  $('#message').val("the "+ $('#service').val() +" Appointment has been cancled!");
         
          console.log("default");

        }else if($(this).val() == "add_message"){
         $('#message').val("add");
         $("#cancel_message").show();
          
        }
        
      });


      $(document).ready( function () {
            $('#appointment_table').DataTable();
        });
  });

</script>
</x-app-layout>