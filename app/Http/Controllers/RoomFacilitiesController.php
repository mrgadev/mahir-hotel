<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomFacilities;
use Illuminate\Support\Facades\Storage;

class RoomFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_facilities = RoomFacilities::all();
        return view('dashboard.admin.room-facilities.index', compact('room_facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.room-facilities.create');
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
            'description' => 'nullable'
        ], $message);

        RoomFacilities::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
            'description' => $data['description'],
        ]);

        return redirect()->route('dashboard.room_facilities.index')->with('success', 'Fasilitas kamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomFacilities $room_facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomFacilities $room_facility)
    {
        return view('dashboard.admin.room-facilities.edit', compact('room_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomFacilities $room_facility)
    {
        $message = [
            'name.required' => 'Nama fasilitas wajib diisi!',
            'icon.mimes' => 'File harus bertipe: png,jpg,svg'
        ];

        $data = $request->validate([
            'name' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable'
        ], $message);

        if($request->has('icon')){
            $data['icon'] = $request->icon;
        } else {
            $data['icon'] = $room_facility->icon;
        }

        $room_facility->update($data);

        return redirect()->route('dashboard.room_facilities.index')->with('success', 'Fasilitas kamar berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomFacilities $room_facility)
    {
        $icon = $room_facility->icon;
        Storage::disk('public')->delete($icon);
        $room_facility->delete();

        return view('dashboard.admin.room-facilities.index')->with('success', 'Fasilitas hotel berhasil dihapus!');
        
    }
}
