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
                @method('PUT')

                <input type="text" id="id" name="id" hidden>
            <div class="form-group">
                <label for="service" class="col-form-label">Service</label>
                <input type="text" class="form-control" name="service" id="service">
            </div>
            {{-- <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
            </div> --}}
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
    </div>
    </div>

    <div class="container mt-5 mb-5 " >
      
        <div>
            @if (session('edit_success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('edit_success') }}
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
                                @foreach($data as $data)
                                <tr class="text-center">
                                <td >{{$data->service}}</td>
                                {{-- <a href="{{ url ('edit/'.$data->id) }}" >Edit</a>
                                <a href="{{ url ('edit/'.$data->id) }}" >delete</a> --}}
                                <td scope="row" class="d-sm-flex justify-content-center">
                                    
                                    <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-50 edit_btn" value="{{$data->id}}">Edit</a>
                                <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-50">Delete</button>
                                 </td>
                                </tr>
                        </div>
                    </tbody>
                        
                 @endforeach
                 <thead class="mt-5" >
                        <tr >
                    
                        <th scope="col"  class="text-center">Vaccines</th>
                        <th scope="col" class="text-center ">Action</th>

              
                        </tr>
                    </thead>
                    <t/body>
                 @foreach($data1 as $data1)
                        <tr class="text-center">
                        <td>{{$data1->vaccine_type}}</td>
                        <td scope="row" class="d-sm-flex justify-content-center">
             
                           
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
                            <x-jet-input id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')"  autofocus autocomplete="service" />
                        </div>
                        <!-- <div class="mt-4">
                            <x-jet-label for="person" value="{{ __('Person') }}" />
                            <x-jet-input id="person" class="block mt-1 w-full" type="text" name="person" :value="old('person')"  autofocus autocomplete="person" />
                        </div> -->
                        <div class="mt-4">
                            <x-jet-label for="vaccine_type" value="{{ __('Vaccine Type') }}" />
                            <x-jet-input id="vaccine_type" class="block mt-1 w-full" type="text" name="vaccine_type" :value="old('vaccinetype')" autofocus autocomplete="vaccine_type" />
                        </div>

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

        $(document).on('click', '.edit_btn',function () {
            var service = $(this).val();
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
    });
</script>
</x-app-layout>