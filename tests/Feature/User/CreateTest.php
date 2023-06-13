<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to a admin create a user', function () {
    $this->seed();

    $admin = User::find(1);
    $user  = User::factory()->create();

    actingAs($admin);

    post(route('user.store'), [
        'name'                  => 'Test Admin',
        'email'                 => 'admin@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::ADMIN,
    ])->assertRedirect();

    post(route('user.store'), [
        'name'                  => 'Test User',
        'email'                 => 'user@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect();

    actingAs($user);

    $request = post(route('user.store'), [
        'name'                  => 'Test User 2',
        'email'                 => 'user2@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ]);

    $request->assertForbidden();

    assertDatabaseCount('users', 4);
    assertDatabaseHas('users', [
        'name'    => 'Test Admin',
        'role_id' => 1,
    ]);
    assertDatabaseHas('users', [
        'name'    => 'Test User',
        'role_id' => 2,
    ]);
});
