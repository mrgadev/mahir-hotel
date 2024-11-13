<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::all();
        return view('dashboard.admin.transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction) {
        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }
    
    public function changeCheckInStatus(Request $request, Transaction $transaction) {
        $data = $request->validate([
            'checkin_status' => 'required|in:Sudah,Belum,Dibatalkan'
        ]);

        $transaction->update($data);
        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }

    public function changePaymentStatus(Request $request, Transaction $transaction) {
        $data = $request->validate([
            'payment_status' => 'required|string'
        ]);

        $transaction->update($data);
        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }
}
