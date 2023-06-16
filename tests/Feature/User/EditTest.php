<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post};

it('should be able to render the edit user page with a user to edit', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    actingAs($admin);

    get(route('users.edit', $user))->assertSuccessful();

});

it('should be able to only admin access the edit user page', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['role_id' => Role::USER]);

    actingAs($admin);
    get(route('users.edit', $user))->assertSuccessful();

    actingAs($user);
    get(route('users.edit', $user))->assertForbidden();

});
