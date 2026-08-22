<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buku Tamu Digital | PLN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8fc;
            color: #172033;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 76px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            border-bottom: 1px solid #e5eaf1;
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #005baa, #0078c8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            box-shadow: 0 7px 18px rgba(0, 91, 170, .22);
        }

        .brand-text h2 {
            font-size: 20px;
            color: #073b72;
        }

        .brand-text span {
            font-size: 11px;
            color: #7a8798;
        }

        .login-btn {
            text-decoration: none;
            background: #005baa;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: bold;
            transition: .3s;
        }

        .login-btn:hover {
            background: #00457f;
            transform: translateY(-2px);
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 600px;
            background:
                radial-gradient(circle at 85% 20%, rgba(255, 193, 7, .18), transparent 25%),
                linear-gradient(135deg, #003b73 0%, #005baa 55%, #0078c8 100%);
            color: white;
            display: flex;
            align-items: center;
            padding: 70px 7%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
            right: -180px;
            top: -150px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255,193,7,.08);
            left: -180px;
            bottom: -180px;
        }

        .hero-content {
            width: 55%;
            position: relative;
            z-index: 2;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.22);
            padding: 9px 15px;
            border-radius: 30px;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .badge-dot {
            width: 9px;
            height: 9px;
            background: #ffc107;
            border-radius: 50%;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.08;
            margin-bottom: 20px;
            letter-spacing: -1.5px;
        }

        .hero h1 span {
            color: #ffd43b;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            max-width: 620px;
            color: #e6f1ff;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 13px;
            flex-wrap: wrap;
        }

        .btn-main {
            text-decoration: none;
            background: #ffc107;
            color: #172033;
            padding: 15px 27px;
            border-radius: 11px;
            font-weight: bold;
            box-shadow: 0 10px 25px rgba(0,0,0,.15);
            transition: .3s;
        }

        .btn-main:hover {
            transform: translateY(-3px);
            background: #ffd43b;
        }

        .btn-outline {
            text-decoration: none;
            color: white;
            border: 1px solid rgba(255,255,255,.4);
            padding: 15px 27px;
            border-radius: 11px;
            font-weight: bold;
            transition: .3s;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,.1);
        }

        /* =========================
           LOGIN CARD / SECURITY CARD
        ========================= */

        .hero-card-area {
            width: 45%;
            display: flex;
            justify-content: flex-end;
            position: relative;
            z-index: 2;
        }

        .security-card {
            width: 390px;
            background: white;
            color: #172033;
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 25px 60px rgba(0,0,0,.22);
        }

        .security-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .security-icon {
            width: 55px;
            height: 55px;
            background: #e9f4ff;
            color: #005baa;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .security-header h3 {
            font-size: 19px;
            color: #073b72;
        }

        .security-header p {
            font-size: 12px;
            color: #8a94a3;
            margin-top: 4px;
        }

        .info-box {
            background: #f6f9fc;
            border: 1px solid #e8edf3;
            padding: 15px;
            border-radius: 13px;
            margin-bottom: 12px;
            display: flex;
            gap: 13px;
            align-items: center;
        }

        .info-number {
            width: 37px;
            height: 37px;
            border-radius: 10px;
            background: #005baa;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .info-box strong {
            display: block;
            font-size: 14px;
        }

        .info-box small {
            color: #7e8997;
            font-size: 12px;
        }

        .card-login {
            display: block;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
            background: #005baa;
            color: white;
            padding: 14px;
            border-radius: 11px;
            font-weight: bold;
            transition: .3s;
        }

        .card-login:hover {
            background: #00457f;
        }

        /* =========================
           FEATURES
        ========================= */

        .features {
            padding: 70px 7%;
            background: #ffffff;
        }

        .section-title {
            text-align: center;
            max-width: 650px;
            margin: auto;
        }

        .section-title span {
            color: #005baa;
            font-weight: bold;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title h2 {
            font-size: 34px;
            margin: 10px 0;
            color: #172033;
        }

        .section-title p {
            color: #758195;
            line-height: 1.6;
        }

        .feature-grid {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-card {
            padding: 25px;
            border: 1px solid #e7ecf2;
            border-radius: 17px;
            background: white;
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,.08);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            background: #eaf5ff;
            color: #005baa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            font-size: 17px;
            margin-bottom: 9px;
        }

        .feature-card p {
            font-size: 13px;
            color: #7a8594;
            line-height: 1.6;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #062d55;
            color: white;
            padding: 25px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer p {
            color: #c5d5e7;
            font-size: 13px;
        }

        .status {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
        }

        .status-dot {
            width: 9px;
            height: 9px;
            background: #36d278;
            border-radius: 50%;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .hero {
                flex-direction: column;
                gap: 45px;
                padding-top: 55px;
            }

            .hero-content,
            .hero-card-area {
                width: 100%;
            }

            .hero-card-area {
                justify-content: center;
            }

            .hero h1 {
                font-size: 43px;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 20px;
            }

            .brand-text span {
                display: none;
            }

            .hero {
                padding: 45px 20px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 15px;
            }

            .security-card {
                width: 100%;
            }

            .features {
                padding: 55px 20px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            footer {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="brand">

        <div class="brand-icon">
            ⚡
        </div>

        <div class="brand-text">
            <h2>Buku Tamu Digital</h2>
            <span>Sistem Kunjungan Kantor PLN</span>
        </div>

    </div>

    <a href="{{ route('login') }}" class="login-btn">
        Login Satpam
    </a>

</nav>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-content">

        <div class="badge">
            <span class="badge-dot"></span>
            Sistem Buku Tamu Resmi Internal
        </div>

        <h1>
            Kelola Kunjungan
            <span>Lebih Mudah.</span>
        </h1>

        <p>
            Buku Tamu Digital membantu petugas keamanan mencatat,
            memantau, dan mengelola setiap kunjungan tamu
            secara cepat, rapi, dan terstruktur.
        </p>

        <div class="hero-buttons">

            <a href="{{ route('login') }}" class="btn-main">
                🔐 Masuk sebagai Satpam
            </a>

            <a href="#fitur" class="btn-outline">
                Lihat Fitur
            </a>

        </div>

    </div>


    <div class="hero-card-area">

        <div class="security-card">

            <div class="security-header">

                <div class="security-icon">
                    🛡️
                </div>

                <div>
                    <h3>Panel Keamanan</h3>
                    <p>Petugas Satpam PLN</p>
                </div>

            </div>


            <div class="info-box">

                <div class="info-number">
                    01
                </div>

                <div>
                    <strong>Catat Tamu Masuk</strong>
                    <small>Data tamu tersimpan secara digital</small>
                </div>

            </div>


            <div class="info-box">

                <div class="info-number">
                    02
                </div>

                <div>
                    <strong>Pantau Tamu</strong>
                    <small>Ketahui siapa yang masih berada di lokasi</small>
                </div>

            </div>


            <div class="info-box">

                <div class="info-number">
                    03
                </div>

                <div>
                    <strong>Catat Tamu Keluar</strong>
                    <small>Jam keluar tercatat otomatis</small>
                </div>

            </div>


            <a href="{{ route('login') }}" class="card-login">
                Buka Sistem →
            </a>

        </div>

    </div>

</section>


<!-- =========================
     FEATURES
========================= -->

<section class="features" id="fitur">

    <div class="section-title">

        <span>Fitur Sistem</span>

        <h2>Buku Tamu Digital untuk Petugas</h2>

        <p>
            Semua kebutuhan pencatatan kunjungan tamu
            tersedia dalam satu sistem yang sederhana.
        </p>

    </div>


    <div class="feature-grid">

        <div class="feature-card">

            <div class="feature-icon">
                👤
            </div>

            <h3>Data Tamu</h3>

            <p>
                Mencatat identitas, instansi, nomor kendaraan,
                dan keperluan tamu.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                🕐
            </div>

            <h3>Jam Kunjungan</h3>

            <p>
                Mencatat waktu tamu masuk dan keluar
                dari lingkungan kantor.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                🛡️
            </div>

            <h3>Kontrol Satpam</h3>

            <p>
                Petugas dapat memantau tamu yang masih
                berada di lokasi.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                📊
            </div>

            <h3>Laporan</h3>

            <p>
                Data kunjungan dapat digunakan untuk
                kebutuhan laporan dan monitoring.
            </p>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <p>
        © {{ date('Y') }} Buku Tamu Digital PLN
    </p>

    <div class="status">
        <span class="status-dot"></span>
        Sistem Online
    </div>

</footer>

</body>
</html>