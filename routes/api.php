<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ConnectionController;

/** Auth Routes */
Route::post("register", [AuthController::class, 'register']);
Route::post("login", [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post("logout", [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('user/update', [AuthController::class, 'updateUser']);
});


/** Posts Routes */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts/store', [PostController::class, 'store']);
    Route::post('posts/update/{id}', [PostController::class, 'update']);
    Route::post('posts/delete/{id}', [PostController::class, 'destroy']);

    /**like Routes */
    Route::post('like/store',[LikeController::class,'store']);

    /**comment Routes */
    Route::post('comments/store',[CommentController::class,'store']);

    Route::post('connection/follow',[ConnectionController::class,'follow']);
    Route::post('connection/accept',[ConnectionController::class,'accept']);
    Route::post('connection/reject',[ConnectionController::class,'reject']);
});






