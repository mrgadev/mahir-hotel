<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingUserController extends Controller
{
    public function index() {
        return view('dashboard.user.bookings.index');
    }

    public function detail() {
        return view('dashboard.user.bookings.detail');
    }
}
