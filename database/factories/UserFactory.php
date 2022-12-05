<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
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
            'email' => $this->faker->unique()->safeEmail(),
            'contactnumber' => "+639".$this->faker->randomNumber(9,true),
            'password' => bcrypt('qweqweqwe'),
            'barangay' => $this->faker->randomElement(['502','503','504','505','506','507','508','509','510','511','512','513','514','515','516','517','519','520']),
            'identification' => $this->faker->randomElement(['images/download1 copy 1.jpg','images/download1 copy 2.jpg','images/download1 copy 3.jpg','images/download1 copy 4.jpg','images/download1 copy 5.jpg','images/download1 copy 6.jpg','images/download1 copy 7.jpg','images/download1 copy 8.jpg','images/download1 copy 2.jpg','images/download1 copy 9.jpg','images/download1 copy 10.jpg','images/download1 copy 11.jpg','images/download1 copy 12.jpg','images/download1 copy 13.jpg','images/download1 copy 14.jpg','images/download1 copy 15.jpg','images/download1 copy 16.jpg','images/download1 copy 17.jpg','images/download1 copy 18.jpg']),
            'status' => $this->faker->randomElement(['pending','approved','rejected']),
            'remember_token' => Str::random(10),
            'address' => $this->faker->randomNumber(3,true),
            'identificationtype' => $this->faker->randomElement(['National ID','PSA','Voters ID','Drivers License','Passport','Philhealth Card','PRC ID','SSS ID', 'UMID', 'Voters ID', 'PSA']),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
