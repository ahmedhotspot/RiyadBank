<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Coustomer\CoustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Authentication Routes (outside localization)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Localized Routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
], function () {

    // Protected Routes (require authentication)

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/customers', [CoustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CoustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CoustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id?}', [CoustomerController::class, 'show'])->name('customers.show');

    // Offers routes
    Route::get('/offers', [\App\Http\Controllers\Offer\OfferController::class, 'index'])->name('offers.index');
    Route::get('/offers/{offer}', [\App\Http\Controllers\Offer\OfferController::class, 'show'])->name('offers.show');

    // API Call Logs routes
    Route::get('/logs', [\App\Http\Controllers\ApiCallLog\ApiCallLogController::class, 'index'])->name('logs.index');
    Route::get('/logs/{log}', [\App\Http\Controllers\ApiCallLog\ApiCallLogController::class, 'show'])->name('logs.show');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// require __DIR__.'/auth.php'; // استخدام الـ auth routes المخصصة بدلاً من الافتراضية
