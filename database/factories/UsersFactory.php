<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
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
            'last_name' => $this->faker->lastName(),
            'dni' => $this->faker->dni(),
            'address' =>$this->faker->address(),
            'phone' =>$this->faker->phoneNumber(),
            'id_country' => 0,
            'id_department' => 0,
            'id_city' => 0,
        ];
    }
}
