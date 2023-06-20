<?php

namespace App\Policies;

use App\Models\{Label, User};
use Illuminate\Auth\Access\Response;

class LabelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    //    public function viewAny(User $user): bool
    //    {
    //        //
    //    }

    /**
     * Determine whether the user can view the model.
     */
    //    public function view(User $user, Label $label): bool
    //    {
    //        //
    //    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->isAdmin() || $user->isManager()
            ? Response::allow()
            : Response::deny('Você não pode criar um selo.');
    }

    /**
     * Determine whether the user can update the model.
     */
//    public function update(User $user, Label $label): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can delete the model.
     */
//    public function delete(User $user, Label $label): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Label $label): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Label $label): bool
//    {
//        //
//    }
}
