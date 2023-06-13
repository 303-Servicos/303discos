<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, get};

it('should list all the users', function () {
    $this->seed();

    $admin = User::find(1);
    $users = User::factory()->count(5)->create();

    actingAs($admin);

    $response = get(route('users.index'));

    foreach ($users as $user) {
        $response->assertSee($user->name);
    }
});

it('should only show the edit and create buttons if the logged user is a admin', function () {
    $this->seed();

    $admin = User::find(1);
    $user  = User::factory()->create();

    actingAs($admin);

    $response = get(route('users.index'));

    $response->assertSee('Editar');
    $response->assertSee('Criar');

    actingAs($user);

    $response = get(route('users.index'));

    $response->assertDontSee('Editar');
    $response->assertDontSee('Criar');
});
