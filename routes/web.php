<?php

use App\Models\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MPOController;
use App\Http\Controllers\PHDController;
use App\Http\Controllers\PRCController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\ApprovedController;
use App\Http\Controllers\ReceivedController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UndergradController;
use App\Http\Controllers\ApplicationController;

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
    Route::get('/privacy-policy', 'privacy')->name('privacy')->middleware('guest');
});

Route::get('profile/create', [UserController::class, 'create'])->middleware(['auth', 'faculty', 'new-account', 'prevent-back-history'])->name('profile.create');
Route::post('profile/store/{user}', [UserController::class, 'store'])->middleware(['auth', 'faculty', 'new-account', 'prevent-back-history'])->name('profile.store');

// Middleware for authentication
Route::middleware(['auth', 'faculty', 'old-account', 'prevent-back-history'])->group(function () {
    
    Route::controller(UserController::class)->group(function () {
        
        Route::get('/', 'index')->name('home');

        Route::get('educational-background', 'edubg')->name('edubg');

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
        Route::get('admin/accounts', 'account')->name('admin.account'); 
        Route::get('admin/account/create', 'accountCreate'); 
        Route::post('admin/account/store', 'accountStore'); 
        Route::delete('admin/account/destroy/{user}', 'accountDestroy')->name('admin.accountDestroy'); 

        Route::get('admin/scores/{user}', 'score')->name('admin.score'); 
        Route::post('admin/scores/store/{user}', 'scoreStore')->name('admin.scoreStore'); 
        Route::get('admin/scores/edit/{user}', 'scoreEdit')->name('admin.scoreEdit'); 
        Route::put('admin/scores/update/{user}/{score}', 'scoreUpdate')->name('admin.scoreUpdate'); 

        Route::get('admin/basic-education/rankings', 'basicEd')->name('admin.basicEd'); 
        Route::get('admin/college/rankings', 'college')->name('admin.college'); 
    });

    Route::controller(PendingController::class)->group(function () {
        Route::get('admin/pending-applications', 'index')->name('pending.index'); 
        Route::put('admin/pending-applications/{application}', 'receive')->name('pending.receive');
    });

    Route::controller(ReceivedController::class)->group(function () {
        Route::get('admin/received-applications', 'index')->name('received.index'); 
        Route::get('admin/received-applications/{user}', 'show')->name('received.show'); 
        Route::get('admin/profile-verify/{user}', 'profile')->name('received.profile'); 
        Route::get('admin/application-verify/{application}', 'application')->name('received.application'); 
        Route::get('admin/undergrad-verify/{undergrad}', 'undergrad')->name('received.undergrad'); 
        Route::get('admin/masters-verify/{master}', 'masters')->name('received.masters'); 
        Route::get('admin/phd-verify/{phd}', 'phd')->name('received.phd'); 
        Route::get('admin/prc-license-verify/{prc}', 'prc')->name('received.prc'); 
        Route::get('admin/membership-in-professional-organization-verify/{mpo}', 'mpo')->name('received.mpo'); 
        Route::get('admin/trainings-seminars-webinars-verify/{training}', 'training')->name('received.training'); 
    
    });

    Route::controller(VerifyController::class)->group(function () {
         
        Route::put('admin/profile-resubmit/{user}', 'profileResubmit')->name('verify.resubmit.profile');
        Route::put('admin/profile-verified/{user}', 'profileVerified')->name('verify.approved.profile'); 

        Route::put('admin/application-resubmit/{application}', 'applicationResubmit')->name('verify.resubmit.application');
        Route::put('admin/application-verified/{application}', 'applicationVerified')->name('verify.approved.application'); 

        Route::put('admin/undergrad-resubmit/{undergrad}', 'undergradResubmit')->name('verify.resubmit.undergrad');
        Route::put('admin/undergrad-verified/{undergrad}', 'undergradVerified')->name('verify.approved.undergrad');
        
        Route::put('admin/masters-resubmit/{master}', 'masterResubmit')->name('verify.resubmit.master');
        Route::put('admin/masters-verified/{master}', 'masterVerified')->name('verify.approved.master'); 

        Route::put('admin/phd-resubmit/{phd}', 'phdResubmit')->name('verify.resubmit.phd');
        Route::put('admin/phd-verified/{phd}', 'phdVerified')->name('verify.approved.phd'); 

        Route::put('admin/prc-resubmit/{prc}', 'prcResubmit')->name('verify.resubmit.prc');
        Route::put('admin/prc-verified/{prc}', 'prcVerified')->name('verify.approved.prc'); 

        Route::put('admin/mpo-resubmit/{mpo}', 'mpoResubmit')->name('verify.resubmit.mpo');
        Route::put('admin/mpo-verified/{mpo}', 'mpoVerified')->name('verify.approved.mpo'); 

        Route::put('admin/training-resubmit/{training}', 'trainingResubmit')->name('verify.resubmit.training');
        Route::put('admin/training-verified/{training}', 'trainingVerified')->name('verify.approved.training'); 

        Route::put('admin/application-approved/{application}', 'applicationApproved')->name('verify.approved.approved'); 

    });

    Route::controller(ApprovedController::class)->group(function () {
        Route::get('admin/approved-applications', 'index')->name('approved.index'); 
    });

});