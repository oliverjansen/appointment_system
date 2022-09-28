
<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
</head>
<body>

  <div class="container mt-5 mb-5" >

  
    <div class="row">


    @if(Auth::User()->account_type=='admin')
    <div id ="calendar" class=" col col-lg-12 col-12 h-50"> 
    @else
    <div id ="calendar" class=" col col-lg-8 col-12"> 
    @endif

       
        @if(Auth::User()->account_type=='user')
         </div>
                <div class=" col col-lg-4 col-12 align-items-center justify-content-center" >
                    <form action="{{ url('insert_data') }}" method="POST" class= "w-100">

                        {{ csrf_field() }}

                        <div class="mt-3">
                            <label for="">Service</label>
                            <select name="appointmentservice" id="appointmentservice" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="vaccine">Vaccine</option>
                                <option value="inquiries">Inquiry</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">Person</label>
                            <select name="appointmentPerson" id="appointmentPerson" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="kids">Kids</option>
                                <option value="adult">Adult</option>
                            </select>
                        </div>
                                
                        <div class="mt-3">
                            <label for="">Vaccine Type</label>
                                <select name="appointmentvaccinetype" id="appointmentvaccinetype" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="measles">Measles</option>
                                    <option value="tuberculosis">Tuberculosis </option>
                                    <option value="inactivated">Inactivated polio </option>
                                    <option value="tuberculosis">Tuberculosis </option>
                                </select>
                            </div>

                        <div class="mt-4">
                                <label for="">Appointment Date</label>
                                <input type="date" id="appointmentdate" name="appointmentdate" :value="old('appointmentdate')" required autofocus autocomplete="appointmentdate" class ="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        </div>

                                <div class="mt-5 d-flex align-items-center justify-content-center">
                                <button type="submit" class="btn btn-secondary text-align-center w-50">Submit</button>
                                </div>
                    </form>
                        



                </div>
            </div>

        </div>
        
        @endif   
    </div>
</div>

<script>

$(document).ready(function () {
    var schedules = @json($schedules);
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaweek, agendaDay',
            },
            events: schedules
        })
       
});
  
</script>

</body>
</html>



 
</x-app-layout>