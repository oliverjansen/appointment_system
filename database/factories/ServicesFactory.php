<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\services;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    protected $model = services::class;

    public function definition()
    {
        return [
            'service' => $this->faker->randomElement(['Vaccine','Medicine','Checkup']),
            'availability'=>$this->faker->randomElement(['Yes','No']),
        ];
    }
}
