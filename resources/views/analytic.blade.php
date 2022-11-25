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
        <div class="container-fluid text-center p-5 mt-4 mb-4">
            <h3 class="fw-bolder bg-dark text-light p-4 bg-opacity-10" >ANALYTICS</h3>
        </div>
    
        <div class="container-fluid mb-5 bg-semi-white" >
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
                <div class="container-fluid">
                    <div class="card shadow-sm mb-5" style="width: 100%" >
                        <div class=" card-header text-center p-3 font-weight-bold 
                        bg-semi-grey ">
                        Services Analytic
                        </div>
                        <div class="row p-5">
                            <div class="col col-6 col-md-4 col-sm-6 h-50">
                                <div class="card text-white bg-primary mb-3" style="">
                                    <div class="card-header text-center">Total number of available slot for vaccine (Consumable)</div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center">{{ $total_vaccine_slot }}</h5>
                                
                                    </div>
                                </div>
                            </div>

                            <div class="col col-6 col-md-4 col-sm-6">

                                <div class="card text-white bg-secondary mb-3" style="">
                                    <div class="card-header text-center">Total number of available slot Covid Vaccine (Consumable)</div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center">{{$total_available_slot_codiv_vaccine}}</h5>
                                
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col col-6 col-md-4 col-sm-6">

                                <div class="card text-white bg-secondary mb-3" style="">
                                    <div class="card-header text-center">Total number of available slot for medicine (Consumable)</div>
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
                            <div class="col col-6 col-md-4 col-sm-6">

                                <div class="card text-white bg-secondary mb-3" style="">
                                    <div class="card-header text-center">Total number of distributed medicines</div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center">{{$total_distributed_medicine}}</h5>
                                
                                    </div>
                                </div>
                            </div>
                            <div class="col col-6 col-md-4 col-sm-6">
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
                 </div>
                <div class="container-fluid overflow-hidden">
                    <div class="row justify-content-center"> 
                        <div class="card shadow-sm mb-5 col-12 col-lg-5" style="" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                              Number of Slot per Service
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="Number_slot_perservice" height="400" width="600"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                              Number of Slot Covid Dose
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="vaccine_slot_dose" height="400" width="700"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                              Covid Vaccinated and Unvaccinated
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="vaccinated_unvaccinated_covid" height="400" width="700"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-5" style="width: 100%" >
                    <div class=" card-header text-center p-3 font-weight-bold 
                    bg-semi-grey">
                    Appointment Analytic
                    </div>
                    <div class="row p-5">
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
                <div class="container-fluid overflow-hidden " style="text-align:center">
                    <div class="row justify-content-center"> 
                        <div class="card shadow-sm mb-5 col-12 col-lg-5" style="" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                              Appointments Per Months
                            </div>
                            <div class="card-body" style="text-align:center">
                                <div class="panel panel-default " style="text-align:center">
                                    <div class="panel-heading" ></div>
                                    <div class="panel-body" style="text-align:center">
                                        <canvas id="appointments_permonths" height="900" width="900"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                             Most Frequent Service Appointmented
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body" style="text-align:center">
                                        <canvas id="mostfrequent" height="900" width="900"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                             Number of Appointments Base on Status
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body">
                                        <canvas id="appointment_status" height="900" width="900"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-5" style="width: 100%" >
                    <div class=" card-header text-center p-3 font-weight-bold 
                    bg-semi-grey">
                    Residents Analytic
                    </div>
                    <div class="row p-5">
                        <div class="col col-6 col-md-4 col-sm-6">

                            <div class="card text-white bg-primary mb-3" style="">
                                <div class="card-header text-center ">Number Registered Residents</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$pie_user_approved1}} </h5>
                               
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-4 col-sm-6">

                            <div class="card text-white bg-secondary mb-3" style="">
                                <div class="card-header text-center">Number of Pending Registration of Residents</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$pie_user_pending1}}</h5>
                            
                                </div>
                            </div>
                        </div>
                        <div class="col col-6 col-md-4 col-sm-6">
                            <div class="card text-white bg-success mb-3" style="">
                                <div class="card-header text-center">Number of Rejected Registration of Residents</div>
                                <div class="card-body">
                                <h5 class="card-title text-center">{{$pie_user_rejected1}}</h5>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid overflow-hidden">
                    <div class="row justify-content-center"> 
                        <div class="card shadow-sm mb-5 col-12 col-lg-5" style="" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                              Number of Registration Base on Status (%)
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body" style="text-align:center">
                                        <canvas id="pieUser" height="400" width="600"></canvas>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="card shadow-sm mb-5 ml-3 col-12 col-lg-5 offset" style="width: 100%" >
                            <div class=" card-header text-center p-3 font-weight-bold 
                            bg-semi-grey">
                             Number of Resident Registration
                            </div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading"></div>
                                    <div class="panel-body " style="text-align:center">
                                        <canvas id="registered_user_line_chart" height="900" width="900"></canvas>
                                    </div>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
    //         var year = <?php echo $year; ?>;
    //         var user = <?php echo $user; ?>;
    //         var barChartData = {
    //             labels: year,
    //             datasets: [{
    //                 label: 'User',
    //                 backgroundColor: "blue",
    //                 data: user
    //             }]
    //         };
        
    // window.onload = function() {
    //     var ctx = document.getElementById("canvas").getContext("2d");

    //     window.myBar = new Chart(ctx, {
    //         type: 'bar',
    //         data: barChartData,
    //         options: {
    //             elements: {
    //                 rectangle: {
    //                     borderWidth: 2,
    //                     borderColor: '#c1c1c1',
    //                     borderSkipped: 'bottom'
    //                 }
    //             },
    //             responsive: true,
    //             title: {
    //                 display: true,
    //                 text: 'Yearly User Joined'
    //             }
    //         }
    //     });

        
    // };

    //   var year = <?php echo $year; ?>;
    //   var user = <?php echo $user; ?>;
  
    //   const data = {
    //     labels: year,
    //     datasets: [{
    //       label: 'User',
    //       backgroundColor: 'rgb(255, 99, 132)',
    //       borderColor: 'rgb(255, 99, 132)',
    //       data: user,
    //     }]
    //   };
  
    //   const config = {
    //     type: 'line',
    //     data: data,
    //     options: {}
    //   };
  
    //   const myChart = new Chart(
    //     document.getElementById('myChart'),
    //     config
    //   );


// Registered user per month line Monthly =================================================

      var user_line_labels =  {{ Js::from($user_line_labels) }};
    var user_line_data =  {{ Js::from($user_line_data) }};
  
    const data_user = {
        labels: user_line_labels,
        datasets: [{
            label: 'Residents',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: user_line_data,
        }]
    };
  
    const config_user = {
        type: 'line',
        data: data_user,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('registered_user_line_chart'),
        config_user
    );
// pei chart user ================================================= 



const user_pie = {
  labels: [
    'Pending Registration (%)',
    'Approved Registration (%)',
    'Rejected Registration (%)'
  ],
  datasets: [{
    label: [],
    data: [{{$pie_user_pending }}, {{$pie_user_approved}}, {{$pie_user_rejected}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config_user_pie= {
  type: 'doughnut',
  data: user_pie,
};

const pie_user = new Chart(
    document.getElementById('pieUser'),
    config_user_pie
);

// pei chart slot per service ================================================= 

const number_perservice_pie = {
  labels: [
    'Slot Vaccine',
    'Slot Medicine ',
    'Slot Checkup'
  ],
  datasets: [{
    label: ["Service"],
    data: [{{$pie_slot_service}}, {{$pie_slot_medicine}}, {{$pie_slot_checkup}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config_slot_pie= {
  type: 'bar',
  data: number_perservice_pie,
};

const pie_slot = new Chart(
    document.getElementById('Number_slot_perservice'),
    config_slot_pie
);

// vaccine_slot_dose ========================================================

const number_slot_covid_pie = {
  labels: [
    'Slot 1st dose',
    'Slot 2nd Dose ',
    'Slot Booster'
  ],
  datasets: [{
    label: ["Covid Vaccnine"],
    data: [{{$vaccine_slot_dose1}}, {{$vaccine_slot_dose2}}, {{$vaccine_slot_dose3}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config_coid_slot_pie= {
  type: 'bar',
  data: number_slot_covid_pie,
};

const pie_covid_slot = new Chart(
    document.getElementById('vaccine_slot_dose'),
    config_coid_slot_pie
);

// Vaccinated and not vaccinated ========================================================
const number_vaccinated_covid_pie = {
  labels: [
    'Vaccinated',
    'Unvaccinated',
  ],
  datasets: [{
    label: ["Covid Vaccnine"],
    data: [{{$vaccincate_covid_user}}, {{$unVaccinated_covid_user}}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config_covid_vaccinated_pie= {
  type: 'pie',
  data: number_vaccinated_covid_pie,
};

const pie_covid_vaccinated_unvaccinated = new Chart(
    document.getElementById('vaccinated_unvaccinated_covid'),
    config_covid_vaccinated_pie
);

// appointments permonths ===========================================

var appointment_permonth_line_labels =  {{ Js::from($appointment_permonth_line_labels) }};
    var appointment_permonth_line_data =  {{ Js::from($appointment_permonth_line_data) }};
  
    const data_appointments_permonths = {
        labels: appointment_permonth_line_labels,
        datasets: [{
            label: 'Appointments',
            backgroundColor: [     
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'],
            borderColor: 'rgb(255, 99, 132)',
            data: appointment_permonth_line_data,
        }]
    };
  
    const config_most_frequent_service = {
        type: 'line',
        data: data_appointments_permonths,
        options: {}
    };
  
    const most_frequent_serive = new Chart(
        document.getElementById('appointments_permonths'),
        config_most_frequent_service
    );

// mostfrequent ===========================================

var appointment_most_frequent_labels =  {{ Js::from($appointment_most_frequent_labels) }};
    var appointment_most_frequent_data =  {{ Js::from($appointment_most_frequent_data) }};
  
    const data_most_frequent_serive = {
        labels: appointment_most_frequent_labels,
        datasets: [{
            label: 'Frequent Sevice',
            backgroundColor: [     
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'],
            borderColor: [     
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'],
            data: appointment_most_frequent_data,
        }]
    };
  
    const config_appontment_permonth = {
        type: 'pie',
        data: data_most_frequent_serive,
        options: {}
    };
  
    const appointment_permonth = new Chart(
        document.getElementById('mostfrequent'),
        config_appontment_permonth
    );

    //appointment_status ==============================

    
    var appointment_status_labels =  {{ Js::from($appointment_status_labels) }};
    var appointment_status_data =  {{ Js::from($appointment_status_data) }};
  
    const data_appontment_status= {
        labels: appointment_status_labels,
        datasets: [{
            label: 'Frequent Sevice',
            backgroundColor: [     
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'],
            borderColor: [     
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'],
            data: appointment_status_data,
        }]
    };
  
    const config_appointment_status = {
        type: 'pie',
        data: data_appontment_status,
        options: {}
    };
  
    const appointment_status = new Chart(
        document.getElementById('appointment_status'),
        config_appointment_status
    );

        </script>
    </x-app-layout>