<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creates 20 new animals (using the fake data).
        Animal::factory()->times(20)->create();
    }
}
