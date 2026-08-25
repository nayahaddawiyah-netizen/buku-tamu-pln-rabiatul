<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Input Tamu - Buku Tamu PLN</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f4f8;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            color: #124a75;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #d7e1e8;
            border-radius: 8px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            margin-top: 25px;
            background: #1675ad;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #124a75;
        }

        .error {
            color: red;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>📝 Input Tamu Baru</h1>

    <p>Silakan masukkan data tamu yang berkunjung.</p>

    <form
        action="{{ route('petugas.input-tamu.store') }}"
        method="POST"
    >

        @csrf

        <label>Nama Tamu</label>

        <input
            type="text"
            name="nama"
            value="{{ old('nama') }}"
            placeholder="Masukkan nama tamu"
        >

        @error('nama')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <label>Perihal</label>

        <input
            type="text"
            name="perihal"
            value="{{ old('perihal') }}"
            placeholder="Contoh: Administrasi"
        >

        @error('perihal')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <label>Keluhan / Keterangan</label>

        <textarea
            name="keluhan"
            placeholder="Masukkan keluhan atau keterangan"
        >{{ old('keluhan') }}</textarea>


        <button type="submit">
            💾 Simpan Data Tamu
        </button>

    </form>

    <a
        href="{{ route('petugas.dashboard') }}"
        class="back"
    >
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>