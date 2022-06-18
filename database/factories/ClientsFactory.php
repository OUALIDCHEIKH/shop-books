<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['m','f']),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => 212.3876,
            'address' => $this->faker->sentence(),
            'city' => $this->faker->city(10),
        ];
    }


}
