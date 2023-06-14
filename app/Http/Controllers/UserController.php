<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\{Role, User};
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::with('role')->get(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', User::class);

        $roles = Role::select(['id', 'name'])->get();

        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->authorize('create', User::class);

        User::create($request->validated());

        return to_route('users.index')->with('success', 'User created successfully.');
    }
}
