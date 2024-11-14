<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\RoomReviewController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\AccomdationPlanController;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    
    Route::get('/my-bookings', [BookingUserController::class, 'index'])->name('user.bookings')->middleware('role:user');
    Route::get('/my-bookings/detail/{transaction:invoice}', [BookingUserController::class, 'detail'])->name('user.bookings.detail')->middleware('role:user');
    Route::get('/my-point', [PointUserController::class, 'index'])->name('user.point')->middleware('role:user');
    Route::get('/my-point/detail', [PointUserController::class, 'detail'])->name('user.point.detail')->middleware('role:user');
    Route::resource('/room-review', RoomReviewController::class)->names('user.room-review')->middleware('role:user');
});