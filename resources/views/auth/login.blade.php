<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Buku Tamu Digital PLN</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;

            background: linear-gradient(
                135deg,
                #003b73 0%,
                #0066b3 55%,
                #008fd5 100%
            );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 25px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            border-radius: 50%;

            background: rgba(255, 235, 0, 0.08);

            top: -220px;
            left: -180px;
        }

        body::after {
            content: "";
            position: absolute;

            width: 600px;
            height: 600px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.05);

            bottom: -350px;
            right: -250px;
        }

        /* =========================
           LOGIN WRAPPER
        ========================= */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 610px;

            background: white;

            border-radius: 25px;
            overflow: hidden;

            display: grid;
            grid-template-columns: 1.05fr .95fr;

            box-shadow: 0 30px 70px rgba(0, 0, 0, .25);

            position: relative;
            z-index: 2;
        }

        /* =========================
           BAGIAN KIRI
        ========================= */

        .left {
            background: linear-gradient(
                145deg,
                #003b73,
                #005ca9 65%,
                #0078c8
            );

            color: white;

            padding: 55px;

            position: relative;
            overflow: hidden;
        }

        .left::after {
            content: "";

            position: absolute;

            width: 400px;
            height: 400px;

            background: rgba(255, 236, 0, .08);

            border-radius: 50%;

            bottom: -220px;
            left: -100px;
        }

        /* =========================
           BRAND
        ========================= */

        .brand {
            display: flex;
            align-items: center;

            gap: 15px;

            position: relative;
            z-index: 2;
        }

        .pln-logo {
            width: 58px;
            height: 58px;

            background: #fff000;

            color: #0066b3;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            font-size: 32px;
            font-weight: bold;

            box-shadow: 0 8px 18px rgba(0,0,0,.15);
        }

        .brand-text h2 {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .brand-text p {
            font-size: 12px;
            color: #dceeff;
        }

        /* =========================
           LEFT CONTENT
        ========================= */

        .left-content {
            position: relative;
            z-index: 2;

            margin-top: 85px;
        }

        .badge {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            background: rgba(255,255,255,.12);

            border: 1px solid rgba(255,255,255,.2);

            padding: 9px 15px;

            border-radius: 30px;

            font-size: 12px;

            margin-bottom: 22px;
        }

        .badge-dot {
            width: 8px;
            height: 8px;

            background: #36df82;

            border-radius: 50%;

            box-shadow: 0 0 10px #36df82;
        }

        .left h1 {
            font-size: 43px;

            line-height: 1.12;

            margin-bottom: 18px;
        }

        .left h1 span {
            color: #fff000;
        }

        .yellow-line {
            width: 65px;
            height: 5px;

            background: #fff000;

            border-radius: 5px;

            margin-bottom: 20px;
        }

        .description {
            color: #e3f1ff;

            font-size: 15px;

            line-height: 1.7;

            max-width: 430px;
        }

        /* =========================
           SECURITY LIST
        ========================= */

        .security-list {
            margin-top: 32px;

            display: flex;
            flex-direction: column;

            gap: 14px;
        }

        .security-item {
            display: flex;
            align-items: center;

            gap: 12px;

            font-size: 13px;
        }

        .security-icon {
            width: 35px;
            height: 35px;

            background: rgba(255,255,255,.12);

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================
           BAGIAN LOGIN
        ========================= */

        .right {
            padding: 50px 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;
        }

        .login-box {
            width: 100%;
            max-width: 370px;
        }

        .login-icon {
            width: 70px;
            height: 70px;

            background: #eaf5ff;

            color: #0066b3;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 17px;

            font-size: 32px;

            border: 5px solid #f3f9ff;
        }

        .login-box h2 {
            text-align: center;

            color: #003b73;

            font-size: 29px;

            margin-bottom: 7px;
        }

        .subtitle {
            text-align: center;

            color: #718096;

            font-size: 13px;

            margin-bottom: 32px;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            color: #243b53;

            font-weight: bold;

            font-size: 13px;

            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #718096;

            font-size: 17px;

            z-index: 2;
        }

        .input-wrapper input {
            width: 100%;

            height: 50px;

            border: 1px solid #d6dee8;

            border-radius: 10px;

            padding: 0 45px;

            outline: none;

            font-size: 14px;

            color: #1e293b;

            transition: .25s;
        }

        .input-wrapper input:focus {
            border-color: #0066b3;

            box-shadow:
                0 0 0 4px rgba(0,102,179,.10);
        }

        .input-wrapper input::placeholder {
            color: #a0aec0;
        }

        /* =========================
           PASSWORD
        ========================= */

        .password-eye {
            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

            color: #718096;

            font-size: 17px;

            user-select: none;
        }

        /* =========================
           REMEMBER
        ========================= */

        .remember {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #64748b;

            font-size: 13px;

            margin-bottom: 22px;
        }

        .remember input {
            width: 16px;
            height: 16px;

            accent-color: #0066b3;
        }

        /* =========================
           BUTTON
        ========================= */

        .login-button {
            width: 100%;

            height: 51px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                90deg,
                #005ca9,
                #0078c8
            );

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;

            box-shadow:
                0 8px 20px rgba(0,102,179,.22);

            transition: .3s;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(0,102,179,.30);
        }

        /* =========================
           ERROR
        ========================= */

        .error-message {
            background: #fff1f2;

            color: #be123c;

            border: 1px solid #fecdd3;

            padding: 10px 12px;

            border-radius: 8px;

            font-size: 12px;

            margin-bottom: 18px;
        }

        /* =========================
           SECURITY BOX
        ========================= */

        .security-box {
            margin-top: 22px;

            background: #f3f8fd;

            border-left: 4px solid #0066b3;

            border-radius: 8px;

            padding: 13px;

            display: flex;

            gap: 10px;
        }

        .security-box-icon {
            color: #0066b3;

            font-size: 18px;
        }

        .security-box strong {
            display: block;

            color: #164e7a;

            font-size: 12px;

            margin-bottom: 4px;
        }

        .security-box p {
            color: #718096;

            font-size: 10px;

            line-height: 1.5;
        }

        /* =========================
           COPYRIGHT
        ========================= */

        .copyright {
            text-align: center;

            color: #94a3b8;

            font-size: 10px;

            margin-top: 22px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            body {
                padding: 15px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;

                max-width: 500px;
            }

            .left {
                padding: 35px;

                min-height: 430px;
            }

            .left-content {
                margin-top: 45px;
            }

            .left h1 {
                font-size: 35px;
            }

            .right {
                padding: 40px 30px;
            }
        }

        @media (max-width: 480px) {

            .left {
                padding: 28px 22px;
            }

            .brand-text h2 {
                font-size: 18px;
            }

            .brand-text p {
                font-size: 10px;
            }

            .pln-logo {
                width: 48px;
                height: 48px;

                font-size: 26px;
            }

            .left h1 {
                font-size: 30px;
            }

            .right {
                padding: 35px 22px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- =========================
         BAGIAN KIRI
    ========================= -->

    <div class="left">

        <div class="brand">

            <div class="pln-logo">
                ⚡
            </div>

            <div class="brand-text">
                <h2>Buku Tamu Digital</h2>
                <p>PLN • Sistem Kunjungan Tamu</p>
            </div>

        </div>


        <div class="left-content">

            <div class="badge">
                <span class="badge-dot"></span>
                Sistem Internal PLN
            </div>

            <h1>
                Selamat Datang
                <br>
                <span>Petugas Satpam</span>
            </h1>

            <div class="yellow-line"></div>

            <p class="description">
                Kelola data kunjungan tamu PLN dengan
                lebih cepat, aman, dan terorganisir.
                Catat tamu masuk, pantau keberadaan tamu,
                dan lakukan proses check-out dengan mudah.
            </p>


            <div class="security-list">

                <div class="security-item">

                    <div class="security-icon">
                        🛡️
                    </div>

                    <span>
                        Sistem aman untuk petugas
                    </span>

                </div>


                <div class="security-item">

                    <div class="security-icon">
                        🕐
                    </div>

                    <span>
                        Pencatatan kunjungan secara real-time
                    </span>

                </div>


                <div class="security-item">

                    <div class="security-icon">
                        📊
                    </div>

                    <span>
                        Laporan kunjungan mudah dikelola
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================
         KANAN - LOGIN
    ========================= -->

    <div class="right">

        <div class="login-box">

            <div class="login-icon">
                🛡️
            </div>

            <h2>Login Satpam</h2>

            <p class="subtitle">
                Silakan masuk untuk mengakses sistem
            </p>


            <!-- ERROR -->

            @if ($errors->any())

                <div class="error-message">
                    {{ $errors->first() }}
                </div>

            @endif


            <!-- FORM LOGIN -->

            <form method="POST" action="{{ route('login') }}">

                @csrf


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username Petugas
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            👤
                        </span>

                        <input
                            id="username"
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username petugas"
                            required
                            autofocus
                            autocomplete="username"
                        >

                    </div>

                    @error('username')

                        <small style="color:#dc2626;">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            🔒
                        </span>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >

                        <span
                            class="password-eye"
                            onclick="togglePassword()"
                            id="eye"
                        >
                            👁️
                        </span>

                    </div>

                    @error('password')

                        <small style="color:#dc2626;">
                            {{ $message }}
                        </small>

                    @enderror

                </div>


                <!-- INGAT SAYA -->

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    Ingat saya

                </label>


                <!-- TOMBOL -->

                <button
                    type="submit"
                    class="login-button"
                >
                    🔐 &nbsp; Masuk ke Dashboard
                </button>

            </form>


            <!-- KEAMANAN -->

            <div class="security-box">

                <div class="security-box-icon">
                    🛡️
                </div>

                <div>

                    <strong>
                        Akses Terbatas
                    </strong>

                    <p>
                        Halaman ini hanya dapat digunakan
                        oleh petugas yang memiliki akun
                        resmi. Jangan membagikan password
                        kepada orang lain.
                    </p>

                </div>

            </div>


            <div class="copyright">
                © {{ date('Y') }} Buku Tamu Digital PLN
            </div>

        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById('password');

    const eye =
        document.getElementById('eye');

    if (password.type === 'password') {

        password.type = 'text';

        eye.innerHTML = '🙈';

    } else {

        password.type = 'password';

        eye.innerHTML = '👁️';

    }

}

</script>

</body>
</html>