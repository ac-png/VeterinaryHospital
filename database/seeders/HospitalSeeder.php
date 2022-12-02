<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creates 2 new hospitals (using the fake data).
        Hospital::factory()
            ->times(3)
            ->hasBooks(4)
            ->create();
    }
}
