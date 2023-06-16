<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseMissing, put};

test('only authenticated users can inactivate a user', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    put(route('users.inactivate', $user))->assertRedirect('login');
});

it('should be able to a admin ianctivate a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create(['name' => 'Test User']);

    actingAs($admin);

    put(route('users.inactivate', $user))
        ->assertRedirect(route('users.index'));

    $user->refresh();

    assertDatabaseMissing('users', [
        'name'      => 'Test User',
        'is_active' => true,
    ]);
});
