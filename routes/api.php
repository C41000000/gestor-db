<?php

use App\Http\Controllers\Access\Groups\GroupsController;
use App\Http\Controllers\Access\Permissions\PermissionsController;
use App\Http\Controllers\Access\UserPermissions\UserPermissionsController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\Databases\DatabasesController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'register']);
    });

    Route::middleware('auth:sanctum')->prefix('databases')->group(function () {
        Route::get('list-all', [DatabasesController::class, 'listAll']);
        Route::get('list-one/{id}', [DatabasesController::class, 'listOne']);
        Route::post('create', [DatabasesController::class, 'create']);
        Route::put('update/{id}', [DatabasesController::class, 'update']);
        Route::delete('delete/{id}', [DatabasesController::class, 'delete']);
    });

//    Route::middleware('auth:sanctum')->prefix('groups')->group(function () {
//        Route::get('list-all', [GroupsController::class, 'listAll']);
//        Route::get('list-one/{id}', [GroupsController::class, 'listOne']);
//        Route::post('create', [GroupsController::class, 'create']);
//    });
    Route::middleware('auth:sanctum')->prefix('permissions')->group(function () {
        Route::get('list-all', [PermissionsController::class, 'listAll']);
        Route::get('list-one/{id}', [PermissionsController::class, 'listOne']);
        Route::post('create', [PermissionsController::class, 'create']);
    });

    Route::middleware('auth:sanctum')->prefix('user-permissions')->group(function () {
        Route::get('list-all', [UserPermissionsController::class, 'listAll']);
        Route::get('list-one/{id}', [UserPermissionsController::class, 'listOne']);
        Route::post('create', [UserPermissionsController::class, 'create']);
        Route::put('update/{id}', [UserPermissionsController::class, 'update']);
        Route::delete('delete/{id}', [UserPermissionsController::class, 'delete']);
    });
});

