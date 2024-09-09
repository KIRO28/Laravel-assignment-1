<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


Route::get('/posts', [BlogController::class, 'page']);
Route::get('/posts/{id}', [BlogController::class, 'detail']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
