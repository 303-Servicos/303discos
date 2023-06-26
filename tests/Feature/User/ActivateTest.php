<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can activate a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    $this->patch(route('users.activate', $user))->assertRedirect('login');
});

it('should be able to a admin activate a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User', 'deleted_at' => now()]);

    $this->actingAs($admin);

    $this->patch(route('users.activate', $user))
        ->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertNotSoftDeleted('users', ['id' => $user->id]);
});

it('should be able to a manager activate a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create(['name' => 'Test User', 'deleted_at' => now()]);

    $this->actingAs($manager);

    $this->patch(route('users.activate', $user))->assertRedirect(route('users.index'));

    $user->refresh();

    $this->assertDatabaseMissing('users', [
        'name'      => 'Test User',
        'is_active' => false,
    ]);
});

it('should not be able to a user activate another user', function () {
    $this->seed(RoleSeeder::class);
    $user  = User::factory()->create();
    $user2 = User::factory()->create();

    $this->actingAs($user);
    $this->patch(route('users.activate', $user2))->assertForbidden();
});
