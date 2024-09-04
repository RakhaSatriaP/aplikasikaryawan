<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\AttendanceController;
//use model employee and user

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login2');
});


Route::get('/rafi', function () {
    // return view('rafi');
    // return h1
    return "<h1>hello rafi rakha bener</h1>";
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::patch('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::controller(EmployeeController::class)->prefix('employee')->name('employee.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });


    
});

Route::middleware(['auth', 'role:user|superadmin'])->prefix('attendance')->name('attendance.')->group(function () {
    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/masuk', 'masuk')->name('masuk');
        Route::post('/pulang', 'pulang')->name('pulang');
        Route::get('/summary', 'summary')->name('summary');
        Route::get('/list', 'list')->name('list');
    });


});


require __DIR__.'/auth.php';