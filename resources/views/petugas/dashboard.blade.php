<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Buku Tamu PLN</title>

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

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 250px;
            background: linear-gradient(
                180deg,
                #244f70,
                #2e6388
            );
            color: white;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
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
            justify-content: center;
            align-items: center;
            font-size: 35px;
        }

        .brand h2 {
            font-size: 21px;
            font-weight: bold;
        }

        .brand p {
            font-size: 14px;
            color: #d7e3ec;
            margin-top: 5px;
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
            font-size: 16px;
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
            background: #ef3340;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-logout:hover {
            opacity: .9;
        }


        /* =========================
           CONTENT
        ========================= */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 28px;
            color: #244a66;
        }

        .topbar p {
            margin-top: 6px;
            color: #718096;
        }

        .user-box {
            background: white;
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
        }


        /* =========================
           STATISTIK
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 17px;
            background: #e5f0f7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .stat-info h3 {
            font-size: 14px;
            color: #687684;
            margin-bottom: 5px;
        }

        .stat-info strong {
            font-size: 27px;
            color: #244a66;
        }


        /* =========================
           TABLE
        ========================= */

        .table-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,.07);
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .table-header h2 {
            font-size: 23px;
            color: #244a66;
        }

        .add-btn {
            text-decoration: none;
            background: #21658f;
            color: white;
            padding: 13px 22px;
            border-radius: 10px;
            font-weight: bold;
            transition: .2s;
        }

        .add-btn:hover {
            background: #184f72;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
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
        }

        td {
            padding: 15px 13px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            color: #4a5568;
        }

        tr:hover {
            background: #f8fafc;
        }

        .no-antrian {
            font-weight: bold;
            color: #244a66;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-selesai {
            background: #dcefe4;
            color: #23834d;
        }

        .status-belum {
            background: #f8dede;
            color: #bd3945;
        }


        /* =========================
           BUTTON AKSI
        ========================= */

        .aksi {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit {
            background: #f0a500;
            color: white;
            text-decoration: none;
            border: none;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-hapus {
            background: #e63946;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-edit:hover,
        .btn-hapus:hover {
            opacity: .85;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #718096;
        }

        .alert-success {
            background: #dcefe4;
            color: #23834d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            .sidebar {
                width: 75px;
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
                padding: 15px 5px;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
                padding: 15px;
            }

            .topbar {
                display: block;
            }

            .user-box {
                margin-top: 15px;
                display: inline-block;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

        }

    </style>

</head>

<body>

<div class="wrapper">


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="brand">

            <div class="logo">
                ⚡
            </div>

            <h2>BUKU TAMU PLN</h2>

            <p>Panel Petugas / Satpam</p>

        </div>


        <nav class="menu">

            <a
                href="{{ route('petugas.dashboard') }}"
                class="{{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}"
            >
                <span>🏠</span>
                <span>Dashboard</span>
            </a>


            <a
                href="{{ route('petugas.input-tamu') }}"
                class="{{ request()->routeIs('petugas.input-tamu') ? 'active' : '' }}"
            >
                <span>📝</span>
                <span>Input Tamu</span>
            </a>


            <a
                href="{{ route('petugas.data-tamu') }}"
                class="{{ request()->routeIs('petugas.data-tamu') ? 'active' : '' }}"
            >
                <span>👥</span>
                <span>Data Tamu</span>
            </a>


            <a
                href="{{ route('petugas.laporan') }}"
                class="{{ request()->routeIs('petugas.laporan') ? 'active' : '' }}"
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



    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <h1>Dashboard</h1>

                <p>
                    Selamat datang,
                    {{ Auth::user()->nama ?? Auth::user()->username }}
                </p>

            </div>


            <div class="user-box">

                👤
                {{ Auth::user()->username }}

            </div>

        </div>



        <!-- =========================
             STATISTIK
        ========================== -->

        <div class="stats">


            <div class="stat-card">

                <div class="stat-icon">
                    👥
                </div>

                <div class="stat-info">

                    <h3>Total Tamu</h3>

                    <strong>
                        {{ $totalTamu }}
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
                        {{ $belum }}
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
                        {{ $selesai }}
                    </strong>

                </div>

            </div>


        </div>



        <!-- =========================
             PESAN SUKSES
        ========================== -->

        @if(session('success'))

            <div class="alert-success">

                ✅ {{ session('success') }}

            </div>

        @endif



        <!-- =========================
             TABEL DATA TAMU
        ========================== -->

        <div class="table-card">

            <div class="table-header">

                <h2>
                    Daftar Antrian / Tamu
                </h2>


                <a
                    href="{{ route('petugas.input-tamu') }}"
                    class="add-btn"
                >
                    + Tambah Tamu
                </a>

            </div>


            <table>

                <thead>

                    <tr>

                        <th>NO ANTRIAN</th>
                        <th>TANGGAL / JAM</th>
                        <th>NAMA</th>
                        <th>PERIHAL</th>
                        <th>KELUHAN</th>
                        <th>KET</th>
                        <th>AKSI</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($tamuTerbaru as $tamu)

                        <tr>

                            <!-- NO ANTRIAN -->

                            <td class="no-antrian">

                                {{ str_pad(
                                    $tamu->no_antrian,
                                    3,
                                    '0',
                                    STR_PAD_LEFT
                                ) }}

                            </td>


                            <!-- TANGGAL -->

                            <td>

                                {{ \Carbon\Carbon::parse(
                                    $tamu->tanggal_jam
                                )->format('d/m/Y') }}

                                <br>

                                {{ \Carbon\Carbon::parse(
                                    $tamu->tanggal_jam
                                )->format('H:i') }}

                            </td>


                            <!-- NAMA -->

                            <td>

                                {{ $tamu->nama }}

                            </td>


                            <!-- PERIHAL -->

                            <td>

                                {{ $tamu->perihal }}

                            </td>


                            <!-- KELUHAN -->

                            <td>

                                {{ $tamu->keluhan ?? '-' }}

                            </td>


                            <!-- STATUS -->

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


                            <!-- AKSI -->

                            <td>

                                <div class="aksi">


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route(
                                            'petugas.tamu.edit',
                                            $tamu->id
                                        ) }}"
                                        class="btn-edit"
                                    >

                                        ✏️ Edit

                                    </a>



                                    <!-- HAPUS -->

                                    <form
                                        action="{{ route(
                                            'petugas.tamu.delete',
                                            $tamu->id
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data tamu ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                        >

                                            🗑 Hapus

                                        </button>

                                    </form>


                                </div>

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