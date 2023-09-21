<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Collaborator;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition()
    {
        return [
            // Elegir un Period al azar de los existentes en la base de datos
            'period_id' => Period::inRandomOrder()->first()->id,

            // Elegir un Collaborator al azar para 'creator_id' y 'involved_id'
            'creator_id' => Collaborator::inRandomOrder()->first()->id,
            'involved_id' => Collaborator::inRandomOrder()->first()->id,

            'name' => $this->faker->sentence(3),
        ];
    }
}
