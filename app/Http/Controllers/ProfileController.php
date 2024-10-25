<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $regencies = Regency::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'regencies' => $regencies
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Get current authenticated user
        $user = Auth::user();
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birth' => 'required|date',
            'id_number' => 'nullable',
            'id_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'regency_id' => 'required|exists:regencies,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

            if ($request->hasFile('id_photo')) {
                // Delete old photo if exists
                if ($user->id_photo) {
                    $oldPath = public_path('id_photo/' . $user->id_photo);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                
                // Upload new photo
                $fileName = time() . '_' . $request->file('id_photo')->getClientOriginalName();
                $request->file('id_photo')->move(public_path('id_photo'), $fileName);
                $data['id_photo'] = 'id_photo/' . $fileName;
            }

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $data['avatar'] = $avatarPath;
            } else {
                $data['avatar'] = $user->avatar ?? 'images/user.png';
            }

            // Update user's profile
            $user->update($data);

            return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password'
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah current_password cocok dengan password di database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama tidak sesuai'
            ]);
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password berhasil diupdate');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
