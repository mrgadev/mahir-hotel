<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function emailLogin(): View{
        return view('auth.email-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = User::where('phone', $request->phone)->first();
        // dd($user);
        if($user->hasRole('admin') || $user->hasRole('staff')) {
            return redirect()->intended(route('dashboard.home'));
        } elseif($user->hasRole('user')) {
            return redirect()->route('frontpage.index');
        } else {
            return redirect()->back()->with('error', 'Password atau nomor telepon salah!');
        }

    }

    public function emailLoginStore(Request $request): RedirectResponse{
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Coba login
        if (Auth::attempt($credentials)) {
            // Regenerate session
            $request->session()->regenerate();

            // $user = Auth::user(); // Ambil user yang login
            $user = User::where('email', $request->email)->first();
            // Cek role
            if($user->hasRole('admin') || $user->hasRole('staff')) {
                return redirect()->intended(route('dashboard.home'));
            } elseif($user->hasRole('user')) {
                return redirect()->route('frontpage.index');
            }
        }

        // Kalo gagal login
        return redirect()->back()
            ->withInput()
            ->withErrors(['email' => 'Email atau password salah!']);
        
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
