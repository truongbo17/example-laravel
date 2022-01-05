<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api_register
Route::post('register', [RegisterController::class, 'register']);

//login -> create token
Route::post('login', [LoginController::class, 'login']);

//login -> create token
Route::get('product', [ProductController::class, 'index']);

//refesh token
Route::post('refeshtoken', [LoginController::class, 'refeshtoken']);

//delete token
Route::delete('deletetoken', [LoginController::class, 'deletetoken']);

