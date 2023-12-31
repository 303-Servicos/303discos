<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Gerente']);
        Role::create(['name' => 'Usuário']);
    }
}
