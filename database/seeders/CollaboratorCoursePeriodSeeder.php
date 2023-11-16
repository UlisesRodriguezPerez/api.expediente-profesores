<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Course;
use App\Models\Period;
use Illuminate\Database\Seeder;

class CollaboratorCoursePeriodSeeder extends Seeder
{
    public function run()
    {
        // Obtiene todos los colaboradores, cursos y periodos
        $collaborators = Collaborator::all();
        $courses = Course::all();
        $periods = Period::all();

        // Asigna cada colaborador a cursos y periodos aleatorios
        $collaborators->each(function ($collaborator) use ($courses, $periods) {
            $selectedCourse = $courses->random();
            $selectedPeriod = $periods->random();

            // Verifica si la combinación ya existe para evitar duplicados
            if (!$collaborator->courses()->where('course_id', $selectedCourse->id)->wherePivot('period_id', $selectedPeriod->id)->exists()) {
                $collaborator->courses()->attach($selectedCourse->id, ['period_id' => $selectedPeriod->id]);
            }
        });
    }
}
