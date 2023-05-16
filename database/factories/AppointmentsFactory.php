<?php

namespace Database\Factories;
use App\Models\appointments;
use App\Models\User;
use App\Models\services;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointments>
 */
class AppointmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     * @return array<string, mixed>
     */
    
    protected $model = appointments::class;


    public function definition()
    {

       
            return [
                // 'user_id' => User::factory(),
                // 'appointment_id' => $this->faker->numberBetween(1,9),
                // 'service_id' => "1",
                // 'appointment_vaccine_category' => $this->faker->randomElement(['Covid Vaccination']),  
                // 'appointment_dose' => $this->faker->numberBetween(1,3),
                // 'appointment_services' => "vaccine",
                // 'appointment_vaccine_type' => $this->faker->randomElement(['Pfizer','Moderna']),
                // 'appointment_date' =>$this->faker->dateTimeThisYear(), 
                // 'appointment_status' => $this->faker->randomElement(['pending','success','canceled','expired']),  
            ];
       
       
    }
}
