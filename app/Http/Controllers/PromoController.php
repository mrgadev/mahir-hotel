<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::all();
        return view('dashboard.admin.promos.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.promos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'cover' => 'required',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if($request->hasFile('cover')){
            $coverPath = $request->file('cover')->store('cover', 'public');
        }

        Promo::create([
            'name' => $request->name,
            'code' => $request->code,
            'cover' => $coverPath,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('dashboard.promo.index')->with('success', 'Promo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promo $promo)
    {
        return view('dashboard.admin.promos.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'cover' => 'nullable',
            'amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if($request->hasFile('cover')){
            $coverPath = $request->file('cover')->store('cover', 'public');
        } else {
            $coverPath = $promo->cover;
        }

        $promo->update([
            'name' => $request->name,
            'code' => $request->code,
            'cover' => $coverPath,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('dashboard.promo.index')->with('success', 'Promo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('dashboard.promo.index')->with('success', 'Promo deleted successfully');
    }
}
