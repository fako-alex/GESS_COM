<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/users/create',[UserController::class, 'create'])->name('admin.users.create');

    Route::post('users/create',[UserController::class, 'save'])->name('admin.users.save');
    Route::get('users/list',[UserController::class, 'list'])->name('admin.users.list');
    Route::get('users/update/{id}',[UserController::class, 'edit_users'])->name('admin.users.update');
    Route::put('users/profil/{id}',[UserController::class, 'update_users_p'])->name('admin.users.updateProfil');
    Route::get('users/delete/{id}',[UserController::class, 'delete_users'])->name('admin.users.delete');
    Route::get('users/profil',[UserController::class, 'profil'])->name('admin.users.profil');
});

require __DIR__.'/auth.php';
