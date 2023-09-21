<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create user 
        $user = User::create([
            'name' => 'admin',
            'last_name' => 'test1',
            'second_last_name' => 'test2',
            'phone' => '1234567890',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        User::factory(50)->create(); 
    }
}
