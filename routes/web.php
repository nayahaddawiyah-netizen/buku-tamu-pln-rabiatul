<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Landing\ControllerLanding;
use App\Http\Controllers\Auth\ControllerAuthUser;
use App\Http\Controllers\Dashboard\ControllerDashboardUser;
use App\Http\Controllers\Petugas\TamuController;
use App\Http\Controllers\Petugas\LaporanController;

use App\Exports\GuestExport;
use Maatwebsite\Excel\Facades\Excel;


/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::get('/', [ControllerLanding::class, 'index'])
    ->name('landing');


/*
|--------------------------------------------------------------------------
| LOGIN PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/petugas/login', [ControllerAuthUser::class, 'showLogin'])
    ->name('petugas.login');

Route::post('/petugas/login', [ControllerAuthUser::class, 'login'])
    ->name('petugas.login.process');


/*
|--------------------------------------------------------------------------
| AREA PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [ControllerDashboardUser::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | EXPORT EXCEL TAMU
        |--------------------------------------------------------------------------
        | Harus diletakkan SEBELUM Route::resource()
        */

        Route::get('/tamu/export', function () {

            return Excel::download(
                new GuestExport(),
                'data-tamu.xlsx'
            );

        })->name('tamu.export');


        /*
        |--------------------------------------------------------------------------
        | TAMU
        |--------------------------------------------------------------------------
        */

        Route::resource('tamu', TamuController::class);


        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');


        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */

        Route::post('/logout', [ControllerAuthUser::class, 'logout'])
            ->name('logout');

    });
