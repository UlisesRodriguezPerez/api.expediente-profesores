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
            'name' => $this->faker->word(),
            'institution_name' => $this->faker->company,
        ];        
    }
}
