<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::controller(NotesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::get('/edit', 'edit');
    Route::get('/show/{note}', 'show');

    Route::post('/show', 'save');
    Route::patch('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/logout', 'logout');
    Route::post('/destroy', 'destroy');
    Route::post('/update', 'update');
});
