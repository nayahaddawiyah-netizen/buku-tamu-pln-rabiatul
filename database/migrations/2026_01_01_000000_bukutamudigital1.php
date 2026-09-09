
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
        | TABEL USERS
        |--------------------------------------------------------------------------
        */

        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 100);
            $table->string('username', 50)->unique();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | TABEL GUESTS / BUKU TAMU
        |--------------------------------------------------------------------------
        */

        Schema::create('guests', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 100);
            $table->string('instansi', 150)->nullable();
            $table->string('no_hp', 20)->nullable();

            $table->text('alamat')->nullable();

            $table->text('keperluan');

            $table->string('bertemu_dengan', 100)->nullable();

            $table->dateTime('waktu_datang');

            $table->dateTime('waktu_pulang')->nullable();

            $table->string('foto')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | TABEL SESSIONS
        |--------------------------------------------------------------------------
        | Dibutuhkan karena SESSION_DRIVER=database
        |--------------------------------------------------------------------------
        */

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->foreignId('user_id')
                ->nullable()
                ->index();

            $table->string('ip_address', 45)->nullable();

            $table->text('user_agent')->nullable();

            $table->text('payload');

            $table->integer('last_activity')->index();
        });
    }

    /**
     * Balikkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('guests');
        Schema::dropIfExists('users');
    }
};
