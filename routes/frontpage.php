<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HotelFacilitiesController;

Route::name('frontpage.')->group(function() {
    Route::get('/', [FrontpageController::class, 'index'])->name('index');
    Route::get('/checkout', [FrontpageController::class, 'checkout'])->name('checkout');
    Route::get('/promo', [FrontpageController::class, 'promo'])->name('promo');
    Route::get('/daftar-kamar', [FrontpageController::class, 'rooms'])->name('rooms');
    Route::get('/detail/{id}', [FrontpageController::class, 'room_detail'])->name('rooms.detail');
    Route::get('/layanan-lainnya', [FrontpageController::class, 'services'])->name('services');
    Route::get('/layanan-lainnya/nama', [FrontpageController::class, 'services_detail'])->name('services.detail');
    Route::get('/kontak', [FrontpageController::class, 'contact'])->name('contact');
    Route::get('/tentang-kami', [FrontpageController::class, 'about'])->name('about');
});

