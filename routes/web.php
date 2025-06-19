<?php

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
    Route::get('/dashboard', function () {
        return view('notes.dashboard');
    })->name('dashboard');

    Route::get('/notes/{note}', [NotesController::class, 'show'])->name('notes.show');

    Route::get('/notes', [NotesController::class, 'index']);

    Route::get('/notes.create', function () {
        return view('notes.create');
    })->name('notes.create');

    Route::post('/notes/store', [NotesController::class, 'store'])->name('notes.store');

    Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('notes.delete');

    Route::get('/update/{note}', [NotesController::class, 'redirectToFormToUpdate'])->name('notes.update');

    Route::post('/save/update/{note}', [NotesController::class, 'update'])->name('save.update');

    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::post('/authenticated', [LoginController::class, 'authenticate'])->name('loggedin');
