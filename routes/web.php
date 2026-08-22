<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');


/*
|--------------------------------------------------------------------------
| LOGIN PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/petugas/login', function () {
    return view('petugas.login');
})->name('petugas.login');


Route::post('/petugas/login', function () {

    $credentials = request()->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    $remember = request()->boolean('remember');

    if (Auth::attempt([
        'username' => $credentials['username'],
        'password' => $credentials['password'],
        'role'     => 'petugas',
    ], $remember)) {

        request()->session()->regenerate();

        return redirect()->route('petugas.dashboard');
    }

    return back()
        ->withErrors([
            'username' => 'Username atau password petugas salah.',
        ])
        ->withInput([
            'username' => $credentials['username'],
        ]);

})->name('petugas.login.process');


/*
|--------------------------------------------------------------------------
| DASHBOARD PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/petugas/dashboard', function () {

    // Belum login
    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    // Bukan petugas
    if (Auth::user()->role !== 'petugas') {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
            ->route('petugas.login')
            ->withErrors([
                'username' => 'Akun ini bukan akun petugas.',
            ]);
    }

    return view('petugas.dashboard');

})->name('petugas.dashboard');


/*
|--------------------------------------------------------------------------
| LOGOUT PETUGAS
|--------------------------------------------------------------------------
*/

Route::post('/petugas/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('petugas.login');

})->name('petugas.logout');