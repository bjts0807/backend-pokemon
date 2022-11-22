<?php

use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/update', [UserController::class, 'update']);
    Route::get('/show/{id}', [UserController::class, 'show']);
});

Route::prefix('favourite')->group(function () {
    Route::get('/', [FavouriteController::class, 'index']);
    Route::post('/store', [FavouriteController::class, 'store']);
    Route::put('/update', [FavouriteController::class, 'update']);
    Route::delete('/destroy', [FavouriteController::class, 'destroy']);
    Route::get('/show/{id}', [FavouriteController::class, 'show']);
    Route::get('/search', [FavouriteController::class, 'search']);
});

