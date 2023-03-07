<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('faculty/index');
})->middleware('auth');


Route::controller(UserController::class)->group(function () {
    Route::get('profile/create', 'create')->name('profile.create');
    Route::post('profile/store/{user}', 'store')->name('profile.store');

    Route::get('profile/edit/{user}', 'edit')->name('profile.edit');

    Route::get('profile/{user}', 'show')->name('profile.show');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
    Route::post('authenticate', 'authenticate')->name('authenticate');
});