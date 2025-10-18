<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('authors', AuthorController::class)->only(['index', 'store']);
Route::apiResource('genres', GenreController::class)->only(['index', 'store']);
Route::get('/books', [BookController::class, 'index']);