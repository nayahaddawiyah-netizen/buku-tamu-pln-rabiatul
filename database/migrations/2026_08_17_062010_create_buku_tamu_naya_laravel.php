<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | UBAH TABEL USERS (Laravel)
        |--------------------------------------------------------------------------
        */

        Schema::table('users', function (Blueprint $table) {

            // Hapus email & name jika ada
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }

            if (Schema::hasColumn('users', 'email')) {
                $table->dropColumn('email');
            }

            // Tambah username jika belum ada
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->unique()->after('id');
            }
        });

        /*
        |--------------------------------------------------------------------------
        | AKUN LOGIN SATU SAJA
        |--------------------------------------------------------------------------
        */

        DB::table('users')->insert([
            'username' => 'adminpln',
            'password' => Hash::make('pln12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | TABEL BUKU TAMU PLN
        |--------------------------------------------------------------------------
        */

        Schema::create('buku_tamus', function (Blueprint $table) {

            $table->id();

            $table->integer('no_antrian')->unique();

            $table->dateTime('tanggal_jam');

            $table->string('nama');

            $table->enum('perihal', [
                'ADM',
                'TEKNIS',
                'TRANSAKSI ENERGI',
                'UNDANGAN'
            ]);

            $table->text('keluhan')->nullable();

            $table->enum('ket', [
                'SELESAI',
                'BELUM'
            ])->default('BELUM');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku_tamus');

        Schema::table('users', function (Blueprint $table) {

            if (Schema::hasColumn('users', 'username')) {
                $table->dropColumn('username');
            }

            if (!Schema::hasColumn('users', 'name')) {
                $table->string('name')->nullable();
            }

            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->nullable();
            }
        });
    }
};