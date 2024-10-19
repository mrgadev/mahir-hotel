<?php

use App\Http\Controllers\FrontpageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontpageController::class, 'index'])->name('frontpage.index');
