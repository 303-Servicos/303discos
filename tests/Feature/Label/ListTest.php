<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

test('only authenticated users can access the label list', function () {
    $this->get(route('labels.index'))->assertRedirect('login');
});

//it('should be able to a admin access the user list page', function () {
//    $this->seed(RoleSeeder::class);
//    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
//
//    $this->actingAs($admin);
//    $this->get(route('users.index'))->assertSuccessful();
//});

//it('should be able to a manager access the user list page', function () {
//    $this->seed(RoleSeeder::class);
//    $manager = User::factory()->create(['role_id' => Role::MANAGER]);
//
//    $this->actingAs($manager);
//    $this->get(route('users.index'))->assertSuccessful();
//});
//
//it('should not be able to a user access the user list page', function () {
//    $this->seed(RoleSeeder::class);
//    $user = User::factory()->create(['role_id' => Role::USER]);
//
//    $this->actingAs($user);
//    $this->get(route('users.index'))->assertForbidden();
//});
//
//test('test user list returns paginated data correctly', function () {
//    $this->seed(RoleSeeder::class);
//    $pagination    = 10;
//    $usersToCreate = $pagination + 1;
//    $users         = User::factory($usersToCreate)->create();
//    $admin         = User::factory()->create(['role_id' => Role::ADMIN]);
//
//    $this->actingAs($admin);
//    $response = $this->get(route('users.index'));
//
//    for ($i = 0; $i < $pagination; $i++) {
//        $response->assertSee($users[$i]->name);
//    }
//    $response->assertDontSee($users[$pagination]->name);
//});
//
//it('should not be able to a manager see the create button', function () {
//    $this->seed(RoleSeeder::class);
//    $user = User::factory()->create(['role_id' => Role::MANAGER]);
//
//    $this->actingAs($user);
//    $this->get(route('users.index'))->assertDontSee('Criar novo usuário');
//});
//
//it('should not be able to a user see the create button', function () {
//    $this->seed(RoleSeeder::class);
//    $user = User::factory()->create();
//
//    $this->actingAs($user);
//    $this->get(route('users.index'))->assertDontSee('Criar novo usuário');
//});
