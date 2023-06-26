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
    $admin   = User::factory()->create(['role_id' => Role::ADMIN]);
    $label1  = Label::factory()->create(['name' => 'Name Label A']);
    $label2  = Label::factory()->create(['name' => 'Name Label B']);
    $label3  = Label::factory()->create(['name' => 'Name Label C']);
    $label4  = Label::factory()->create(['name' => 'Name Label D']);
    $label5  = Label::factory()->create(['name' => 'Name Label E']);
    $label6  = Label::factory()->create(['name' => 'Name Label F']);
    $label7  = Label::factory()->create(['name' => 'Name Label G']);
    $label8  = Label::factory()->create(['name' => 'Name Label H']);
    $label9  = Label::factory()->create(['name' => 'Name Label I']);
    $label10 = Label::factory()->create(['name' => 'Name Label J']);
    $label11 = Label::factory()->create(['name' => 'Name Label Z']);

    actingAs($admin);
    $response = get(route('labels.index'));

    $response->assertSee($label1->name);
    $response->assertSee($label2->name);
    $response->assertSee($label3->name);
    $response->assertSee($label4->name);
    $response->assertSee($label5->name);
    $response->assertSee($label6->name);
    $response->assertSee($label7->name);
    $response->assertSee($label8->name);
    $response->assertSee($label9->name);
    $response->assertSee($label10->name);
    $response->assertDontSee($label11->name);
});

it('should not be able to a user see the create button', function () {
    seed(RoleSeeder::class);
    $user = User::factory()->create();

    actingAs($user);
    get(route('labels.index'))->assertDontSee('Criar novo selo');
});
