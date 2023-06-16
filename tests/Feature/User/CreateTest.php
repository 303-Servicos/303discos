<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, assertDatabaseMissing, get, post};

test('only authenticated users can access the user create page', function () {
    get(route('users.create'))->assertRedirect('login');
});

it('should be able to a admin access the user create page', function () {
    $this->seed();
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);
    get(route('users.create'))->assertSuccessful();
});

it('should not be able to a user access the user create page', function () {
    $this->seed();
    $user = User::factory()->create(['role_id' => Role::USER]);

    actingAs($user);

    get(route('users.create'))->assertForbidden();
});
