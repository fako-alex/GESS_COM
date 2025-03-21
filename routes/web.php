<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ReasonForDepartureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;

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
    // Gestion du personnel
    Route::get('/users/create',[UserController::class, 'create'])->name('admin.users.create');
    Route::post('users/create',[UserController::class, 'save'])->name('admin.users.save');
    Route::get('users/list',[UserController::class, 'list'])->name('admin.users.list');
    Route::get('users/delete/{id}', [UserController::class, 'delete_users'])->name('admin.users.delete');
    Route::get('users/update/{id}',[UserController::class, 'edit_users'])->name('admin.users.update');
    Route::put('users/update/{id}', [UserController::class, 'update_users'])->name('admin.users.update.submit');
    Route::get('users/profil', [UserController::class, 'profil'])->name('admin.users.profil');
    Route::put('users/profil/{id}',[UserController::class, 'update_users_p'])->name('admin.users.update_profil');
    // Fin du personnel

    // Gestion des services
    Route::get('/services/create',[ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('services/create',[ServiceController::class, 'save'])->name('admin.services.save');
    Route::get('services/list',[ServiceController::class, 'list'])->name('admin.services.list');
    Route::get('services/delete/{id}', [ServiceController::class, 'delete_services'])->name('admin.services.delete');

    Route::get('services/update/{id}',[ServiceController::class, 'edit_services'])->name('admin.services.update');
    Route::put('services/update/{id}', [ServiceController::class, 'update_services'])->name('admin.services.update.submit');
    // Fin des services

    // Gestion des motifs de départ d'un membre du personnel
    Route::get('/departures/create',[ReasonForDepartureController::class, 'create'])->name('admin.departures.create');
    Route::post('departures/create',[ReasonForDepartureController::class, 'save'])->name('admin.departures.save');
    Route::get('departures/list',[ReasonForDepartureController::class, 'list'])->name('admin.departures.list');
    Route::get('departures/delete/{id}', [ReasonForDepartureController::class, 'delete_departures'])->name('admin.departures.delete');
    Route::get('departures/update/{id}',[ReasonForDepartureController::class, 'edit_departures'])->name('admin.departures.update');
    Route::put('departures/update/{id}', [ReasonForDepartureController::class, 'update_departures'])->name('admin.departures.update.submit');
    // Fin de gestion des motifs de départ d'un membre du personnel

    // Gestion des absences d'un membre du personnel
    Route::get('/absences/create',[AbsenceController::class, 'create'])->name('admin.absences.create');
    Route::post('absences/create',[AbsenceController::class, 'save'])->name('admin.absences.save');
    Route::get('absences/list',[AbsenceController::class, 'list'])->name('admin.absences.list');
    Route::get('absences/delete/{id}', [AbsenceController::class, 'delete_absences'])->name('admin.absences.delete');
    Route::get('absences/update/{id}',[AbsenceController::class, 'edit_absences'])->name('admin.absences.update');
    Route::put('absences/update/{id}', [AbsenceController::class, 'update_absences'])->name('admin.absences.update.submit');
    // Fin de gestion des absences d'un membre du personnel












    // Gestion des planings de travail
    Route::get('/planning/create',[PlanningController::class, 'create'])->name('admin.planning.create');
    Route::get('/admin/users/search', [UserController::class, 'search'])->name('admin.users.search');
    Route::get('/admin/services/search', [ServiceController::class, 'searchServices'])->name('admin.services.search');
    Route::post('planning/create',[PlanningController::class, 'save'])->name('admin.planning.save');
    Route::get('planning/list',[PlanningController::class, 'list'])->name('admin.planning.list');
    Route::get('/get-users/{serviceId}', [UserController::class, 'getUsersByService']);
    Route::get('planning/delete/{id}', [PlanningController::class, 'delete_planning'])->name('admin.planning.delete');


    Route::get('planning/update/{id}',[PlanningController::class, 'edit_planning'])->name('admin.planning.update');


    Route::put('planning/update/{id}', [PlanningController::class, 'update_planning'])->name('admin.planning.update.submit');
    // Fin des planings de travail

});

require __DIR__.'/auth.php';
