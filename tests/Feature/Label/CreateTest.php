<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get, seed};

test('only authenticated users can access the label create page', function () {
    get(route('labels.create'))->assertRedirect('login');
});

it('should be able to a admin access the label create page', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);
    get(route('labels.create'))->assertSuccessful();
});

it('should be able to a manager access the label create page', function () {
    seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);

    actingAs($manager);
    get(route('labels.create'))->assertSuccessful();
});

it('should not be able to a user access the label create page', function () {
    seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    actingAs($user);
    get(route('labels.create'))->assertForbidden();
});
