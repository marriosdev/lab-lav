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
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("user/{id}",     [GetUserController::class, "findById"]);
Route::get("user",          [GetUserController::class, "findAll"]);
Route::patch("user/{id}",   [UpdateUserController::class, "update"]);
Route::delete("user/{id}",  [DestroyUserController::class, "destroy"]);
Route::post("user",         [CreateUserController::class, "create"]);

Route::get("task/{id}",     [GetTaskController::class, "findById"]);
Route::get("task",          [GetTaskController::class, "findAll"]);
Route::patch("task/{id}",   [UpdateTaskController::class, "update"]);
Route::delete("task/{id}",  [DestroyTaskController::class, "destroy"]);
Route::post("task",         [CreateTaskController::class, "create"]);

Route::get("auth/resetTokens",  [AuthController::class, "resetToken"]);
Route::get("auth/token",        [AuthController::class, "getToken"]);
Route::get("auth", [function(){echo "sexo";}])->middleware("auth:api");
