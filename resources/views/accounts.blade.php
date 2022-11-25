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
    
 

      <!-- modal delete-->
      <div class="modal fade" id="delete_announcement_modal" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
    
            <form action="{{ route('delete_announcement')}}" method="POST">
                @csrf
                {{ csrf_field() }}
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="text"  id="delete_id" name="delete_id" >
                  Are you sure you want to delete this registration?
                </div>
                <div class="modal-footer">
                
                  <button type="submit" class="btn btn-danger btn-sm w-25 delete_announcement_class ">Yes</button>
                  <button type="button" class="btn btn-primary btn-sm w-25" data-dismiss="modal">No</button>
                </div>
             </form>
    
          </div>
        </div>
      </div>
    <!-- ADD announcement Modal -->
    
    
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
          <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-sm btn-primary add_announcement">Add Announcement</button>

          </div>
    
        
          <div class="card shadow-sm mb-5" >
            
            <div class=" card-header text-center p-3 font-weight-bold">
              Announcement
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
                      {{-- <div class="mt-5">
                        @foreach($announcement as $value)
                          <div class="row ">
                              <div class="card mb-3 col col-10 shadow border-dark" style="margin-left: auto; margin-right:auto;">
                              <div class="row justify-content-end mt-2">
                                <div class="col col-12 col-lg-2">
                                  <small>Status:</small>
                                
                                  @if($value->publish_date <= $current_date)
                                    <small class="bg-success p-1 rounded"> Posted</small>
                                  @else()
                                    <small class="bg-warning p-1 rounded"> Pending</small>
                                  @endif
                                </div>
                              </div>
                                <div class="card-header bg-transparent ">
                                  <div class="row">
                                    <div class="col col-12 col-lg-9">
                                      <b>Publish Date : </b>{{$value->publish_date}}
                                    </div>
                                  
                                  </div>
                                </div>
                                <div class="card-body text-dark ">
                                  <h5 class="card-title font-weight-bold"><b>Title: </b>{{$value->title}}</h5>
                                  <p class="card-text ">{{$value->body}}</p>
                                </div>
                                <div class="card-footer bg-transparent"><b>Until: </b>{{$value->unpublish_date}}
                                  <div class="float-right">
                                    <button class="btn btn-sm btn-success edit_announcement" value="{{$value->id}}">Edit</button> 
                                    <button class="btn btn-sm btn-danger delete_btn" value="{{$value->id}}" >Delete</button> 
                                  </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                      </div> --}}
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