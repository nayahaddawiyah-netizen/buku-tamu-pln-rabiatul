<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'tamus';

    protected $fillable = [
        'nama_tamu',
        'nik',
        'no_hp',
        'instansi',
        'keperluan',
        'bertemu_dengan',
        'jabatan',
        'no_kendaraan',
        'tanggal_kunjungan',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];
}