<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can inactivate a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    $this->put(route('users.inactivate', $user))->assertRedirect('login');
});

it('should be able to a admin ianctivate a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User']);

    $this->actingAs($admin);

    $this->put(route('users.inactivate', $user))
        ->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertSoftDeleted('users', ['id' => $user->id]);
});

it('should be able to a manager inactivate a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create(['name' => 'Test User']);

    $this->actingAs($manager);

    $this->put(route('users.inactivate', $user))->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertSoftDeleted('users', ['id' => $user->id]);
});

it('should not be able to a user inactivate another user', function () {
    $this->seed(RoleSeeder::class);
    $user  = User::factory()->create();
    $user2 = User::factory()->create();

    $this->actingAs($user);
    $this->put(route('users.inactivate', $user2))->assertForbidden();
});
