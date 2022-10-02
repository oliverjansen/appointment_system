<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WorkerControllers;
use App\Http\Controllers\Controller;

use App\Models\user;
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
    return view ('dashboard');
})->middleware('auth');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/calendar', [CalendarAppointments::class, 'calendar'])->name('calendar');
 
        Route::get('/services', 'App\Http\Controllers\ServicesController@services')->name('services');
       
        // Route::resource('services','App\Http\Controllers\ServicesController@update_services');

        //services controller -- services
        // Route::get('edit/{id}','App\Http\Controllers\ServicesController@edit_services');
        Route::get('edit_services/{id}','App\Http\Controllers\ServicesController@edit_services');
        Route::match(['get','post'],'update_services','App\Http\Controllers\ServicesController@update_services')->name('update_services');
        Route::match(['get','post'],'delete_services','App\Http\Controllers\ServicesController@delete_services');
        
        //services controller  -- vaccine
        Route::get('edit_vaccine/{id}','App\Http\Controllers\ServicesController@edit_vaccine');
        Route::match(['get','post'],'update_vaccine','App\Http\Controllers\ServicesController@update_vaccine')->name('update_vaccine');
        Route::match(['get','post'],'delete_vaccine','App\Http\Controllers\ServicesController@delete_vaccine')->name('delete_vaccine');
        Route::post('/add_services',  'App\Http\Controllers\ServicesController@add_services')->name('add_services');
        Route::post('/add_vaccine',  'App\Http\Controllers\ServicesController@add_vaccine')->name('add_vaccine');
        Route::match(['get','post'],'update_category','App\Http\Controllers\ServicesController@update_category')->name('update_category');
        Route::match(['get','post'],'edit_category/{id}','App\Http\Controllers\ServicesController@edit_category')->name('edit_category');
        Route::match(['get','post'],'delete_category','App\Http\Controllers\ServicesController@delete_category')->name('delete_category');
        
        
        
        
        //registration controller 
        Route::match(['get','post'],'approve_registration','App\Http\Controllers\RegistrationController@approve_registration');
        Route::match(['get','post'],'reject_registration','App\Http\Controllers\RegistrationController@reject_registration');
        Route::match(['get','post'],'delete_registration','App\Http\Controllers\RegistrationController@delete_registration');
    
     
        //services controller  -- add



        Route::get('/registration', 'App\Http\Controllers\RegistrationController@registration')->name('registration');
        Route::get('/workers', 'App\Http\Controllers\WorkersController@workers')->name('workers');
        Route::get('/appointment', 'App\Http\Controllers\AppointmentsController@appointment')->name('appointment');
        Route::get('/sample', 'App\Http\Controllers\ServicesController@sample')->name('sample');
        Route::match(['get','post'],'/insert_data',  'App\Http\Controllers\AppointmentsController@insert')->name('insert_data');
        Route::get('/calendar', 'App\Http\Controllers\CalendarController@calendar')->name('calendar');
        
        //view image
      
        Route::get('view_identification/{id}','App\Http\Controllers\RegistrationController@view_identification');

        // Route::post('register', 'App\Http\Controllers\Controller@register')->name('register');
       
   
});


