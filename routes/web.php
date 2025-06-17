<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

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
        return view('notes.home');
    });

    Route::get('notes/{note}', [NotesController::class, 'show'])->name('notes.show');

    Route::get('/notes', [NotesController::class, 'index']);

    Route::get('/notes/create', function () {
        return view('notes.create');
    })->name('notes.index');


    Route::post('/notes/store', [NotesController::class, 'store']);

    Route::post('/delete', [NotesController::class, 'destroy']);

    Route::get('/logout', [UsersController::class, 'logout']);

});

Route::post('/authenticate', [UsersController::class, 'authenticate']);
