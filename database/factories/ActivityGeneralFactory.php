<?php

namespace Database\Factories;

use App\Models\ActivityGeneral;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityGeneralFactory extends Factory
{
    protected $model = ActivityGeneral::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'hours' => $this->faker->numberBetween(1, 100),
        ];
    }
}
