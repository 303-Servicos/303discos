<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Role, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name'     => 'Chochi',
            'email'    => 'chochi@303discos.com.br',
            'password' => bcrypt('chochi'),
            'role_id'  => Role::ADMIN,
        ]);
    }
}
