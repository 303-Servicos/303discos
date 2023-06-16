<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post, put};

test('only authenticated users can update a user', function () {
    $this->seed();
    $user = User::factory()->create();

    put(route('users.update', $user))->assertRedirect('login');
});

it('should be able to a admin update a user', function () {
    $this->seed();

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

it('should not be able to only admin update a user', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['role_id' => Role::USER]);

    actingAs($admin);

    put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertRedirect(route('users.index'));

    actingAs($user);
    put(route('users.update', $user), [
        'name'  => 'New Name',
        'email' => $user->email,
    ])->assertForbidden();

});
