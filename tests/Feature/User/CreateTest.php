<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, assertDatabaseMissing, get, post};

it('should be able to render the user create page', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);

    get(route('users.create'))->assertOk();
});

it('should be able to a admin create a user', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);

    post(route('users.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect();

    assertDatabaseCount('users', 3);
    assertDatabaseHas('users', [
        'name'    => 'Test User',
        'role_id' => 2,
    ]);
});

it('should not be able to a user create another user', function () {
    $this->seed();

    $user = User::factory()->create();

    actingAs($user);

    $request = post(route('users.store'), [
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

test('only authenticated users can create a new question', function () {
    post(route('users.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect('login');
});
