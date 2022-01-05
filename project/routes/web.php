<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalculatorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/calculator', [CalculatorController::class, 'showCalculator'])->name('calculator');

Route::get('/fake-user', function () {
    $user = new \App\Models\User;
    $user->name    = 'Truong Bo';
    $user->email    = 'truongisgay6@gmail.com';
    $user->password    = bcrypt('12345678');
    $user->role_id  = 1;
    $user->save();
})->name('fakeuser');

Route::get('relationship/one-to-one', function () {
    $user = \App\Models\User::find(4);
    echo "name : " . $user->name;
    echo "<br>";
    echo "address : " . $user->profile->address;
});

Route::get('relationship/one-to-one-reverse', function () {
    $profile = \App\Models\Profile::find(1);
    echo "name : " . $profile->user->name;
    echo "email : " . $profile->user->email;
    echo "<br>";
    echo "address : " . $profile->address;
});


Route::get('request', [\App\Http\Controllers\Study\RequestController::class, 'index']);
