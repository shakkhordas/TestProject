<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'dob' => $this->faker->date(),
            'country_id' => $this->faker->numberBetween(1,3),
            'status' => $this->faker->numberBetween(0,1),
        ];
    }
}
