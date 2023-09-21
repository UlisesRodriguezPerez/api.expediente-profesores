<?php

namespace Database\Seeders;

use App\Models\PedagogicalTraining;
use Illuminate\Database\Seeder;

class PedagogicalTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedagogicalTraining::factory(5)->create(); // Crea 5 entrenamientos pedagógicos
    }
}
