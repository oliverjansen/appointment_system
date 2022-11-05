<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WorkerControllers;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\VerifyAppointmentController;
use App\Http\Controllers\QrCodeController;


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

//page navigigation
// Route::get('/', function () {
//     return view ('/scanner');
// })->middleware('auth');

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

    //page 
        Route::get('/', 'App\Http\Controllers\VerifyAppointmentController@index')->name('/');
        Route::get('/scanner', 'App\Http\Controllers\VerifyAppointmentController@index')->name('scanner');
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
        Route::match(['get','post'],'select_service/{id}','App\Http\Controllers\ServicesController@select_service')->name('select_service');
        Route::match(['get','post'],'edit_medicine/{id}','App\Http\Controllers\ServicesController@edit_medicine')->name('edit_medicine');
        Route::match(['get','post'],'update_medicine','App\Http\Controllers\ServicesController@update_medicine')->name('update_medicine');
        Route::match(['get','post'],'delete_medicine','App\Http\Controllers\ServicesController@delete_medicine')->name('delete_medicine');
        
        
        //delete appointment calendar
        Route::match(['get','post'],'delete_appointment','App\Http\Controllers\CalendarController@delete_appointment')->name('delete_appointment');
        
        //get appointment date
        Route::match(['get','post'],'get_appointmentDate/{date}','App\Http\Controllers\AppointmentsController@get_appointmentDate')->name('get_appointmentDate');

        //view appointment
        Route::match(['get','post'],'preview_appointment/{id}','App\Http\Controllers\CalendarController@preview_appointment')->name('preview_appointment');
        
        //registration controller 
        Route::match(['get','post'],'approve_registration','App\Http\Controllers\RegistrationController@approve_registration');
        Route::match(['get','post'],'reject_registration','App\Http\Controllers\RegistrationController@reject_registration');
        Route::match(['get','post'],'delete_registration','App\Http\Controllers\RegistrationController@delete_registration');
    
     
        //appointment controller
        Route::match(['get','post'],'cancel_appointment/{id}','App\Http\Controllers\AppointmentsController@cancel_appointment')->name('cancel_appointment');
        Route::match(['get','post'],'canceled_appointment','App\Http\Controllers\AppointmentsController@canceled_appointment')->name('canceled_appointment');
        Route::match(['get','post'],'delete_scheduled_appointment','App\Http\Controllers\AppointmentsController@delete_scheduled_appointment')->name('delete_scheduled_appointment');
        
        

    
        //services controller  -- add
        Route::get('/registration', 'App\Http\Controllers\RegistrationController@registration')->name('registration');
        Route::get('/workers', 'App\Http\Controllers\WorkersController@workers')->name('workers');
        Route::get('/appointment', 'App\Http\Controllers\AppointmentsController@appointment')->name('appointment');
        Route::get('/sample', 'App\Http\Controllers\ServicesController@sample')->name('sample');
        Route::match(['get','post'],'/insert_data',  'App\Http\Controllers\AppointmentsController@insert')->name('insert_data');
        Route::get('/calendar', 'App\Http\Controllers\CalendarController@calendar')->name('calendar');
        Route::get('/appointments', 'App\Http\Controllers\AppointmentsController@appointments_admin')->name('appointments');
        
        //view image
      
        Route::get('view_identification/{id}','App\Http\Controllers\RegistrationController@view_identification');

        // Route::post('register', 'App\Http\Controllers\Controller@register')->name('register');
       
        
        //Page

        Route::get('/preview_qrcode/{id}', 'App\Http\Controllers\QrCodeController@index')->name('preview_qrcode');

        //verification
        Route::get('/get_appointment_id/{content}', 'App\Http\Controllers\VerifyAppointmentController@get_appointment_id')->name('get_appointment_id');

        Route::match(['get','post'],'/verify_appointment', 'App\Http\Controllers\VerifyAppointmentController@verify_appointment')->name('verify_appointment');
});


