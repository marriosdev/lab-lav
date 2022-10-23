<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Task\{
    DestroyTaskController,
    UpdateTaskController,
    CreateTaskController,
    GetTaskController
};
use App\Http\Controllers\Api\User\{
    GetUserController,
    DestroyUserController,
    UpdateUserController, 
    CreateUserController
};
use App\Http\Controllers\Auth\{
    LoginController,
    RefreshController,
    MeController,
    LogoutController
};
use App\Http\Controllers\Auth\AuthController;

// ===============================================

Route::post('auth/login',   [LoginController::class, "index"]);
Route::post("user",         [CreateUserController::class, "create"]);

Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'auth'
], function ($router) {
    Route::post('logout',   [LogoutController::class, "index"]);
    Route::post('refresh',  [RefreshController::class, "index"]);
    Route::post('me',       [MeController::class, "index"]);
});

Route::group([
    'middleware' => 'auth.jwt',
], function ($router) {
    // Route::get("user/{id}",         [GetUserController::class, "findById"]);
    // Route::get("user",              [GetUserController::class, "findAll"]);
    // Route::patch("user/{id}",       [UpdateUserController::class, "update"]);
    // Route::delete("user/{id}",      [DestroyUserController::class, "destroy"]);
   
    Route::get("task/{id}",         [GetTaskController::class, "findById"]);
    Route::get("task",              [GetTaskController::class, "findAll"]);
    Route::patch("task/{id}",       [UpdateTaskController::class, "update"]);
    Route::delete("task/{id}",      [DestroyTaskController::class, "destroy"]);
    Route::post("task",             [CreateTaskController::class, "create"]);
});
