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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\RoomFacilitiesController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteSettingPartnerController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\TransactionController;
use App\Models\Message;
use App\Models\SiteSettingPartner;
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
    Route::post('/users_management/bulkUpdateRole', [BulkAction::class, 'updateRole'])->name('users_management.updateRole')->middleware('role:admin');

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

    // Route::resource('/transactions', TransactionController::class)->middleware('role:admin|staff');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index')->middleware('role:admin|staff');
    Route::post('/transactions/bulkUpdateStatus', [BulkAction::class, 'updateStatus'])->name('transactions.updateStatus')->middleware('role:admin');
    Route::post('/transactions/bulkUpdateStatusCheckin', [BulkAction::class, 'updateStatusCheckin'])->name('transactions.updateStatusCheckin')->middleware('role:admin');
    Route::get('/transaction/{transaction:invoice}', [TransactionController::class, 'show'])->name('transaction.show')->middleware('role:admin|staff');
    Route::put('/transaction/{transaction}/checkin-status', [TransactionController::class, 'changeCheckInStatus'])->name('transaction.changeCheckInStatus')->middleware('role:admin|staff');
    Route::put('/transaction/{transaction}/payment-status', [TransactionController::class, 'changePaymentStatus'])->name('transaction.changePaymentStatus')->middleware('role:admin|staff');
    Route::put('/transaction/bulk-update-check-in-status', [TransactionController::class, 'updateCheckInStatus'])->name('transaction.bulkAction')->middleware('role:admin|staff');

    Route::get('/message', [MessageController::class, 'index'])->name('message')->middleware('role:admin|staff');
    Route::post('/message/bulkDelete', [BulkAction::class,'pesanBulkDelete'])->name('pesan.bulkDelete')->middleware('role:admin|staff');

    Route::get('/message/{message:slug}', [MessageController::class, 'show'])->name('message.show')->middleware('role:admin|staff');

    Route::delete('/pesan/{message}', [MessageController::class, 'destroy'])->name('message.delete')->middleware('role:admin|staff');

    Route::get('/site-settings', [SiteSettingsController::class, 'edit'])->name('site.settings.edit')->middleware('role:admin');
    Route::put('/site-settings/{site_setting}', [SiteSettingsController::class, 'update'])->name('site.settings.update')->middleware('role:admin');
    
    Route::resource('/partners', SiteSettingPartnerController::class)->middleware('role:admin');
    
    Route::get('/report', [ReportController::class, 'index'])->name('report.index')->middleware('role:admin|staff');
    Route::post('/export-transactions', [ReportController::class, 'exportTransactions'])->name('export-transactions');
});

Route::middleware('auth')->group(function () {
});

require __DIR__.'/auth.php';
require __DIR__.'/frontpage.php';
require __DIR__.'/user.php';
require __DIR__.'/payment.php';

