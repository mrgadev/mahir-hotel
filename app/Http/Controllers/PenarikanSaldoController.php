<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\PenarikanSaldo;
use App\Models\Saldo;
use App\Models\User;
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
        $user = User::where('id', $saldo->user_id)->first();
        $banks = Bank::all();
        return view('dashboard.user.penarikan_saldo.create', compact('saldo', 'user', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
            'notes' => 'required',
            'nomor_rekening' => 'required',
            'bank_id' => 'required',
        ]);

        $user = Auth::user();

        $user->update([
            'bank_id' => $data['bank_id'],
            'nomor_rekening' => $data['nomor_rekening'],
        ]);

        $penarikanSaldo = PenarikanSaldo::create([
            'user_id' => $user->id,
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
        $user = User::where('id', $penarikanSaldo->user_id)->first();
        $bankName = Bank::where('id', $user->bank_id)->first();
        return view('dashboard.admin.penarikan_saldo.show', compact('penarikanSaldo', 'saldo', 'user', 'bankName'));
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
        $message = [
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar tidak sesuai!'
        ];
        $data = $request->validate([
            'status' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp,avif',
        ], $message);

        if($request->file('image')) {
            $image_name = 'IMAGE-'.$penarikanSaldo->id.'-'.rand(000,999);
            $ext = strtolower($request->file('image')->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path ='storage/penarikanSaldo/';
            $image_url = $upload_path.$image_full_name;
            $request->file('image')->move($upload_path, $image_full_name);
            $data['image']= $image_url;
        } else {
            $data['image'] = $penarikanSaldo->image;
        }

        if($request->has('status')) {
            $data['status'] = $request->status;
        } else {
            $data['status'] = $penarikanSaldo->status;
        }

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
            'status' => $data['status'],
            'image' => $data['image']
        ]);

        return redirect()->route('dashboard.penarikan-saldo.index')->with('success', 'Data berhasi diperbarui');
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
