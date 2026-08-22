<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Tambahkan kolom username
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('users', 'username')) {

            Schema::table('users', function (Blueprint $table) {
                $table->string('username')
                    ->nullable()
                    ->unique()
                    ->after('id');
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Tambahkan kolom nama
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('users', 'nama')) {

            Schema::table('users', function (Blueprint $table) {
                $table->string('nama')
                    ->nullable()
                    ->after('username');
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Tambahkan kolom role
        |--------------------------------------------------------------------------
        */

        if (!Schema::hasColumn('users', 'role')) {

            Schema::table('users', function (Blueprint $table) {
                $table->string('role')
                    ->default('peminjam')
                    ->after('password');
            });
        }
    }


    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }

        if (Schema::hasColumn('users', 'nama')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('nama');
            });
        }

        if (Schema::hasColumn('users', 'username')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropUnique(['username']);
                $table->dropColumn('username');
            });
        }
    }
};