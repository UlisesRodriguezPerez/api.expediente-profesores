<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // call RoleSeeder 
        $this->call(RoleSeeder::class);
        // call UserSeeder
        $this->call(UserSeeder::class);
        // call RoleUserSeeder
        $this->call(RoleUserSeeder::class);
    }
}
