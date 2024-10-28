<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    Auth\RegisterController,
    Auth\LoginController,
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// to be deleted.
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
// registration
Route::get('/registration', [RegisterController::class, 'index'])
    ->name('registration');
Route::post('/registration/store', [RegistrationController::class, 'store'])
    ->name('register.store');
// login
Route::get('/Log-in', [LoginController::class, 'index'])
    ->name('Login');
Route::post('Log-in/check', [LoginController::class, 'login'])
    ->name('login.check');