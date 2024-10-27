<?php

use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HotelFacilitiesController;
use App\Http\Controllers\UsersManagementController;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');
    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/hotel_facilities', HotelFacilitiesController::class);
    Route::resource('/users_management', UsersManagementController::class);
});

Route::middleware('auth')->group(function () {
});

require __DIR__.'/auth.php';
require __DIR__.'/frontpage.php';

