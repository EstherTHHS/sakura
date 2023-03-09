<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "name" => $this->faker->name(),
            "age" => $this->faker->numerify("##"),
            "address" => $this->faker->address(),
            "phone" => $this->faker->numerify("094######"),
            "email" => $this->faker->unique()->email()
        ];
    }
}
