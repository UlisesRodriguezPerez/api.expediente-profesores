<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\WorkUnitAndAdditionalCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkUnitAndAdditionalCourseFactory extends Factory
{
    protected $model = WorkUnitAndAdditionalCourse::class;

    public function definition()
    {
        return [
            'collaborator_id' => Collaborator::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(),
        ];
    }
}
