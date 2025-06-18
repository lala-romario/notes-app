<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::post('/create/user', [UsersController::class, 'store']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/login', function() {
        return view('users.login');
    })->name('login');

    Route::get('/signup', function() {
        return view('users.signup');
    });
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function() {
        return view('notes.dashboard');
        
    })->name('dashboard');

    Route::get('notes/{note}', [NotesController::class, 'show'])->name('notes.show');

    Route::get('/notes', [NotesController::class, 'index']);

    Route::get('/notes.create', function () {
        return view('notes.create');
    })->name('notes.create');

    Route::get('update', [NotesController::class, 'update']);

    Route::post('/notes/store', [NotesController::class, 'store']);

    Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('notes.delete');

    Route::get('/logout', [UsersController::class, 'logout']);

});

Route::post('/authenticate', [UsersController::class, 'authenticate']);
