<?php

namespace Database\Seeders;

use App\Models\ActivityFormationTraining;
use App\Models\ActivityGeneral;
use App\Models\Collaborator;
use App\Models\Internationalization;
use App\Models\PedagogicalTraining;
use App\Models\TechnicalTraining;
use Illuminate\Database\Seeder;

class CollaboratorActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear algunos colaboradores
        $collaborators = Collaborator::all();

        $collaborators->each(function ($collaborator) {
            // Asignar actividades generales
            $activitiesGeneral = ActivityGeneral::factory()->count(2)->create();
            foreach ($activitiesGeneral as $activity) {
                $collaborator->activityGenerals()->attach($activity->id, [
                    'activitable_type' => ActivityGeneral::class,
                    'period_id' => rand(1, 5) // Asegúrate de que este ID de periodo exista
                ]);
            }

            // Asignar actividades de formación
            $activitiesFormation = ActivityFormationTraining::factory()->count(2)->create();
            foreach ($activitiesFormation as $activity) {
                $collaborator->activityFormationTrainings()->attach($activity->id, [
                    'activitable_type' => ActivityFormationTraining::class,
                    'period_id' => rand(1, 5) // Asegúrate de que este ID de periodo exista
                ]);
            }

            // Asignar actividades de internacionalizaicon
            $activitiesInternationalization = Internationalization::factory()->count(2)->create();
            foreach ($activitiesInternationalization as $activity) {
                $collaborator->internationalizations()->attach($activity->id, [
                    'activitable_type' => Internationalization::class,
                    'period_id' => rand(1, 5) // Asegúrate de que este ID de periodo exista
                ]);
            }

            // Asignar actividades de PedagogicalTrainings
            $activitiesPedagogicalTrainings = PedagogicalTraining::factory()->count(2)->create();
            foreach ($activitiesPedagogicalTrainings as $activity) {
                $collaborator->pedagogicalTrainings()->attach($activity->id, [
                    'activitable_type' => PedagogicalTraining::class,
                    'period_id' => rand(1, 5) // Asegúrate de que este ID de periodo exista
                ]);
            }

            // Asignar actividades de TechnicalTrainings
            $activitiesTechnicalTrainings = TechnicalTraining::factory()->count(2)->create();
            foreach ($activitiesTechnicalTrainings as $activity) {
                $collaborator->technicalTrainings()->attach($activity->id, [
                    'activitable_type' => TechnicalTraining::class,
                    'period_id' => rand(1, 5) // Asegúrate de que este ID de periodo exista
                ]);
            }
        });
    }
}
