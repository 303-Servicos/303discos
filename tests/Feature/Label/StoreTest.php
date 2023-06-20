<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, post, seed};

test('only authenticated users can create a new label', function () {
    post(route('labels.store'), [
        'name'                  => 'Test User',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
        'role_id'               => Role::USER,
    ])->assertRedirect('login');
});

it('should be able to a admin create a label', function () {
    seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);

    post(route('labels.store'), [
        'name'    => 'Test Label',
        'discogs' => 'www.discogs.com',
    ])->assertRedirect();

    assertDatabaseHas('labels', [
        'name' => 'Test Label',
    ]);
});

//it('should not be able to a manage create a label', function () {
//    seed(RoleSeeder::class);
//    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
//
//    actingAs($manager);
//
//    $request = post(route('labels.store'), [
//        'name'                  => 'Test User',
//        'email'                 => 'test@example.com',
//        'password'              => 'password',
//        'password_confirmation' => 'password',
//        'role_id'               => Role::USER,
//    ]);
//
//    $request->assertForbidden();
//
//    assertDatabaseMissing('labels', [
//        'name'    => 'Test User',
//        'role_id' => Role::USER,
//    ]);
//});

//it('should not be able to a label create a label', function () {
//    seed(RoleSeeder::class);
//
//    $label = User::factory()->create();
//
//    actingAs($label);
//
//    $request = post(route('labels.store'), [
//        'name'                  => 'Test User',
//        'email'                 => 'test@example.com',
//        'password'              => 'password',
//        'password_confirmation' => 'password',
//        'role_id'               => Role::USER,
//    ]);
//
//    $request->assertForbidden();
//
//    assertDatabaseMissing('labels', [
//        'name'    => 'Test User',
//        'role_id' => Role::USER,
//    ]);
//});
