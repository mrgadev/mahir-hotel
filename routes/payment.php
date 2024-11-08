<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\TransactionController;

Route::middleware('auth')->prefix('/payment')->name('payment.')->group(function(){
    Route::post('/store', [TransactionController::class, 'store'])->name('store');
});