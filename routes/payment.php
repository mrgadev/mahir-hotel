<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\TransactionController;

Route::middleware('auth')->prefix('/payment')->name('payment.')->group(function(){
    Route::post('/store/cash', [TransactionController::class, 'cashPayment'])->name('cash');
    Route::post('/store/online', [TransactionController::class, 'onlinePayment'])->name('online');
    Route::get('/success/{id}', [TransactionController::class, 'success'])->name('success');
    Route::get('/failed/{id}', [TransactionController::class, 'failed'])->name('failed');

});