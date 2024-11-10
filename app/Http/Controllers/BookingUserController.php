<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingUserController extends Controller
{
    public function index() {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('dashboard.user.bookings.index', compact('transactions'));
    }

    public function detail(Transaction $transaction) {
        return view('dashboard.user.bookings.detail', compact('transaction'));
    }
}
