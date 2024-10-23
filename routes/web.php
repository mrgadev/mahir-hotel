<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontpageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [FrontpageController::class, 'index'])->name('frontpage.index');
<<<<<<< HEAD
Route::get('/checkout', [FrontpageController::class, 'checkout'])->name('frontpage.index');
=======
Route::get('/promo', [FrontpageController::class, 'promo'])->name('frontpage.promo');
Route::get('/daftar-kamar', [FrontpageController::class, 'rooms'])->name('frontpage.rooms');
Route::get('/detail/nama-kamar', [FrontpageController::class, 'room_detail'])->name('frontpage.room-detail');
>>>>>>> fd48bc1ea40ff99f407dc4f3421e4bf7623d3ad5
