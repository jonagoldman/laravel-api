<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GifController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FavoriteController;
use App\Http\Controllers\Api\V1\LogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

    Route::middleware(['auth:sanctum', 'logger'])->group(function () {
        Route::get('user', [UserController::class, 'user']);

        Route::get('user/logs', [LogController::class, 'index']);

        Route::get('user/favorites', [FavoriteController::class, 'index']);
        Route::post('user/favorites', [FavoriteController::class, 'store']);
        Route::delete('user/favorites/{favorite}', [FavoriteController::class, 'destroy']);

        Route::post('gifs/search', [GifController::class, 'search']);
        Route::get('gifs/{id}', [GifController::class, 'show']);
    });
});
