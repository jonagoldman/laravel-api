<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\GifController;
use App\Http\Controllers\Api\V1\UserController;

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
    Route::post('login', [UserController::class, 'login']);

    Route::middleware(['auth:sanctum', 'logger'])->group(function () {
        Route::get('user', [UserController::class, 'user']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('gifs/search', [GifController::class, 'search']);
        Route::get('gifs/{id}', [GifController::class, 'show']);
    });
});
