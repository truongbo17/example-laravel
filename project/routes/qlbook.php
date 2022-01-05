<?php

use App\Http\Controllers\QlBook;

Route::prefix('qlbook/author')->group(function () {
    Route::get('index', [QlBook\AuthorController::class, 'index'])->name('author_index')->middleware('permission');
    Route::get('view-add', [QlBook\AuthorController::class, 'view_add'])->name('author_view_add');
    Route::post('post_add', [QlBook\AuthorController::class, 'post_add'])->name('post_add');
});

Route::prefix('qlbook/book')->group(function () {
    Route::get('index', [QlBook\BookController::class, 'index'])->name('book_index');
    Route::get('view-add', [QlBook\BookController::class, 'view_add'])->name('book_view_add');
    Route::post('post_add', [QlBook\BookController::class, 'post_add'])->name('book_add');
});