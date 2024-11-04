<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RoomFacilities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $message = [
            'name.required' => 'Nama kamar wajib diisi',
            'cover.required' => 'Gambar sampul wajib diunggah',
            'cover.mimes' => 'Format gambar tidak valid',
            'price.required' => 'Harga wajib diisi',
            'price.integer' => 'Harga harus berupa angka',
            'photos.required' => 'Gambar lainnya wajib diunggah',
            'room_facilities_id.required' => 'Fasilitas kamar wajib dipilih',
            'total_rooms.required' => 'Total kamar wajib diisi',
            'total_rooms.required' => 'Total kamar harus berupa angka'
        ];
        $data = $request->validate([
            'name' => 'required',
            'cover' => 'required|image|mimes:png,jpg,jpeg,webp,png,avif',
            'price' => 'required|integer',
            'photos' => 'required',
            'room_facilities_id' => 'required|array',
            'room_facilities_id.*' => 'exists:room_facilities,id',
            'total_rooms' => 'integer|required',
            'description' => 'nullable'
        ], $message);

        // dd($request->room_facilities_id);

        $room_slug_name = Str::slug($data['name']);

        if($request->file('cover')) {
            $cover_name = 'COVER-'.$room_slug_name.'-'.rand(000,999);
            $ext = strtolower($request->file('cover')->getClientOriginalExtension());
            $cover_full_name = $cover_name.'.'.$ext;
            $upload_path ='storage/rooms/';
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
                $upload_path = 'storage/rooms/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $photos[] = $image_url;
            }
        }

        // $room_facilities_id = [];
        // if($request->has('room_facilities_id')) {
        //     foreach($request->room_facilities_id as $item) {
        //         $room_facilities_id[] = $item;
        //     }
        // }
        // dd($room_facilities_id);


        // dd($photos);
        $room = new Room();
        $room->name = $data['name'];
        $room->slug = Str::slug($data['name']);
        $room->cover = $data['cover'];
        $room->price = $data['price'];
        $room->photos = implode('|',$photos);
        $room->description = $data['description'];
        $room->slug = $room_slug_name;
        $room->total_rooms = $data['total_rooms'];
        $room->save();

        $room->room_facility()->sync($request->room_facilities_id);
        // Room::create([
        //     'name' => $data['name'],
        //     'cover' => $data['cover'],
        //     'price' => $data['price'],
        //     'photos' => implode('|',$photos),
        //     'room_facilities_id' => implode(',',$room_facilities_id),
        //     'description' => $data['description']
        // ]);
        return  redirect()->route('dashboard.room.index')->with('success', 'Kamar berhasil ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('frontpage.room-detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $room_facilities = RoomFacilities::all();
        return view('dashboard.admin.room.edit', compact('room', 'room_facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $message = [
            'name.required' => 'Nama kamar wajib diisi',
            'cover.mimes' => 'Format gambar tidak valid',
            'price.required' => 'Harga wajib diisi',
            'price.integer' => 'Harga harus berupa angka',
            'photos.required' => 'Gambar lainnya wajib diunggah',
            'room_facilities_id.required' => 'Fasilitas kamar wajib dipilih',
            'total_rooms.required' => 'Total kamar wajib diisi',
            'total_rooms.integer' => 'Total kamar harus berupa angka'
        ];
        $existingImages = $room->photos ? explode('|', $room->photos) : [];
        $data = $request->validate([
            'name' => 'required',
            'cover' => 'nullable|image|mimes:png,jpg,jpeg,webp,png,avif',
            'price' => 'required|integer',
            'photos' => 'nullable',
            'room_facilities_id' => 'required|array',
            'room_facilities_id.*' => 'exists:room_facilities,id',
            'total_rooms' => 'integer|required',
            'description' => 'nullable'
        ], $message);

        $room_slug_name = Str::slug($data['name']);

        if($request->file('cover')) {
            $cover_name = 'COVER-'.$room_slug_name.'-'.rand(000,999);
            $ext = strtolower($request->file('cover')->getClientOriginalExtension());
            $cover_full_name = $cover_name.'.'.$ext;
            $upload_path ='storage/rooms/';
            $cover_url = $upload_path.$cover_full_name;
            $request->file('cover')->move($upload_path, $cover_full_name);
            $data['cover']= $cover_url;
        } else {
            $data['cover'] = $room->cover;
        }

        $photos = [];
        if($files = $request->file('photos')) {
            foreach($files as $index => $file) {
                $image_name = $index.'-'.$room_slug_name.'-'.rand(000,999);
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'storage/rooms/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $existingImages[] = $image_url;
            }
            $photos = implode('|',$existingImages);
        } else {
            $photos = $room->photos;
        }

        // $room_facilities_id = [];
        // if($request->has('room_facilities_id')) {
        //     foreach($request->room_facilities_id as $item) {
        //         $room_facilities_id[] = $item;
        //     }
        // }
        // dd($room_facilities_id);
        // If no new facilities selected, keep existing ones
        if (!$request->has('room_facilities_id')) {
            $facilities = $room->room_facility->pluck('id')->toArray();
        } else {
            // If empty array submitted, use it (will remove all)
            // If new facilities submitted, use those
            $facilities = $request->room_facilities_id;
        }
        
        $room->room_facility()->sync($facilities);


        // dd($photos);
        // $room = new Room();
        // $room->name = $data['name'];
        // $room->cover = $data['cover'];
        // $room->price = $data['price'];
        // $room->photos = implode('|',$photos);
        // $room->description = $data['description'];
        // $room->save();
        $room->update([
            'name' => $data['name'],
            'cover'=> $data['cover'],
            'price' => $data['price'],
            'total_rooms' => $data['total_rooms'],
            'slug' => $room_slug_name,
            'photos' => $photos,
            'description' => $data['description'],
        ]);

        // $room->room_facility()->sync($request->room_facilities_id);
        // Room::create([
        //     'name' => $data['name'],
        //     'cover' => $data['cover'],
        //     'price' => $data['price'],
        //     'photos' => implode('|',$photos),
        //     'room_facilities_id' => implode(',',$room_facilities_id),
        //     'description' => $data['description']
        // ]);
        return  redirect()->route('dashboard.room.index')->with('success', 'Kamar berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        try {
            DB::beginTransaction();
    
            // 1. Delete images from storage and database
            if ($room->photos) {
                $photos = explode('|', $room->photos);
                foreach ($photos as $photo) {
                    // Delete from storage
                    // Storage::delete('public/rooms/' . $photo);
                    $imagePath = url($photo);
                    if(file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
    
            // 2. Detach all facilities (remove relationships)
            $room->room_facility()->detach();
    
            // 3. Delete the room
            $room->delete();
    
            DB::commit();
    
            return redirect()->route('dashboard.room.index')->with('success', 'Room deleted successfully');
    
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to delete room: ' . $e->getMessage());
        }
    }
}
