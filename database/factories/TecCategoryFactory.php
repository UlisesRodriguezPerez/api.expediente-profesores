<?php

namespace Database\Factories;

use App\Models\TecCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TecCategoryFactory extends Factory
{
    protected $model = TecCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(2),
            'description' => $this->faker->sentence,
        ];
    }
}
