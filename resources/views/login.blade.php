<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Petugas | Buku Tamu Digital PLN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #003b73 0%,
                    #005ca9 50%,
                    #008fd5 100%
                );

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 25px;
        }

        /* ==============================
           CONTAINER
        ============================== */

        .login-container {
            width: 100%;
            max-width: 1050px;

            min-height: 620px;

            background: #ffffff;

            border-radius: 25px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 1fr 1fr;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.28);
        }


        /* ==============================
           BAGIAN KIRI
        ============================== */

        .left-side {
            position: relative;

            background:
                linear-gradient(
                    145deg,
                    #002b5c,
                    #005ca9,
                    #0078c8
                );

            color: white;

            padding: 60px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            overflow: hidden;
        }


        .left-side::before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.06);

            top: -100px;
            right: -100px;
        }


        .left-side::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.05);

            bottom: -80px;
            left: -80px;
        }


        /* ==============================
           LOGO PLN
        ============================== */

        .pln-logo {
            position: relative;

            z-index: 2;

            width: 75px;
            height: 75px;

            background: #fff000;

            color: #0066b3;

            border-radius: 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 38px;

            font-weight: bold;

            margin-bottom: 30px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, .18);
        }


        .left-content {
            position: relative;
            z-index: 2;
        }


        .left-content h1 {
            font-size: 42px;

            line-height: 1.15;

            margin-bottom: 18px;
        }


        .left-content h1 span {
            color: #fff000;
        }


        .line {
            width: 70px;
            height: 5px;

            background: #fff000;

            border-radius: 10px;

            margin-bottom: 22px;
        }


        .left-content p {
            color: #dceeff;

            line-height: 1.8;

            font-size: 14px;

            max-width: 420px;
        }


        /* ==============================
           FITUR
        ============================== */

        .features {
            margin-top: 35px;
        }


        .feature {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 16px;

            color: #eef8ff;

            font-size: 14px;
        }


        .feature-icon {
            width: 35px;
            height: 35px;

            border-radius: 9px;

            background: rgba(255, 255, 255, .12);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;
        }


        /* ==============================
           BAGIAN KANAN
        ============================== */

        .right-side {
            padding: 55px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffffff;
        }


        .login-box {
            width: 100%;
            max-width: 370px;
        }


        /* ==============================
           ICON
        ============================== */

        .login-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 20px;

            border-radius: 50%;

            background: #eaf5ff;

            color: #0066b3;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 36px;
        }


        .login-box h2 {
            text-align: center;

            color: #003b73;

            font-size: 29px;

            margin-bottom: 8px;
        }


        .subtitle {
            text-align: center;

            color: #7b8794;

            font-size: 13px;

            line-height: 1.6;

            margin-bottom: 30px;
        }


        /* ==============================
           ERROR
        ============================== */

        .error-box {
            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            padding: 13px 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 13px;
        }


        /* ==============================
           FORM
        ============================== */

        .form-group {
            margin-bottom: 20px;
        }


        .form-group label {
            display: block;

            color: #243b53;

            font-size: 13px;

            font-weight: bold;

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

            font-size: 17px;

            color: #64748b;
        }


        .input-wrapper input {
            width: 100%;

            height: 52px;

            border: 1px solid #d6dee8;

            border-radius: 11px;

            padding: 0 15px 0 45px;

            font-size: 14px;

            color: #1e293b;

            outline: none;

            transition: .2s;
        }


        .input-wrapper input:focus {
            border-color: #0066b3;

            box-shadow:
                0 0 0 4px
                rgba(0, 102, 179, .10);
        }


        .input-wrapper input::placeholder {
            color: #a0aec0;
        }


        /* ==============================
           BUTTON
        ============================== */

        .login-button {
            width: 100%;

            height: 53px;

            border: none;

            border-radius: 11px;

            background:
                linear-gradient(
                    90deg,
                    #005ca9,
                    #0078c8
                );

            color: white;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            margin-top: 5px;

            box-shadow:
                0 8px 20px
                rgba(0, 102, 179, .25);

            transition: .2s;
        }


        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px
                rgba(0, 102, 179, .32);
        }


        .login-button:active {
            transform: translateY(0);
        }


        /* ==============================
           SECURITY
        ============================== */

        .security-box {
            margin-top: 25px;

            padding: 14px;

            background: #f5f9fd;

            border-left: 4px solid #0066b3;

            border-radius: 8px;

            color: #64748b;

            font-size: 11px;

            line-height: 1.6;
        }


        .security-box strong {
            color: #003b73;
        }


        /* ==============================
           FOOTER
        ============================== */

        .footer {
            text-align: center;

            color: #94a3b8;

            font-size: 10px;

            margin-top: 22px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 850px) {

            .login-container {
                grid-template-columns: 1fr;

                max-width: 500px;
            }

            .left-side {
                padding: 40px;
            }

            .left-content h1 {
                font-size: 34px;
            }

            .right-side {
                padding: 40px 30px;
            }
        }


        @media (max-width: 500px) {

            body {
                padding: 10px;
            }

            .left-side {
                padding: 30px;
            }

            .right-side {
                padding: 35px 25px;
            }

            .left-content h1 {
                font-size: 30px;
            }

            .login-box h2 {
                font-size: 25px;
            }
        }

    </style>

</head>


<body>


<div class="login-container">


    <!-- =================================
         BAGIAN KIRI
    ================================== -->

    <div class="left-side">

        <div class="pln-logo">
            ⚡
        </div>


        <div class="left-content">

            <h1>
                Buku Tamu Digital
                <br>
                <span>PLN</span>
            </h1>


            <div class="line"></div>


            <p>
                Sistem Buku Tamu Digital PLN digunakan
                untuk mencatat dan mengelola data
                kunjungan tamu secara cepat, aman,
                dan terorganisir.
            </p>


            <div class="features">

                <div class="feature">

                    <div class="feature-icon">
                        🛡️
                    </div>

                    <span>
                        Akses khusus petugas
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        📝
                    </div>

                    <span>
                        Pencatatan data tamu
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-icon">
                        📊
                    </div>

                    <span>
                        Pengelolaan laporan kunjungan
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- =================================
         BAGIAN KANAN
    ================================== -->

    <div class="right-side">

        <div class="login-box">


            <div class="login-icon">
                🛡️
            </div>


            <h2>
                Login Petugas
            </h2>


            <p class="subtitle">

                Masukkan username dan password
                untuk masuk ke dashboard

            </p>


            <!-- ERROR LOGIN -->

            @if ($errors->any())

                <div class="error-box">

                    {{ $errors->first() }}

                </div>

            @endif


            <!-- FORM LOGIN -->

            <form
                method="POST"
                action="{{ route('login.process') }}"
            >

                @csrf


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>


                    <div class="input-wrapper">

                        <span class="input-icon">
                            👤
                        </span>


                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            autocomplete="username"
                            required
                            autofocus
                        >

                    </div>

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
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >

                    🔐 &nbsp;
                    MASUK KE DASHBOARD

                </button>

            </form>


            <!-- SECURITY -->

            <div class="security-box">

                🛡️
                <strong>Akses Terbatas</strong>

                <br>

                Halaman ini hanya dapat digunakan
                oleh petugas yang memiliki akun resmi.

            </div>


            <div class="footer">

                © {{ date('Y') }}
                Buku Tamu Digital PLN

            </div>


        </div>

    </div>


</div>


</body>

</html>