<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas - Buku Tamu Digital PLN</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f3f7fb;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #004b87, #006db6);
            color: white;
            padding: 25px 18px;
        }

        .brand {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid rgba(255,255,255,.2);
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            margin: auto;
            border-radius: 15px;
            background: #fff000;
            color: #ff8c00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .brand h2 {
            margin-top: 12px;
            font-size: 20px;
        }

        .brand p {
            font-size: 12px;
            opacity: .8;
            margin-top: 5px;
        }

        .menu {
            margin-top: 30px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 14px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,.18);
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 75px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }

        .topbar h2 {
            color: #004b87;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #006db6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .content {
            padding: 35px;
        }

        .welcome {
            background: linear-gradient(120deg, #00579b, #009fe3);
            color: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .welcome p {
            opacity: .9;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.07);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: #e5f4ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin-bottom: 15px;
        }

        .card h3 {
            color: #004b87;
            margin-bottom: 8px;
        }

        .card p {
            color: #777;
        }

        .logout {
            margin-top: 30px;
        }

        .logout button {
            border: none;
            background: #dc3545;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media(max-width: 800px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="brand">

        <div class="brand-icon">
            ⚡
        </div>

        <h2>BUKU TAMU PLN</h2>

        <p>Panel Petugas / Satpam</p>

    </div>

    <div class="menu">

        <a href="{{ route('petugas.dashboard') }}" class="active">
            🏠 Dashboard
        </a>

        <a href="#">
            📝 Data Tamu
        </a>

        <a href="#">
            👥 Daftar Tamu
        </a>

        <a href="#">
            📊 Laporan
        </a>

    </div>

    <div class="logout">

        <form action="{{ route('petugas.logout') }}" method="POST">
            @csrf

            <button type="submit">
                🚪 Keluar
            </button>

        </form>

    </div>

</div>


<!-- MAIN -->
<div class="main">

    <div class="topbar">

        <h2>Dashboard Petugas</h2>

        <div class="user">

            <div>
                <strong>{{ Auth::user()->nama ?? Auth::user()->username }}</strong>
                <br>
                <small>Petugas / Satpam</small>
            </div>

            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
            </div>

        </div>

    </div>


    <div class="content">

        <div class="welcome">

            <h1>Selamat Datang 👋</h1>

            <p>
                Selamat datang di Dashboard Petugas Buku Tamu Digital PLN.
            </p>

        </div>


        <div class="cards">

            <div class="card">

                <div class="card-icon">
                    👥
                </div>

                <h3>Total Tamu</h3>

                <p>
                    Kelola dan lihat data tamu yang datang.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    📝
                </div>

                <h3>Input Tamu</h3>

                <p>
                    Tambahkan data tamu yang berkunjung.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    📊
                </div>

                <h3>Laporan</h3>

                <p>
                    Lihat laporan kunjungan tamu.
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>