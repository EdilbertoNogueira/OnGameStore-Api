<?php

use App\Http\Controllers\api\v1\CartShoppingController;
use App\Http\Controllers\api\v1\GameController;
use App\Http\Controllers\api\v1\GenreController;
use App\Http\Controllers\api\v1\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;
use App\Models\Genre;

Route::post('store', [UserController::class, 'store']);

Route::get('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function()
{

    Route::prefix('user')->group(function () {

        Route::get('logout', [UserController::class, 'logout']);
        Route::patch('edit', [UserController::class, 'edit']);

    });

    Route::prefix('genre')->group(function () {

        Route::post('', [GenreController::class, 'store']);
        Route::patch('edit', [GenreController::class, 'edit']);
        Route::delete('{id}/delete', [GenreController::class, 'delete']);

    });

    Route::prefix('game')->group(function () {

        Route::post('', [GameController::class, 'store']);
        Route::get('list', [GameController::class, 'getAll']);
        Route::patch('edit', [GameController::class, 'edit']);
        Route::delete('{id}/delete', [GameController::class, 'delete']);
        Route::get('filter', [GameController::class, 'filter']);

        Route::prefix('{id}')->group(function () {

            Route::get('', [GameController::class, 'getById']);

        });

    });

    Route::prefix('payment')->group(function (){

        Route::post('', [PaymentController::class, 'store']);

    });

    Route::prefix('cartShopping')->group(function (){

        Route::post('', [CartShoppingController::class, 'store']);

    });

});