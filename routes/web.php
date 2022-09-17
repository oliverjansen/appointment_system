<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WorkerControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/calendar', [CalendarAppointments::class, 'calendar'])->name('calendar');

    Route::get('/calendar', 'App\Http\Controllers\CalendarController@calendar')->name('calendar');
    Route::get('/services', 'App\Http\Controllers\ServicesController@services')->name('services');
    Route::get('/registration', 'App\Http\Controllers\RegistrationController@registration')->name('registration');
    Route::get('/workers', 'App\Http\Controllers\WorkersController@workers')->name('workers');
    
    Route::get('/appointment', 'App\Http\Controllers\AppointmentsController@appointment')->name('appointment');
    Route::post('/insert-data',  'App\Http\Controllers\AppointmentsController@insert')->name('insert-data');

});


