<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        $service_categories = ServiceCategory::all();
        return view('dashboard.admin.services.index', compact('services', 'service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service_categories = ServiceCategory::all();
        return view('dashboard.admin.services.create', compact('service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => 'Nama layanan wajib diisi',
            'description.required' => 'Deskripsi layanan wajib diisi',
            'service_category_id.required' => 'Kategori layanan wajib dipilih',
            'image.required' => 'Gambar wajib diunggah',
            'image.mimes' => 'Format gambar tidak valid!',
            'cover.required' => 'Gambar sampul wajib diunggah',
            'cover.mimes' => 'Format gambar sampul tidak valid',
            'price.required' => 'Harga wajib diisi'
        ];
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_category_id' => 'required',
            'image' => 'required',
            'cover' => 'required|mimes:jpeg,png,jpg,avif,webp',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
        ], $message);

        $imagePaths = [];
        if($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }

        if($request->hasFile('cover')){
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'service_categories_id' => $data['service_category_id'],
            'cover' => $coverPath,
            'image' => json_encode($imagePaths),
            'price' => $data['price'],
        ]);

        return redirect()->route('dashboard.service.index')->with('success', 'Service created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service_categories = ServiceCategory::all();
        return view('dashboard.admin.services.edit', compact('service', 'service_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $message = [
            'name.required' => 'Nama layanan wajib diisi',
            'description.required' => 'Deskripsi layanan wajib diisi',
            'service_category_id.required' => 'Kategori layanan wajib dipilih',
            'image.mimes' => 'Format gambar tidak valid!',
            'cover.mimes' => 'Format gambar sampul tidak valid',
            'price.required' => 'Harga wajib diisi'
        ];
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_category_id' => 'required',
            'cover' => 'nullable',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ], $message);

        // Menyimpan array untuk menyimpan semua gambar
        $imagePaths = [];

        if($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('images', 'public');
                $imagePaths[] = $imagePath; // Menambahkan path gambar ke array
            }
        }else{
            $imagePaths = json_decode($service->image); // Mengambil array gambar yang ada di database
        }

        if($request->hasFile('cover')){
            $coverPath = $request->file('cover')->store('covers', 'public');
        }else{
            $coverPath = $service->cover;
        }

        // Memperbarui model Service dengan data yang baru
        $service->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'service_categories_id' => $data['service_category_id'],
            'cover' => $coverPath,
            'price' => $data['price'],
            'image' => json_encode($imagePaths) // Mengubah array menjadi JSON
        ]);

        return redirect()->route('dashboard.service.index')->with('success', 'Service updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            // $decodedImage = json_decode($service->image);
            $photos = explode('|', $service->image);
            // dd($photos);
            foreach ($photos as $photo) {
                // Delete from storage
                // Storage::delete('public/services/' . $photo);
                // $imagePath = url($photo);
                if(file_exists($photo)) {
                    unlink($photo);
                }
            }
        }

        if($service->cover && file_exists($service->cover)) {
            unlink($service->cover);
        }
        $service->delete();
        return redirect()->route('dashboard.service.index')->with('success', 'Service deleted successfully');
    }
}
