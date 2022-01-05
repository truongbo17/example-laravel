<?php
Route::prefix('route')->group(function () {
    Route::get('show-student', 'Route\StudentController@ShowStudent');

    Route::get('/a/{valueA}/b/{valueB}', function ($valueA, $valueB) {
        if ($valueA == 0) {
            if ($valueB == 0) {
                return "PT vo so nghiem";
            } else {
                return "PT vo nghiem";
            }
        }
        return "x = " . (-$valueB / $valueA);
    });
});
