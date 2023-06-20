<?php

namespace App\Policies;

use App\Models\{Label, User};
use Illuminate\Auth\Access\Response;

class LabelPolicy
{
    //    public function view(User $user, Label $label): bool
    //    {
    //        //
    //    }

    public function create(User $user): Response
    {
        return $user->isAdmin() || $user->isManager()
            ? Response::allow()
            : Response::deny('Você não pode criar um selo');
    }

//    public function update(User $user, Label $label): bool
//    {
//        //
//    }

//    public function delete(User $user, Label $label): bool
//    {
//        //
//    }

//    public function restore(User $user, Label $label): bool
//    {
//        //
//    }

//    public function forceDelete(User $user, Label $label): bool
//    {
//        //
//    }
}
