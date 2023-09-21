<?php

namespace Database\Factories;

use App\Models\AcademicDegree;
use App\Models\AppointmentType;
use App\Models\Campus;
use App\Models\Collaborator;
use App\Models\Position;
use App\Models\TecCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollaboratorFactory extends Factory
{
    protected $model = Collaborator::class;

    public function definition()
    {
        return [
            'position_id' => Position::inRandomOrder()->first()->id,
            'category_id' => TecCategory::inRandomOrder()->first()->id,
            'appointment_id' => AppointmentType::inRandomOrder()->first()->id,
            'degree_id' => AcademicDegree::inRandomOrder()->first()->id,
            'campus_id' => Campus::inRandomOrder()->first()->id,
        ];
    }
}
