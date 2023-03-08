<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PHDController;
use App\Http\Controllers\UndergradController;
use App\Http\Controllers\PRCController;
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
})->middleware('auth')->name('home');


Route::controller(UserController::class)->group(function () {

    Route::get('educational-background', 'edubg')->name('edubg');

    Route::get('profile/create', 'create')->name('profile.create');
    Route::post('profile/store/{user}', 'store')->name('profile.store');

    Route::get('profile/edit/{user}', 'edit')->name('profile.edit');
    Route::put('profile/update/{user}/{application}', 'update')->name('profile.update');

    Route::get('profile/{user}', 'show')->name('profile.show');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
    Route::post('authenticate', 'authenticate')->name('authenticate');
});

Route::controller(UndergradController::class)->group(function () {
    Route::get('undergrad/create', 'create')->name('undergrad.create');
    Route::post('undergrad/store', 'store')->name('undergrad.store');

    Route::get('undergrad/edit/{undergrad}', 'edit')->name('undergrad.edit');
    Route::put('undergrad/update/{undergrad}', 'update')->name('undergrad.update');
});

Route::controller(MasterController::class)->group(function () {
    Route::get('master/create', 'create')->name('master.create');
    Route::post('master/store', 'store')->name('master.store');

    Route::get('master/edit/{master}', 'edit')->name('master.edit');
    Route::put('master/update/{master}', 'update')->name('master.update');
});

Route::controller(PHDController::class)->group(function () {
    Route::get('phd/create', 'create')->name('phd.create');
    Route::post('phd/store', 'store')->name('phd.store');

    Route::get('phd/edit/{phd}', 'edit')->name('phd.edit');
    Route::put('phd/update/{phd}', 'update')->name('phd.update');
});

Route::controller(PRCController::class)->group(function () {
    Route::get('prc', 'index')->name('prc.index');

    Route::get('prc/create', 'create')->name('prc.create');
    Route::post('prc/create', 'store')->name('prc.store');

    Route::get('prc/edit/{prc}', 'edit')->name('prc.edit');
    Route::put('prc/update/{prc}', 'update')->name('prc.update');
   
});