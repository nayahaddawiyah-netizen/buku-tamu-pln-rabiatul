<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    protected $table = 'buku_tamus';

    protected $fillable = [
        'no_antrian',
        'tanggal_jam',
        'nama',
        'perihal',
        'keluhan',
        'ket',
    ];

    protected $casts = [
        'tanggal_jam' => 'datetime',
    ];
}
