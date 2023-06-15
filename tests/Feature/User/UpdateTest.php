<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post};

it('should be able to a admin update a user', function () {
    $this->seed();

    $admin = User::find(1);
    $user  = User::factory()->create(['name' => 'Test User']);

    actingAs($admin);

    post(route('users.update', $user), [
        'name'    => 'New Name',
        'email'   => $user->email,
        'role_id' => 1,
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
