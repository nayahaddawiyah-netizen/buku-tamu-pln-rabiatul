@extends('layouts.apppetugas')

@section('title', 'Dashboard | Buku Tamu PLN')

@section('page-title', 'Dashboard')

@section('content')

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="alert-success">
            <span class="alert-icon">✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif


    {{-- STATISTIK --}}
    <div class="stats">

        <div class="stat-card">
            <div class="stat-icon">
                👥
            </div>

            <div class="stat-info">
                <h3>Total Tamu</h3>

                <strong>
                    {{ $totalTamu ?? 0 }}
                </strong>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                ⏳
            </div>

            <div class="stat-info">
                <h3>Belum Selesai</h3>

                <strong>
                    {{ $belum ?? 0 }}
                </strong>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">
                ✅
            </div>

            <div class="stat-info">
                <h3>Sudah Selesai</h3>

                <strong>
                    {{ $selesai ?? 0 }}
                </strong>
            </div>
        </div>

    </div>


    {{-- DATA TAMU --}}
    <div class="table-card">

        <div class="table-header">

            <div class="table-title">
                <h2>Daftar Antrian / Tamu</h2>

                <p>
                    Data tamu terbaru
                </p>
            </div>

        </div>


        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>NO ANTRIAN</th>
                        <th>TANGGAL / JAM</th>
                        <th>NAMA</th>
                        <th>PERIHAL</th>
                        <th>KELUHAN</th>
                        <th>KET</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse($tamuTerbaru ?? [] as $tamu)

                        <tr>

                            <td class="no-antrian">
                                {{ str_pad(
                                    $tamu->no_antrian,
                                    3,
                                    '0',
                                    STR_PAD_LEFT
                                ) }}
                            </td>


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


                            <td class="nama">
                                {{ $tamu->nama }}
                            </td>


                            <td>
                                {{ $tamu->perihal }}
                            </td>


                            <td class="keluhan">
                                {{ $tamu->keluhan ?? '-' }}
                            </td>


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
                            <td
                                colspan="6"
                                class="empty"
                            >
                                📭 Belum ada data tamu.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection


@push('styles')

<style>

    /*
    |--------------------------------------------------------------------------
    | GENERAL
    |--------------------------------------------------------------------------
    */

    .stats,
    .table-card,
    .alert-success {
        width: 100%;
        max-width: 100%;
    }


    /*
    |--------------------------------------------------------------------------
    | ALERT
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | STATISTICS
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | TABLE CARD
    |--------------------------------------------------------------------------
    */

    .table-card {
        background: #ffffff;

        border-radius: 18px;

        padding: 25px;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, .07);

        overflow: hidden;
    }


    .table-header {
        margin-bottom: 22px;
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


    /*
    |--------------------------------------------------------------------------
    | TABLE RESPONSIVE
    |--------------------------------------------------------------------------
    */

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
        transition: background .15s ease;
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


    /*
    |--------------------------------------------------------------------------
    | STATUS
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | EMPTY
    |--------------------------------------------------------------------------
    */

    .empty {
        text-align: center;

        padding: 30px;

        color: #718096;
    }


    /*
    |--------------------------------------------------------------------------
    | TABLET
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | MOBILE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 650px) {

        .stats {
            grid-template-columns: 1fr;

            gap: 12px;

            margin-bottom: 18px;
        }


        .stat-card {
            width: 100%;

            padding: 15px 16px;

            gap: 14px;

            border-radius: 14px;
        }


        .stat-icon {
            width: 48px;
            height: 48px;

            min-width: 48px;

            font-size: 22px;

            border-radius: 13px;
        }


        .stat-info h3 {
            font-size: 13px;

            margin-bottom: 3px;
        }


        .stat-info strong {
            font-size: 23px;
        }


        /*
        | Alert
        */

        .alert-success {
            padding: 12px 14px;

            margin-bottom: 16px;

            font-size: 13px;

            border-radius: 10px;
        }


        /*
        | Table card
        */

        .table-card {
            padding: 15px;

            border-radius: 14px;
        }


        .table-header {
            margin-bottom: 16px;
        }


        .table-title h2 {
            font-size: 18px;
        }


        .table-title p {
            font-size: 13px;

            margin-top: 4px;
        }


        /*
        | Table tetap lebar,
        | tetapi dapat digeser ke kiri/kanan
        */

        table {
            min-width: 800px;
        }


        th {
            padding: 12px 10px;

            font-size: 11px;
        }


        td {
            padding: 12px 10px;

            font-size: 13px;
        }


        .status {
            padding: 6px 10px;

            font-size: 11px;
        }

    }


    /*
    |--------------------------------------------------------------------------
    | HP KECIL
    |--------------------------------------------------------------------------
    */

    @media (max-width: 400px) {

        .stats {
            gap: 10px;
        }


        .stat-card {
            padding: 13px;

            gap: 12px;
        }


        .stat-icon {
            width: 44px;
            height: 44px;

            min-width: 44px;

            font-size: 20px;
        }


        .stat-info h3 {
            font-size: 12px;
        }


        .stat-info strong {
            font-size: 21px;
        }


        .table-card {
            padding: 12px;
        }


        .table-title h2 {
            font-size: 17px;
        }


        .table-title p {
            font-size: 12px;
        }

    }

</style>

@endpush