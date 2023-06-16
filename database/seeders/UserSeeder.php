<?php

namespace Database\Seeders;

use App\Models\{Role, User};
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Chochi',
            'email'    => 'chochi@303discos.com.br',
            'password' => bcrypt('chochi'),
            'role_id'  => Role::ADMIN,
        ]);

        User::factory()->create([
            'name'     => 'Tiago',
            'email'    => 'tiago@303discos.com.br',
            'password' => bcrypt('chochi'),
            'role_id'  => Role::MANAGER,
        ]);

        User::factory()->create([
            'name'     => 'User Test',
            'email'    => 'user@303discos.com.br',
            'password' => bcrypt('chochi'),
            'role_id'  => Role::USER,
        ]);

        User::factory()->count(10)->create(['is_active' => false]);
    }
}
