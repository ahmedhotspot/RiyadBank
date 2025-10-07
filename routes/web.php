<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Coustomer\CoustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
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
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {

    // Protected Routes (require authentication)
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/customers', [CoustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{customer}', [CoustomerController::class, 'show'])->name('customers.show');

        // Offers routes
        Route::get('/offers', [\App\Http\Controllers\Offer\OfferController::class, 'index'])->name('offers.index');
        Route::get('/offers/{offer}', [\App\Http\Controllers\Offer\OfferController::class, 'show'])->name('offers.show');

        // Profile routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// require __DIR__.'/auth.php'; // استخدام الـ auth routes المخصصة بدلاً من الافتراضية
