<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\Period;
use App\Models\Workload;
use Illuminate\Database\Seeder;

class WorkloadSeeder extends Seeder
{
    public function run()
    {
        $collaborators = Collaborator::all();
        $periods = Period::all();

        foreach ($collaborators as $collaborator) {
            foreach ($periods as $period) {
                Workload::factory()->create([
                    'collaborator_id' => $collaborator->id,
                    'period_id' => $period->id,
                ]);
            }
        }
    }
}
