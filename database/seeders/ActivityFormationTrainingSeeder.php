<?php

namespace Database\Seeders;

use App\Models\ActivityFormationTraining;
use Illuminate\Database\Seeder;

class ActivityFormationTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityFormationTraining::factory(5)->create(); // Crea 5 internacionalizaciones
    }
}
