<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\put;

test('only authenticated users can inactivate a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    put(route('users.inactivate', $user))->assertRedirect('login');
});
