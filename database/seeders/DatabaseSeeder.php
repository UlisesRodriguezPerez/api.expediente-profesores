<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TrainingTypeSeeder::class,
            PositionSeeder::class,
            ActivityTypeSeeder::class,
            TecCategorySeeder::class,
            CampusSeeder::class,
            AcademicDegreeSeeder::class,
            AppointmentTypeSeeder::class,
            PublicationTypeSeeder::class,
            RoleSeeder::class,
            CollaboratorSeeder::class,
            PeriodSeeder::class,
            ActivitySeeder::class,
            PublicationSeeder::class,
            InternationalizationSeeder::class,
            StudentSeeder::class,
            TechnicalTrainingSeeder::class,
            RoleUserSeeder::class,
            PedagogicalTrainingSeeder::class,
            WorkUnitAndAdditionalCourseSeeder::class,
            WorkloadSeeder::class,

            ActivityFormationTrainingSeeder::class,
            ActivityGeneralSeeder::class,
            CollaboratorActivitiesSeeder::class,
            CourseSeeder::class,
            CollaboratorCoursePeriodSeeder::class,

        ]);
    }
}
