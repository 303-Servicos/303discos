<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get};

test('only authenticated users can access the user clist', function () {
    get(route('users.index'))->assertRedirect('login');
});

it('should be able to a admin access the user list page', function () {
    $this->seed(RoleSeeder::class);
    $admin = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);
    get(route('users.index'))->assertSuccessful();
});

it('should be able to a manager access the user list page', function () {
    $this->seed(RoleSeeder::class);
    $manager = User::factory()->create(['role_id' => Role::MANAGER]);

    actingAs($manager);
    get(route('users.index'))->assertSuccessful();
});

it('should not be able to a user access the user list page', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::USER]);

    actingAs($user);
    get(route('users.index'))->assertForbidden();
});

test('test user list returns paginated data correctly', function () {
    $this->seed(RoleSeeder::class);

    $pagination   = config('app.pagination_per_page');
    $userToCreate = $pagination + 1;
    $users        = User::factory()->count($userToCreate)->create();
    $admin        = User::factory()->create(['role_id' => Role::ADMIN]);

    actingAs($admin);
    $response = get(route('users.index'));

    for ($i = 0; $i < $pagination; $i++) {
        $response->assertSee($users[$i]->name);
    }
    $response->assertDontSee($users[$pagination]->name);
    $response->assertSee('Next');
});

it('should not be able to a manager see the create button', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create(['role_id' => Role::MANAGER]);

    actingAs($user);
    get(route('users.index'))->assertDontSee('Criar novo usuário');
});

it('should not be able to a user see the create button', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    actingAs($user);
    get(route('users.index'))->assertDontSee('Criar novo usuário');
});
