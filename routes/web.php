<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    ResponseController,
    PublicController,
    SeederController,
    Auth\RegisterController,
    Auth\LoginController,
    CMS\QuestionController,
    CMS\AnswerController,
};

Route::get('/', function () { 
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/main', [PublicController::class, 'index'])
    ->name('main.page');
Route::get('well-being', [PublicController::class, 'wellBeing'])
    ->name('well.being');
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
        Route::resource('response', ResponseController::class);
        Route::post('/table-seed', [SeederController::class, 'seeder'])
            ->name('table.seed');
    });

// Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
        Route::resource('response', ResponseController::class);
    });

// User
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');
        Route::resource('response', ResponseController::class);
    });