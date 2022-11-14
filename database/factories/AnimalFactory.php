<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generates fake data for Animals table.
        return [
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->firstName,
            'type' => $this->faker->word,
            'notes' => $this->faker->text(200),
            'veterinarian' => $this->faker->name,
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date
        ];
    }
}
