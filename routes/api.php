<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::get('/books', [BookController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('admin')->group(function () {
        Route::post('authors', [AuthorController::class, 'store']);
        Route::put('authors/{author}', [AuthorController::class, 'update']);
        Route::delete('authors/{author}', [AuthorController::class, 'destroy']);

        Route::post('genres', [GenreController::class, 'store']);
        Route::put('genres/{genre}', [GenreController::class, 'update']);
        Route::delete('genres/{genre}', [GenreController::class, 'destroy']);
        
        Route::get('transactions', [TransactionController::class, 'index']);
        Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy']);
    });

    Route::middleware('customer')->group(function () {
        Route::post('transactions', [TransactionController::class, 'store']);
        Route::get('transactions/{transaction}', [TransactionController::class, 'show']);
        Route::put('transactions/{transaction}', [TransactionController::class, 'update']);
    });

});