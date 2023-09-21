<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Period;
use App\Models\Workload;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkloadFactory extends Factory
{
    protected $model = Workload::class;

    public function definition()
    {
        return [
            'workload' => $this->faker->randomFloat(2, 0, 5), 
        ];
    }
}
