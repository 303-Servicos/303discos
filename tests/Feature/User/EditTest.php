<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post};

test('only authenticated users can access the user edit page', function () {
    $this->seed();
    $user = User::factory()->create();

    get(route('users.edit', $user))->assertRedirect('login');
});

it('should be able to a admin render the edit user page with a user to edit', function () {
    $this->seed();
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    actingAs($admin);

    get(route('users.edit', $user))->assertSuccessful();

});

it('should not be able to a user render the edit user page', function () {
    $this->seed();
    $user = User::factory()->create(['role_id' => Role::USER]);

    actingAs($user);
    get(route('users.edit', $user))->assertForbidden();
});
