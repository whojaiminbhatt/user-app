<?php

use App\Http\Controllers\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();


Route::middleware('auth:api')->group(function () {

    Route::prefix('users')->namespace('V1/')->group(function () {
        Route::get('/', [UserController::class, 'getUsers']);
        Route::get('/{id}', [UserController::class, 'getUserById']);
        Route::post('/', [UserController::class, 'add']);
        Route::put('{id}', [UserController::class, 'update']);
        Route::delete('{id}', [UserController::class, 'delete']);
    });
});