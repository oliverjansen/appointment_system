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

class AdminSide extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //make the databse refresh everytime the data test is run
     use RefreshDatabase;
     use DatabaseMigrations;

     //setting up our account
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
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'account_type'=> 'admin',
            'status' =>'approved',
         ]);
 
         $this->actingAs($this->user);
     }

    //test to login as admin
    public function test_login_as_admin()
    {
        $this->assertDatabaseHas('users',[
            'account_type' => 'admin'
        ]);
        $this->assertTrue(true);
    }


    public function test_service_module(){

        //sample data for serivices
        $services = [
            'id' => 'service',
            'availability'=> 'Yes',
           ];
    
           //creating service data;
           $response = $this->post(route('add_services'), $services);

           //response for redirecting
           $response->assertStatus(302);
           
           //sample data for vaccine

           $vaccine =[
            'service_select_id'=>1,
            'add_vaccine_input_id'=> 2,
            'add_vaccine_input'=>'Sinovac',
            'add_vaccine_slot'=>100,
            'vaccine_select'=> 2,
            'covid_select'=>1,
            'add_vaccine_category_input'=> 'Covid Vaccination',
            'vaccine_availability'=>'Yes'
           ];

        //passing the data vaccine to add_vaccince route
        $response = $this->post(route('add_vaccine'), $vaccine);
        
        //redirect assert status
        $response->assertStatus(302);

        //updating services availability to visible
         $update_service =[
            'id'=> 1,
            'service_id'=> 1,
            'service'=> 1,
            'choice_service'=> "Yes",
         ];

         //passing update serive to this route
         $response = $this->post(route('update_services'), $update_service);

         //redirect assert status
         $response->assertStatus(302);

        //check if the slot is updated
        $this->assertDatabaseHas('vaccine',[
            'vaccine_slot'=>'99',
         ]);
         
    }

    public function test_approval_of_account(){
        
        //create sample data
        $this->user = User::factory()->create([
            'id'=> 2,
            'firstname' => 'oliver',
            'middlename' => 'vanicer',
            'lastname' => 'rodriguez',
            'gender' => 'Male',
            'age' => 25,
            'barangay' => 512,
            'birthdate' => '1998-05-11',
            'contactnumber' => '+639123456781',
            'identificationtype' => 'Drivers License',
            'identification' => 'sample.jpg',
            'address' => '123 Main Street, Makati',
            'email' => 'oliver@gmail.com',
            'password' => Hash::make('123'),
            'account_type'=> 'user',
            'status' =>'pending',
         ]);

         //assert is set to true
         $this->assertTrue(true);

         //approval data
         $need_approval =[
            'approve_id'=> 2,
         ];

         //update status to approved
         $response = $this->post(route('admin.approve_registration'), $need_approval);

         //redirect assert status
         $response->assertStatus(302);

         //check if status of registration is approved 
        $this->assertDatabaseHas('users',[
            'id'=>2,
            'status'=>"approved",
         ]);


    }

    public function test_post_announcement(){

        //sample data to post details
        $post_details = [
            'unpublish_date' => '2023-05-14',
            'publish_date' => '2023-05-13',
            'title' => 'Libre Tuli',
            'announcement' => 'Mag sasagawa po kami ng libreng tuli sa dadating na sabado May 13, 2023. Ito ay magagandap sa ating health center.',
        ];

        //passing data to post_annoncement route
        $response = $this->post(route('post_announcement'), $post_details);

        //redirect assert status
        $response->assertStatus(200);

    }

    public function test_resident_module (){
        //check export of resident infromation 
        $response = $this->post(route('appointment_pdf'));
        $response->assertStatus(200);
    }






   

}
