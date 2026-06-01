<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;

Route::get('/', [ChirpController::class, 'index']);

Route::get('/search', [ChirpController::class, 'show']);

Route::get('/user/{id}', [UserController::class, 'index']);

Route::post('/like/{chirp}', [ChirpController::class, 'toggleLike']);

Route::middleware('auth')->group(function () {
    Route::resource('chirps', ChirpController::class)
        ->only(['store', 'edit', 'update', 'destroy']);
});

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

/** Same as
Route::post('/chirps', [ChirpController::class, 'store']);

Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);

Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);

Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
*/
