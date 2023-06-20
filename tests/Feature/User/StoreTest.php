<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can create a new user', function () {
    $this->post(route('users.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect('login');
});

it('should be able to a admin create a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    $this->actingAs($admin);

    $this->post(route('users.store'), [
        '_token'                => csrf_token(),
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect();

    $this->assertDatabaseHas('users', [
        'name'    => 'Test User',
        'role_id' => Role::USER,
    ]);
});

it('should not be able to a manage create a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);

    $this->actingAs($manager);

    $request = $this->post(route('users.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ]);

    $request->assertForbidden();

    $this->assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => Role::USER,
    ]);
});

it('should not be able to a user create a user', function () {
    $this->seed(RoleSeeder::class);

    $user = User::factory()->create();

    $this->actingAs($user);

    $request = $this->post(route('users.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ]);

    $request->assertForbidden();

    $this->assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => Role::USER,
    ]);
});
