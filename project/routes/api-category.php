<?php

use App\Http\Controllers\Api\ApiCategoryController;

Route::prefix('category')->group(function () {
    Route::get('/index', [ApiCategoryController::class, 'index']);
    Route::post('/store', [ApiCategoryController::class, 'store']);
});
