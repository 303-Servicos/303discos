<?php

use App\Models\{Role, User};
use Database\Seeders\RoleSeeder;

use function Pest\Laravel\{actingAs, get};

it('should render the user list page', function () {
    $this->seed();

    $user = User::factory()->create();

    actingAs($user);

    get(route('users.index'))->assertSuccessful();
});

it('should list all the users', function () {
    $this->seed(RoleSeeder::class);

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $users = User::factory()->count(5)->create();

    actingAs($admin);
    $response = get(route('users.index'));

    foreach ($users as $user) {
        $response->assertSee($user->name);
    }
});

it('should not be able to a user see the edit and create buttons', function () {
    $this->seed();
    $user = User::factory()->create();

    actingAs($user);
    $response = get(route('users.index'));

    $response->assertDontSee('Editar');
    $response->assertDontSee('Criar novo usuário');
});
