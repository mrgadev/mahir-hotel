<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle() {
        return Socialite::driver('google')
        ->scopes(['https://www.googleapis.com/auth/user.phonenumbers.read'])
        ->redirect();
        // return Socialite::driver('google')->userFromToken($token);

    }

    public function handleGoogleCallback() {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        
        if(!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'phone' => $googleUser->phone,
                // 'avatar' => $googleUser->avatar,
                'password' => Hash::make(rand(100000,999999)),
            ]);
        }
        if($googleUser->avatar) {
            $avatarContents = file_get_contents($googleUser->avatar);
            $avatarPath = 'avatars/'.uniqid().'.jpg';
            Storage::disk('public')->put($avatarPath, $avatarContents);

            $user->avatar = $avatarPath;
            $user->save();
        }
        $user->assignRole('user');

        Auth::login($user);
        return redirect()->route('frontpage.index');
    }
}
