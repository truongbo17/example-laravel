<?php 

use App\Http\Controllers\Data;

Route::prefix('data')->middleware(['auth','permission:Admin'])->group(function () {
    Route::get('helloworld', 'Data\DataController@showHello')->name('showhello');
    Route::get('tinhgiaithua/{n}!', 'Data\DataController@tinhGiaithua')->name('tinhgiaithua');
    Route::get('show-student', [Data\DataController::class, 'showStudent'])->name('showstudent');
    Route::get('input-user', [Data\DataController::class, 'viewInputUser'])->name('viewinputuser');
    Route::get('do-get-user', [Data\DataController::class, 'doGetUser'])->name('dogetuser');
    Route::post('do-post-user', [Data\DataController::class, 'doPostUser'])->name('dopostuser');
    Route::post('delete-student', [Data\DataController::class, 'deleteUser'])->name('deletestudent');
});
 