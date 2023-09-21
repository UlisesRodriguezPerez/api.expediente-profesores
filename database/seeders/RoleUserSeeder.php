<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $adminRoleId = Role::where('name', 'admin')->first()->id;
        $userRoleId = Role::where('name', 'user')->first()->id;

        $users = User::all();
        foreach ($users as $user) {
            // Algunos usuarios tendrán ambos roles, otros sólo 'user'
            $assignBothRoles = $faker->boolean(50);  // 50% de probabilidad

            if ($assignBothRoles) {
                RoleUser::factory()->create(['user_id' => $user->id, 'role_id' => $adminRoleId]);
                RoleUser::factory()->create(['user_id' => $user->id, 'role_id' => $userRoleId]);
            } else {
                RoleUser::factory()->create(['user_id' => $user->id, 'role_id' => $userRoleId]);
            }
        }

    }
}
