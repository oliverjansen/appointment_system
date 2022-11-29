<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link rel="stylesheet" href="/css/style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <title>DapitanHealthCenter</title>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" >
    </head>

    <style>
        @media only screen and (min-width: 601px) {
        div.example {
            font-size: 80px;
        }
        }

        /* If the screen size is 600px or less, set the font-size of <div> to 30px */
        @media only screen and (max-width: 600px) {
       
            .sm-text-center{
                text-align: center;
            }
       
        }

        #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
        }
            </style>
    <body>
        <header>
            <nav>
                <div id="logo">
                    <img class="logo" src=""/>
                </div>
            </nav> 
            <section class="banner">
                <div class="container">
                    <h2>APPOINTMENT SYSTEM</h2>
                    <p id="title">DAPITAN HEALTH CENTER</p>
                    @if (Route::has('login'))
                
                        @auth
                            <button class="submit tow"  onclick="window.location='{{ route('afterlogin') }}'" type="button">Dashboard</button>

                            
                        @else
                          
                         <button class="submit tow" onclick="window.location='{{ url("/login") }}'" type="submit">More Information   >></button>
                         @endauth

                    @endif
                    
                </div>
            </section>
        </header>

        
        <section class="container-fluid ">

            <div class=" col-12 col-lg-10 mx-lg-auto" style="margin-top: 100px;">
                <div class="mb-3 sm-text-center" style="border-bottom:2px solid green;"> <h2>Announcement!</h2></div>
                <div class=" rounded p-2 overflow-auto" style="height: 300px">
              
                    @if($announcement->isEmpty())
                        <div>
                            <label class="btn-sm btn-danger">No Announcement Yet!</label> 

                    
                        </div>
                
                    @endif
           
                    @foreach($announcement as $value)
                    <div class="">
                        <div class="card mb-3 col col-12 shadow-sm " style="margin-left: auto; margin-right:auto; border-left:10px solid green;">
                            <div class="card-header border-dark">
                                <div class="row">
                                    <div class="col col-12 col-lg-9">
                                    <b>Publish Date : </b>{{$value->publish_date}}
                                    </div>
                                
                                </div>
                            </div>
                            <div class="card-body text-dark ">
                                <h5 class="card-title font-weight-bold">Title:{{$value->title}}</h5>
                                <p class="card-text ">{{$value->body}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                 </div>
            </div>
            <div class=" col-12 col-lg-10 mx-lg-auto" style="margin-top: 100px;">
                <div class="mb-3 sm-text-center" style="border-bottom:2px solid green;"> <h2>Services</h2></div>
                <div class="shadow rounded p-4 overflow-auto" style="height: 300px">

                    
                    <h5 class="font-weight-bold  mb-3 border-bottom border-dark p-1 text-center">Vaccnine</h5>

                        @if($vaccine->isEmpty())
                        <ul>
                            <li class="list-group-item text-danger">No Available Vaccine!</li>

                        </ul>
                        @endif
                        @foreach($vaccine as $value)
                                <ul>
                                <li class="list-group-item">{{$value->category}}</li>

                                </ul>
                        
                        @endforeach
                    <h5 class="font-weight-bold mb-3 border-bottom border-dark p-1 text-center">Medicine</h5>

                    @if($medicine->isEmpty())
                    <ul>
                        <li class="list-group-item text-danger">No Available Medicine!</li>

                    </ul>
                    @endif

                        @foreach($medicine as $value)
                                <ul>
                                    <li class="list-group-item">{{$value->other_services}}</li>
                                </ul>
                        
                        @endforeach
                    <h5 class="font-weight-bold  border-bottom mb-3 border-dark p-1 text-center">Check Up</h5>

                    @if($checkup->isEmpty())
                    <ul>
                        <li class="list-group-item text-danger">No Available Checkup!</li>

                    </ul>
                    @endif
                        @foreach($checkup as $value)
                                <ul>
                                    <li class="list-group-item">{{$value->other_services}}</li>

                                </ul>
            
                        @endforeach
                        @if($sevices->count()>2)
                        <h5 class="font-weight-bold mb-3 border-bottom border-dark p-2 mt-5 ">Other Services </h5>
                            @foreach($sevices as $value)
                            <ul>                    
                                <li class="list-group-item">{{$value->service}}</li>

                            </ul>
                            @endforeach

                        
                       @endif
                
                </div>
            </div>
            <div class=" col-12  col-lg-10 mx-lg-auto" style="margin-top: 100px;">
                <div class="mb-3  sm-text-center" style="border-bottom:2px solid green;"> <h2>About</h2></div>

                <p class="text-justify">
                    The Dapitan Health Center is a medical center located in the Metropolitan Manila area. The Dapitan Health Center is conveniently located next to Barangay 520, the Dapitan Public Library, and the Zone 51 Hall.To better serve the public citizens, we offer medical care. The following are Vaccine, Free Medicine, Checkup and more.
                </p>
                <p class="mt-4 sm-text-center">
                   <b > Contact# : +63 2 741 2078</b>
                </p>

            <!--- FIRST ROW --->
            
        

            
        </section>
      
        
        <footer class="bg-dark " style="margin-top: 100px; height:150px;">
                {{-- <p  class="text-white m-auto">  </p> --}}
        </footer>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  

     
    </body>



    </html>
    
</x-guest-layout>