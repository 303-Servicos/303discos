<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get};

test('only authenticated users can access the user clist', function () {
    get(route('users.index'))->assertRedirect('login');
});

it('should render the user list page', function () {
    $this->seed(RoleSeeder::class);
    $user = User::factory()->create();

    actingAs($user);
    get(route('users.index'))->assertSuccessful();
});

test('test user list returns paginated data correctly', function () {
    $this->seed(RoleSeeder::class);

    $pagination   = config('app.pagination_per_page');
    $userToCreate = $pagination + 2;
    $users        = User::factory()->count($userToCreate)->create();
    $user         = User::find(1);

    actingAs($user);
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
