<?php

namespace Database\Seeders;

use App\Models\TecCategory;
use Illuminate\Database\Seeder;

class TecCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecCategory::factory(5)->create(); // Crea 5 categorias de tecnica
    }
}
