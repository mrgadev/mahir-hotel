<?php

namespace App\Http\Controllers;

use App\Models\SiteSettingPartner;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    public function edit() {
        $site_setting = SiteSettings::where('id',1)->firstOrFail();
        $partners = SiteSettingPartner::all();
        return view('dashboard.admin.site-settings.edit', compact('site_setting', 'partners'));
    }

    public function update(Request $request, SiteSettings $site_setting) {
        $message = [
            'tagline.required' => 'Tagline wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone_text.required' => 'Teks nomor telepon wajib diisi',
            'maps_link' => 'Tautan alamat wajib diisi',
            'address' => 'Alamat wajib diisi',
            'payment_deadline' => 'Durasi transaksi wajib diisi!'
        ];
        $data = $request->validate([
            'tagline' => 'required',
            'description' => 'required',
            'phone' => 'required', 
            'phone_text' => 'required',
            'maps_link' => 'required', 
            'address' => 'required',
            'payment_deadline' => 'required'
        ], $message);
        // dd($site_setting);
        $site_setting->update($data);
        return redirect()->route('dashboard.site.settings.edit', compact('site_setting'))->with('success','Pengaturan situs berhasil diperbarui!');
    }
}
