<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Task\{
    DeleteTaskController,
    UpdateTaskController,
    InsertTaskController,
    TaskController
};

use App\Http\Controllers\Api\User\{
    UserController,
    DeleteUserController,
    UpdateUserController, 
    InsertUserController
};
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

Route::get("user/{id}",     [UserController::class, "findById"]);
Route::get("user",          [UserController::class, "findAll"]);
Route::put("user/{id}",     [UpdateUserController::class, "update"]);
Route::delete("user/{id}",  [DeleteUserController::class, "delete"]);
Route::post("user",         [InsertUserController::class, "insert"]);

Route::get("task/{id}",     [TaskController::class, "findById"]);
Route::get("task",          [TaskController::class, "findAll"]);
Route::put("task/{id}",     [UpdateTaskController::class, "update"]);
Route::delete("task/{id}",  [DeleteTaskController::class, "delete"]);
Route::post("task",         [InsertTaskController::class, "insert"]);
