<?php

namespace App\Exports;

use App\Models\Guest;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Guest::select(
            'nama',
            'instansi',
            'no_hp',
            'alamat',
            'keperluan',
            'bertemu_dengan',
            'waktu_datang',
            'waktu_pulang',
            'keterangan'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Instansi',
            'No. HP',
            'Alamat',
            'Keperluan',
            'Bertemu Dengan',
            'Waktu Datang',
            'Waktu Pulang',
            'Keterangan',
        ];
    }
}
