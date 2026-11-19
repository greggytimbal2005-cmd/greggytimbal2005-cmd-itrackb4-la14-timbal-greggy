<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies/create', [MovieController::class, 'create'])
    ->name('movies.create');

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{genre}', [MovieController::class, 'filter'])
    ->name('movies.filter');

Route::resource('movies', MovieController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('movies', MovieController::class)->only(['index', 'show', ]);

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    

