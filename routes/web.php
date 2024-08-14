<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;



Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');
Route::get('/create', [BlogController::class, 'create'])->name('posts.create');
Route::post('/store', [BlogController::class, 'store'])->name('posts.store');
Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit');
Route::put('/{id}/update', [BlogController::class, 'update'])->name('posts.update');
Route::delete('/{id}/destroy', [BlogController::class, 'destroy'])->name('posts.destroy');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('layouts.admin');
    })->name('admin.dashboard');

    // Admin User Management Routes
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Admin Blog Management Routes
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});