<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, assertDatabaseMissing, post};

it('should be able to a admin create a user', function () {
    $this->seed();

    $admin = User::find(1);

    actingAs($admin);

    post(route('user.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect();

    assertDatabaseCount('users', 2);
    assertDatabaseHas('users', [
        'name'    => 'Test User',
        'role_id' => 2,
    ]);
});

it('should not be able to a user create another user', function () {
    $this->seed();

    $user = User::factory()->create();

    actingAs($user);

    $request = post(route('user.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ]);

    $request->assertForbidden();

    assertDatabaseCount('users', 2);
    assertDatabaseMissing('users', [
        'name'    => 'Test User',
        'role_id' => 1,
    ]);
});
