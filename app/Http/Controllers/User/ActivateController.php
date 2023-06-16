<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ActivateController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        $this->authorize('activate-user', $user);

        $user->is_active = true;
        $user->save();

        return to_route('users.index');
    }
}
