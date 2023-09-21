<?php

namespace Database\Factories;

use App\Models\Publication;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'publication_id' => Publication::inRandomOrder()->first()->id,
            'full_name' => $this->faker->name,
            'postgraduate_scholarship' => $this->faker->boolean,
            'TFG' => $this->faker->boolean,
        ];
    }
}
