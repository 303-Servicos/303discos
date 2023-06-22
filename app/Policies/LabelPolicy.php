<?php

namespace App\Policies;

use App\Models\{Label, User};

class LabelPolicy
{
    //    public function view(User $user, Label $label): bool
    //    {
    //        //
    //    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isManager();
    }

    public function update(User $user, Label $label): bool
    {
        return $user->isAdmin() || $user->isManager();
    }

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
