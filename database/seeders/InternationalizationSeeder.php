<?php

namespace Database\Seeders;

use App\Models\Internationalization;
use Illuminate\Database\Seeder;

class InternationalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Internationalization::factory(5)->create(); // Crea 5 internacionalizaciones
    }
}
