<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can update a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    $this->put(route('users.update', $user))->assertRedirect('login');
});

it('should be able to a admin update a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User']);

    $this->actingAs($admin);

    $this->put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => 1,
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'New Name',
    ]);

});

it('should be able to a manager update a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create(['name' => 'Test User']);

    $this->actingAs($manager);

    $this->put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => 1,
    ]);

    $this->assertDatabaseHas('users', [
        'name' => 'New Name',
    ]);
});

it('should not be able to a user upgrade a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    $this->actingAs($user);

    $this->put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => 'email@teste.com',
    ])->assertForbidden();
});
