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
        return [
            // These statements add fake data to the Animals table and states the type of data
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->name,
            'type' => $this->faker->word,
            'notes' => $this->faker->text(200),
            'veterinarian' => $this->faker->name,
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date
        ];
    }
}
