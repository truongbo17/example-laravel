<?php

use App\Http\Controllers\Layout;

Route::get('layout/home', [Layout\HomeController::class, 'showHome'])->name('layout_home');
