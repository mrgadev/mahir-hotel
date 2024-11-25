<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointUserController;
use App\Http\Controllers\RoomReviewController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\AccomdationPlanController;
use App\Http\Controllers\PenarikanSaldoController;
use App\Http\Controllers\SaldoController;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    
    Route::get('/my-bookings', [BookingUserController::class, 'index'])->name('user.bookings')->middleware('role:user');
    Route::post('/my-bookings/check-in/{transaction:invoice}', [BookingUserController::class, 'checkIn'])->name('user.bookings.checkin')->middleware('role:user');
    Route::post('/my-bookings/check-out/{transaction:invoice}', [BookingUserController::class, 'checkOut'])->name('user.bookings.checkout')->middleware('role:user');
    Route::get('/my-bookings/detail/{transaction:invoice}', [BookingUserController::class, 'detail'])->name('user.bookings.detail')->middleware('role:user');
    Route::get('/my-bookings/export/{transaction:invoice}', [BookingUserController::class, 'export'])->name('user.bookings.export');
    // Route::get('/my-point', [PointUserController::class, 'index'])->name('user.point')->middleware('role:user');
    // Route::get('/my-point/detail', [PointUserController::class, 'detail'])->name('user.point.detail')->middleware('role:user');
    Route::get('/my-wallet', [SaldoController::class, 'index'])->name('user.saldo')->middleware('role:user');
    Route::resource('/room-review', RoomReviewController::class)->names('room-review');
    Route::get('/penarikan-saldo/create', [PenarikanSaldoController::class, 'create'])->name('penarikan-saldo.create');
    Route::post('/penarikan-saldo', [PenarikanSaldoController::class, 'store'])->name('penarikan-saldo.store');
    Route::get('/penarikan-saldo/success/{id}', [PenarikanSaldoController::class, 'success'])->name('penarikan-saldo.success');
});