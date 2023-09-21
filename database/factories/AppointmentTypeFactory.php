<?php

namespace Database\Factories;

use App\Models\AppointmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentTypeFactory extends Factory
{
    protected $model = AppointmentType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(2),
            'description' => $this->faker->sentence,
        ];
    } 
}
