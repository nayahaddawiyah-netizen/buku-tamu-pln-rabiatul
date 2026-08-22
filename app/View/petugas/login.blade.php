<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Petugas - Buku Tamu Digital PLN</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #004b87, #009fe3);
        }

        .login-card {
            width: 400px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,.25);
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: auto;
            background: #fff000;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            color: #ff8c00;
        }

        h1 {
            margin-top: 18px;
            text-align: center;
            color: #004b87;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-top: 6px;
            margin-bottom: 30px;
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
            border: 1px solid #cfd8e3;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #008ed6;
            box-shadow: 0 0 0 3px rgba(0,142,214,.15);
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #0067b1, #008ed6);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        .error {
            background: #ffe5e5;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            color: #789;
            font-size: 13px;
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">
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

    <form action="{{ route('petugas.login.process') }}" method="POST">
        @csrf

        <label>Username Petugas</label>
        <input
            type="text"
            name="username"
            placeholder="Masukkan username"
            value="{{ old('username') }}"
            required
        >

        <label>Password</label>
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

    <div class="footer">
        © 2026 Buku Tamu Digital PLN
    </div>

</div>

</body>
</html>