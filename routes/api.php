<?php
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('destinations', DestinationController::class)->except(['index', 'show']);
});

Route::post('destinations/{destination}', [DestinationController::class, 'update'])->middleware('auth:sanctum');


Route::get('destinations', [DestinationController::class, 'index']);
Route::get('destinations/{destination}', [DestinationController::class, 'show']);

