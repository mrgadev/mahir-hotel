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
}
