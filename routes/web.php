<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/cast', CastController::class);
    Route::resource('/genre', GenreController::class);
    Route::resource('/film', FilmController::class);
});


// Route Public
Route::get('/film', [FilmController::class, 'index'])->name('film.index');
Route::get('/film/{film}/', [FilmController::class, 'show'])->name('film.show');

Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');

Auth::routes();
