<?php

namespace App\Exports;

use App\Models\BukuTamu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuTamuExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return BukuTamu::select(
            'no_antrian',
            'tanggal_jam',
            'nama',
            'perihal',
            'keluhan',
            'ket'
        )->get();
    }

    public function headings(): array
    {
        return [
            'No. Antrian',
            'Tanggal & Jam',
            'Nama',
            'Perihal',
            'Keluhan',
            'Keterangan',
        ];
    }
}
