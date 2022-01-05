<?php 
use App\Http\Controllers\Pos\PosController; 

Route::prefix('pos')->group(function(){
    Route::get('index',[PosController::class , 'index'])->name('pos_index');
    Route::post('save',[PosController::class , 'save'])->name('pos_save');
});