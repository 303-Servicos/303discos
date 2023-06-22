<?php

use App\Models\{Label, Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get, seed};

test('only authenticated users can access the label info page', function () {
    $label = Label::factory()->create();

    get(route('labels.show', $label))->assertRedirect('login');
});

it('should be able to a admin access the label info page with a label', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $label = Label::factory()->create();

    actingAs($admin);

    get(route('labels.show', $label))->assertSuccessful();
    get(route('labels.show', 2))->assertNotFound();
});

it('should be able to a manager access the label info page with a label', function () {
    seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $label   = Label::factory()->create();

    actingAs($manager);

    get(route('labels.show', $label))->assertSuccessful();
    get(route('labels.show', 2))->assertNotFound();
});
