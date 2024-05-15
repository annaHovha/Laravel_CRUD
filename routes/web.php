<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/{author}/show', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{author}/update', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{author}/destroy', [AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/{book}/show', [BookController::class, 'show'])->name('book.show');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');



