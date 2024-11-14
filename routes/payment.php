<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\PaymentController;

Route::middleware('auth')->prefix('/payment')->name('payment.')->group(function(){
    Route::post('/store/cash', [PaymentController::class, 'cashPayment'])->name('cash');
    Route::post('/store/online', [PaymentController::class, 'onlinePayment'])->name('online');
    Route::get('/success/{id}', [PaymentController::class, 'success'])->name('success');
    Route::get('/failed/{id}', [PaymentController::class, 'failed'])->name('failed');

});