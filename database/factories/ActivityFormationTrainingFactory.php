<?php

namespace Database\Factories;

use App\Models\ActivityFormationTraining;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFormationTrainingFactory extends Factory
{
    protected $model = ActivityFormationTraining::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'university' => $this->faker->word(),
            'academic_degree' => $this->faker->word(),
            'start_year' => $this->faker->year(),
            'end_year' => $this->faker->year(),
        ];
    }
}
