<?php

namespace Database\Seeders;

use App\Models\Veterinarian;
use App\Models\Animal;
use Illuminate\Database\Seeder;

class VeterinarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veterinarian::factory()
            ->times(3)
            ->create();

        foreach (Animal::all() as $animal) {
            $veterinarians = Veterinarian::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $animal->veterinarians()->attach($veterinarians);
        }
    }
}
