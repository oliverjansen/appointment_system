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

        <form action="{{ url ('delete_scheduled_appointment') }} " method="POST">
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

        <form action="{{ url ('canceled_appointment') }} " method="POST">
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


     <!-- approve modal -->

<div class="modal fade" id="approve_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('approve_registration') }} " method="POST">
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

  

  <div class="container-fluid mt-5 mb-5 table-responsive w-100" >
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
  <div class="m-5">

    <table class="table text-align-center table-hover">
        <thead>

            <tr class="text-center " >
            <th scope="col" class="w-25" >Email</th>
            <th scope="col" class="w-25">Services</th>
            <th scope="col" class="w-25">Appoitnment Date</th>
            <th scope="col" class="w-25" colspan="2">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $data)
            {{-- @if ($data->account_type!="admin" ) --}}
            
            <tr class="text-center ">
              <td>{{$data->appointment_services}}</td>
              <td>{{$data->appointment_services}}</td>
              <td>{{$newDateFormat3 = \Carbon\Carbon::parse($data->appointment_date)->format('d/m/Y');
              }}</td>

            </td>
            
            {{-- <td>{{$data->status}}</td> --}}
            <td scope="row" colspan=2 class="d-sm-flex">
                {{-- @if ($data->status !="approved" && $data->status !="rejected" ) --}}
                    <button class="btn btn-sm btn-primary w-100 ml-lg-2 approve"    value="{{$data->id}}" >Reschedule</button>
                    <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 cancel_btn" value="{{$data->id}}">Cancel</button>
                {{-- @endif --}}
                
                    
                
            <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete_btn" value="{{$data->id}}">Delete</button>
            </td>
      
            </tr>
            {{-- @endif --}}
            @endforeach
        
        </tbody>
    </table>
  </div>       
    </div>


{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                url: "/cancel_appointment/"+cancel_id,
                success: function (response) {
                    // console.log(response);
                    $('#user_phoneNo').val(response.user_id.user_contactnumber);
                    $('#service').val(response.user_id.appointment_services);
                    $('#user_id').val(response.user_id.user_id);

                    
                    // $('#calcel_id').val(response.service.id)

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
  });

</script>
</x-app-layout>