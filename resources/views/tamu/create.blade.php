<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tamu - PLN</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            background: linear-gradient(135deg, #005baa, #0088cc);
            color: white;
            padding: 18px 30px;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.08);
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 7px;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #0066b3;
        }

        .btn-secondary {
            background: #777;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        @media(max-width: 700px) {
            .row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>📖 Buku Tamu Digital PLN</h2>
</div>

<div class="container">

    <div class="card">

        <h2>Tambah Data Tamu</h2>
        <p>Silakan isi data tamu yang datang ke kantor PLN.</p>

        @if($errors->any())

            <div class="error">

                <strong>Data belum lengkap:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form action="{{ route('tamu.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="form-group">
                    <label>Nama Tamu *</label>

                    <input type="text"
                           name="nama_tamu"
                           value="{{ old('nama_tamu') }}"
                           placeholder="Masukkan nama tamu"
                           required>
                </div>

                <div class="form-group">
                    <label>NIK</label>

                    <input type="text"
                           name="nik"
                           value="{{ old('nik') }}"
                           placeholder="Nomor identitas">
                </div>

                <div class="form-group">
                    <label>No. HP</label>

                    <input type="text"
                           name="no_hp"
                           value="{{ old('no_hp') }}"
                           placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group">
                    <label>Instansi / Perusahaan</label>

                    <input type="text"
                           name="instansi"
                           value="{{ old('instansi') }}"
                           placeholder="Nama instansi">
                </div>

                <div class="form-group">
                    <label>Bertemu Dengan *</label>

                    <input type="text"
                           name="bertemu_dengan"
                           value="{{ old('bertemu_dengan') }}"
                           placeholder="Nama pegawai PLN"
                           required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>

                    <input type="text"
                           name="jabatan"
                           value="{{ old('jabatan') }}"
                           placeholder="Jabatan pegawai">
                </div>

                <div class="form-group">
                    <label>No. Kendaraan</label>

                    <input type="text"
                           name="no_kendaraan"
                           value="{{ old('no_kendaraan') }}"
                           placeholder="Contoh: BL 1234 XX">
                </div>

                <div class="form-group">
                    <label>Tanggal Kunjungan *</label>

                    <input type="date"
                           name="tanggal_kunjungan"
                           value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Jam Masuk *</label>

                    <input type="time"
                           name="jam_masuk"
                           value="{{ old('jam_masuk', date('H:i')) }}"
                           required>
                </div>

            </div>

            <div class="form-group">

                <label>Keperluan *</label>

                <textarea name="keperluan"
                          placeholder="Tuliskan keperluan tamu..."
                          required>{{ old('keperluan') }}</textarea>

            </div>

            <div class="form-group">

                <label>Keterangan</label>

                <textarea name="keterangan"
                          placeholder="Keterangan tambahan...">{{ old('keterangan') }}</textarea>

            </div>

            <br>

            <a href="{{ route('tamu.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Simpan Data Tamu
            </button>

        </form>

    </div>

</div>

</body>
</html>