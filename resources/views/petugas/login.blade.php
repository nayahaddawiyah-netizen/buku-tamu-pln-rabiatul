<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Petugas - PLN</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #004b80,
                    #008fd5
                );
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 22px;

            box-shadow:
                0 20px 50px rgba(0,0,0,.25);
        }

        .icon {
            width: 70px;
            height: 70px;

            margin: auto;

            border-radius: 17px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff000;
            color: #ff8c00;

            font-size: 38px;
        }

        h1 {
            text-align: center;
            color: #004b80;
            margin-top: 18px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-top: 7px;
            margin-bottom: 30px;
        }

        .error {
            background: #ffe5e5;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #17365d;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 14px;

            border: 1px solid #d0d8e2;
            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #008fd5;
            box-shadow:
                0 0 0 3px rgba(0,143,213,.15);
        }

        button {
            width: 100%;
            padding: 14px;

            border: none;
            border-radius: 10px;

            background:
                linear-gradient(
                    90deg,
                    #0067ad,
                    #008fd5
                );

            color: white;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;

            text-decoration: none;
            color: #0067ad;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            margin-top: 25px;
        }

    </style>

</head>

<body>

<div class="login-box">

    <div class="icon">
        ⚡
    </div>

    <h1>Login Satpam</h1>

    <div class="subtitle">
        Buku Tamu Digital PLN
    </div>


    @if ($errors->any())

        <div class="error">
            {{ $errors->first() }}
        </div>

    @endif


    <form
        action="{{ route('petugas.login.process') }}"
        method="POST"
    >

        @csrf


        <label>
            Username Petugas
        </label>

        <input
            type="text"
            name="username"
            value="{{ old('username') }}"
            placeholder="Masukkan username"
            required
        >


        <label>
            Password
        </label>

        <input
            type="password"
            name="password"
            placeholder="Masukkan password"
            required
        >


        <button type="submit">
            🔐 Masuk ke Dashboard
        </button>

    </form>


    <a
        href="{{ route('landing') }}"
        class="back"
    >
        ← Kembali ke Halaman Utama
    </a>


    <div class="footer">
        © 2026 Buku Tamu Digital PLN
    </div>

</div>

</body>
</html>