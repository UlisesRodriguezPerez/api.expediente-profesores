<?php

namespace Database\Factories;

use App\Models\AcademicDegree;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicDegreeFactory extends Factory
{
    protected $model = AcademicDegree::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(2),
            'description' => $this->faker->sentence,
        ];
    }
}
