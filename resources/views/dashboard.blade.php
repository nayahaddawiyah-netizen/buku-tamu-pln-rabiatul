<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Buku Tamu Digital PLN</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #17365d;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #004b87, #0077c8);
            color: white;
            padding: 25px 18px;
            box-shadow: 4px 0 15px rgba(0,0,0,0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-icon {
            width: 58px;
            height: 58px;
            margin: auto;
            border-radius: 15px;
            background: #ffe500;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #ff7b00;
            font-weight: bold;
        }

        .logo h2 {
            margin-top: 12px;
            font-size: 20px;
        }

        .logo p {
            font-size: 12px;
            opacity: .8;
            margin-top: 4px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: .6;
            margin: 20px 10px 10px;
        }

        .menu {
            display: block;
            padding: 13px 15px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 7px;
            transition: .2s;
        }

        .menu:hover,
        .menu.active {
            background: rgba(255,255,255,.17);
        }

        .menu span {
            margin-right: 10px;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 9px;
            background: rgba(255,255,255,.15);
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: rgba(255,255,255,.25);
        }


        /* CONTENT */

        .content {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* HEADER */

        .header {
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
        }

        .header h3 {
            color: #004b87;
            font-size: 20px;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ffe500;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #004b87;
            font-weight: bold;
        }

        .user-info strong {
            display: block;
            font-size: 14px;
        }

        .user-info small {
            color: #777;
        }


        /* MAIN */

        .main {
            padding: 30px 35px;
        }

        .welcome {
            background: linear-gradient(135deg, #004b87, #008bd2);
            color: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }

        .welcome:after {
            content: "⚡";
            position: absolute;
            right: 45px;
            top: 15px;
            font-size: 100px;
            opacity: .08;
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .welcome p {
            opacity: .9;
        }


        /* CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(0,0,0,.06);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f4ff;
            font-size: 22px;
        }

        .card h2 {
            margin-top: 17px;
            font-size: 28px;
            color: #17365d;
        }

        .card p {
            color: #777;
            font-size: 13px;
            margin-top: 5px;
        }


        /* TABLE */

        .table-box {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(0,0,0,.06);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-header h3 {
            color: #17365d;
        }

        .btn {
            background: #006fc9;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f6fb;
            color: #315b80;
            text-align: left;
            padding: 14px;
            font-size: 13px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .selesai {
            background: #e3f8eb;
            color: #159447;
        }

        .belum {
            background: #fff3cd;
            color: #9a7200;
        }


        /* RESPONSIVE */

        @media(max-width: 1000px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media(max-width: 700px) {

            .sidebar {
                width: 70px;
                padding: 15px 10px;
            }

            .logo h2,
            .logo p,
            .menu-title,
            .menu-text,
            .logout button {
                display: none;
            }

            .content {
                margin-left: 70px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 0 15px;
            }

            .main {
                padding: 20px 15px;
            }
        }

    </style>
</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                ⚡
            </div>

            <h2>BUKU TAMU</h2>
            <p>Digital PLN</p>

        </div>


        <div class="menu-title">
            MENU UTAMA
        </div>

        <a href="{{ route('dashboard') }}" class="menu active">
            <span>🏠</span>
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('buku.tamu') }}" class="menu">
            <span>📋</span>
            <span class="menu-text">Buku Tamu</span>
        </a>

        <div class="menu-title">
            AKUN
        </div>

        <form action="{{ route('petugas.logout') }}" method="POST">
    @csrf

    <button type="submit" class="btn-logout">
        🚪 Keluar
    </button>
</form>

    </aside>


    <!-- CONTENT -->

    <div class="content">

        <!-- HEADER -->

        <header class="header">

            <h3>Dashboard</h3>

            <div class="user">

                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </div>

                <div class="user-info">

                    <strong>
                        {{ Auth::user()->username }}
                    </strong>

                    <small>
                        Petugas PLN
                    </small>

                </div>

            </div>

        </header>


        <!-- MAIN -->

        <main class="main">

            <div class="welcome">

                <h1>
                    Selamat Datang 👋
                </h1>

                <p>
                    Selamat datang di Sistem Buku Tamu Digital PLN.
                    Kelola data tamu dengan mudah dan cepat.
                </p>

            </div>


            <!-- STATISTIK -->

            <div class="cards">

                <div class="card">

                    <div class="card-top">

                        <div>
                            <p>Total Tamu</p>

                            <h2>
                                {{ \App\Models\BukuTamu::count() }}
                            </h2>
                        </div>

                        <div class="card-icon">
                            👥
                        </div>

                    </div>

                    <p>Total seluruh tamu yang tercatat</p>

                </div>


                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>Hari Ini</p>

                            <h2>
                                {{ \App\Models\BukuTamu::whereDate('tanggal_jam', today())->count() }}
                            </h2>

                        </div>

                        <div class="card-icon">
                            📅
                        </div>

                    </div>

                    <p>Tamu yang datang hari ini</p>

                </div>


                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>Selesai</p>

                            <h2>
                                {{ \App\Models\BukuTamu::where('ket', 'SELESAI')->count() }}
                            </h2>

                        </div>

                        <div class="card-icon">
                            ✅
                        </div>

                    </div>

                    <p>Pelayanan telah selesai</p>

                </div>


                <div class="card">

                    <div class="card-top">

                        <div>

                            <p>Belum</p>

                            <h2>
                                {{ \App\Models\BukuTamu::where('ket', 'BELUM')->count() }}
                            </h2>

                        </div>

                        <div class="card-icon">
                            ⏳
                        </div>

                    </div>

                    <p>Masih dalam proses</p>

                </div>

            </div>


            <!-- DATA TERBARU -->

            <div class="table-box">

                <div class="table-header">

                    <h3>
                        📋 Tamu Terbaru
                    </h3>

                    <a href="{{ route('buku.tamu') }}" class="btn">
                        Lihat Semua
                    </a>

                </div>


                <table>

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>No Antrian</th>
                            <th>Tanggal / Jam</th>
                            <th>Nama</th>
                            <th>Perihal</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse(
                            \App\Models\BukuTamu::latest()->take(5)->get()
                            as $tamu
                        )

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    #{{ $tamu->no_antrian }}
                                </strong>
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

                            <td colspan="6" style="text-align:center;padding:35px;color:#777">

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