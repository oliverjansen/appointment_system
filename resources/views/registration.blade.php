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
  <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('delete_registration') }} " method="POST">
            @csrf
           
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="del_id" name="del_id" hidden>
          Are you sure you want to delete this registration?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary delete_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>
<!-- reject modal -->

  <div class="modal fade" id="reject_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('reject_registration') }} " method="POST">
            @csrf
          
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="reject_id" name="reject_id" hidden>
        
          Are you sure you want to reject this registration?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary reject_btn btn-sm w-25">Yes</button>
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
    </div>
                <table class="  table text-align-center table-hover">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">Email</th>

                        <th scope="col">Fullname</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">ID</th>
                     
                        <th scope="col">Status</th>


                        <th scope="col" colspan="2" class="text-center">Action</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        @if ($data->account_type!="admin" )
                        <tr class="text-center">
                        <td>{{$data->email}}</td>
                        <td>{{$data->lastname}},{{$data->firstname}} {{$data->middlename}}</td>
                        <td>{{$data->age}}</td>
                        <td>{{$data->gender}}</td>
                        <td>{{$data->birthdate}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->contactnumber}}</td>
                        <td> <button class="btn btn-sm btn-primary view" value="{{$data->id}}">View</button>
                        
                          
                        </td>
                        
                        <td>{{$data->status}}</td>
                        <td scope="row" colspan=2 class="d-sm-flex">
                            @if ($data->status !="approved" && $data->status !="rejected" )
                                <button class="btn btn-sm btn-primary w-100 ml-lg-2 approve"    value="{{$data->id}}" >Approved</button>
                                <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 rejected" value="{{$data->id}}">Reject</button>
                            @endif
                            
                               
                           
                        <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete" value="{{$data->id}}">Delete</button>
                        </td>
                 
                        </tr>
                        @endif
                        @endforeach
                   
                    </tbody>
                </table>
          
    </div>


{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<script>
    $(document).ready(function () {
        $(document).on('click', '.approve',function (e) {
            e.preventDefault(); 
            var approve = $(this).val();
            var btn_type = "approved";
            
            
            $('#btn_type').val(btn_type);
            $('#approve_id').val(approve);
           
            // console.log(approve);
            // alert(service); 
            $('#approve_modal').modal('show');
            
            });

            $(document).on('click', '.rejected',function (e) {
            e.preventDefault(); 
            var rejected = $(this).val();
            var btn_type = "rejected";
            
            
         
            $('#reject_id').val(rejected);

            // $('#email').val(btn_type);

            
            // $('#approve_id').val(approve);
           
            // console.log(btn_type);
            // alert(service); 
            $('#reject_modal').modal('show');
            
            });

            $(document).on('click', '.delete',function (e) {
            e.preventDefault(); 
            var del = $(this).val();
            // var btn_type = "rejected";
            
            
    
            $('#del_id').val(del);

            // $('#email').val(btn_type);

            
            // $('#approve_id').val(approve);
           
            // console.log(btn_type);
            // alert(service); 
            $('#delete_modal').modal('show');
            
            });

            $(document).on('click', '.view',function (e) {
              e.preventDefault();
              var identification = $(this).val();

              $('#view_modal').modal('show');
              //  $('#image_id').val(identification);

                $.ajax({
                  type: "GET",
                  url: "/view_identification/"+identification,
                  success: function (response) {
                      // console.log(response);
                      $('#image').val(response.identification.identification)
                      $('#image_id').val(response.identification.id)
                      $('#id_type').text(response.identification.identificationtype);
                      $('#view_image').attr('src', 'storage/'+response.identification.identification);
                  }, error: function(error) {
                    console.log(error);
                  
                    }
                  });
              
            });
        
    });
</script>
</x-app-layout>