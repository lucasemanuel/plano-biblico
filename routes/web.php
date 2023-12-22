<?php

use App\Http\Controllers\AuthProviderController;
use App\Http\Controllers\DashboardController;
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

Route::view('/', 'welcome');

Route::get('dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('auth')->name('social.')->group(function () {
    Route::get('/redirect', [AuthProviderController::class, 'redirect'])->name('login');
    Route::get('/callback', [AuthProviderController::class, 'callback'])->name('callback');
});

require __DIR__ . '/auth.php';
