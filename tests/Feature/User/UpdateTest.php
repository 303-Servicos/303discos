<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post, put};

test('only authenticated users can update a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    put(route('users.update', $user))->assertRedirect('login');
});

it('should be able to a admin update a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User']);

    actingAs($admin);

    put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertRedirect(route('users.index'));

    $user->refresh();

    assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => 1,
    ]);

    assertDatabaseHas('users', [
        'name' => 'New Name',
    ]);

});

it('should be able to a manager update a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create(['name' => 'Test User']);

    actingAs($manager);

    put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertRedirect(route('users.index'));

    $user->refresh();

    assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => 1,
    ]);

    assertDatabaseHas('users', [
        'name' => 'New Name',
    ]);

});

it('should not be able to a user upgradre a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    actingAs($user);

    put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => 'email@teste.com',
    ])->assertForbidden();
});
