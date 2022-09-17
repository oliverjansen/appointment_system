<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class=" col col-lg-8 col-12">
                <table class="table ">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col">Person</th>
                        <th scope="col">Vaccine Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class=" col col-lg-4 col-12">
                     <form action="{{ url('insert-data') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="">
                            <x-jet-label for="service" value="{{ __('Service') }}" />
                            <x-jet-input id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')" required autofocus autocomplete="service" />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="person" value="{{ __('Person') }}" />
                            <x-jet-input id="person" class="block mt-1 w-full" type="text" name="person" :value="old('person')" required autofocus autocomplete="person" />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="Vaccinetype" value="{{ __('Vaccine Type') }}" />
                            <x-jet-input id="vaccinetype" class="block mt-1 w-full" type="text" name="vaccinetype" :value="old('vaccinetype')" required autofocus autocomplete="vaccinetype" />
                        </div>

                        <div class="mt-5 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm text-align-center w-50">Add</button>
                        <button type="submit" class="ml-2 btn btn-sm btn-warning text-align-center w-50">Edit</button>
                        <button type="submit" class="ml-2 btn btn-sm btn-danger text-align-center w-50">Delete</button>
                    </form>
                </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

</x-app-layout>