<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

/** Auth Routes */
Route::post("register", [AuthController::class, 'register']);
Route::post("login", [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post("logout", [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getUser']);
});


/** Posts Routes */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts/store', [PostController::class, 'store']);
    Route::post('posts/update/{id}', [PostController::class, 'update']);
    Route::post('posts/delete/{id}', [PostController::class, 'destroy']);
});
