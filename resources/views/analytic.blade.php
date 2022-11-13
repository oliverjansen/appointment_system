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
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}" >
        <title>Document</title>
    <style>
    
    </style>
    </head>
    <body>
        
    
        <div class="container mt-5 mb-5 bg-semi-white" >
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
         
                    <button class="btn btn-sm add_service_btn btn-primary mt-2 mb-2  " style="width:120px;">Download</button>
            </div>
            <div class="card shadow-sm mb-5" >
                <div class=" card-header text-center p-3 font-weight-bold bg-semi-grey">
                  Analytic
                </div>
                    <div class="row p-5">
                        <div class="col col-3">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem; max-height: 100%;">
                                <div class="card-header text-center">Header</div>
                                <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-3">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;max-height: 100%;">
                                <div class="card-header text-center">Header</div>
                                <div class="card-body">
                                <h5 class="card-title">Secondary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-3">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem; max-height: 100%;">
                                <div class="card-header text-center">Header</div>
                                <div class="card-body">
                                <h5 class="card-title">Success card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-3">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem; max-height: 100%;">
                                <div class="card-header text-center">Header</div>
                                <div class="card-body">
                                <h5 class="card-title">Danger card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
            
            
                        
                        
                    
                        
                        
                        
                        
                    </div>
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
    
        
    
        });
    </script>
    </x-app-layout>