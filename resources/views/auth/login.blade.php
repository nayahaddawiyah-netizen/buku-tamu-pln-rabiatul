
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    >

    <title>Login | Buku Tamu Digital PLN</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --pln-blue: #0066b3;
            --pln-blue-dark: #003b73;
            --pln-blue-light: #008fd5;
            --pln-yellow: #fff000;

            --text-dark: #17324d;
            --text-muted: #718096;
            --border: #dbe5ef;

            --radius-lg: 24px;
            --radius-md: 12px;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;

            font-family:
                Inter,
                "Segoe UI",
                Arial,
                Helvetica,
                sans-serif;

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(255,255,255,.10),
                    transparent 28%
                ),
                linear-gradient(
                    135deg,
                    #003b73 0%,
                    #0066b3 55%,
                    #008fd5 100%
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 24px;

            position: relative;
            overflow-x: hidden;
        }

        /* Background decoration */

        body::before,
        body::after {
            content: "";
            position: fixed;

            border-radius: 50%;

            pointer-events: none;
        }

        body::before {
            width: 420px;
            height: 420px;

            top: -220px;
            left: -150px;

            background:
                rgba(255, 240, 0, .08);
        }

        body::after {
            width: 600px;
            height: 600px;

            right: -300px;
            bottom: -360px;

            background:
                rgba(255,255,255,.06);
        }

        /* =========================================
           MAIN CARD
        ========================================= */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;

            background: #fff;

            border-radius: var(--radius-lg);

            overflow: hidden;

            display: grid;
            grid-template-columns: 1.05fr .95fr;

            box-shadow:
                0 25px 70px rgba(0, 30, 70, .30);

            position: relative;
            z-index: 2;
        }

        /* =========================================
           LEFT SIDE
        ========================================= */

        .left {
            position: relative;
            overflow: hidden;

            color: white;

            padding: 48px;

            background:
                linear-gradient(
                    145deg,
                    #003b73 0%,
                    #005ca9 60%,
                    #0078c8 100%
                );
        }

        .left::after {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            left: -120px;
            bottom: -240px;

            border-radius: 50%;

            background:
                rgba(255,240,0,.07);
        }

        /* =========================================
           BRAND
        ========================================= */

        .brand {
            display: flex;
            align-items: center;

            gap: 13px;

            position: relative;
            z-index: 2;
        }

        .pln-logo {
            width: 52px;
            height: 52px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--pln-yellow);

            color: var(--pln-blue);

            font-size: 28px;
            font-weight: 800;

            box-shadow:
                0 8px 20px rgba(0,0,0,.18);
        }

        .brand-text h2 {
            font-size: 20px;
            font-weight: 700;

            line-height: 1.2;
        }

        .brand-text p {
            margin-top: 4px;

            font-size: 11px;

            color: #dceeff;
        }

        /* =========================================
           LEFT CONTENT
        ========================================= */

        .left-content {
            position: relative;
            z-index: 2;

            margin-top: 70px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 8px 13px;

            border-radius: 50px;

            background:
                rgba(255,255,255,.10);

            border:
                1px solid rgba(255,255,255,.16);

            font-size: 11px;

            margin-bottom: 20px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #36df82;

            box-shadow:
                0 0 10px #36df82;
        }

        .left h1 {
            font-size: clamp(32px, 4vw, 43px);

            line-height: 1.12;

            letter-spacing: -.8px;

            margin-bottom: 17px;
        }

        .left h1 span {
            color: var(--pln-yellow);
        }

        .yellow-line {
            width: 55px;
            height: 4px;

            border-radius: 10px;

            background: var(--pln-yellow);

            margin-bottom: 18px;
        }

        .description {
            max-width: 430px;

            color: #e3f1ff;

            font-size: 14px;

            line-height: 1.7;
        }

        /* =========================================
           FEATURES
        ========================================= */

        .security-list {
            margin-top: 28px;

            display: flex;
            flex-direction: column;

            gap: 11px;
        }

        .security-item {
            display: flex;
            align-items: center;

            gap: 11px;

            font-size: 12px;
        }

        .security-icon {
            width: 33px;
            height: 33px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background:
                rgba(255,255,255,.12);

            font-size: 15px;
        }

        /* =========================================
           RIGHT SIDE
        ========================================= */

        .right {
            padding: 45px 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff;
        }

        .login-box {
            width: 100%;
            max-width: 370px;
        }

        /* =========================================
           LOGIN HEADER
        ========================================= */

        .login-icon {
            width: 64px;
            height: 64px;

            margin:
                0 auto 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #eaf5ff,
                    #f4faff
                );

            border:
                5px solid #f5faff;

            color: var(--pln-blue);

            font-size: 27px;

            box-shadow:
                0 8px 20px rgba(0,102,179,.08);
        }

        .login-box h2 {
            text-align: center;

            color: var(--pln-blue-dark);

            font-size: 27px;

            line-height: 1.2;

            margin-bottom: 7px;
        }

        .subtitle {
            text-align: center;

            color: var(--text-muted);

            font-size: 12px;

            line-height: 1.5;

            margin-bottom: 27px;
        }

        /* =========================================
           ERROR
        ========================================= */

        .error-message {
            display: flex;
            align-items: flex-start;

            gap: 8px;

            background: #fff1f2;

            color: #be123c;

            border:
                1px solid #fecdd3;

            padding: 10px 12px;

            border-radius: 9px;

            font-size: 12px;

            line-height: 1.5;

            margin-bottom: 17px;
        }

        /* =========================================
           FORM
        ========================================= */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;

            color: #243b53;

            font-size: 12px;

            font-weight: 700;

            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #8193a6;

            font-size: 16px;

            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            height: 49px;

            border:
                1px solid var(--border);

            border-radius: var(--radius-md);

            background: #fff;

            padding:
                0 43px;

            outline: none;

            color: #1e293b;

            font-family: inherit;

            font-size: 13px;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .input-wrapper input:hover {
            border-color: #b9c9d9;
        }

        .input-wrapper input:focus {
            border-color: var(--pln-blue);

            background: #fbfdff;

            box-shadow:
                0 0 0 4px
                rgba(0,102,179,.09);
        }

        .input-wrapper input::placeholder {
            color: #a0aec0;
        }

        .input-error {
            display: block;

            color: #dc2626;

            font-size: 11px;

            margin-top: 5px;
        }

        /* =========================================
           PASSWORD TOGGLE
        ========================================= */

        .password-eye {
            position: absolute;

            right: 13px;
            top: 50%;

            transform: translateY(-50%);

            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            cursor: pointer;

            color: #718096;

            font-size: 16px;

            user-select: none;

            transition:
                background .2s ease,
                color .2s ease;
        }

        .password-eye:hover {
            color: var(--pln-blue);

            background: #edf6ff;
        }

        /* =========================================
           REMEMBER
        ========================================= */

        .remember {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #64748b;

            font-size: 12px;

            cursor: pointer;

            margin:
                2px 0 19px;
        }

        .remember input {
            width: 15px;
            height: 15px;

            cursor: pointer;

            accent-color: var(--pln-blue);
        }

        /* =========================================
           BUTTON
        ========================================= */

        .login-button {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 11px;

            background:
                linear-gradient(
                    90deg,
                    #005ca9,
                    #0078c8
                );

            color: white;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 18px
                rgba(0,102,179,.20);

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                opacity .2s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(0,102,179,.28);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* =========================================
           SECURITY BOX
        ========================================= */

        .security-box {
            display: flex;
            align-items: flex-start;

            gap: 9px;

            margin-top: 18px;

            padding: 11px 12px;

            background: #f5f9fd;

            border-left:
                3px solid var(--pln-blue);

            border-radius: 8px;
        }

        .security-box-icon {
            color: var(--pln-blue);

            font-size: 16px;

            line-height: 1;
        }

        .security-box strong {
            display: block;

            color: #164e7a;

            font-size: 11px;

            margin-bottom: 3px;
        }

        .security-box p {
            color: #718096;

            font-size: 9.5px;

            line-height: 1.45;
        }

        /* =========================================
           COPYRIGHT
        ========================================= */

        .copyright {
            text-align: center;

            color: #94a3b8;

            font-size: 9px;

            margin-top: 17px;
        }

        /* =========================================
           TABLET
        ========================================= */

        @media (max-width: 850px) {

            body {
                padding: 18px;
            }

            .login-wrapper {
                max-width: 520px;

                grid-template-columns: 1fr;
            }

            .left {
                padding: 30px 32px;

                min-height: auto;
            }

            .left-content {
                margin-top: 35px;
            }

            .left h1 {
                font-size: 32px;
            }

            .description {
                max-width: 100%;
            }

            .security-list {
                display: grid;

                grid-template-columns:
                    repeat(3, 1fr);

                gap: 8px;

                margin-top: 22px;
            }

            .security-item {
                align-items: flex-start;

                flex-direction: column;

                gap: 6px;

                font-size: 10px;

                line-height: 1.4;
            }

            .right {
                padding: 35px 32px;
            }
        }

        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 600px) {

            body {
                display: block;

                padding: 12px;

                background:
                    linear-gradient(
                        145deg,
                        #003b73,
                        #0066b3
                    );
            }

            .login-wrapper {
                width: 100%;

                border-radius: 18px;

                box-shadow:
                    0 18px 45px
                    rgba(0,0,0,.25);
            }

            .left {
                padding: 23px 20px 21px;
            }

            .brand {
                gap: 10px;
            }

            .pln-logo {
                width: 43px;
                height: 43px;

                border-radius: 9px;

                font-size: 23px;
            }

            .brand-text h2 {
                font-size: 16px;
            }

            .brand-text p {
                font-size: 9px;
            }

            .left-content {
                margin-top: 25px;
            }

            .badge {
                font-size: 9px;

                padding: 7px 10px;

                margin-bottom: 14px;
            }

            .left h1 {
                font-size: 27px;

                letter-spacing: -.4px;

                margin-bottom: 12px;
            }

            .yellow-line {
                width: 43px;
                height: 3px;

                margin-bottom: 12px;
            }

            .description {
                font-size: 11px;

                line-height: 1.55;
            }

            .security-list {
                display: flex;

                flex-direction: row;

                gap: 7px;

                margin-top: 18px;
            }

            .security-item {
                flex: 1;

                font-size: 8.5px;
            }

            .security-icon {
                width: 28px;
                height: 28px;

                font-size: 12px;

                border-radius: 7px;
            }

            .right {
                padding: 28px 20px 25px;
            }

            .login-box {
                max-width: 100%;
            }

            .login-icon {
                width: 54px;
                height: 54px;

                margin-bottom: 12px;

                font-size: 23px;
            }

            .login-box h2 {
                font-size: 23px;
            }

            .subtitle {
                font-size: 11px;

                margin-bottom: 22px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                font-size: 11px;

                margin-bottom: 6px;
            }

            .input-wrapper input {
                height: 48px;

                border-radius: 10px;

                font-size: 13px;
            }

            .remember {
                font-size: 11px;

                margin-bottom: 17px;
            }

            .login-button {
                height: 48px;

                font-size: 13px;
            }

            .security-box {
                margin-top: 15px;

                padding: 9px 10px;
            }

            .security-box strong {
                font-size: 10px;
            }

            .security-box p {
                font-size: 8.5px;
            }

            .copyright {
                font-size: 8px;

                margin-top: 14px;
            }
        }

        /* =========================================
           VERY SMALL PHONE
        ========================================= */

        @media (max-width: 380px) {

            body {
                padding: 8px;
            }

            .left {
                padding:
                    20px 16px;
            }

            .right {
                padding:
                    24px 16px 20px;
            }

            .left h1 {
                font-size: 24px;
            }

            .description {
                font-size: 10px;
            }

            .security-item {
                font-size: 7.5px;
            }

            .login-box h2 {
                font-size: 21px;
            }
        }

        /* =========================================
           LANDSCAPE PHONE
        ========================================= */

        @media (max-height: 650px) and (orientation: landscape) {

            body {
                align-items: flex-start;

                padding: 12px;
            }

            .login-wrapper {
                margin: 0 auto;
            }

            .left {
                padding: 20px 28px;
            }

            .left-content {
                margin-top: 20px;
            }

            .security-list {
                margin-top: 15px;
            }

            .right {
                padding: 25px 35px;
            }

            .login-icon {
                width: 48px;
                height: 48px;

                margin-bottom: 8px;
            }

            .login-box h2 {
                font-size: 22px;
            }

            .subtitle {
                margin-bottom: 15px;
            }

            .form-group {
                margin-bottom: 11px;
            }

            .security-box {
                margin-top: 12px;
            }
        }

    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- =====================================
         LEFT
    ====================================== -->

    <section class="left">

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
                Catat tamu masuk, pantau keberadaan,
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
                        Pencatatan real-time
                    </span>

                </div>

                <div class="security-item">

                    <div class="security-icon">
                        📊
                    </div>

                    <span>
                        Laporan mudah dikelola
                    </span>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================
         RIGHT
    ====================================== -->

    <section class="right">

        <div class="login-box">

            <div class="login-icon">
                🛡️
            </div>

            <h2>
                Login Satpam
            </h2>

            <p class="subtitle">
                Silakan masuk untuk mengakses sistem
            </p>

            <!-- ERROR -->

            @if ($errors->any())

                <div class="error-message">
                    ⚠️
                    <span>
                        {{ $errors->first() }}
                    </span>
                </div>

            @endif

            <!-- FORM -->

            <form
                method="POST"
                action="{{ route('petugas.login.process') }}"
            >

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
                            placeholder="Masukkan username"
                            required
                            autofocus
                            autocomplete="username"
                        >

                    </div>

                    @error('username')

                        <small class="input-error">
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
                            role="button"
                            aria-label="Tampilkan password"
                            tabindex="0"
                        >
                            👁️
                        </span>

                    </div>

                    @error('password')

                        <small class="input-error">
                            {{ $message }}
                        </small>

                    @enderror

                </div>

                <!-- REMEMBER -->

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>

                <!-- LOGIN BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >
                    🔐 &nbsp; Masuk ke Dashboard
                </button>

            </form>

            <!-- SECURITY -->

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
                        oleh petugas yang memiliki akun resmi.
                        Jangan membagikan password kepada orang lain.
                    </p>

                </div>

            </div>

            <div class="copyright">
                © {{ date('Y') }} Buku Tamu Digital PLN
            </div>

        </div>

    </section>

</div>

<script>

function togglePassword() {

    const password =
        document.getElementById("password");

    const eye =
        document.getElementById("eye");

    if (password.type === "password") {

        password.type = "text";

        eye.textContent = "🙈";

        eye.setAttribute(
            "aria-label",
