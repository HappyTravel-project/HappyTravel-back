<?php

use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

Route::post('sign-up', [AuthController::class, 'signUp']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);

Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);


// Route::apiResource('destinations',DestinationController::class)
//     ->only(['store', 'update', 'destroy'])
//     ->middleware('auth:sanctum');

Route::get('destinations', [DestinationController::class, 'index']);
Route::get('destinations/{destination}', [DestinationController::class, 'show']);
Route::post('destinations', [DestinationController::class, 'store'])->middleware('auth:sanctum');
Route::put('destinations/{destination}', [DestinationController::class, 'update'])->middleware('auth:sanctum');;
Route::delete('destinations/{destination}', [DestinationController::class, 'destroy'])->middleware('auth:sanctum');;


