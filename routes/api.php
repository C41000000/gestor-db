<?php

use App\Http\Controllers\Databases\DatabasesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'register']);
    });

    Route::middleware('auth:sanctum')->prefix('databases')->group(function () {
        Route::get('list', [DatabasesController::class, 'list']);
        Route::post('createl', [DatabasesController::class, 'create']);
        Route::put('update', [DatabasesController::class, 'update']);
        Route::delete('delete', [DatabasesController::class, 'delete']);
    });
});

