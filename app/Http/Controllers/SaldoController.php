<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.saldo.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Saldo $saldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saldo $saldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saldo $saldo)
    {
        //
    }

    public function cancelTransaction(String $id){
        $transaction = Transaction::findOrFail($id);
        
        // Cek apakah transaksi sudah dibatalkan
        if ($transaction->checkin_status === "Dibatalkan") {
            return redirect()->back()->with('error', 'Transaksi sudah dibatalkan sebelumnya');
        }
        
        // Update status transaksi
        $transaction->checkin_status = "Dibatalkan";
        $transaction->save();

        // Ambil saldo terakhir user
        $lastBalance = Saldo::where('user_id', $transaction->user_id)
                        ->latest()
                        ->first(); // Gunakan first() karena kita akan handle jika null

        // Hitung saldo baru
        $newAmount = $lastBalance ? $lastBalance->amount + $transaction->total_price : $transaction->total_price;

        // Buat record saldo baru
        Saldo::create([
            'user_id' => $transaction->user_id,
            'transaction_id' => $transaction->id, // Pastikan ini sesuai dengan kolom di database
            'debit' => $transaction->total_price,
            'credit' => 0,
            'amount' => $newAmount
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan');
    }
}
