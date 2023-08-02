<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('/customer/trashed')
    ->as('customer.')
    ->controller(CustomerController::class)
    ->group(function () {
        Route::get('/',  'trashed')->name('trashed');
        Route::put('/{customer}',  'restore')->name('restore');
        Route::delete('/{customer}',  'forceDelete')->name('force-delete');
    });

    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::prefix('admin')
        ->as('admin.')
        ->group(function () {
            Route::resource('customers',CustomerController::class) ;
            Route::resource('users',userController::class) ;
        });


});

require __DIR__ . '/auth.php';
