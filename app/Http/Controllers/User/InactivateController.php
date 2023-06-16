<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class InactivateController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $this->authorize('inactivate-user', $user);

        $user->is_active = false;
        $user->save();

        return to_route('users.index');
    }
}
