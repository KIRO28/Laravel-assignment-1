<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::get('/', [BlogController::class, 'index'])->name('posts.index');
Route::get('/create', [BlogController::class, 'create'])->name('posts.create');
Route::post('/store', [BlogController::class, 'store'])->name('posts.store');
Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit');
Route::put('/{id}/update', [BlogController::class, 'update'])->name('posts.update');
Route::delete('/{id}/destroy', [BlogController::class, 'destroy'])->name('posts.destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
