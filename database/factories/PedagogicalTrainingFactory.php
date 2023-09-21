<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\PedagogicalTraining;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedagogicalTrainingFactory extends Factory
{
    protected $model = PedagogicalTraining::class;

    public function definition()
    {
        return [
            'activity_id' => Activity::all()->random()->id ?? Activity::factory(),
            'institution_name' => $this->faker->company,
        ];        
    }
}
