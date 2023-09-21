<?php

namespace Database\Seeders;

use App\Models\WorkUnitAndAdditionalCourse;
use Illuminate\Database\Seeder;

class WorkUnitAndAdditionalCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkUnitAndAdditionalCourse::factory(5)->create(); // Crea 5 unidades de trabajo y cursos adicionales
    }
}
