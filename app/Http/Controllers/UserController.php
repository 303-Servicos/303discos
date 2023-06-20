<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\{CreateUserRequest, UpdateUserRequest};
use App\Models\{Role, User};
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', User::class);

        return view('users.index', [
            'users' => User::withTrashed()->with('role')->paginate(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', User::class);

        $roles = Role::select(['id', 'name'])->where('id', '!=', Role::ADMIN)->get();

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

    public function edit(User $user): View
    {
        $this->authorize('update', $user);

        $roles = Role::select(['id', 'name'])->where('id', '!=', Role::ADMIN)->get();

        return view('users.edit', [
            'user'  => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return to_route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $user);

        $user->forceDelete();

        return to_route('users.index')->with('success', 'User deleted successfully.');
    }
}
