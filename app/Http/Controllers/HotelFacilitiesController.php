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
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('icon')){
            $iconPath = $request->file('icon')->store('icons', 'public');
        }

        HotelFacilities::create([
            'name' => $data['name'],
            'icon' => $iconPath,
            'description' => $data['description'],
        ]);

        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Hotel Facility created successfully.');
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
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'nullable',
            'description' => 'required',
        ]);

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

        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Hotel Facility updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelFacilities $hotel_facility)
    {
        $hotel_facility->delete();
        return redirect()->route('dashboard.hotel_facilities.index')->with('success', 'Hotel Facility deleted successfully.');
    }
}
