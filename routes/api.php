<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Task\{
    DestroyTaskController,
    UpdateTaskController,
    InsertTaskController,
    GetTaskController
};

use App\Http\Controllers\Api\User\{
    GetUserController,
    DestroyUserController,
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

Route::get("user/{id}",     [GetUserController::class, "findById"]);
Route::get("user",          [GetUserController::class, "findAll"]);
Route::put("user/{id}",     [UpdateUserController::class, "update"]);
Route::delete("user/{id}",  [DestroyUserController::class, "destroy"]);
Route::post("user",         [InsertUserController::class, "insert"]);

Route::get("task/{id}",     [GetTaskController::class, "findById"]);
Route::get("task",          [GetTaskController::class, "findAll"]);
Route::put("task/{id}",     [UpdateTaskController::class, "update"]);
Route::delete("task/{id}",  [DestroyTaskController::class, "destroy"]);
Route::post("task",         [InsertTaskController::class, "insert"]);
