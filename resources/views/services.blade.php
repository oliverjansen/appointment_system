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
    
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    
    
    {{-- <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> --> --}}


    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action=" {{ url ('update_services') }} " method="POST">
                @csrf
               
                <input type="text" id="id" name="id" hidden>
            <div class="form-group">
                <label for="service" class="col-form-label">Service</label>
                <input type="text" class="form-control" name="service" id="service" required>
            </div>
            {{-- <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
            </div> --}}
            {{-- @if ($errors->any())    
            <div class="w-4/8 m-auto text-center">
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 list-unstyled">
                        {{$error}}
                    </li>
                    
                @endforeach

            </div>
        @endif --}}
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
    </div>
    </div>

   <!-- delete modal / confimation -->

<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('delete_services') }} " method="POST">
            @csrf
         
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="del_id" name="del_id" hidden>
          Are you sure you want to delete this Service?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary delete_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>

    <div class="container mt-5 mb-5 " >
      
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
        <div class="row">
            <div class=" col col-lg-8 col-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                    
                        <th scope="col" class="text-center w-50">Service</th>
                        <th scope="col"  class="text-center">Action</th>
              
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <div >
                                @foreach($data as $datas)
                                <tr class="text-center">
                                <td >{{$datas->service}}</td>
                                {{-- <a href="{{ url ('edit/'.$data->id) }}" >Edit</a>
                                <a href="{{ url ('edit/'.$data->id) }}" >delete</a> --}}
                                <td scope="row" class="d-sm-flex justify-content-center">
                                    
                                    <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-50 edit_btn" value="{{$datas->id}}">Edit</a>
                                <button class="btn btn-sm delete btn-danger mt-2 mt-lg-0 ml-lg-2 w-50" value="{{$datas->id}}">Delete</button>
                                 </td>
                                </tr>
                        </div>
                    </tbody>
                        
                 @endforeach
                    <thead class="mt-5" >
                    <tbody class="text-center" >
                        <tr >
                    
                        <th scope="col"  class="text-center">Vaccines</th>
                        <th scope="col" class="text-center ">Action</th>

              
                        </tr>
                    </thead>
                 
                 @foreach($data1 as $data1)
                        <tr class="text-center">
                        <td>{{$data1->vaccine_type}}</td>
                        <td scope="row" class="d-sm-flex justify-content-center">
                                    
                            <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-50 edit_vaccine" value="{{$data1->id}}">Edit</a>
                        <button class="btn btn-sm delete_vaccine btn-danger mt-2 mt-lg-0 ml-lg-2 w-50" value="{{$data1->id}}">Delete</button>
                         </td>
                           
                        </tr>
                 @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class=" col col-lg-4 col-12">
                     <form action="{{ url('add_services') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="">
                            <x-jet-label for="service" value="{{ __('Service') }}" />
                            <x-jet-input id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')"  required autofocus autocomplete="service" />
                        </div>
                        <!-- <div class="mt-4">
                            <x-jet-label for="person" value="{{ __('Person') }}" />
                            <x-jet-input id="person" class="block mt-1 w-full" type="text" name="person" :value="old('person')"  autofocus autocomplete="person" />
                        </div> -->
                        {{-- <div class="mt-4">
                            <x-jet-label for="vaccine_type" value="{{ __('Vaccine Type') }}" />
                            <x-jet-input id="vaccine_type" class="block mt-1 w-full" type="text" name="vaccine_type" :value="old('vaccinetype')" autofocus autocomplete="vaccine_type" />
                        </div> --}}
                        {{-- @if ($errors->any())
                            <div class="w-4/8 m-auto text-center">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 list-unstyled">
                                        {{$error}}
                                    </li>
                                    
                                @endforeach

                            </div>
                        @endif --}}
                        <div class="mt-5 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm text-align-center w-50">Add</button>
                        <!-- <button type="button" class="ml-2 btn btn-sm btn-warning text-align-center w-50">Edit</button>
                        <button type="button" class="ml-2 btn btn-sm btn-danger text-align-center w-50">Delete</button> -->
                    </form>
                </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<script>
    $(document).ready(function () {
      
        $(document).on('click', '.edit_btn',function (e) {
            e.preventDefault();
            var service = $(this).val();
            console.log(service);
            // alert(service); 
            $('#edit_modal').modal('show');
            
            $.ajax({
                
                type: "GET",
          
                url: "/edit_services/"+service,
                success: function (response) {
                    console.log(response);
                    $('#service').val(response.service.service)
                    $('#id').val(response.service.id)

                }
            });
        });

        $(document).on('click', '.edit_vaccine',function (e) {
            e.preventDefault();
            var vaccine = $(this).val();
            console.log(vaccine);
            // alert(service); 
            $('#edit_modal').modal('show');
                $.ajax({
                    
                    type: "GET",
                    url: "/edit_vaccine/"+vaccine,
                    success: function (response) {
                        console.log(response);
                        // $('#id').val(response.vaccine.id)

                    }
                });
        });


        $(document).on('click', '.delete',function (e) {
            e.preventDefault(); 
            var delete_service = $(this).val();
            $('#del_id').val(delete_service);
           
            // console.log(delete_service);
            // alert(service); 
            $('#delete_modal').modal('show');
            
            });
    });
</script>
</x-app-layout>