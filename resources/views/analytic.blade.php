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
        
    
        <div class="container-fluid mt-5 mb-5 bg-semi-white" >
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
            {{-- <div class="d-flex justify-content-end">
         
                    <button class="btn btn-sm add_service_btn btn-primary mt-2 mb-2  " style="width:120px;">Download</button>
            </div> --}}
                <div class="card shadow-sm mb-5" style="width: 100%" >
                    <div class=" card-header text-center p-3 font-weight-bold ">
                    Services Analytic
                    </div>
                    <div class="row p-5">
                        <div class="col col-6 col-md-4 col-sm-6 h-50">
                            <div class="card text-white bg-primary mb-3" style="">
                                <div class="card-header text-center">Total number of available slot for vaccine</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{ $total_vaccine_slot }}</h5>
                               
                                </div>
                            </div>
                        </div>

                        <div class="col col-6 col-md-4 col-sm-6">

                            <div class="card text-white bg-secondary mb-3" style="">
                                <div class="card-header text-center">Total number of available slot for medicine</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_available_slot_medicine}}</h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-4 col-sm-6">
                            <div class="card text-white bg-success mb-3" style="">
                                <div class="card-header text-center">Total number of slot for checkup</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_slot_checkup}}</h5>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-6 col-sm-6">

                            <div class="card text-white bg-secondary mb-3" style="">
                                <div class="card-header text-center">Total number of distributed medicines</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_distributed_medicine}}</h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-6 col-sm-6">
                            <div class="card text-white bg-primary mb-3" style="">
                                <div class="card-header text-center">Total number of covid vaccinated residents</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_covid_vaccinated_residents}}</h5>
                                
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col col-6 col-md-6 col-sm-6">
                            <div class="card text-white bg-success mb-3" style="">
                                <div class="card-header text-center">Total number of consulted resident</div>
                                <div class="card-body">
                                <h5 class="card-title">Success card title</h5>
                                
                                </div>
                            </div>
                        </div> --}}

                    </div> 
                </div> 
                        
                <div class="container-fluid overflow-hidden">
                    <div class="row justify-content-center"> 
                        <div class="card shadow-sm mb-5 col-12 col-lg-5" style="" >
                            <div class=" card-header text-center p-3 font-weight-bold">
                              {{-- Analytic --}}
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="canvas" height="400" width="600"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold">
                              {{-- Analytic --}}
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="myChart" height="400" width="700"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-5" style="width: 100%" >
                    <div class=" card-header text-center p-3 font-weight-bold ">
                    Appointment Analytic
                    </div>
                    <div class="row p-5">
                        {{-- <div class="col col-6 col-md-3 col-sm-6">

                            <div class="card text-white bg-primary mb-3" style="">
                                <div class="card-header text-center">Total Appointments per months</div>
                                <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-3 col-sm-6">

                            <div class="card text-white bg-secondary mb-3" style="">
                                <div class="card-header text-center">Most frequent service appointed</div>
                                <div class="card-body">
                                <h5 class="card-title">Secondary card title</h5>
                            
                                </div>
                            </div>
                        </div> --}}
                        <div class="col col-6 col-md-4 col-sm-6">
                            <div class="card text-white bg-success mb-3" style="">
                                <div class="card-header text-center">Total number of successfull appointments</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_appointment_success}}</h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-4 col-sm-6">

                            <div class="card text-white bg-danger mb-3" style="">
                                <div class="card-header text-center">Total number of Expired appointments</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_appointment_expired}}</h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-4 col-sm-6">

                            <div class="card text-white bg-danger mb-3" style="">
                                <div class="card-header text-center">Total number of Canceled appointments</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$total_appointment_canceled}}</h5>
                                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    
        <script>
            var year = <?php echo $year; ?>;
            var user = <?php echo $user; ?>;
            var barChartData = {
                labels: year,
                datasets: [{
                    label: 'User',
                    backgroundColor: "blue",
                    data: user
                }]
            };
        
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");

        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly User Joined'
                }
            }
        });

        
    };

      var year = <?php echo $year; ?>;
      var user = <?php echo $user; ?>;
  
      const data = {
        labels: year,
        datasets: [{
          label: 'User',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: user,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );




      
        </script>
    </x-app-layout>