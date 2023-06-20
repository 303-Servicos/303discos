<?php

namespace App\Policies;

use App\Models\{Role, User};

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role_id, [Role::ADMIN, Role::MANAGER]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id == Role::ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return in_array($user->role_id, [Role::ADMIN, Role::MANAGER]) && $model->role_id != Role::ADMIN && $model->deleted_at == null;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return in_array($user->role_id, [Role::ADMIN, Role::MANAGER]) && $model->id != $user->id && $model->deleted_at == null && $model->role_id != Role::ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return in_array($user->role_id, [Role::ADMIN, Role::MANAGER]) && $model->deleted_at != null && $model->role_id != Role::ADMIN;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role_id == Role::ADMIN && $model->id != $user->id;
    }
}
