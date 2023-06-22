<?php

use App\Models\{Label, Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get, seed};

test('only authenticated users can access the label edit page', function () {
    $label = Label::factory()->create();

    get(route('labels.edit', $label))->assertRedirect('login');
});

it('should be able to a admin access the edit label page with a label to edit', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $label = Label::factory()->create();

    actingAs($admin);

    get(route('labels.edit', $label))->assertSuccessful();
    get(route('labels.edit', 2))->assertNotFound();
});

it('should be able to a manager access the edit label page with a label to edit', function () {
    seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $label   = Label::factory()->create();

    actingAs($manager);

    get(route('labels.edit', $label))->assertSuccessful();
    get(route('labels.edit', 2))->assertNotFound();
});

it('should not be able to a user access the edit label page', function () {
    seed(RoleSeeder::class);
    $user  = User::factory()->create(['role_id' => Role::USER]);
    $label = Label::factory()->create();

    actingAs($user);

    get(route('labels.edit', $label))->assertForbidden();
});
