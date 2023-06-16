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

        User::factory()->count(12)->create();
    }
}
