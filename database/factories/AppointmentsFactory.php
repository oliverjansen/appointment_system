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
                'user_id' => User::factory(),
                'appointment_id' => $this->faker->numberBetween(),
                'service_id' => $this->faker->numberBetween(1,3),
                'appointment_vaccine_category' => $this->faker->numberBetween(1,5),
                'appointment_dose' => $this->faker->numberBetween(1,3),
                'appointment_services' => $this->faker->numberBetween(1,3),
                'appointment_vaccine_type' => services::factory(),
                'appointment_date' => $this->faker->dateTimeBetween('2021-01-01', '2022-12-31')
                ->format('d/m/Y'), 
                'appointment_status' => $this->faker->randomElement(['pending','success','canceled','expired']),  
            ];
       
       
    }
}
