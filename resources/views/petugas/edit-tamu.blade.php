<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tamu | Buku Tamu PLN</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #f3f6f9;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            color: #244a66;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #d5dfe7;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        .btn-simpan {
            background: #1675ad;
            color: white;
            border: none;
            padding: 13px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-kembali {
            background: #687684;
            color: white;
            padding: 13px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .error {
            color: #e63946;
            font-size: 13px;
            margin-top: 5px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>✏️ Edit Data Tamu</h1>

    <p>
        Ubah data tamu kemudian klik Simpan Perubahan.
    </p>


    <form
        action="{{ route('petugas.tamu.update', $tamu->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <label>Nama Tamu</label>

        <input
            type="text"
            name="nama"
            value="{{ old('nama', $tamu->nama) }}"
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
            value="{{ old('perihal', $tamu->perihal) }}"
        >

        @error('perihal')

            <div class="error">

                {{ $message }}

            </div>

        @enderror


        <label>Keluhan / Keterangan</label>

        <textarea name="keluhan">{{ old('keluhan', $tamu->keluhan) }}</textarea>


        <label>Status</label>

        <select name="ket">

            <option
                value="BELUM"
                {{ $tamu->ket == 'BELUM' ? 'selected' : '' }}
            >
                BELUM
            </option>

            <option
                value="SELESAI"
                {{ $tamu->ket == 'SELESAI' ? 'selected' : '' }}
            >
                SELESAI
            </option>

        </select>


        <div class="buttons">

            <button
                type="submit"
                class="btn-simpan"
            >
                💾 Simpan Perubahan
            </button>


            <a
                href="{{ route('petugas.data-tamu') }}"
                class="btn-kembali"
            >
                ← Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>