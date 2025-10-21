<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/author-top', [AuthorController::class, 'topAuthor'])->name('authors.top-author');
Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');
Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/ratings/{authorId}', [RatingController::class, 'getBooksByAuthor'])->name('ratings.get-book');
