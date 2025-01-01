<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;

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
    Route::resource('faq', FAQController::class)->except(['show']);
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//public news
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

//public faq
Route::get('faq', [FAQController::class, 'index'])->name('faq.index');

//public contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/user/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::post('/admin/user/{id}/remove-admin', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    // news
    Route::get('/admin/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // contact messages
    // Route::resource('contact_messages', ContactMessageController::class)->only(['index', 'show', 'update', 'destroy']);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('contact_messages', ContactMessageController::class)->only([
        'index', 'show', 'update', 'destroy'
    ]);
});

Route::middleware(['auth'])->prefix('messages')->name('messages.')->group(function () {
    Route::get('inbox', [MessageController::class, 'inbox'])->name('inbox');
    Route::get('sent', [MessageController::class, 'sent'])->name('sent');
    Route::get('create', [MessageController::class, 'create'])->name('create');
    Route::post('store', [MessageController::class, 'store'])->name('store');
    Route::get('{id}', [MessageController::class, 'show'])->name('show');
    Route::delete('{id}', [MessageController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
