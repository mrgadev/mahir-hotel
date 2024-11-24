<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\PaymentController;

Route::middleware('auth')->prefix('/payment')->name('payment.')->group(function(){
    Route::get('/pay/{transaction:invoice}', [PaymentController::class, 'bill'])->name('bill');
    Route::post('/store/cash', [PaymentController::class, 'cashPayment'])->name('cash');
    Route::post('/store/online', [PaymentController::class, 'onlinePayment'])->name('online');
    Route::post('/store/creditPayment', [PaymentController::class, 'creditPayment'])->name('creditPayment');
    Route::post('/store/addCash', [PaymentController::class, 'addCash'])->name('addCash');
    Route::post('/store/addXendit', [PaymentController::class, 'addXendit'])->name('addXendit');

    Route::get('/success/{transaction:invoice}', [PaymentController::class, 'success'])->name('success');
    Route::get('/failed/{id}', [PaymentController::class, 'failed'])->name('failed');
});