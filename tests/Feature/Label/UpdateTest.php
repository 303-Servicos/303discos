<?php

use App\Models\{Label, Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, put, seed};

test('only authenticated users can update a label', function () {
    $label = Label::factory()->create();

    put(route('labels.update', $label))->assertRedirect('login');
});

it('should be able to a admin update a label', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $label = Label::factory()->create(['name' => 'Test Label']);

    actingAs($admin);

    put(route('labels.update', $label), [
        'name' => 'New Label Name',
    ])->assertRedirect(route('labels.index'));

    $label->refresh();

    assertDatabaseMissing('labels', [
        'name' => 'Test Label',
    ]);

    assertDatabaseHas('labels', [
        'name' => 'New Label Name',
    ]);
});

it('should be able to a manager update a user', function () {
    seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
    $label   = Label::factory()->create(['name' => 'Test Label']);

    actingAs($manager);

    put(route('labels.update', $label), [
        'name' => 'New Label Name',
    ])->assertRedirect(route('labels.index'));

    $label->refresh();

    assertDatabaseMissing('labels', [
        'name' => 'Test Label',
    ]);

    assertDatabaseHas('labels', [
        'name' => 'New Label Name',
    ]);
});

//it('should not be able to a user upgradre a user', function () {
//    seed(RoleSeeder::class);
//    $user = User::factory()->create(['role_id' => Role::USER]);
//
//    actingAs($user);
//
//    put(route('users.update', $user), [
//        'name'  => 'New Name',
//        'email' => 'email@teste.com',
//    ])->assertForbidden();
//});
