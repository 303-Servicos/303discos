<?php

use App\Models\{Label, Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get, seed};

test('only authenticated users can access the label list', function () {
    get(route('labels.index'))->assertRedirect('login');
});

it('should be able to a admin access the user list page', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);
    get(route('users.index'))->assertSuccessful();
});

test('test label list returns paginated data correctly', function () {
    seed(RoleSeeder::class);
    $pagination     = 10;
    $labelsToCreate = $pagination + 1;
    $admin          = User::factory()->create(['role_id' => Role::ADMIN]);
    $labels         = Label::factory($labelsToCreate)->create();

    actingAs($admin);
    $response = get(route('labels.index'));

    for ($i = 0; $i < $pagination; $i++) {
        $response->assertSee($labels[$i]->name);
    }
    $response->assertDontSee($labels[$pagination]->name);
});

it('should not be able to a user see the create button', function () {
    seed(RoleSeeder::class);
    $user = User::factory()->create();

    actingAs($user);
    get(route('labels.index'))->assertDontSee('Criar novo selo');
});
