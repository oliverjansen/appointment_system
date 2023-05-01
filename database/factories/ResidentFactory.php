<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Residents;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Residents::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstNameMale(),
            'middlename' => $this->faker->lastName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Female','Male']),
            'birthdate' => $this->faker->dateTimeBetween('2000-01-01', '2020-12-31')
            ->format('d/m/Y'), 
            'age' => $this->faker->numberBetween(1,60),
            'barangay' => $this->faker->randomElement(['502','503','504','505','506','507','508','509','510','511','512','513','514','515','516','517','519','520']),
            'identification' => $this->faker->randomElement(['images/download1 copy 1.jpg','images/download1 copy 2.jpg','images/download1 copy 3.jpg','images/download1 copy 4.jpg','images/download1 copy 5.jpg','images/download1 copy 6.jpg','images/download1 copy 7.jpg','images/download1 copy 8.jpg','images/download1 copy 2.jpg','images/download1 copy 9.jpg','images/download1 copy 10.jpg','images/download1 copy 11.jpg','images/download1 copy 12.jpg','images/download1 copy 13.jpg','images/download1 copy 14.jpg','images/download1 copy 15.jpg','images/download1 copy 16.jpg','images/download1 copy 17.jpg','images/download1 copy 18.jpg']),
            'address' => $this->faker->randomNumber(3,true),
        ];
    }
}
