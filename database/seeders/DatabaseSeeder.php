<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Role, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@303discos.com.br',
            'password' => bcrypt('chochi'),
            'role_id'  => Role::ADMIN,
        ]);
    }
}
