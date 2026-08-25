<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\BukuTamu;
use App\Http\Controllers\BukuTamuController;


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

    if (Auth::check() && Auth::user()->role === 'petugas') {
        return redirect()->route('petugas.dashboard');
    }

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
        'role' => 'petugas',
    ], $remember)) {

        request()->session()->regenerate();

        return redirect()->route('petugas.dashboard');
    }

    return back()
        ->withErrors([
            'username' => 'Username atau password salah.',
        ])
        ->withInput();

})->name('petugas.login.process');


/*
|--------------------------------------------------------------------------
| DASHBOARD PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/petugas/dashboard', function () {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    if (Auth::user()->role !== 'petugas') {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('petugas.login');
    }

    $totalTamu = BukuTamu::count();

    $tamuHariIni = BukuTamu::whereDate(
        'tanggal_jam',
        today()
    )->count();

    $belum = BukuTamu::where(
        'ket',
        'BELUM'
    )->count();

    $selesai = BukuTamu::where(
        'ket',
        'SELESAI'
    )->count();

    $tamuTerbaru = BukuTamu::orderBy(
        'tanggal_jam',
        'desc'
    )->take(10)->get();

    return view(
        'petugas.dashboard',
        compact(
            'totalTamu',
            'tamuHariIni',
            'belum',
            'selesai',
            'tamuTerbaru'
        )
    );

})->name('petugas.dashboard');


/*
|--------------------------------------------------------------------------
| HALAMAN INPUT TAMU
|--------------------------------------------------------------------------
*/

Route::get('/petugas/input-tamu', function () {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    return view('petugas.input-tamu');

})->name('petugas.input-tamu');


/*
|--------------------------------------------------------------------------
| SIMPAN TAMU
|--------------------------------------------------------------------------
*/

Route::post('/petugas/input-tamu', function () {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    request()->validate([
        'nama' => ['required'],
        'perihal' => ['required'],
        'keluhan' => ['nullable'],
    ]);

    $nomorTerakhir = BukuTamu::max('no_antrian');

    $nomorBaru = $nomorTerakhir
        ? $nomorTerakhir + 1
        : 1;

    BukuTamu::create([
        'no_antrian' => $nomorBaru,
        'tanggal_jam' => now(),
        'nama' => request('nama'),
        'perihal' => request('perihal'),
        'keluhan' => request('keluhan'),
        'ket' => 'BELUM',
    ]);

    return redirect()
        ->route('petugas.data-tamu')
        ->with(
            'success',
            'Data tamu berhasil ditambahkan.'
        );

})->name('petugas.input-tamu.store');


/*
|--------------------------------------------------------------------------
| DATA TAMU
|--------------------------------------------------------------------------
*/

Route::get('/petugas/data-tamu', function () {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    $dataTamu = BukuTamu::orderBy(
        'tanggal_jam',
        'desc'
    )->get();

    return view(
        'petugas.data-tamu',
        compact('dataTamu')
    );

})->name('petugas.data-tamu');


/*
|--------------------------------------------------------------------------
| HALAMAN EDIT TAMU
|--------------------------------------------------------------------------
*/

Route::get('/petugas/data-tamu/{id}/edit', function ($id) {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    $tamu = BukuTamu::findOrFail($id);

    return view(
        'petugas.edit-tamu',
        compact('tamu')
    );

})->name('petugas.tamu.edit');


/*
|--------------------------------------------------------------------------
| UPDATE TAMU
|--------------------------------------------------------------------------
*/

Route::put('/petugas/data-tamu/{id}', function ($id) {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    request()->validate([
        'nama' => ['required'],
        'perihal' => ['required'],
        'keluhan' => ['nullable'],
        'ket' => ['required'],
    ]);

    $tamu = BukuTamu::findOrFail($id);

    $tamu->update([
        'nama' => request('nama'),
        'perihal' => request('perihal'),
        'keluhan' => request('keluhan'),
        'ket' => request('ket'),
    ]);

    return redirect()
        ->route('petugas.data-tamu')
        ->with(
            'success',
            'Data tamu berhasil diubah.'
        );

})->name('petugas.tamu.update');


/*
|--------------------------------------------------------------------------
| HAPUS TAMU
|--------------------------------------------------------------------------
*/

Route::delete('/petugas/data-tamu/{id}', function ($id) {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    $tamu = BukuTamu::findOrFail($id);

    $tamu->delete();

    return redirect()
        ->route('petugas.data-tamu')
        ->with(
            'success',
            'Data tamu berhasil dihapus.'
        );

})->name('petugas.tamu.delete');


/*
|--------------------------------------------------------------------------
| SELESAIKAN TAMU
|--------------------------------------------------------------------------
*/

Route::put('/petugas/data-tamu/{id}/selesai', function ($id) {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    $tamu = BukuTamu::findOrFail($id);

    $tamu->update([
        'ket' => 'SELESAI',
    ]);

    return back()->with(
        'success',
        'Status tamu berhasil diubah menjadi SELESAI.'
    );

})->name('petugas.tamu.selesai');


/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

Route::get('/petugas/laporan', function () {

    if (!Auth::check()) {
        return redirect()->route('petugas.login');
    }

    $dataTamu = BukuTamu::orderBy(
        'tanggal_jam',
        'desc'
    )->get();

    return view(
        'petugas.laporan',
        compact('dataTamu')
    );

})->name('petugas.laporan');


/*
|--------------------------------------------------------------------------
| EXPORT EXCEL BUKU TAMU
|--------------------------------------------------------------------------
*/

Route::get('/buku-tamu-export', [BukuTamuController::class, 'export'])
    ->name('buku-tamu.export');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/petugas/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('landing');

})->name('petugas.logout');
