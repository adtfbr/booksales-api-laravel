<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthorController,
    GenreController,
    BookController,
    AuthController,
    TransactionController
};

// 🟢 Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::get('/books', [BookController::class, 'index']);

// 🔐 Protected routes
Route::middleware('auth:sanctum')->group(function () {

    // 🔸 Admin only
    Route::middleware('admin')->group(function () {


        Route::get('transactions', [TransactionController::class, 'index']);
        Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy']);
    });

    // 🔹 Customer only
    Route::middleware('customer')->group(function () {
        Route::apiResource('transactions', TransactionController::class)->only(['store', 'show', 'update']);
    });
});
Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
Route::apiResource('books', BookController::class)->except(['index', 'show']);
