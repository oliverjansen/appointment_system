<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\appointments;
use App\Models\Residents;

use App\Models\services;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  DB::table('users')->insert([
        //     'firstname' => $this->faker->firstNameMale(),
        //     'middlename' => $this->faker->lastName(),
        //     'lastname' => $this->faker->lastName(),
        //     'gender' => $this->faker->randomElement(['Female','Male']),
        //     'birthdate' => $this->faker->dateTimeBetween('2000-01-01', '2020-12-31')
        //     ->format('d/m/Y'), 
        //     'age' => $this->faker->numberBetween(1,60),
        //     'email' => "kevin_23@gmail.com",
        //     'contactnumber' => "+639".$this->faker->randomNumber(9,true),
        //     'password' => bcrypt('qweqweqwe'),
        //     'barangay' => $this->faker->randomElement(['502','503','504','505','506','507','508','509','510','511','512','513','514','515','516','517','519','520']),
        //     'identification' => $this->faker->randomElement(['images/download1 copy 1.jpg','images/download1 copy 2.jpg','images/download1 copy 3.jpg','images/download1 copy 4.jpg','images/download1 copy 5.jpg','images/download1 copy 6.jpg','images/download1 copy 7.jpg','images/download1 copy 8.jpg','images/download1 copy 2.jpg','images/download1 copy 9.jpg','images/download1 copy 10.jpg','images/download1 copy 11.jpg','images/download1 copy 12.jpg','images/download1 copy 13.jpg','images/download1 copy 14.jpg','images/download1 copy 15.jpg','images/download1 copy 16.jpg','images/download1 copy 17.jpg','images/download1 copy 18.jpg']),
        //     'status' => $this->faker->randomElement(['pending','approved','rejected']),
        //     'remember_token' => Str::random(10),
        //     'address' => $this->faker->randomNumber(3,true),
        //     'identificationtype' => $this->faker->randomElement(['National ID','PSA','Voters ID','Drivers License','Passport','Philhealth Card','PRC ID','SSS ID', 'UMID', 'Voters ID', 'PSA']),
        //     'created_at' => $this->faker->dateTimeThisYear(),
        // ]);
        // User::factory()->times(100)->create();
        // appointments::factory()->times(5)->create();
        Residents::factory()->times(5)->create();

        // services::factory()->times(10)->create();


    }
}
