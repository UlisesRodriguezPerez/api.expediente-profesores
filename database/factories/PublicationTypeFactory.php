<?php

namespace Database\Factories;

use App\Models\PublicationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationTypeFactory extends Factory
{
    protected $model = PublicationType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(2),
            'description' => $this->faker->sentence,
        ];
    }
}
