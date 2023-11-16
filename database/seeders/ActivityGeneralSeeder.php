<?php

namespace Database\Seeders;

use App\Models\ActivityGeneral;
use Illuminate\Database\Seeder;

class ActivityGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityGeneral::factory(5)->create(); // Crea 5 internacionalizaciones
    }
}
