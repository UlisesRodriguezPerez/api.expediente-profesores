<?php

namespace Database\Factories;

use App\Models\Campus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampusFactory extends Factory
{
    protected $model = Campus::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->city,
            'description' => $this->faker->sentence,
            'acronym' => $this->faker->unique()->bothify('##??'),
        ];
    }
}
