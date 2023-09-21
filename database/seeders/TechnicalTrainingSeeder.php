<?php

namespace Database\Seeders;

use App\Models\TechnicalTraining;
use Illuminate\Database\Seeder;

class TechnicalTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TechnicalTraining::factory(5)->create(); // Crea 5 entrenamientos técnicos
    }
}
