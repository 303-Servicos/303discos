<?php

use App\Models\{Role, User};

use function Pest\Laravel\{actingAs, get};

it('should render the user list page', function () {
    $this->seed();

    $user = User::factory()->create();

    actingAs($user);

    get(route('users.index'))->assertOk();
});

it('should list all the users', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $users = User::factory()->count(5)->create();

    actingAs($admin);

    $response = get(route('users.index'));

    foreach ($users as $user) {
        $response->assertSee($user->name);
    }
});

it('should only show the edit and create buttons if the logged user is a admin', function () {
    $this->seed();

    $admin = User::factory()->create(['role_id' => Role::ADMIN]);
    $user  = User::factory()->create();

    actingAs($admin);

    $response = get(route('users.index'));

    $response->assertSee('Editar');
    $response->assertSee('Criar novo usuário');

    actingAs($user);

    $response = get(route('users.index'));

    $response->assertDontSee('Editar');
    $response->assertDontSee('Criar novo usuário');
});
