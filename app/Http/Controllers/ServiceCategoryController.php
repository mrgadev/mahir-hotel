<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_categories = ServiceCategory::all();
        return view('dashboard.admin.service-categories.index', compact('service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.service-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        ServiceCategory::create($request->all());
        return redirect()->route('dashboard.service_category.index')->with('success', 'Kategori layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $service_category)
    {
        return view('dashboard.admin.service-categories.edit', compact('service_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $service_category)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        $service_category->update($request->all());
        return redirect()->route('dashboard.service_category.index')->with('success', 'Kategori layanan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $service_category)
    {
        $service_category->delete();
        return redirect()->route('dashboard.service_category.index')->with('success', 'Kategori layanan berhasil dihapus');
    }
}
