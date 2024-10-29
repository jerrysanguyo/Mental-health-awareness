<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    Auth\RegisterController,
    Auth\LoginController,
    CMS\QuestionController,
    CMS\AnswerController,
};

Route::get('/', function () { 
    return view('welcome');
})->name('welcome');

Auth::routes();
// to be deleted.
Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
// registration
Route::get('/registration', [RegisterController::class, 'index'])
    ->name('registration');
Route::post('/registration/store', [RegisterController::class, 'store'])
    ->name('register.store');
// login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('Login/check', [LoginController::class, 'login'])
    ->name('login.check');

// Superadmin
Route::middleware(['auth', 'role:superadmin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
        Route::resource('question', QuestionController::class);
        Route::resource('answer', AnswerController::class);
    });

// Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
    });

// User
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
    });