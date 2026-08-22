<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buku Tamu Digital PLN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #003f73, #008fd5);
            color: white;
        }

        nav {
            height: 80px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #fff000;
            color: #ff8c00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .logo h2 {
            font-size: 20px;
        }

        .login-btn {
            text-decoration: none;
            background: white;
            color: #00558e;
            padding: 12px 22px;
            border-radius: 9px;
            font-weight: bold;
        }

        .hero {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 8%;
            gap: 50px;
        }

        .hero-text {
            max-width: 600px;
        }

        .hero-text h1 {
            font-size: 50px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: #fff000;
        }

        .hero-text p {
            font-size: 18px;
            line-height: 1.7;
            opacity: .9;
            margin-bottom: 30px;
        }

        .hero-btn {
            display: inline-block;
            background: #fff000;
            color: #004b80;
            text-decoration: none;
            padding: 15px 28px;
            border-radius: 10px;
            font-weight: bold;
        }

        .hero-card {
            width: 380px;
            padding: 40px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 25px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .hero-card .big-icon {
            width: 110px;
            height: 110px;
            margin: auto auto 25px;
            border-radius: 25px;
            background: #fff000;
            color: #ff8c00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
        }

        .hero-card h2 {
            margin-bottom: 10px;
        }

        .hero-card p {
            opacity: .85;
            line-height: 1.6;
        }

        footer {
            position: fixed;
            bottom: 15px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 13px;
            opacity: .7;
        }

        @media(max-width: 800px) {

            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .hero-card {
                width: 100%;
                max-width: 380px;
            }
        }
    </style>
</head>

<body>

<nav>

    <div class="logo">

        <div class="logo-icon">
            ⚡
        </div>

        <h2>Buku Tamu Digital PLN</h2>

    </div>

    <a href="{{ route('petugas.login') }}" class="login-btn">
        Login Petugas
    </a>

</nav>


<section class="hero">

    <div class="hero-text">

        <h1>
            Selamat Datang di
            <span>Buku Tamu Digital PLN</span>
        </h1>

        <p>
            Sistem pencatatan kunjungan tamu secara digital
            untuk membantu petugas PLN mengelola data tamu
            dengan lebih mudah, cepat, dan teratur.
        </p>

        <a href="{{ route('petugas.login') }}" class="hero-btn">
            🔐 Masuk sebagai Petugas
        </a>

    </div>


    <div class="hero-card">

        <div class="big-icon">
            ⚡
        </div>

        <h2>PLN Kuala Simpang</h2>

        <p>
            Sistem Buku Tamu Digital
            untuk pelayanan dan pencatatan
            kunjungan tamu.
        </p>

    </div>

</section>


<footer>
    © 2026 Buku Tamu Digital PLN
</footer>

</body>
</html>