<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Mueve tus rutas existentes aquí dentro
    Route::apiResource('tasks', TaskController::class);
    Route::get('priorities', [PriorityController::class, 'index']);
    Route::get('tags', [TagController::class, 'index']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});