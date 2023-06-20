<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseMissing, assertSoftDeleted, delete, post};

test('only authenticated users can access delete', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    delete(route('users.destroy', $user))->assertRedirect('login');
});

it('should be able to a admin destroy a user', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    $this->actingAs($admin);

    $this->delete(route('users.destroy', $user))->assertRedirect(route('users.index'));
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});

it('should not be able to a manager destroy a user', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $user    = User::factory()->create();

    $this->actingAs($manager);
    $this->delete(route('users.destroy', $user))->assertForbidden();
});

it('should not be able to a user destroy a user', function () {
    $this->seed(RoleSeeder::class);
    $user  = User::factory()->create(['role_id' => Role::USER]);
    $user2 = User::factory()->create(['role_id' => Role::USER]);

    $this->actingAs($user);
    $this->delete(route('users.destroy', $user2))->assertForbidden();
});
