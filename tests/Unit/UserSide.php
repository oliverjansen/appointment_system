<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\Hash;

use Tests\TestCase;
use App\Models\User;
use App\Models\services;
use App\Models\Category;
use App\Models\Vaccine;
use App\Models\appointments;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use  Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSide extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //used to refresh database everytime the unit test is run
    use RefreshDatabase;
    use DatabaseMigrations;
    protected $user;
   
     public function setUp(): void
     {
         parent::setUp();
 
         $this->user = User::factory()->create([
            'firstname' => 'John',
            'middlename' => 'Doe',
            'lastname' => 'Smith',
            'gender' => 'Male',
            'age' => 25,
            'barangay' => 512,
            'birthdate' => '1998-05-11',
            'contactnumber' => '+639123456789',
            'identificationtype' => 'Drivers License',
            'identification' => '123456789.jpg',
            'address' => '123 Main Street, Makati',
            'email' => 'smith@gmail.com',
            'password' => Hash::make('123'),
            'account_type'=> 'user',
            'status' =>'approved',
         ]);
 
         $this->actingAs($this->user);
     }
    
    public function test_login_as_user(){
        //checking the user if existing
        $this->assertDatabaseHas('users',[
            'account_type' => 'user'
        ]);
    }

    public function test_appointment_module(){
        //sample data of appointment
        $details = [
           'user_id'=> 1,
           'user_contactnumber' => '+639123456789',
           'appointment_id'=> rand(0,99999999),
           'service_id'=> 4,
           'service_category_id'=> 4,
           'pediatic_id'=> '',
           'appointment_services'=> 'Vaccine',
           'appointment_vaccine_category'=> 'Covid Vaccination',
           'appointment_dose'=>'5',
           'appointment_vaccine_type'=>'Sinovac',
           'appointment_date'=>'2023-5-13',
           'appointment_status'=> 'pending'
        ];


        //checking the routes
        $response = $this->post(route('insert_datas'), $details);

        //redirect assert status
        $response->assertStatus(200);

        //checking if the appoinment is today and valid
        $this->assertDatabaseHas('appointments',[
            'appointment_date'=>$details['appointment_date'],
            'appointment_status' => $details['appointment_status'],
        ]);

        //checking if qr code appointment exist and valid
        $this->assertDatabaseHas('appointments',[
            'appointment_id'=>$details['appointment_id'],
        ]);


    }






}
