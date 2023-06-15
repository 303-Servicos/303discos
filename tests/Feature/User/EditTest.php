<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post};

it('should be able to render the edit user page', function () {
    $this->seed();

    $admin = User::find(1);
    $user  = User::factory()->create();

    actingAs($admin);

    get(route('users.edit', $user))->assertOk();

});
