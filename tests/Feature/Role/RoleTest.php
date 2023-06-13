<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to a admin create a user', function () {
    $this->seed();

    $admin = User::find(1);

    actingAs($admin);

    User::create([
        'name'     => 'Test User',
        'email'    => 'test@example.com',
        'password' => 'password',
    ]);

    assertDatabaseCount('users', 2);

    assertDatabaseHas('users', [
        'name'    => 'Test User',
        'role_id' => 2,
    ]);
});

it('should be able to a admin create another admin', function () {
    $this->seed();

    $admin = User::find(1);

    actingAs($admin);

    User::create([
        'name'     => 'Test Admin',
        'email'    => 'test@example.com',
        'role_id'  => 1,
        'password' => 'password',
    ]);

    assertDatabaseCount('users', 2);

    assertDatabaseHas('users', [
        'name'    => 'Test Admin',
        'role_id' => 1,
    ]);
});
