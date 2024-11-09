<?php

use App\Http\Controllers\AccomdationPlanController;
use App\Models\HotelFacilities;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BulkAction;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HotelFacilitiesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NearbyLocationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\RoomFacilitiesController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Models\Message;
use Symfony\Component\Mime\MessageConverter;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');

    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/hotel_facilities', HotelFacilitiesController::class)->names('hotel_facilities')->middleware(middleware: 'role:admin|staff');
    Route::post('/fasilitas-hotel/bulkDelete', [BulkAction::class, 'hotelFacilitiesBulkDelete'])->name('hotel-facilities.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/users_management', UsersManagementController::class)->middleware('role:admin');
    Route::put('/users_management/{users_management}/password', [UsersManagementController::class, 'updatePassword'])->name('users_management.updatePassword')->middleware('role:admin');

    Route::resource('/accomodation_plan', AccomdationPlanController::class)->middleware('role:admin|staff');
    Route::post('/accomodation_plan/bulkDelete', [BulkAction::class, 'accomodationPlanBulkDelete'])->name('accomodation_plan.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/room_facilities', RoomFacilitiesController::class)->middleware('role:admin|staff');
    Route::post('/room_facilities/bulkDelete', [BulkAction::class, 'roomFacilitiesBulkDelete'])->name('room_facilities.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/nearby_location', NearbyLocationController::class)->middleware('role:admin|staff');
    Route::post('/nearby_location/bulkDelete', [BulkAction::class, 'nearbyLocationBulkDelete'])->name('nearby_location.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/faq', FaqController::class)->middleware('role:admin|staff');
    Route::post('/faq/bulkDelete', [BulkAction::class, 'faqBulkDelete'])->name('faq.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/room', RoomController::class)->middleware('role:admin|staff');
    Route::post('/room/bulkDelete', [BulkAction::class, 'roomBulkDelete'])->name('room.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/promo', PromoController::class)->middleware('role:admin|staff');
    Route::post('/promo/bulkDelete', [BulkAction::class, 'promoBulkDelete'])->name('promo.bulkDelete')->middleware('role:admin|staff');

    Route::resource('/service', ServiceController::class)->middleware('role:admin|staff');
    Route::post('/service/bulkDelete', [BulkAction::class,'serviceBulkDelete'])->name('service.bulkDelete')->middleware('role:admin|staff');
    
    Route::resource('/service_category', ServiceCategoryController::class)->middleware('role:admin|staff');
    Route::post('/service_category/bulkDelete', [BulkAction::class,'serviceCategoryBulkDelete'])->name('service_category.bulkDelete')->middleware('role:admin|staff');

    Route::get('/pesan', [MessageController::class, 'index'])->name('message')->middleware('role:admin|staff');
    Route::post('/pesan/bulkDelete', [BulkAction::class,'pesanBulkDelete'])->name('pesan.bulkDelete')->middleware('role:admin|staff');

    Route::get('/pesan/{message:slug}', [MessageController::class, 'show'])->name('message.show')->middleware('role:admin|staff');

    Route::delete('/pesan/{message}', [MessageController::class, 'destroy'])->name('message.delete')->middleware('role:admin|staff');
});

Route::middleware('auth')->group(function () {
});

require __DIR__.'/auth.php';
require __DIR__.'/frontpage.php';
require __DIR__.'/user.php';
require __DIR__.'/payment.php';

