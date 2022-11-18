<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}" >
    
      </head>
    <body>
    
      
    
      
      <div class="container-fluid mt-5" style="width: 70%; height:100%;">
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
          </div>
          <div class="card shadow-sm mb-5 " style="">
            <div class=" card-header text-center p-3 font-weight-bold bg-semi-grey">
              Appointment History Table
            </div>
              <div class="panel panel-default mt-4" >
                <div class="panel-body">
                    <form action="{{route('search_registration')}} " method="GET">
                        @csrf
                        {{ csrf_field() }}
                        {{-- <div class=" container-fluid">
                            <input type="search_registration" name="search_registration" id="search" class="form-control mb-3 float-right" placeholder="search" style="width: 300px">
                            <button class="btn mt-1 float-right ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg>
                            </button>
                        </div> --}}
                    
                    </form>
                </div>
              </div> 
                 <div class="card-body table-responsive">
                    <table class="table table-hover "  >
                    
                      <thead>
                          <tr class="text-center">
                            <th scope="col" style="width: ">Service</th>
                            <th scope="col" style="width: ">Category</th>
                            <th scope="col" style="width: ">Vaccine</th>
                            <th scope="col" style="width:">Apointment Date</th>
                            <th scope="col" style="width: ">Status</th>
                      
                          </tr>
                      </thead>
                      <tbody>
                  
                              @if($appointmentss->isEmpty())      
                              <td colspan="5" class="text-center">
                                  No Data
                              </td>
                      
                              @endif
                              
                              
                                  @foreach($appointmentss as $value)
                                    <tr class="text-center ">
                                    <td >{{$value->appointment_services}}</td>
                                    <td >{{$value->appointment_vaccine_category}}</td>
                                  
                                      @if($value->appointment_dose !== null)
                                         
                                      @endif
                                    
                                    <td >
                                      @if($value->appointment_dose !== null)
                                         @if($value->appointment_dose == "1")
                                          1st dose,
                                          @elseif($value->appointment_dose == "2")
                                          2nd dose,
                                          @elseif($value->appointment_dose == "3")
                                          Booster,
                                           @endif
                                      @endif

                                      {{$value->appointment_vaccine_type}}</td>
                                    <td >{{$value->appointment_date}}</td>
                                    <td >{{$value->appointment_status}}</td>
                                    </tr>
                                 @endforeach
                       
                      </tbody>
              </table> 
            </div>
            {{-- <div class="m-4"> {{ $datas->Links() }} </div> --}}
         
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