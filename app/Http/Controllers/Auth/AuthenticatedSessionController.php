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

    public function createEmail(): View
    {
        return view('auth.login-email');
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

    public function storeEmail(Request $request): RedirectResponse
    {
        $message = [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi'
        ];
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        if($user->hasRole('admin') || $user->hasRole('staff')) {
            return redirect()->intended(route('dashboard.home'));
        } elseif($user->hasRole('user')) {
            return redirect()->route('frontpage.index');
        } else {
            return redirect()->back()->with('error', 'Password atau nomor telepon salah!');
        }
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
