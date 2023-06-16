<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseMissing, delete};

it('should be able to a admin destroy a user', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    actingAs($admin);

    delete(route('users.destroy', $user))->assertRedirect(route('users.index'));

    assertDatabaseMissing('users', [
        'id' => $user->id,
    ]);
});

it('should be able to only admin destroy a user', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['role_id' => Role::USER]);
    $user2 = User::factory()->create(['role_id' => Role::USER]);

    actingAs($admin);
    delete(route('users.destroy', $user))->assertRedirect(route('users.index'));

    actingAs($user);
    delete(route('users.destroy', $user2))->assertForbidden();
});
