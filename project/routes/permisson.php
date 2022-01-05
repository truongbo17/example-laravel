<?php

use App\Http\Controllers\Permisson\PermissonController;

Route::prefix('permisson')->group(function () {
    Route::get('/role', [PermissonController::class, 'viewRole'])->name('permisson_role');
    Route::get('/setting', [PermissonController::class, 'viewSetting'])->name('permisson_setting');
    Route::post('/save', [PermissonController::class, 'save'])->name('permisson_save');
    Route::get('/test', [PermissonController::class, 'test'])->name('permisson_test');
});
