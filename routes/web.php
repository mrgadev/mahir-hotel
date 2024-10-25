<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\HotelFacilitiesController;
use App\Models\HotelFacilities;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminDashboardController::class, 'editProfile'])->name('profile.edit');
    Route::resource('/hotel_facilities', HotelFacilitiesController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [FrontpageController::class, 'index'])->name('frontpage.index');
Route::get('/checkout', [FrontpageController::class, 'checkout'])->name('frontpage.checkout');
Route::get('/promo', [FrontpageController::class, 'promo'])->name('frontpage.promo');
Route::get('/daftar-kamar', [FrontpageController::class, 'rooms'])->name('frontpage.rooms');
Route::get('/detail/nama-kamar', [FrontpageController::class, 'room_detail'])->name('frontpage.room-detail');
Route::get('/layanan-lainnya', [FrontpageController::class, 'services'])->name('frontpage.services');
