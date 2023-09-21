<?php

namespace Database\Factories;

use App\Models\TrainingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingTypeFactory extends Factory
{
    protected $model = TrainingType::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique->word,
            'description' => $this->faker->sentence,
        ];
    }
}
