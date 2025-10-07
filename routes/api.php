<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\OfferStatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Customer routes
Route::get('customers', [CustomerController::class, 'index']);
Route::post('customers', [CustomerController::class, 'store']);

Route::prefix('offer')->group(function () {
    Route::get('status/{offer}', [OfferStatusController::class, 'show']);
    Route::post('inquiry', [OfferStatusController::class, 'inquiry']);
    Route::post('export', [OfferStatusController::class, 'export']);
    Route::post('rough-offer', [OfferStatusController::class, 'eligibility']);
    Route::post('initial-offer', [OfferStatusController::class, 'initial']);
    Route::post('initial-offer/{offerId}/decision', [OfferStatusController::class, 'decision']);
});

