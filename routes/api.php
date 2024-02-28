<?php

use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{users}', [UserController::class, 'show']);

Route::get('destinations', [DestinationController::class, 'index']);
Route::get('destinations/{destination}', [DestinationController::class, 'show']);
Route::post('destinations', [DestinationController::class, 'store']);
Route::put('destinations/{destination}', [DestinationController::class, 'update']);
Route::delete('destinations/{destination}', [DestinationController::class, 'destroy']);


