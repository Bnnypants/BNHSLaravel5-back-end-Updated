<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'middlename'=> $this->faker->lastName(),
            'lastname'=> $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),

            'status'=>$this->faker->randomElement([

            'Active',
            'Inactive'

            ]),
            'phonenumber'=>$this->faker->numberBetween(63556841720,63556841700)
        ];
    }
}
