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
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}" >
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
    
            <form action="{{ route ('admin.delete_registration') }}  " method="POST">
                @csrf
                  
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="text"  id="delete_id" name="delete_id" >
                  Are you sure you want to delete this registration?
                </div>
                <div class="modal-footer">
                
                  <button type="submit" class="btn btn-primary btn-sm w-25">Yes</button>
                  <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
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
                      <option value="default_message" selected>Cancel </option>
                      <option value="add_message">Add  </option>
              </select>
                <textarea name="cancel_message" id="cancel_message" cols="30" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
    
                </textarea>
            </div>
              
            </div>
            <div class="modal-footer">
             
              <button type="submit" class="btn btn-primary reject_btn btn-sm w-25">Send</button>
              <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
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
    
      
    
      <div class="container mt-5   mb-5 table-responsive" style="width: 90%; height:100%;">
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
        <div class="card shadow-sm mb-5" >
          <div class=" card-header text-center p-3 font-weight-bold bg-semi-grey">
            Appointments Table 
          </div>
            <div class="panel panel-default mt-4" >
              <div class="panel-body">
                <div class="container-fluid">
                  {{-- <form action="{{route('search_appointments')}} " method="GET">
                    @csrf
                    {{ csrf_field() }}
                    <div class="">
                        <input type="search_appointments" name="search_appointments" id="search" class="form-control w-25 mb-3 float-right" placeholder="search">
                        <button class="btn mt-1 float-right ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                        </button>
                        </div>
                    </form> --}}
                </div>
                  
              </div>
            </div> 
          <div class="card-body table-responsive">
    
        </div> 
      </div>       
    </div>
    
    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
    
    <script>
    
      $(document).ready(function () {
    
      });
    
    </script>
    </x-app-layout>