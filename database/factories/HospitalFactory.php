<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generates fake data for Hospitals table.
        return [
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->city(),
            'address' => $this->faker->address(),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now')
        ];
    }
}
