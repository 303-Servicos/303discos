<?php

use App\Http\Controllers\{ProfileController, User, UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (app()->isLocal()) {
        if (App\Models\User::find(1)) {
            auth()->loginUsingId(1);

            return view('dashboard');
        }
    }

    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class)->except(['show']);
    Route::put('/users/{user}/activate', User\ActivateController::class)->name('users.activate');
    Route::put('/users/{user}/inactivate', User\InactivateController::class)->name('users.inactivate');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
