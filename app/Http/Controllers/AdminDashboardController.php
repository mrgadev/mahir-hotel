<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index() {
        $transaction = Transaction::where('user_id', Auth::user()->id)->firstOrFail();
        return view('dashboard.dashboard', compact('transaction'));
    }

    public function editProfile() {
        $regencies = Regency::all();
        return view('dashboard.profile.edit', compact('regencies'));
    }

    public function updateProfile(Request $request, User $user) {
        $message = [
            'avatar.image' => 'File yang diupload harus berformat gambar.',
            'avatar.mimes' => 'File yang diupload harus berformat jpeg, png, jpg, svg, avif, atau webp.',
            'birth.date' => 'Tanggal lahir harus dalam format tanggal.',
            'password.confirmed' => 'Password baru dan konfirmasi password harus sama.',
            'password.min' => 'Password baru minimal 6 karakter.',
            'email.email' => 'Format email tidak valid!',
        ];
        $data = $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,svg,avif,webp|nullable',
            'name' => 'string|max:255|nullable',
            'birth' => 'date|nullable',
            'email' => 'string|max:255|nullable',
            'phone' => 'string|max:255|nullable',
            'password' => 'nullable|confirmed|min:6'
        ], $message);
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('users', 'public');
            $data['avatar'] = $avatar;
        }

        if($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);
        return redirect()->route('admin.profile.edit')->with('success', 'Profile berhasil diupdate.');
    }
}
