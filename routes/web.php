<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::controller(NotesController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/edit/{note}', 'edit');
        Route::get('/note/{note}', 'show');
        Route::get('/deleted', 'show_deleted');

        Route::post('/restore/{id}', 'restore');
        Route::post('/create', 'save');
        Route::patch('/edit/{note}', 'update');
        Route::delete('/delete/{note}', 'destroy');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/login', 'login_user');
        Route::post('/register', 'register_user');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', 'profile');
        Route::post('/logout', 'logout');
        Route::post('/update', 'update');
        Route::delete('/destroy', 'destroyAccount');
    });
});
