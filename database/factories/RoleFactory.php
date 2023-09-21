<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    // protected $model = Role::class;

    public function definition()
    {
        return [
            // Select name from 'admin' or 'user' randomly but unique only need 2 roles
            // 'name' => $this->faker->unique()->randomElement(['admin', 'user']),
            // 'description' => $this->faker->sentence(),
        ];
    }
}
