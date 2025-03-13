<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

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


Route::get('/employees', [EmployeeController::class, "index"]);
Route::get('/employees/{id}', [EmployeeController::class, "show"]);
Route::get('/employees/{id}/tasks', [EmployeeController::class, "getTasksByEmployee"]);


Route::get('/tasks', [TaskController::class, "index"]);
Route::get('/tasks/{id}', [TaskController::class, "show"]);
Route::post('/tasks', [TaskController::class, "store"]);
Route::put('/tasks/{id}', [TaskController::class, "update"]);
Route::patch('/tasks/{id}', [TaskController::class, "statusUpdate"]);
