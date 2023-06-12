<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Homepage;
use App\Http\Livewire\Welcome;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::middleware('guest')->group(function () {
    Route::get('/', Welcome::class)->name('welcome');
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('home', Homepage::class)->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware('auth')->group(function () {
    Route::post('/email/verification-notification', [AuthController::class, 'verificationNotification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verificationVerify'])
        ->middleware('signed')
        ->name('verification.verify');
    Route::view('/email/verify', 'auth.verify-email')
        ->name('verification.notice');
});
