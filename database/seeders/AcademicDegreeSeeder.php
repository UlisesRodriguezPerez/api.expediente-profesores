<?php

namespace Database\Seeders;

use App\Models\AcademicDegree;
use Illuminate\Database\Seeder;

class AcademicDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicDegree::factory(5)->create(); // Crea 5 grados academicos
    }
}
