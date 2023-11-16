<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\TechnicalTraining;
use App\Models\TrainingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnicalTrainingFactory extends Factory
{
    protected $model = TechnicalTraining::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'training_type_id' => TrainingType::inRandomOrder()->first()->id,
        ];
    }
}
