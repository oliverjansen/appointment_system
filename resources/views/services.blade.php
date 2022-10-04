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
    
    

    

{{-- Add  Services modal--}}

<div class="modal fade" id="add_services_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

             <form action=" {{ route('add_services') }} " method="POST" >
                @csrf
                {{ csrf_field() }}
                {{-- <input type="text" id="vaccine_del_id" name="vaccine_del_id" hidden > --}}
            <div class="form-group">
                <label for="service" class="col-form-label">Vaccine</label>
                <input type="text" class="form-control" name="add_service_input" id="add_service_input" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
    </div>
    </div>

    {{-- Add vaccine modal--}}

<div class="modal fade" id="add_vaccine_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{ url('add_vaccine') }}" method="POST">

                {{ csrf_field() }}
                <div class="">
                    <x-jet-label for="service" value="{{ __('Select Service') }}"/>
                        <input type="text" id="service_select_id" name="service_select_id" hidden>
                        <select name="service_select" id="service_select" class ="mb-3 block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            
                            @foreach ($service as $value)
                                <option value="{{ $value->id }}"> 
                                {{ $value->service }} 
                        
                            </option>
                        
                          @endforeach  
                    
                    
                        </select>
                        <div id="medicine_field">
                            <x-jet-label for="service" class="mt-3" value="{{ __('Add medicine') }}" />
                            <input type="text" class="form-control" name="add_medicine_input_id" id="add_medicine_input_id" hidden >
                            <input type="text" class="form-control" name="add_medicine_input" id="add_medicine_input"  >

                            
                        </div>
                    <div id="vaccine_field_whole">
                        <x-jet-label for="service" value="{{ __('Select Column') }}"/>

                        <select name="column_select" id="column_select" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="category">Category</option>
                                <option value="vaccine_type">Vaccine Type</option>
                        
                        
                        </select>

            
                        <div id="category_field">
                            <div class="form-group">
                                <x-jet-label for="service" class="mt-3" value="{{ __('Category') }}" />
                                <input type="text" class="form-control" name="add_vaccine_category_input_id" id="add_vaccine_category_input_id" hidden >
                                <input type="text" class="form-control" name="add_vaccine_category_input" id="add_vaccine_category_input" >
                                
                            </div>
                        </div>
                        <div id="vaccine_field">
                          
                            <x-jet-label for="service" class="mt-3" value="{{ __('Select Category') }}" />
                                
                                <select name="vaccine_select" id="vaccine_select" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    
                                
                                    @foreach ($category as $value)
                                    <option value="{{ $value->id }}"> 
                                    {{ $value->category }} 
                               
                                   
                                </option>
                               
                                 @endforeach  
                                
                                
                              </select>
                              
                            <div class="form-group">
                                <x-jet-label for="service" class="mt-3" value="{{ __('Vaccine Type') }}" />
                                <input type="text" class="form-control" name="add_vaccine_input_id" id="add_vaccine_input_id" hidden >
        
                                <input type="text" class="form-control" name="add_vaccine_input" id="add_vaccine_input" >
                                
                            </div>
                        </div>
                    </div>   
                 

                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm w-25 btn-primary btn-sm text-align-center">Add</button>
                    <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                    
                </div>
                </form>
        </div>
       
        </div>
    </div>
    </div>
{{-- Edit modal Services--}}

    <div class="modal fade" id="edit_service_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action=" {{ route('update_services') }} " method="POST">
                @csrf
                {{ csrf_field() }}
                <input type="text" id="id" name="id" >
            <div class="form-group">
                <label for="service" class="col-form-label">Service</label>
                <input type="text" class="form-control" name="service" id="service" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
        </div>
    </div>

    {{-- Edit mmedicine modal--}}

    <div class="modal fade" id="edit_medicine_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit medicine</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action=" {{ route('update_medicine') }} " method="POST">
                @csrf
                {{ csrf_field() }}
                <input type="text" id="edit_medicine_id" name="edit_medicine_id" hidden>
            <div class="form-group">
                <label for="service" class="col-form-label">Service</label>
                <input type="text" class="form-control" name="edit_medicine_input" id="edit_medicine_input" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
        </div>
    </div>
{{-- Edit modal vaccine --}}
<div class="modal fade" id="edit_vaccine_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Vaccine</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action=" {{ route('update_vaccine') }} " method="POST" >
                @csrf
                {{ csrf_field() }}
                <input type="text" id="vaccine_del_id" name="vaccine_del_id" hidden >
            <div class="form-group">
                <label for="service" class="col-form-label">Vaccine</label>
                <input type="text" class="form-control" name="vaccine" id="vaccine" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
    </div>
</div>

{{-- Edit category modal --}}
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action=" {{ route('update_category') }} " method="POST" >
                @csrf
                {{ csrf_field() }}
                <input type="text" id="category_update_id" name="category_update_id" hidden>
            <div class="form-group">
                <label for="service" class="col-form-label">Vaccine</label>
           

                <input type="text" class="form-control" name="category_update" id="category_update" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm w-25">Save</button>
                <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">cancel</button>
                
            </div>
            </form>
        </div>
       
        </div>
    </div>
</div>

 <!-- delete category / confimation -->

 <div class="modal fade" id="delete_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('delete_category') }} " method="POST">
            @csrf
         
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="category_del_id" name="category_del_id" hidden>
          Are you sure you want to delete this category?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary delete_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>
   <!-- delete service / confimation -->

<div class="modal fade" id="delete_service_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ url ('delete_services') }} " method="POST">
            @csrf
         
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="service_del_id" name="service_del_id" hidden>
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
 <!-- delete medicine / confimation -->
  <div class="modal fade" id="delete_medicine_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route('delete_medicine') }} " method="POST">
            @csrf
         
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="delete_medicine_id" name="delete_medicine_id" hidden >
          Are you sure you want to delete this Medicine?
        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary delete_btn btn-sm w-25">Yes</button>
          <button type="button" class="btn btn-secondary btn-sm w-25" data-dismiss="modal">No</button>
        </div>
         </form>

      </div>
    </div>
  </div>


 <!-- delete Vaccine / confimation -->

 <div class="modal fade" id="delete_vaccine_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="{{ route('delete_vaccine') }} " method="POST">
            @csrf
         
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text"  id="delete_vaccine_id" name="delete_vaccine_id" >
          Are you sure you want to delete this Vaccine?
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
        <div class="d-flex justify-content-end">
     
                <button class="btn btn-sm add_service_btn btn-success mt-2 mb-2  " style="width:120px;">Add Service</button>
            

        </div>
        <div class="row">
            <div class=" col col-lg-12 col-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                    
                        <th scope="col" class="text-center ">Service</th>
                        <th scope="col"  class="text-center  w-25">Action</th>
              
                        </tr>
                    </thead>
                 
                    <tbody class="text-center">
                        @foreach($service as $service)
                        <div >
                                <tr class="text-center">
                                <td >{{$service->service}}</td>
                                <td scope="row" class="d-sm-flex justify-content-center">
                                    
                                    <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 edit_btn" value="{{$service->id}}">Edit</a>
                                <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete_service" value="{{$service->id}}">Delete</button>
                                 </td>
                                </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
               

                    <div class="d-flex justify-content-end">
     
                    <button class="btn btn-sm add_vaccine_btn btn-success mt-5 mb-2  " style="width:120px;">Add </button>
                
    
                    </div>
                    <div class="d-flex justify-content-end">
                        <table class="table table-hover table-bordered">
                        
                        
                              <thead class="mt-5" >
                              <tr >
                          
                              <th scope="col"  class="text-center">List of Category</th>
                      
      
                              <th scope="col" class="text-center w-25">Action</th>
      
                              </tr>
                          </thead>
                          <tbody class="text-center" >
                          @foreach($category as $category)
                              <tr class="text-center">
                              <td>{{$category->category}}</td>
                              
                              <td scope="row" class="d-sm-flex justify-content-center">
                                          
                                  <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 edit_category" value="{{$category->id}}">Edit</a>
                              <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete_category " value="{{$category->id}}">Delete</button>
                               </td>
                                 
                              </tr>
                       @endforeach
                          </tbody>
                      </table> 
                      
                  </div>
                 <table class="table table-hover table-bordered">
                  
                  
                        <thead class="mt-5" >
                        <tr >
                    
                        <th scope="col"  class="text-center">Category</th> 
                        <th scope="col"  class="text-center">Vaccine</th>

                        <th scope="col" class="text-center w-25">Action</th>

                        </tr>
                    </thead>
                    <tbody class="text-center" >
                 @foreach($vaccine as $vaccine)
                        <tr class="text-center">
                        <td>{{$vaccine->category_id}}</td>
                        <td>{{$vaccine->vaccine_type}}</td>
                        
                        <td scope="row" class="d-sm-flex justify-content-center">
                                    
                            <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 edit_vaccine" value="{{$vaccine->id}}">Edit</a>
                        <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete_vaccine " value="{{$vaccine->id}}">Delete</button>
                         </td>
                           
                        </tr>
                 @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-5 ">
                    <table class="table table-hover table-bordered mt-5 ">
                    
                    
                            <thead class="mt-5" >
                            <tr >
                        
                            <th scope="col"  class="text-center">Medicine Type</th>
                    
    
                            <th scope="col" class="text-center w-25">Action</th>
    
                            </tr>
                        </thead>
                        <tbody class="text-center" >
                        @foreach($medicine as $value)
                            <tr class="text-center">
                            <td>{{$value->medicine_type}}</td>
                            
                            <td scope="row" class="d-sm-flex justify-content-center">
                                        
                                <button class="btn btn-sm btn-warning mt-2 mt-lg-0 ml-lg-2 w-100 edit_medicine" value="{{$value->id}}">Edit</a>
                            <button class="btn btn-sm btn-danger mt-2 mt-lg-0 ml-lg-2 w-100 delete_medicine" value="{{$value->id}}">Delete</button>
                            </td>
                                
                            </tr>
                    @endforeach
                        </tbody>
                    </table> 
                      
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
            $('#edit_service_modal').modal('show');
            
            $.ajax({
                
                type: "GET",
          
                url: "/edit_services/"+service,
                success: function (response) {
                    // console.log(response.service.service);
                    $('#service').val(response.service.service)
                    $('#id').val(response.service.id)

                }
            });
        });

        //update - edit vaccine
        $(document).on('click', '.edit_vaccine',function (e) {
            e.preventDefault();
            var vaccine = $(this).val();
                // console.log(vaccine);
            // alert(service); 
            $('#edit_vaccine_modal').modal('show');
                $.ajax({

                    type: "GET",
                    url: "/edit_vaccine/"+vaccine,
                    success: function (response) {
                       
                        // $('#id').val(response.vaccine.id)
                        $('#vaccine_del_id').val(response.vaccine_id.id);
                        $('#vaccine').val(response.vaccine_id.vaccine_type);



                    }
                });
        });
        $(document).on('click', '.edit_medicine',function (e) {
            e.preventDefault();
            var medicine = $(this).val();
            console.log(medicine);
            // alert(service); 
            $('#edit_medicine_modal').modal('show');
            
            $.ajax({
                
                type: "GET",
                url: "/edit_medicine/"+medicine,
                success: function (response) {
                    // console.log(response.service.service);
                    console.log(response);
                    $('#edit_medicine_input').val(response.medicine_id.medicine_type);
                    $('#edit_medicine_id').val(response.medicine_id.id);

                }
            });
        });

        //delete service
        $(document).on('click', '.delete_service',function (e) {
        e.preventDefault(); 
        var delete_service = $(this).val();
        $('#service_del_id').val(delete_service);
        
        // console.log(delete_service);
        // alert(service); 
        $('#delete_service_modal').modal('show');
        
        });

        //delete vaccine
        $(document).on('click', '.delete_vaccine',function (e) {
        e.preventDefault(); 
        var delete_vaccine = $(this).val();
        $('#delete_vaccine_id').val(delete_vaccine);
        
         console.log(delete_vaccine);
        // alert(service); 
        $('#delete_vaccine_modal').modal('show');
        
        });

        $(document).on('click', '.delete_medicine',function (e) {
        e.preventDefault(); 
        var delete_medicine = $(this).val();
        $('#delete_medicine_id').val(delete_medicine);
        
         console.log(delete_medicine);
        // alert(service); 
        $('#delete_medicine_modal').modal('show');
        
        });

        //add service
        $(document).on('click', '.add_service_btn',function (e) {
        e.preventDefault(); 
        // var delete_vaccine = $(this).val();
        // $('#delete_vaccine_id').val(delete_vaccine);
        //  console.log(delete_vaccine);
        // alert(service); 
        $('#add_services_modal').modal('show');

        });

        //add service
        $(document).on('click', '.add_vaccine_btn',function (e) {
        e.preventDefault(); 
        // var delete_vaccine = $(this).val();
        // $('#delete_vaccine_id').val(delete_vaccine);
        //  console.log(delete_vaccine);
        // alert(service); 
        $('#add_vaccine_modal').modal('show');

        });
       
        $("#vaccine_select").on('change',function(e){ 
            e.preventDefault(); 
            var selected_vaccine = $(this).val();
            console.log(selected_vaccine);
            $('#add_vaccine_input_id').val(selected_vaccine);

        
        }).change();

       
        $("#service_select").on('change',function(e){ 
            e.preventDefault(); 
            var service_select_id = $(this).val();
           
            $('#service_select_id').val(service_select_id);
            
            $.ajax({

                type: "GET",
                url: "/select_service/"+service_select_id,
                success: function (response) {
                    // $('#id').val(response.vaccine.id)
                    $('#vaccine_field_whole').show();
                    $('#medicine_field').show();

                    
                    if (response.service_id.service=="vaccine") {
                      
                        $('#vaccine_field_whole').show();
                        $('#medicine_field').hide();


                     }else if(response.service_id.service =="medicine"){
                        $('#add_medicine_input_id').val(response.service_id.id);
                        $('#medicine_field').show();
                         $('#vaccine_field_whole').hide();
                        $('#vaccine_field_whole').hide();


                     }
                     else if(response.service_id.service =="checkup"){
                         $('#vaccine_field_whole').hide();
                        $('#medicine_field').hide();


                    }
                    else{
                        $('#vaccine_field_whole').hide();
                        $('#medicine_field').hide();

                    }
                }
                });
     
        }).change();

        $("#column_select").on('change',function(e){ 
            e.preventDefault(); 
            var selected_column = $(this).val();
            if (selected_column == "category"){
                $('#vaccine_field').hide();
                $('#category_field').show();

            }else if (selected_column == "vaccine_type"){
                $('#vaccine_field').show();
                $('#category_field').hide();
            }else{
                $('#vaccine_field').hide();
                $('#category_field').hide();
            }
        }).change();
        

        //edit category
        $(document).on('click', '.edit_category',function (e) {
        e.preventDefault(); 
    
            var edit_category = $(this).val();
          
 
        $('#edit_category_modal').modal('show');

            $.ajax({

                type: "GET",
                url: "/edit_category/"+edit_category,
                success: function (response) {
                    // $('#id').val(response.vaccine.id)
                    $('#category_update_id').val(response.category_id.id);
                    $('#category_update').val(response.category_id.category);


                }
            });
        });
      
        $(document).on('click', '.delete_category',function (e) {
            e.preventDefault();
            var delete_category_id =$(this).val();
            $('#delete_category_modal').modal('show');
            $('#category_del_id').val(delete_category_id);
        });

    });
</script>
</x-app-layout>