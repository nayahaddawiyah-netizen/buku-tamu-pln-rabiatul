<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class LaporanController 
{
    /**
     * Menampilkan laporan tamu
     */
    public function index(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai;
        $tanggalSelesai = $request->tanggal_selesai;

        $laporan = Guest::query();


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL MULAI
        |--------------------------------------------------------------------------
        */

        if ($tanggalMulai) {

            $laporan->whereDate(
                'waktu_datang',
                '>=',
                $tanggalMulai
            );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL SELESAI
        |--------------------------------------------------------------------------
        */

        if ($tanggalSelesai) {

            $laporan->whereDate(
                'waktu_datang',
                '<=',
                $tanggalSelesai
            );

        }


        /*
        |--------------------------------------------------------------------------
        | URUTKAN
        |--------------------------------------------------------------------------
        */

        $laporan = $laporan
            ->orderBy(
                'waktu_datang',
                'desc'
            )
            ->paginate(15)
            ->withQueryString();


        return view(
            'petugas.laporan.index',
            compact(
                'laporan',
                'tanggalMulai',
                'tanggalSelesai'
            )
        );
    }
}
