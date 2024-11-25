<?php

namespace App\Http\Controllers;

use App\Models\PenarikanSaldo;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdrawals = PenarikanSaldo::all();
        return view('dashboard.admin.penarikan_saldo.index', compact('withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saldo = Saldo::where('user_id', Auth::user()->id)
                        ->latest()
                        ->first();
        return view('dashboard.user.penarikan_saldo.create', compact('saldo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
            'notes' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $penarikanSaldo = PenarikanSaldo::create([
            'user_id' => $user_id,
            'amount' => $data['amount'],
            'notes' => $data['notes'],
            'status' => 'Tertunda'
        ]);

        // $lastBalance = Saldo::where('user_id', $user_id)
        //                 ->latest()
        //                 ->first();

        // $newAmount = $lastBalance->amount - $data['amount'];

        // Saldo::create([
        //     'user_id' => $user_id,
        //     'transaction_id' => null,
        //     'debit' => 0,
        //     'credit' => $data['amount'],
        //     'amount' => $newAmount,
        // ]);

        return redirect()->route('dashboard.penarikan-saldo.success', $penarikanSaldo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(PenarikanSaldo $penarikanSaldo)
    {
        $saldo = Saldo::where('user_id', $penarikanSaldo->user_id)->latest()->first();
        return view('dashboard.admin.penarikan_saldo.show', compact('penarikanSaldo', 'saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenarikanSaldo $penarikanSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenarikanSaldo $penarikanSaldo)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        $lastBalance = Saldo::where('user_id', $penarikanSaldo->user_id)
                        ->latest()
                        ->first();

        if($data['status'] == 'Disetujui') {
            $newAmount = $lastBalance->amount - $penarikanSaldo->amount;
            Saldo::create([
                'user_id' => $penarikanSaldo->user_id,
                'transaction_id' => null,
                'debit' => 0,
                'credit' => $penarikanSaldo->amount,
                'amount' => $newAmount,
                'description' => 'Penarikan Saldo'
            ]);
        }

        $penarikanSaldo->update([
            'status' => $data['status']
        ]);

        return redirect()->route('dashboard.penarikan-saldo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenarikanSaldo $penarikanSaldo)
    {
        //
    }

    public function success(String $id){
        $penarikanSaldo = PenarikanSaldo::findOrFail($id);
        $saldo = Saldo::where('user_id', $penarikanSaldo->user_id)->latest()->first();
        return view('dashboard.user.penarikan_saldo.success', compact('penarikanSaldo','saldo'));
    }
}
