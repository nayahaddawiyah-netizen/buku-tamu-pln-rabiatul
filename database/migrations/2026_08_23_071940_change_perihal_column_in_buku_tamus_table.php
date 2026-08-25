<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('buku_tamus', function (Blueprint $table) {
            $table->string('perihal')->change();
        });
    }

    public function down(): void
    {
        Schema::table('buku_tamus', function (Blueprint $table) {
            $table->enum('perihal', [
                'ADM',
                'TEKNIS',
                'TRANSAKSI ENERGI',
                'UNDANGAN',
            ])->change();
        });
    }
};