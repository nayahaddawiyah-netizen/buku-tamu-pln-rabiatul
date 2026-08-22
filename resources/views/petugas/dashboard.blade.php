<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - Buku Tamu PLN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f1f4f8;
            color: #243b53;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #124a75,
                #17699c
            );

            color: white;
            padding: 25px 17px;

            overflow-y: auto;
        }

        .brand {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255,255,255,.20);
        }

        .brand-icon {
            width: 60px;
            height: 60px;

            margin: auto;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background: #ffdf00;
            color: #ff8a00;

            font-size: 32px;

            box-shadow: 0 8px 20px rgba(0,0,0,.15);
        }

        .brand h2 {
            margin-top: 13px;
            font-size: 20px;
        }

        .brand p {
            margin-top: 5px;
            font-size: 13px;
            opacity: .85;
        }

        .menu {
            margin-top: 28px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;

            color: white;
            text-decoration: none;

            padding: 15px 17px;
            margin-bottom: 8px;

            border-radius: 10px;

            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.20);
        }

        .logout {
            margin-top: 35px;
        }

        .logout button {
            width: 100%;

            border: none;
            border-radius: 10px;

            padding: 14px;

            background: #e73545;
            color: white;

            font-weight: bold;
            cursor: pointer;

            transition: .2s;
        }

        .logout button:hover {
            background: #c92837;
        }


        /* =========================
           MAIN
        ========================== */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================== */

        .topbar {
            height: 76px;

            background: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;

            box-shadow: 0 2px 12px rgba(0,0,0,.08);
        }

        .topbar h2 {
            color: #1d4968;
            font-size: 25px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            font-size: 15px;
            color: #111;
        }

        .user-info small {
            color: #555;
        }

        .avatar {
            width: 45px;
            height: 45px;

            border-radius: 50%;

            background: #1b6396;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
            font-weight: bold;
        }


        /* =========================
           CONTENT
        ========================== */

        .content {
            padding: 35px;
        }

        .welcome {
            background: linear-gradient(
                100deg,
                #1d5a85,
                #1690c4
            );

            color: white;

            border-radius: 18px;

            padding: 28px 30px;

            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 29px;
            margin-bottom: 8px;
        }

        .welcome p {
            font-size: 16px;
            opacity: .92;
        }


        /* =========================
           STATISTIC
        ========================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;

            margin-bottom: 28px;
        }

        .stat-card {
            background: white;

            border-radius: 16px;

            padding: 23px;

            box-shadow: 0 6px 22px rgba(0,0,0,.07);

            display: flex;
            align-items: center;
            gap: 18px;
        }

        .stat-icon {
            width: 58px;
            height: 58px;

            border-radius: 15px;

            background: #e7f3fa;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;
        }

        .stat-card h3 {
            font-size: 14px;
            color: #687684;
            margin-bottom: 5px;
        }

        .stat-card strong {
            font-size: 28px;
            color: #173f5c;
        }


        /* =========================
           TABLE CARD
        ========================== */

        .table-card {
            background: white;

            border-radius: 18px;

            padding: 25px;

            box-shadow: 0 6px 22px rgba(0,0,0,.07);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
        }

        .table-header h2 {
            color: #1b4967;
            font-size: 22px;
        }

        .add-btn {
            text-decoration: none;

            background: #1675ad;
            color: white;

            padding: 12px 18px;

            border-radius: 9px;

            font-weight: bold;
        }

        .add-btn:hover {
            background: #105f8e;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;

            border-collapse: collapse;
        }

        thead {
            background: #eaf2f7;
        }

        th {
            color: #1c4059;
            font-size: 13px;

            padding: 15px 12px;

            text-align: left;

            border-bottom: 2px solid #d7e1e8;
        }

        td {
            padding: 16px 12px;

            border-bottom: 1px solid #e4eaf0;

            font-size: 14px;
            color: #4b5c69;
        }

        tbody tr:hover {
            background: #f8fbfd;
        }

        .no {
            font-weight: bold;
            color: #1a5b85;
        }

        .badge {
            display: inline-block;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;
        }

        .badge-adm {
            background: #e6f1ff;
            color: #2165a5;
        }

        .badge-teknis {
            background: #fff3dc;
            color: #c47a00;
        }

        .badge-transaksi {
            background: #eee7ff;
            color: #6941b5;
        }

        .badge-undangan {
            background: #e1f8ee;
            color: #168554;
        }

        .status {
            display: inline-block;

            padding: 7px 13px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;
        }

        .selesai {
            background: #dff7e9;
            color: #16854d;
        }

        .belum {
            background: #ffe4e6;
            color: #c22739;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #8a98a5;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 20px;
            }

            .user-info {
                display: none;
            }

        }

    </style>

</head>

<body>


<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            ⚡
        </div>

        <h2>BUKU TAMU PLN</h2>

        <p>Panel Petugas / Satpam</p>

    </div>


    <div class="menu">

        <a
            href="{{ route('petugas.dashboard') }}"
            class="active"
        >
            🏠
            Dashboard
        </a>

        <a href="#tabel-tamu">
            📝
            Input Tamu
        </a>

        <a href="#tabel-tamu">
            👥
            Data Tamu
        </a>

        <a href="#tabel-tamu">
            📊
            Laporan
        </a>

    </div>


    <div class="logout">

        <form
            action="{{ route('petugas.logout') }}"
            method="POST"
        >
            @csrf

            <button type="submit">
                🚪 Keluar
            </button>

        </form>

    </div>

</div>



<!-- ================= MAIN ================= -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <h2>Dashboard Petugas</h2>


        <div class="user">

            <div class="user-info">

                <strong>
                    {{ Auth::user()->nama ?? Auth::user()->username }}
                </strong>

                <br>

                <small>
                    Petugas / Satpam
                </small>

            </div>


            <div class="avatar">

                {{
                    strtoupper(
                        substr(
                            Auth::user()->username,
                            0,
                            1
                        )
                    )
                }}

            </div>

        </div>

    </div>



    <!-- CONTENT -->

    <div class="content">


        <!-- WELCOME -->

        <div class="welcome">

            <h1>
                Selamat Datang 👋
            </h1>

            <p>
                Dashboard Buku Tamu Digital PLN untuk mengelola
                antrean dan kunjungan tamu.
            </p>

        </div>



        <!-- STATISTIK -->

        <div class="stats">

            <div class="stat-card">

                <div class="stat-icon">
                    👥
                </div>

                <div>

                    <h3>Total Tamu</h3>

                    <strong>4</strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ⏳
                </div>

                <div>

                    <h3>Belum Selesai</h3>

                    <strong>1</strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ✅
                </div>

                <div>

                    <h3>Sudah Selesai</h3>

                    <strong>3</strong>

                </div>

            </div>

        </div>



        <!-- TABEL TAMU -->

        <div
            class="table-card"
            id="tabel-tamu"
        >

            <div class="table-header">

                <h2>
                    Daftar Antrian / Tamu
                </h2>

                <a
                    href="#"
                    class="add-btn"
                >
                    + Tambah Tamu
                </a>

            </div>


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


                        <!-- DATA 1 -->

                        <tr>

                            <td class="no">
                                001
                            </td>

                            <td>
                                20/08/2026
                                <br>
                                08:15
                            </td>

                            <td>
                                Ahmad
                            </td>

                            <td>

                                <span class="badge badge-adm">
                                    ADM
                                </span>

                            </td>

                            <td>
                                -
                            </td>

                            <td>

                                <span class="status selesai">
                                    SELESAI
                                </span>

                            </td>

                        </tr>



                        <!-- DATA 2 -->

                        <tr>

                            <td class="no">
                                002
                            </td>

                            <td>
                                20/08/2026
                                <br>
                                09:00
                            </td>

                            <td>
                                Budi
                            </td>

                            <td>

                                <span class="badge badge-teknis">
                                    TEKNIS
                                </span>

                            </td>

                            <td>
                                Gangguan listrik
                            </td>

                            <td>

                                <span class="status belum">
                                    BELUM
                                </span>

                            </td>

                        </tr>



                        <!-- DATA 3 -->

                        <tr>

                            <td class="no">
                                003
                            </td>

                            <td>
                                20/08/2026
                                <br>
                                10:15
                            </td>

                            <td>
                                Citra
                            </td>

                            <td>

                                <span class="badge badge-transaksi">
                                    TRANSAKSI ENERGI
                                </span>

                            </td>

                            <td>
                                -
                            </td>

                            <td>

                                <span class="status selesai">
                                    SELESAI
                                </span>

                            </td>

                        </tr>



                        <!-- DATA 4 -->

                        <tr>

                            <td class="no">
                                004
                            </td>

                            <td>
                                20/08/2026
                                <br>
                                11:00
                            </td>

                            <td>
                                Dinas Perhubungan
                            </td>

                            <td>

                                <span class="badge badge-undangan">
                                    UNDANGAN
                                </span>

                            </td>

                            <td>
                                -
                            </td>

                            <td>

                                <span class="status selesai">
                                    SELESAI
                                </span>

                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>

</body>
</html>