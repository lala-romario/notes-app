<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::post('/create/user', [UsersController::class, 'store']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/login', function () {
        return view('users.login');
    })->name('login');

    Route::get('/signup', function () {
        return view('users.signup');
    });
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('notes', NotesController::class);

    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::post('/authenticated', [LoginController::class, 'authenticate'])->name('loggedin');
