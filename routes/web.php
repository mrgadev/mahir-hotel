<?php

use App\Http\Controllers\AccomdationPlanController;
use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HotelFacilitiesController;
use App\Http\Controllers\NearbyLocationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\RoomFacilitiesController;
use App\Http\Controllers\ServiceController;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');

    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/hotel_facilities', HotelFacilitiesController::class)->middleware('role:admin');

    Route::resource('/users_management', UsersManagementController::class)->middleware('role:admin');
    Route::put('/users_management/{users_management}/password', [UsersManagementController::class, 'updatePassword'])->name('users_management.updatePassword')->middleware('role:admin');

    Route::resource('/accomodation_plan', AccomdationPlanController::class)->middleware('role:admin');

    Route::resource('/room_facilities', RoomFacilitiesController::class)->middleware('role:admin');

    Route::resource('/nearby_location', NearbyLocationController::class)->middleware('role:admin');

    Route::resource('/faq', FaqController::class)->middleware('role:admin');

    Route::resource('/room', RoomController::class)->middleware('role:admin|staff');

    Route::resource('/promo', PromoController::class)->middleware('role:admin');

    Route::resource('/service', ServiceController::class)->middleware('role:admin');
});

Route::middleware('auth')->group(function () {
});

require __DIR__.'/auth.php';
require __DIR__.'/frontpage.php';

