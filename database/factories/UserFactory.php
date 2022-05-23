<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastName(),
            'dni' => $this->faker->randomNumber(8, true),
            'address' =>$this->faker->address(),
            'phone' =>$this->faker->phoneNumber(),
            'id_country' => 0,
            'id_department' => 0,
            'id_city' => 0,
        ];
    }

    
}
