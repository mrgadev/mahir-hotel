<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RoomFacilities;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('dashboard.admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_facilities = RoomFacilities::all();
        return view('dashboard.admin.room.create', compact('room_facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'cover' => 'required|image|mimes:png,jpg,jpeg,webp,png,avif',
            'price' => 'required|integer',
            'photos' => 'required',
            'room_facilities_id' => 'required|exists:room_facilities,id',
            'description' => 'nullable'
        ]);

        $room_slug_name = Str::slug($data['name']);

        if($request->file('cover')) {
            $cover_name = 'COVER-'.$room_slug_name.'-'.rand(000,999);
            $ext = strtolower($request->file('cover')->getClientOriginalExtension());
            $cover_full_name = $cover_name.'.'.$ext;
            $upload_path ='storage/rooms';
            $cover_url = $upload_path.$cover_full_name;
            $request->file('cover')->move($upload_path, $cover_full_name);
            $data['cover']= $cover_url;
        }

        $photos = [];
        if($files = $request->file('photos')) {
            foreach($files as $index => $file) {
                $image_name = $index.'-'.$room_slug_name.'-'.rand(000,999);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'storage/rooms';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $photos[] = $image_url;
            }
        }


        // dd($photos);
        Room::create([
            'name' => $data['name'],
            'cover' => $data['cover'],
            'price' => $data['price'],
            'photos' => implode('|',$photos),
            'room_facilities_id' => implode(',',$data['room_facilities_id']),
            'description' => $data['description']
        ]);
        return  redirect()->route('dashboard.room.index')->with('success', 'Kamar berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
