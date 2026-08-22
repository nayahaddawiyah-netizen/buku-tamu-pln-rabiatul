<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Menampilkan semua data tamu.
     */
    public function index()
    {
        $tamus = Tamu::latest()->get();

        return view('tamu.index', compact('tamus'));
    }

    /**
     * Menampilkan form tambah tamu.
     */
    public function create()
    {
        return view('tamu.create');
    }

    /**
     * Menyimpan data tamu baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'nik' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'keperluan' => 'required|string',
            'bertemu_dengan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_kendaraan' => 'nullable|string|max:20',
            'tanggal_kunjungan' => 'required|date',
            'jam_masuk' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $validated['status'] = 'masih_di_lokasi';

        Tamu::create($validated);

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail tamu.
     */
    public function show(Tamu $tamu)
    {
        return view('tamu.show', compact('tamu'));
    }

    /**
     * Menampilkan form edit tamu.
     */
    public function edit(Tamu $tamu)
    {
        return view('tamu.edit', compact('tamu'));
    }

    /**
     * Memperbarui data tamu.
     */
    public function update(Request $request, Tamu $tamu)
    {
        $validated = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'nik' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'keperluan' => 'required|string',
            'bertemu_dengan' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_kendaraan' => 'nullable|string|max:20',
            'tanggal_kunjungan' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'nullable',
            'status' => 'required|in:masih_di_lokasi,sudah_keluar',
            'keterangan' => 'nullable|string',
        ]);

        $tamu->update($validated);

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil diperbarui.');
    }

    /**
     * Menghapus data tamu.
     */
    public function destroy(Tamu $tamu)
    {
        $tamu->delete();

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil dihapus.');
    }

    /**
     * Mencatat tamu keluar.
     */
    public function keluar(Tamu $tamu)
    {
        $tamu->update([
            'jam_keluar' => now()->format('H:i:s'),
            'status' => 'sudah_keluar',
        ]);

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Tamu berhasil dicatat sebagai tamu keluar.');
    }
}