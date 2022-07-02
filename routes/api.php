<?php

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


Route::prefix('v1')->middleware('api')->group(function () {

    Route::apiResource('/articles', \App\Http\Controllers\Api\v1\ArticleController::class);
    Route::apiResource('/users', \App\Http\Controllers\Api\v1\UserController::class);

    Route::prefix('oauth')->middleware('guest')->group(function () {
        Route::post('/register', [\App\Http\Controllers\Api\v1\Auth\RegisteredUserController::class, 'store']);
        Route::post('/login', [\App\Http\Controllers\Api\v1\Auth\AuthenticatedController::class, 'store']);
        Route::post('/refresh_token', [\App\Http\Controllers\Api\v1\Auth\AuthenticatedController::class, 'refresh']);
        Route::post('/password/reset', [\App\Http\Controllers\Api\v1\Auth\ResetPasswordController::class, 'store']);
        Route::post('/password/reset/confirmation', [\App\Http\Controllers\Api\v1\Auth\NewPasswordController::class, 'store']);
    });

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('/panel/writer/articles', \App\Http\Controllers\Api\v1\Writer\ArticleController::class);
        Route::get('/user', [\App\Http\Controllers\Api\v1\Auth\AuthenticatedController::class, 'show'])->name('user.show');
        Route::post('logout', [\App\Http\Controllers\Api\v1\Auth\AuthenticatedController::class, 'logout']);
    });

});
