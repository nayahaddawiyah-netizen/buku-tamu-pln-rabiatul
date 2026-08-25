<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan | Buku Tamu PLN</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #eef2f6;
            color: #334e68;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* =====================
           SIDEBAR
        ====================== */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #244f70, #2e6388);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
        }

        .brand {
            text-align: center;
            padding: 25px 15px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .logo {
            width: 58px;
            height: 58px;
            margin: 0 auto 12px;
            background: #ffd429;
            border-radius: 0 0 18px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .brand h2 {
            font-size: 20px;
        }

        .brand p {
            font-size: 14px;
            margin-top: 5px;
            color: #d7e3ec;
        }

        .menu {
            padding: 28px 16px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.17);
        }

        .logout-form {
            padding: 0 16px;
        }

        .btn-logout {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: #ef3340;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        /* =====================
           MAIN
        ====================== */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 32px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #244a66;
        }

        .header p {
            color: #718096;
            margin-top: 5px;
        }

        .btn-print {
            background: #21658f;
            color: white;
            border: none;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
        }

        /* =====================
           SUMMARY
        ====================== */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
        }

        .summary-card h3 {
            font-size: 14px;
            color: #718096;
            margin-bottom: 10px;
        }

        .summary-card strong {
            font-size: 28px;
            color: #244a66;
        }

        /* =====================
           TABLE
        ====================== */

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
            overflow-x: auto;
        }

        .card h2 {
            margin-bottom: 20px;
            color: #244a66;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        thead {
            background: #e5edf3;
        }

        th {
            text-align: left;
            padding: 15px;
            font-size: 12px;
            color: #334e68;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        tr:hover {
            background: #f8fafc;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .selesai {
            background: #dcefe4;
            color: #23834d;
        }

        .belum {
            background: #f8dede;
            color: #bd3945;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #718096;
        }

        @media print {

            .sidebar,
            .btn-print {
                display: none;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 0;
            }

            body {
                background: white;
            }

            .card,
            .summary-card {
                box-shadow: none;
            }

        }

        @media (max-width: 800px) {

            .sidebar {
                width: 80px;
            }

            .brand h2,
            .brand p,
            .menu span {
                display: none;
            }

            .menu {
                padding: 20px 8px;
            }

            .menu a {
                justify-content: center;
            }

            .main {
                margin-left: 80px;
                width: calc(100% - 80px);
                padding: 20px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .header {
                display: block;
            }

            .btn-print {
                margin-top: 15px;
            }

        }

    </style>

</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="logo">
                ⚡
            </div>

            <h2>BUKU TAMU PLN</h2>

            <p>Panel Petugas / Satpam</p>

        </div>

        <nav class="menu">

            <a href="{{ route('petugas.dashboard') }}">
                <span>🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('petugas.input-tamu') }}">
                <span>📝</span>
                <span>Input Tamu</span>
            </a>

            <a href="{{ route('petugas.data-tamu') }}">
                <span>👥</span>
                <span>Data Tamu</span>
            </a>

            <a
                href="{{ route('petugas.laporan') }}"
                class="active"
            >
                <span>📊</span>
                <span>Laporan</span>
            </a>

        </nav>

        <form
            action="{{ route('petugas.logout') }}"
            method="POST"
            class="logout-form"
        >
            @csrf

            <button
                type="submit"
                class="btn-logout"
            >
                🚪 Keluar
            </button>

        </form>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <div class="header">

            <div>

                <h1>📊 Laporan Buku Tamu</h1>

                <p>
                    Rekapitulasi seluruh data tamu yang berkunjung.
                </p>

            </div>

            <button
                onclick="window.print()"
                class="btn-print"
            >
                🖨 Cetak Laporan
            </button>

        </div>


        <!-- STATISTIK -->

        <div class="summary">

            <div class="summary-card">

                <h3>👥 Total Tamu</h3>

                <strong>
                    {{ $dataTamu->count() }}
                </strong>

            </div>


            <div class="summary-card">

                <h3>⏳ Belum Selesai</h3>

                <strong>
                    {{ $dataTamu->where('ket', 'BELUM')->count() }}
                </strong>

            </div>


            <div class="summary-card">

                <h3>✅ Sudah Selesai</h3>

                <strong>
                    {{ $dataTamu->where('ket', 'SELESAI')->count() }}
                </strong>

            </div>

        </div>


        <!-- TABEL -->

        <div class="card">

            <h2>Daftar Laporan Tamu</h2>

            <table>

                <thead>

                    <tr>
                        <th>NO</th>
                        <th>NO ANTRIAN</th>
                        <th>TANGGAL / JAM</th>
                        <th>NAMA</th>
                        <th>PERIHAL</th>
                        <th>KELUHAN</th>
                        <th>STATUS</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($dataTamu as $index => $tamu)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ str_pad($tamu->no_antrian, 3, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($tamu->tanggal_jam)->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ $tamu->nama }}
                            </td>

                            <td>
                                {{ $tamu->perihal }}
                            </td>

                            <td>
                                {{ $tamu->keluhan ?? '-' }}
                            </td>

                            <td>

                                @if($tamu->ket === 'SELESAI')

                                    <span class="status selesai">
                                        SELESAI
                                    </span>

                                @else

                                    <span class="status belum">
                                        BELUM
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty"
                            >
                                📭 Belum ada data tamu.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>

</html>