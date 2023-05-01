<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookStoreController;
use Illuminate\Http\Request;
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

Route::post('login', [AuthController::class, 'login']);

Route::prefix('v1')->middleware('jwt.auth')->group(function() {
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('book', [BookStoreController::class, 'index']);
    Route::post('book', [BookStoreController::class, 'store']);
    Route::get('book/{id}', [BookStoreController::class, 'show']);
    Route::put('book/{id}', [BookStoreController::class, 'update']);
    Route::delete('book/{id}', [BookStoreController::class, 'destroy']);
});
