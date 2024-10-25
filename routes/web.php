<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HotelFacilitiesController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');
    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
});

require __DIR__.'/auth.php';


Route::get('/', [FrontpageController::class, 'index'])->name('frontpage.index');
Route::get('/checkout', [FrontpageController::class, 'checkout'])->name('frontpage.checkout');
Route::get('/promo', [FrontpageController::class, 'promo'])->name('frontpage.promo');
Route::get('/daftar-kamar', [FrontpageController::class, 'rooms'])->name('frontpage.rooms');
Route::get('/detail/nama-kamar', [FrontpageController::class, 'room_detail'])->name('frontpage.rooms.detail');
Route::get('/layanan-lainnya', [FrontpageController::class, 'services'])->name('frontpage.services');
Route::get('/layanan-lainnya/nama', [FrontpageController::class, 'services_detail'])->name('frontpage.services.detail');
Route::get('/kontak', [FrontpageController::class, 'contact'])->name('frontpage.contact');
