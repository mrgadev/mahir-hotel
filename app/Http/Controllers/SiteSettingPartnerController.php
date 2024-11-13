<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SiteSettingPartner;

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
        dd($request->all());
        $data = $request->validate([
            'logo' => 'required|image|mimes:svg,png,jpg,jpeg,webp,avif',
            'name' => 'required|string',
            'link' => 'required|string'
        ]);
        $name_slug = Str::slug($data['name']);
        if($request->file('logo')) {
            $partner_name = 'PARTNER-'.$name_slug.'-'.rand(000,999);
            $ext = strtolower($request->file('logo')->getClientOriginalExtension());
            $partner_full_name = $partner_name.'.'.$ext;
            $upload_path ='storage/partners/';
            $partner_url = $upload_path.$partner_full_name;
            $request->file('logo')->move($upload_path, $partner_full_name);
            $data['logo']= $partner_url;
        }
        SiteSettingPartner::create($data);

        return response()->json(['success' => 'Partner created successfully.']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSettingPartner $partner)
    {
        dd($request->all());
        $data = $request->validate([
            'logo' => 'nullable|image|mimes:svg,png,jpg,jpeg,webp,avif',
            'name' => 'required|string',
            'link' => 'required|string'
        ]);
        $name_slug = Str::slug($data['name']);
        if($request->file('logo')) {
            $partner_name = 'PARTNER-'.$name_slug.'-'.rand(000,999);
            $ext = strtolower($request->file('logo')->getClientOriginalExtension());
            $partner_full_name = $partner_name.'.'.$ext;
            $upload_path ='storage/partners/';
            $partner_url = $upload_path.$partner_full_name;
            $request->file('logo')->move($upload_path, $partner_full_name);
            $data['logo']= $partner_url;
        } else {
            $data['logo'] = $partner->logo;
        }

        $partner->update([
            'name' => $data['name'],
            'logo' => $data['logo'],
            'link' => $data['link']
        ]);
        return response()->json(['success' => 'Partner berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSettingPartner $partner)
    {
        $partner->delete();
        return response()->json(['success' => 'Partner berhasil dihapus']);
    }
}
