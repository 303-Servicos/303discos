<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseMissing, post, put};

it('should be able to a admin activate a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User', 'is_active' => false]);

    actingAs($admin);

    put(route('users.activate', $user))
        ->assertRedirect(route('users.index'));

    $user->refresh();

    assertDatabaseMissing('users', [
        'name'      => 'Test User',
        'is_active' => false,
    ]);
});
