<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/user/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::post('/admin/user/{id}/remove-admin', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.storeUser');
});

require __DIR__.'/auth.php';
