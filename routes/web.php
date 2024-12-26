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
    Route::get('/login', 'login')->name('login')->middleware(['guest']);
    Route::get('/register', 'register')->name('register')->middleware(['guest']);
    Route::get('/profile', 'profile')->middleware(['auth']);


    Route::post('/login', 'login_user')->middleware(['guest']);
    Route::post('/register', 'register_user')->middleware(['guest']);
    Route::post('/logout', 'logout')->middleware(['auth']);
    Route::delete('/destroy', 'destroyAccount')->middleware(['auth']);
    Route::post('/update', 'update')->middleware(['auth']);
});
