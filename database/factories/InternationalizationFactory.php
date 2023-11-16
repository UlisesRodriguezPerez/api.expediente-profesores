<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Internationalization;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternationalizationFactory extends Factory
{
    protected $model = Internationalization::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'activity_type_id' => ActivityType::inRandomOrder()->first()->id,
            'university_name' => $this->faker->company,
            'country' => $this->faker->country,
        ];
    }
}
