<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PHDController;
use App\Http\Controllers\UndergradController;
use App\Http\Controllers\PRCController;
use App\Http\Controllers\MPOController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Application;

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
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('logout', 'logout')->name('logout');
    Route::post('authenticate', 'authenticate')->name('authenticate');
});

// Middleware for authentication
Route::middleware(['auth', 'faculty', 'prevent-back-history'])->group(function () {
    
    Route::controller(UserController::class)->group(function () {
        
        Route::get('/', 'index')->name('home');

        Route::get('educational-background', 'edubg')->name('edubg');

        Route::get('profile/create', 'create')->name('profile.create');
        Route::post('profile/store/{user}', 'store')->name('profile.store');

        Route::get('profile/edit/{user}', 'edit')->name('profile.edit');
        Route::put('profile/update/{user}/{application}', 'update')->name('profile.update');

        Route::get('profile/{user}', 'show')->name('profile.show');
    });

    Route::controller(UndergradController::class)->group(function () {
        Route::get('undergrad/create', 'create')->name('undergrad.create');
        Route::post('undergrad/store', 'store')->name('undergrad.store');

        Route::get('undergrad/edit/{undergrad}', 'edit')->name('undergrad.edit');
        Route::put('undergrad/update/{undergrad}', 'update')->name('undergrad.update');

        Route::delete('undergrad/destroy/{undergrad}', 'destroy')->name('undergrad.destroy');
    });

    Route::controller(MasterController::class)->group(function () {
        Route::get('master/create', 'create')->name('master.create');
        Route::post('master/store', 'store')->name('master.store');

        Route::get('master/edit/{master}', 'edit')->name('master.edit');
        Route::put('master/update/{master}', 'update')->name('master.update');

        Route::delete('master/destroy/{master}', 'destroy')->name('master.destroy');
    });

    Route::controller(PHDController::class)->group(function () {
        Route::get('phd/create', 'create')->name('phd.create');
        Route::post('phd/store', 'store')->name('phd.store');

        Route::get('phd/edit/{phd}', 'edit')->name('phd.edit');
        Route::put('phd/update/{phd}', 'update')->name('phd.update');

        Route::delete('phd/destroy/{phd}', 'destroy')->name('phd.destroy');
    });

    Route::controller(PRCController::class)->group(function () {
        Route::get('prc', 'index')->name('prc.index');

        Route::get('prc/create', 'create')->name('prc.create');
        Route::post('prc/create', 'store')->name('prc.store');

        Route::get('prc/edit/{prc}', 'edit')->name('prc.edit');
        Route::put('prc/update/{prc}', 'update')->name('prc.update');
        
        Route::delete('prc/destroy/{prc}', 'destroy')->name('prc.destroy');
    });

    Route::controller(MPOController::class)->group(function () {
        Route::get('mpo', 'index')->name('mpo.index');

        Route::get('mpo/create', 'create')->name('mpo.create');
        Route::post('mpo/create', 'store')->name('mpo.store');

        Route::get('mpo/edit/{mpo}', 'edit')->name('mpo.edit');
        Route::put('mpo/update/{mpo}', 'update')->name('mpo.update');

        Route::delete('mpo/destroy/{mpo}', 'destroy')->name('mpo.destroy');
    });

    Route::controller(TrainingController::class)->group(function () {
        Route::get('training', 'index')->name('training.index');

        Route::get('training/create', 'create')->name('training.create');
        Route::post('training/create', 'store')->name('training.store');

        Route::get('training/edit/{training}', 'edit')->name('training.edit');
        Route::put('training/update/{training}', 'update')->name('training.update');

        Route::delete('training/destroy/{training}', 'destroy')->name('training.destroy');
    });

    Route::controller(ApplicationController::class)->group(function () {
        Route::get('application', 'index')->name('application.index');

        
    });

});
// END OF FACULTY ROUTES

Route::middleware(['auth', 'admin', 'prevent-back-history'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('admin', 'index')->name('admin.index'); 
    });

    Route::controller(PendingController::class)->group(function () {
        Route::get('admin/pending-applications', 'index')->name('pending.index'); 
       
    });

});