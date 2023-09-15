<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create role for admin
        $role = Role::create([
            'name' => 'admin',
            'description' => 'Admin',
        ]);
    }
}
