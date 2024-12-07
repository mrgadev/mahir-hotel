<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SiteSettingPartner;
use Illuminate\Support\Facades\Storage;

class SiteSettingPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo_name = time() . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('logos', $logo_name, 'public');
        }

        SiteSettingPartner::create([
            'name' => $data['name'],
            'logo' => $logoPath,
            'link' => $data['link']
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteSettingPartner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteSettingPartner $partner)
    {
        return view('dashboard.admin.site-settings.edit_partner', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSettingPartner $partner)
    {
        $data = $request->validate([
            'logo' => 'nullable',
            'name' => 'required',
            'link' => 'required',
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logo_name = time() . '_' . $logo->getClientOriginalName();
            $logoPath = $logo->storeAs('logos', $logo_name, 'public');
        }else{
            $logoPath = $partner->logo;
        }

        $partner->update([
            'logo' => $logoPath,
            'name' => $data['name'],
            'link' => $data['link'],
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSettingPartner $partner)
    {
        if($partner->logo && Storage::exists($partner->logo)) {
        Storage::delete($partner->logo);
        }
        $partner->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }
}
