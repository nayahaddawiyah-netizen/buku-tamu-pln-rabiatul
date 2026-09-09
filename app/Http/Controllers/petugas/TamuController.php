<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class TamuController 
{
    /**
     * Daftar tamu
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $tamu = Guest::query();

        if ($keyword) {
            $tamu->where(function ($query) use ($keyword) {

                $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('instansi', 'like', '%' . $keyword . '%')
                    ->orWhere('no_hp', 'like', '%' . $keyword . '%')
                    ->orWhere('bertemu_dengan', 'like', '%' . $keyword . '%')
                    ->orWhere('keperluan', 'like', '%' . $keyword . '%');

            });
        }

        $tamu = $tamu
            ->orderBy('waktu_datang', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view(
            'petugas.tamu.index',
            compact('tamu', 'keyword')
        );
    }


    /**
     * Form tambah tamu
     */
    public function create()
    {
        return view('petugas.tamu.create');
    }


    /**
     * Simpan tamu
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama' => [
                'required',
                'string',
                'max:100'
            ],

            'instansi' => [
                'nullable',
                'string',
                'max:150'
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20'
            ],

            'alamat' => [
                'nullable',
                'string'
            ],

            'keperluan' => [
                'required',
                'string'
            ],

            'bertemu_dengan' => [
                'nullable',
                'string',
                'max:100'
            ],

            'waktu_datang' => [
                'required',
                'date'
            ],

            'waktu_pulang' => [
                'nullable',
                'date'
            ],

            'foto' => [
                'nullable',
                'string',
                'max:255'
            ],

            'keterangan' => [
                'nullable',
                'string'
            ],

        ]);

        Guest::create($validated);

        return redirect()
            ->route('petugas.tamu.index')
            ->with(
                'success',
                'Data tamu berhasil ditambahkan.'
            );
    }


    /**
     * Detail tamu
     */
    public function show(Guest $tamu)
    {
        return view(
            'petugas.tamu.show',
            compact('tamu')
        );
    }


    /**
     * Form edit tamu
     */
    public function edit(Guest $tamu)
    {
        return view(
            'petugas.tamu.edit',
            compact('tamu')
        );
    }


    /**
     * Update tamu
     */
    public function update(
        Request $request,
        Guest $tamu
    ) {

        $validated = $request->validate([

            'nama' => [
                'required',
                'string',
                'max:100'
            ],

            'instansi' => [
                'nullable',
                'string',
                'max:150'
            ],

            'no_hp' => [
                'nullable',
                'string',
                'max:20'
            ],

            'alamat' => [
                'nullable',
                'string'
            ],

            'keperluan' => [
                'required',
                'string'
            ],

            'bertemu_dengan' => [
                'nullable',
                'string',
                'max:100'
            ],

            'waktu_datang' => [
                'required',
                'date'
            ],

            'waktu_pulang' => [
                'nullable',
                'date'
            ],

            'foto' => [
                'nullable',
                'string',
                'max:255'
            ],

            'keterangan' => [
                'nullable',
                'string'
            ],

        ]);

        $tamu->update($validated);

        return redirect()
            ->route('petugas.tamu.index')
            ->with(
                'success',
                'Data tamu berhasil diperbarui.'
            );
    }


    /**
     * Hapus tamu
     */
    public function destroy(Guest $tamu)
    {
        $tamu->delete();

        return redirect()
            ->route('petugas.tamu.index')
            ->with(
                'success',
                'Data tamu berhasil dihapus.'
            );
    }
}
