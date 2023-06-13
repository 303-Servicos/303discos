<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function store(): RedirectResponse
    {
        $this->authorize('create', User::class);

        $data = request()->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id'  => ['required', 'integer'],
        ]);

        $data['password'] = bcrypt(request()->password);

        User::create($data);

        return back();
    }
}
