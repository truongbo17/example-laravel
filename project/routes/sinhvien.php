<?php

use App\Http\Controllers\SinhVien\SinhVienController;

Route::prefix('sinhvien')->group(function () {
    Route::get('/index', [SinhVienController::class, 'index'])->name('sinhvien_index');
    Route::get('/att', [SinhVienController::class, 'att'])->name('sinhvien_att');
    Route::get('view', [SinhVienController::class, 'view'])->name('sinhvien_view');
    Route::post('post', [SinhVienController::class, 'post'])->name('sinhvien_post');
});
