<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuthUser
{
    public function showLogin()
    {
        // Jika sudah login, langsung ke dashboard petugas
        if (Auth::check()) {
            return redirect()->route('petugas.dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {

            // Regenerate session setelah berhasil login
            $request->session()->regenerate();

            return redirect()->route('petugas.dashboard');
        }

        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
