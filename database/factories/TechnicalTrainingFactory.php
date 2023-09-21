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
            'training_type_id' => TrainingType::inRandomOrder()->first()->id,
            'activity_id' => Activity::inRandomOrder()->first()->id,
            'institution_name' => $this->faker->company,
            'semester_hours' => $this->faker->numberBetween(10, 100),
        ];
    }
}
