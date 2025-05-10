<?php

use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// default middleware
    // Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')
    // ->middleware(["auth"]);
    // Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')
    // ->middleware(["auth",'IsUserValid:admin']);

Route::get('register', function () {
    return view('register');
})->name('register');

Route::get('login', function () {
    return view('login');
})->name('login');

// Handle form submissions (POST)
Route::post('register', [UserController::class, 'register'])
    ->name('register.store');
Route::post('login', [UserController::class, 'login'])
    ->name('login.store');

// Protected dashboard
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')
    ->middleware('IsUserValid:admin');
    // form multiple roles
    // ->middleware('IsUserValid:admin,user');

// Logout route
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// group middleware
    // Route::middleware([ValidUser::class])->group(function () {
    //     Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    //     Route::get('/logout', [UserController::class, 'logout'])->name('logout')->withoutMiddleware(ValidUser::class);

    // });