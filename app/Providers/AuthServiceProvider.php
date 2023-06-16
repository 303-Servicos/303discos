<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('activate-user', fn ($user, $model) => in_array($user->role_id, [Role::ADMIN, Role::MANAGER]));
        Gate::define('inactivate-user', fn ($user, $model) => in_array($user->role_id, [Role::ADMIN, Role::MANAGER]) && $model->id != $user->id && $model->role_id != Role::ADMIN);
        Gate::define('update-user-role', fn ($user, $model) => $user->role_id == Role::ADMIN && $model->id != $user->id);
    }
}
