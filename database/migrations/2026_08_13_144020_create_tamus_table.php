<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();

            $table->string('nama_tamu');
            $table->string('nik')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('instansi')->nullable();
            $table->text('keperluan');
            $table->string('bertemu_dengan');
            $table->string('jabatan')->nullable();
            $table->string('no_kendaraan')->nullable();

            $table->date('tanggal_kunjungan');
            $table->time('jam_masuk');
            $table->time('jam_keluar')->nullable();

            $table->enum('status', [
                'masih_di_lokasi',
                'sudah_keluar'
            ])->default('masih_di_lokasi');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};