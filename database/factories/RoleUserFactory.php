<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    protected $model = RoleUser::class;

    public function definition()
    {
        return [
            'role_id' => null,  // Se proporcionará en el seeder
            'user_id' => null,  // Se proporcionará en el seeder
        ];
    }

}
