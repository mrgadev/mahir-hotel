<?php

namespace App\Http\Controllers;

use App\Models\HotelFacilities;
use Illuminate\Http\Request;

class HotelFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel_facilities = HotelFacilities::all();
        return view('dashboard.admin.hotel-facilities.index', compact('hotel_facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.hotel-facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => 'Nama fasilitas wajib diisi!',
            'icon.required' => 'Icon fasilitas wajib diupload!',
        ];

        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'description' => 'nullable',
        ], $message);


        HotelFacilities::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
            'description' => $data['description'],
        ]);

        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Fasilitas hotel berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelFacilities $hotel_facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelFacilities $hotel_facility)
    {
        return view('dashboard.admin.hotel-facilities.edit', compact('hotel_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelFacilities $hotel_facility)
    {
        $message = [
            'name.required' => 'Nama fasilitas wajib diisi!',
        ];

        $data = $request->validate([
            'name' => 'required',
            'icon' => 'nullable',
            'description' => 'required',
        ], $message);

        if($request->hasFile('icon')){
            $iconPath = $request->file('icon')->store('icons', 'public');
            $hotel_facility->icon = $iconPath;
        }else{
            $iconPath = $hotel_facility->icon;
        }

        $hotel_facility->update([
            'name' => $data['name'],
            'icon' => $iconPath,
            'description' => $data['description'],
        ]);

        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Fasilitas hotel berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelFacilities $hotel_facility)
    {
        $hotel_facility->delete();
        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Fasilitas hotel berhasil dihapus.');
    }
}
