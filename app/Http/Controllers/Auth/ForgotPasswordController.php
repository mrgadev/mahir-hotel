<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Fonnte;

class ForgotPasswordController extends Controller
{
    use Fonnte;
    public function forgotPasswordFormPhone() {
        return view('auth.forgot-password.forgot-password');
    }

    public function forgotPasswordProcess(Request $request) {
        $phone = $request->phone;
        

        $user = User::where('phone', $phone)->first();
        if($user) {
            $otp = rand(000000,999999);
            $user->otp = $otp;
            $user->save();
            $random_url = Str::random(32);
            // kirim pesan wa berupa kode otp untuk reset password
            $message = "Halo *$user->name*,\n\nSilahkan masukkan kode OTP berikut ini untuk mereset kata sandi Anda, \n\n*$otp*";
            $this->send_message($phone, $message);
            session(['user' => $user]);
            return redirect()->route('forgot.password.verify', ['phone' => $phone, 'random_url' => $random_url]);
        }
    }

    public function forgotPasswordVerify(Request $request, $phone, $random_url) {
        if(session('user')) {
            $user = session('user');
        } else {
            $user = User::where('phone', $phone);
        }
        return view('auth.forgot-password.verify', compact('user'));
    }
}
