<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelUser;

class bukutamuSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        ModelUser::updateOrCreate(
            [
                'username' => 'petugas',
            ],
            [
                'nama' => 'Petugas Buku Tamu',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
