<?php

use App\Http\Controllers\Api\PriorityController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tasks', TaskController::class);

Route::get('priorities', [PriorityController::class, 'index']);
Route::get('tags', [TagController::class, 'index']);