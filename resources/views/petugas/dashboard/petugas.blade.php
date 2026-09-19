@extends('layouts.apppetugas')

@section('title', 'Dashboard | Buku Tamu PLN')

@section('page-title', 'Dashboard')

@section('content')

{{-- =========================================================
     PESAN SUKSES
     ========================================================= --}}
@if(session('success'))
    <div class="alert-success">
        <span class="alert-icon">✅</span>
        <span>{{ session('success') }}</span>
    </div>
@endif


{{-- =========================================================
     STATISTIK
     ========================================================= --}}
<div class="stats">

    {{-- TOTAL TAMU --}}
    <div class="stat-card">

        <div class="stat-icon">
            👥
        </div>

        <div class="stat-info">
            <h3>Total Tamu</h3>
            <strong>{{ $totalTamu ?? 0 }}</strong>
        </div>

    </div>


    {{-- BELUM SELESAI --}}
    <div class="stat-card">

        <div class="stat-icon">
            ⏳
        </div>

        <div class="stat-info">
            <h3>Belum Selesai</h3>
            <strong>{{ $belum ?? 0 }}</strong>
        </div>

    </div>


    {{-- SUDAH SELESAI --}}
    <div class="stat-card">

        <div class="stat-icon">
            ✅
        </div>

        <div class="stat-info">
            <h3>Sudah Selesai</h3>
            <strong>{{ $selesai ?? 0 }}</strong>
        </div>

    </div>

</div>


{{-- =========================================================
     DATA TAMU
     ========================================================= --}}
<div class="table-card">

    {{-- HEADER DATA TAMU --}}
    <div class="table-header">

        <div class="table-title">

            <h2>
                Daftar Antrian / Tamu
            </h2>

            <p>
                Data tamu terbaru
            </p>

        </div>


        {{-- =================================================
             TOMBOL TAMBAH TAMU
             ================================================= --}}
        <a href="{{ route('petugas.tamu.create') }}"
           class="btn-tambah-tamu">

            <span class="plus-icon">
                ＋
            </span>

            <span>
                Tambah Tamu
            </span>

        </a>

    </div>


    {{-- =========================================================
         DESKTOP TABLE
         ========================================================= --}}
    <div class="desktop-table">

        <div class="table-responsive">

            <table>

                <thead>

                    <tr>

                        <th>
                            NO ANTRIAN
                        </th>

                        <th>
                            TANGGAL / JAM
                        </th>

                        <th>
                            NAMA
                        </th>

                        <th>
                            PERIHAL
                        </th>

                        <th>
                            KELUHAN
                        </th>

                        <th>
                            KET
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($tamuTerbaru ?? [] as $tamu)

                        <tr>

                            {{-- NO ANTRIAN --}}
                            <td class="no-antrian">

                                {{ str_pad(
                                    $tamu->no_antrian,
                                    3,
                                    '0',
                                    STR_PAD_LEFT
                                ) }}

                            </td>


                            {{-- TANGGAL / JAM --}}
                            <td class="tanggal">

                                {{ \Carbon\Carbon::parse(
                                    $tamu->tanggal_jam
                                )->format('d/m/Y') }}

                                <br>

                                <span>

                                    {{ \Carbon\Carbon::parse(
                                        $tamu->tanggal_jam
                                    )->format('H:i') }}

                                </span>

                            </td>


                            {{-- NAMA --}}
                            <td class="nama">

                                {{ $tamu->nama }}

                            </td>


                            {{-- PERIHAL --}}
                            <td>

                                {{ $tamu->perihal }}

                            </td>


                            {{-- KELUHAN --}}
                            <td class="keluhan">

                                {{ $tamu->keluhan ?? '-' }}

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                @if($tamu->ket === 'SELESAI')

                                    <span class="status status-selesai">
                                        SELESAI
                                    </span>

                                @else

                                    <span class="status status-belum">
                                        BELUM
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="empty">

                                📭 Belum ada data tamu.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =========================================================
         MOBILE CARD
         ========================================================= --}}
    <div class="mobile-list">

        @forelse($tamuTerbaru ?? [] as $tamu)

            <div class="guest-card">

                {{-- TOP CARD --}}
                <div class="guest-top">

                    <div>

                        <span class="guest-label">
                            NO ANTRIAN
                        </span>

                        <div class="guest-number">

                            {{ str_pad(
                                $tamu->no_antrian,
                                3,
                                '0',
                                STR_PAD_LEFT
                            ) }}

                        </div>

                    </div>


                    <div>

                        @if($tamu->ket === 'SELESAI')

                            <span class="status status-selesai">
                                SELESAI
                            </span>

                        @else

                            <span class="status status-belum">
                                BELUM
                            </span>

                        @endif

                    </div>

                </div>


                <div class="guest-divider"></div>


                {{-- INFORMASI TAMU --}}
                <div class="guest-info">

                    {{-- NAMA --}}
                    <div class="info-item">

                        <span>
                            👤 Nama
                        </span>

                        <strong>
                            {{ $tamu->nama }}
                        </strong>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="info-item">

                        <span>
                            📅 Tanggal
                        </span>

                        <strong>

                            {{ \Carbon\Carbon::parse(
                                $tamu->tanggal_jam
                            )->format('d/m/Y') }}

                            •

                            {{ \Carbon\Carbon::parse(
                                $tamu->tanggal_jam
                            )->format('H:i') }}

                        </strong>

                    </div>


                    {{-- PERIHAL --}}
                    <div class="info-item">

                        <span>
                            📌 Perihal
                        </span>

                        <strong>

                            {{ $tamu->perihal }}

                        </strong>

                    </div>


                    {{-- KELUHAN --}}
                    <div class="info-item">

                        <span>
                            📝 Keluhan
                        </span>

                        <strong class="complaint">

                            {{ $tamu->keluhan ?? '-' }}

                        </strong>

                    </div>

                </div>

            </div>

        @empty

            <div class="mobile-empty">

                📭 Belum ada data tamu.

            </div>

        @endforelse

    </div>

</div>

@endsection


{{-- =========================================================
     CSS
     ========================================================= --}}
@push('styles')

<style>

/* =========================================================
   GENERAL
   ========================================================= */

.stats,
.table-card,
.alert-success {

    width: 100%;
    max-width: 100%;

}


/* =========================================================
   ALERT
   ========================================================= */

.alert-success {

    background: #dcefe4;
    color: #23834d;

    padding: 14px 18px;

    border-radius: 12px;

    margin-bottom: 22px;

    display: flex;

    align-items: center;

    gap: 8px;

    font-size: 14px;

    line-height: 1.5;

}


/* =========================================================
   STATISTICS
   ========================================================= */

.stats {

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 20px;

    margin-bottom: 28px;

}


.stat-card {

    background: #ffffff;

    border-radius: 18px;

    padding: 22px;

    display: flex;

    align-items: center;

    gap: 16px;

    min-width: 0;

    box-shadow:
        0 8px 25px rgba(0, 0, 0, .07);

    transition:
        transform .2s ease,
        box-shadow .2s ease;

}


.stat-card:hover {

    transform: translateY(-2px);

    box-shadow:
        0 12px 30px rgba(0, 0, 0, .10);

}


.stat-icon {

    width: 60px;

    height: 60px;

    min-width: 60px;

    border-radius: 17px;

    background: #e5f0f7;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 28px;

}


.stat-info {

    min-width: 0;

}


.stat-info h3 {

    font-size: 14px;

    color: #687684;

    margin-bottom: 5px;

    white-space: nowrap;

}


.stat-info strong {

    display: block;

    font-size: 27px;

    line-height: 1.2;

    color: #244a66;

}


/* =========================================================
   TABLE CARD
   ========================================================= */

.table-card {

    background: #ffffff;

    border-radius: 18px;

    padding: 25px;

    box-shadow:
        0 8px 25px rgba(0, 0, 0, .07);

    overflow: hidden;

}


/* =========================================================
   TABLE HEADER
   ========================================================= */

.table-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 22px;

}


.table-title {

    min-width: 0;

}


.table-title h2 {

    font-size: 23px;

    color: #244a66;

    line-height: 1.3;

}


.table-title p {

    margin-top: 5px;

    color: #718096;

    font-size: 14px;

}


/* =========================================================
   TOMBOL TAMBAH TAMU
   ========================================================= */

.btn-tambah-tamu {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    background:
        linear-gradient(
            135deg,
            #244a66,
            #397da5
        );

    color: #ffffff;

    padding: 11px 18px;

    border-radius: 10px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

    box-shadow:
        0 5px 15px
        rgba(36, 74, 102, .20);

    transition:
        all .2s ease;

    white-space: nowrap;

}


.btn-tambah-tamu:hover {

    color: #ffffff;

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px
        rgba(36, 74, 102, .28);

}


.plus-icon {

    font-size: 19px;

    line-height: 1;

}


/* =========================================================
   DESKTOP TABLE
   ========================================================= */

.desktop-table {

    display: block;

}


.table-responsive {

    width: 100%;

    overflow-x: auto;

    overflow-y: hidden;

    -webkit-overflow-scrolling: touch;

    scrollbar-width: thin;

}


.table-responsive::-webkit-scrollbar {

    height: 6px;

}


.table-responsive::-webkit-scrollbar-track {

    background: #edf2f7;

    border-radius: 10px;

}


.table-responsive::-webkit-scrollbar-thumb {

    background: #a0aec0;

    border-radius: 10px;

}


table {

    width: 100%;

    min-width: 850px;

    border-collapse: collapse;

}


thead {

    background: #e5edf3;

}


th {

    text-align: left;

    padding: 15px 13px;

    font-size: 12px;

    letter-spacing: .5px;

    color: #334e68;

    white-space: nowrap;

}


td {

    padding: 15px 13px;

    border-bottom:
        1px solid #e2e8f0;

    font-size: 14px;

    color: #4a5568;

    vertical-align: middle;

}


tbody tr {

    transition:
        background .15s ease;

}


tbody tr:hover {

    background: #f8fafc;

}


.no-antrian {

    font-weight: bold;

    color: #244a66;

    white-space: nowrap;

}


.tanggal {

    white-space: nowrap;

}


.tanggal span {

    color: #718096;

}


.nama {

    font-weight: 600;

    color: #334e68;

}


.keluhan {

    max-width: 250px;

    line-height: 1.5;

}


/* =========================================================
   STATUS
   ========================================================= */

.status {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 7px 13px;

    border-radius: 20px;

    font-size: 12px;

    font-weight: bold;

    white-space: nowrap;

}


.status-selesai {

    background: #dcefe4;

    color: #23834d;

}


.status-belum {

    background: #f8dede;

    color: #bd3945;

}


/* =========================================================
   EMPTY
   ========================================================= */

.empty {

    text-align: center;

    padding: 30px;

    color: #718096;

}


/* =========================================================
   MOBILE LIST
   ========================================================= */

.mobile-list {

    display: none;

}


.guest-card {

    background: #ffffff;

    border:
        1px solid #e5eaf0;

    border-radius: 15px;

    padding: 16px;

    margin-bottom: 12px;

    box-shadow:
        0 4px 15px
        rgba(0, 0, 0, .04);

}


.guest-top {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

}


.guest-label {

    display: block;

    font-size: 10px;

    font-weight: 700;

    color: #8a98a8;

    letter-spacing: .7px;

    margin-bottom: 3px;

}


.guest-number {

    font-size: 25px;

    font-weight: 800;

    color: #244a66;

    line-height: 1;

}


.guest-divider {

    height: 1px;

    background: #edf1f5;

    margin: 14px 0;

}


.guest-info {

    display: flex;

    flex-direction: column;

    gap: 12px;

}


.info-item {

    display: flex;

    flex-direction: column;

    gap: 3px;

    min-width: 0;

}


.info-item span {

    font-size: 11px;

    color: #8492a1;

    font-weight: 500;

}


.info-item strong {

    font-size: 14px;

    color: #334e68;

    line-height: 1.4;

    overflow-wrap: anywhere;

}


.info-item .complaint {

    color: #596979;

    font-weight: 400;

}


.mobile-empty {

    text-align: center;

    padding: 30px 15px;

    color: #718096;

    background: #f8fafc;

    border-radius: 12px;

    font-size: 13px;

}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 900px) {

    .stats {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 15px;

    }


    .stat-card {

        padding: 18px;

        border-radius: 15px;

    }


    .stat-icon {

        width: 52px;

        height: 52px;

        min-width: 52px;

        font-size: 24px;

        border-radius: 14px;

    }


    .stat-info h3 {

        font-size: 13px;

    }


    .stat-info strong {

        font-size: 24px;

    }


    .table-card {

        padding: 20px;

        border-radius: 15px;

    }


    .table-title h2 {

        font-size: 20px;

    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 650px) {

    .stats {

        grid-template-columns: 1fr;

        gap: 10px;

        margin-bottom: 18px;

    }


    .stat-card {

        width: 100%;

        padding: 14px 15px;

        gap: 13px;

        border-radius: 14px;

    }


    .stat-card:hover {

        transform: none;

    }


    .stat-icon {

        width: 46px;

        height: 46px;

        min-width: 46px;

        font-size: 21px;

        border-radius: 12px;

    }


    .stat-info h3 {

        font-size: 12px;

        margin-bottom: 2px;

    }


    .stat-info strong {

        font-size: 22px;

    }


    /* ALERT */

    .alert-success {

        padding: 11px 13px;

        margin-bottom: 14px;

        font-size: 12px;

        border-radius: 10px;

    }


    /* TABLE CARD */

    .table-card {

        padding: 13px;

        border-radius: 14px;

    }


    .table-header {

        margin-bottom: 14px;

        align-items: flex-start;

        flex-direction: column;

        gap: 10px;

    }


    .table-title h2 {

        font-size: 17px;

    }


    .table-title p {

        font-size: 12px;

        margin-top: 3px;

    }


    /* TOMBOL TAMBAH TAMU MOBILE */

    .btn-tambah-tamu {

        width: 100%;

        padding: 11px 15px;

        font-size: 12px;

    }


    /* HILANGKAN TABLE */

    .desktop-table {

        display: none;

    }


    /* TAMPILKAN CARD MOBILE */

    .mobile-list {

        display: block;

    }

}


/* =========================================================
   HP KECIL
   ========================================================= */

@media (max-width: 400px) {

    .stats {

        gap: 8px;

    }


    .stat-card {

        padding: 12px;

        gap: 11px;

    }


    .stat-icon {

        width: 42px;

        height: 42px;

        min-width: 42px;

        font-size: 19px;

        border-radius: 11px;

    }


    .stat-info h3 {

        font-size: 11px;

    }


    .stat-info strong {

        font-size: 20px;

    }


    .table-card {

        padding: 11px;

    }


    .table-title h2 {

        font-size: 16px;

    }


    .table-title p {

        font-size: 11px;

    }


    .guest-card {

        padding: 14px;

        border-radius: 13px;

    }


    .guest-number {

        font-size: 23px;

    }


    .guest-info {

        gap: 10px;

    }


    .info-item strong {

        font-size: 13px;

    }


    .status {

        padding: 6px 9px;

        font-size: 10px;

    }

}

</style>

@endpush