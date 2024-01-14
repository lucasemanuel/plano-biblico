<?php

use App\Http\Controllers\AuthProviderController;
use App\Http\Controllers\ExcerptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('home', HomeController::class)
    ->middleware(['auth', 'verified.social'])
    ->name('home');

Route::prefix('auth')->name('social.')->group(function () {
    Route::get('/redirect', [AuthProviderController::class, 'redirect'])->name('login');
    Route::get('/callback', [AuthProviderController::class, 'callback'])->name('callback');
});

Route::prefix('excerpts')->name('excerpts.')->middleware(['auth', 'verified.social'])->group(function () {
    Route::get('/{excerpt}', [ExcerptController::class, 'show'])->name('show');
    Route::patch('/{excerpt}', [ExcerptController::class, 'update'])->name('update');
});

require __DIR__.'/auth.php';
