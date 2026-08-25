<?php

namespace App\Http\Controllers;

use App\Exports\BukuTamuExport;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BukuTamuController extends Controller
{
    /**
     * Menampilkan daftar buku tamu.
     */
    public function index()
    {
        $bukuTamus = BukuTamu::latest('tanggal_jam')->paginate(10);

        return view('buku-tamu.index', compact('bukuTamus'));
    }

    /**
     * Menampilkan form tambah buku tamu.
     */
    public function create()
    {
        return view('buku-tamu.create');
    }

    /**
     * Menyimpan data buku tamu.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_antrian' => 'required|integer|unique:buku_tamus,no_antrian',
            'tanggal_jam' => 'required|date',
            'nama' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keluhan' => 'nullable|string',
            'ket' => 'required|in:SELESAI,BELUM',
        ]);

        BukuTamu::create($validated);

        return redirect()
            ->route('buku-tamu.index')
            ->with('success', 'Data buku tamu berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail buku tamu.
     */
    public function show(BukuTamu $bukuTamu)
    {
        return view('buku-tamu.show', compact('bukuTamu'));
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(BukuTamu $bukuTamu)
    {
        return view('buku-tamu.edit', compact('bukuTamu'));
    }

    /**
     * Memperbarui data buku tamu.
     */
    public function update(Request $request, BukuTamu $bukuTamu)
    {
        $validated = $request->validate([
            'no_antrian' => 'required|integer|unique:buku_tamus,no_antrian,' . $bukuTamu->id,
            'tanggal_jam' => 'required|date',
            'nama' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keluhan' => 'nullable|string',
            'ket' => 'required|in:SELESAI,BELUM',
        ]);

        $bukuTamu->update($validated);

        return redirect()
            ->route('buku-tamu.index')
            ->with('success', 'Data buku tamu berhasil diperbarui.');
    }

    /**
     * Menghapus data buku tamu.
     */
    public function destroy(BukuTamu $bukuTamu)
    {
        $bukuTamu->delete();

        return redirect()
            ->route('buku-tamu.index')
            ->with('success', 'Data buku tamu berhasil dihapus.');
    }

    /**
     * Export buku tamu ke Excel.
     */
    public function export()
    {
        return Excel::download(
            new BukuTamuExport,
            'data-buku-tamu.xlsx'
        );
    }
}
