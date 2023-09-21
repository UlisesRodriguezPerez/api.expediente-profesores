<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodFactory extends Factory
{
    protected $model = Period::class;

    public function definition()
    {
        return [
            'creator_id' => Collaborator::inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'observations' => $this->faker->sentence,
        ];
    }
}
