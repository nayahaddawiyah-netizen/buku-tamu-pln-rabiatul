<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = [
        'nama',
        'instansi',
        'no_hp',
        'alamat',
        'keperluan',
        'bertemu_dengan',
        'waktu_datang',
        'waktu_pulang',
        'foto',
        'keterangan',
    ];

    protected $casts = [
        'waktu_datang' => 'datetime',
        'waktu_pulang' => 'datetime',
    ];
}