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
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_category_id' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
        ]);

        $imagePaths = [];
        if($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }

        Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'service_categories_id' => $data['service_category_id'],
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
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'service_category_id' => 'required',
            'image' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);

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

        // Memperbarui model Service dengan data yang baru
        $service->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'service_categories_id' => $data['service_category_id'],
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
        $service->delete();
        return redirect()->route('dashboard.service.index')->with('success', 'Service deleted successfully');
    }
}
