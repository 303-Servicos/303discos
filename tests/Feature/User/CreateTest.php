<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can access the user create page', function () {
    $this->get(route('users.create'))->assertRedirect('login');
});

it('should be able to a admin access the user create page', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    $this->actingAs($admin);
    $this->get(route('users.create'))->assertSuccessful();
});

it('should not be able to a manager access the user create page', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);

    $this->actingAs($manager);
    $this->get(route('users.create'))->assertForbidden();
});

it('should not be able to a user access the user create page', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    $this->actingAs($user);
    $this->get(route('users.create'))->assertForbidden();
});
