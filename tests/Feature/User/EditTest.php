<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can access the user edit page', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    $this->get(route('users.edit', $user))->assertRedirect('login');
});

it('should be able to a admin access the edit user page with a user to edit', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    $this->actingAs($admin);
    $this->get(route('users.edit', $user))->assertSuccessful();
    $this->get(route('users.edit', 3))->assertNotFound();
});

it('should be able to a manager access the edit user page with a user to edit', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create();

    $this->actingAs($manager);
    $this->get(route('users.edit', $user))->assertSuccessful();
    $this->get(route('users.edit', 3))->assertNotFound();
});

it('should not be able to a manager edit the role of a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create(['role_id' => Role::USER]);

    $this->actingAs($manager);

    $this->get(route('users.edit', $user))->assertDontSee('Tipo de usuário');
});

it('should not be able to a user acess the edir user page', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    $this->actingAs($user);

    $this->get(route('users.edit', $user))->assertForbidden();
});
