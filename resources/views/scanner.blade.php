<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" /> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
        <title>Document</title>
        <script type="text/javascript" src="{{ asset('instascan.min.js') }}" ></script>

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
      

   

      
{{--     
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
        </div> --}}
          <div class="card">
            <div class="card-header text-center p-5">
                <h2>Verify Appointment</h2>
               
                <button type="button" onclick="initQrCodeScanner()" class="btn btn-primary scan1" >Scan</button>
                <button type="button" class="btn btn-primary cancel" id="cancel">Cancel</button>

            </div>
            
            <script>
           
            </script>
            <div class=" row ">

            
              <div class="card-body ">
              <div class="d-flex justify-content-center mt-4 mb-2">
                <video id="preview"></video>
              </div>
                

                  {{-- {!! QrCode::size(300)->generate('oliverjansen') !!} --}}
              </div>
          </div>
          </div>
        </div>
    
    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    </body>
    </html>
    
    
    
   <script>
        //  const Instascan = require('instascan');

         
        // $(document).ready(function () {

       

        //   let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        //   scanner.addListener('scan', function (content) {
        //     console.log(content);
        //   });
        //   Instascan.Camera.getCameras().then(function (cameras) {
        //     if (cameras.length > 0) {
        //       scanner.start(cameras[0]);
        //     } else {
        //       console.error('No cameras found.');
        //     }
        //   }).catch(function (e) {
        //     console.error(e);
        //   }); 



        //     $(document).on('click', '.approve',function (e) {
        //         e.preventDefault(); 
        //         var approve = $(this).val();
        //         var btn_type = "approved";
                
                
        //         $('#btn_type').val(btn_type);
        //         $('#approve_id').val(approve);
               
        //         // console.log(approve);
        //         // alert(service); 
        //         $('#approve_modal').modal('show');
                
        //         });
    
        //         $(document).on('click', '.rejected',function (e) {
        //         e.preventDefault(); 
        //         var rejected = $(this).val();
        //         var btn_type = "rejected";
                
                
             
        //         $('#reject_id').val(rejected);
    
        //         // $('#email').val(btn_type);
    
                
        //         // $('#approve_id').val(approve);
               
        //         // console.log(btn_type);
        //         // alert(service); 
        //         $('#reject_modal').modal('show');
                
        //         });
    
        //         $(document).on('click', '.delete',function (e) {
        //         e.preventDefault(); 
        //         var del = $(this).val();
        //         // var btn_type = "rejected";
                
                
        
        //         $('#del_id').val(del);
    
        //         // $('#email').val(btn_type);
    
                
        //         // $('#approve_id').val(approve);
               
        //         // console.log(btn_type);
        //         // alert(service); 
        //         $('#delete_modal').modal('show');
                
        //         });
    
        //         $(document).on('click', '.view',function (e) {
        //           e.preventDefault();
        //           var identification = $(this).val();
    
        //           $('#view_modal').modal('show');
        //           //  $('#image_id').val(identification);
    
        //             $.ajax({
                    
        //             type: "GET",
        //             url: "/view_identification/"+identification,
        //              success: function (response) {
        //                 // console.log(response);
        //                 $('#image').val(response.identification.identification)
        //                 $('#image_id').val(response.identification.id)
        //                 $('#id_type').text(response.identification.identificationtype);
        //                 $('#view_image').attr('src', 'storage/'+response.identification.identification);
        //             }, error: function(error) {
        //                console.log(error);
                     
        //     }
        //         });
                  
        //         });
            
        // });
     

                const initQrCodeScanner = () => {
                  var cancel = document.getElementById('cancel');

                let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                
                Instascan.Camera.getCameras().then(cameras => {
                  console.log(cameras.length);
                  if(cameras.length > 0){
                    if(scanner.camera = cameras[cameras.length - 2]){
                       scanner.start();
                    }else{
                      alert("camera 2 not found!");
                    }
                   
                  }else {
                    alert("no camera found!");
                  }
                  

                }).catch(e => console.error(e));
            
                scanner.addListener('scan', content => {
                  scanner.stop();
                  console.log(content);
                });
              
                cancel.addEventListener('click', function () {
                  scanner.stop();
                });
            
              };  
        

             
        
       

    </script>
    </x-app-layout>