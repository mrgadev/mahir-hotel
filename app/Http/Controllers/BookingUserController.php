<?php

namespace App\Http\Controllers;

use App\Models\RoomReview;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Auth;

class BookingUserController extends Controller
{
    public function index() {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('dashboard.user.bookings.index', compact('transactions'));
    }

    public function detail(Transaction $transaction) {
        $room_review = RoomReview::where('transaction_id', $transaction->id)->first();
        return view('dashboard.user.bookings.detail', compact('transaction', 'room_review'));
    }

    public function export(Transaction $transaction) {
        // $room_review = RoomReview::where('transaction_id', $transaction->id)->first();
        $filename = $transaction->invoice."-".date("d-m-Y");
        return Pdf::view('dashboard.user.bookings.export', ['transaction' => $transaction])
            ->format('a4')
            ->name($filename.'.pdf');
        // return view('dashboard.user.bookings.export', compact('transaction', 'room_review'));
    }
}
