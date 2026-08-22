<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'username' => 'pln ksp',
            ],
            [
                'name' => 'Petugas PLN Kuala Simpang',

                'nama' => 'Petugas PLN Kuala Simpang',

                'email' => 'plnksp@pln.local',

                'password' => '123456',

                'role' => 'petugas',
            ]
        );

        $this->command->info('');
        $this->command->info('==========================================');
        $this->command->info('       AKUN PETUGAS PLN BERHASIL');
        $this->command->info('==========================================');
        $this->command->info(' Username : pln ksp');
        $this->command->info(' Password : 123456');
        $this->command->info(' Role     : petugas');
        $this->command->info('==========================================');
    }
}