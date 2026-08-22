<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu PLN</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, #005baa, #0088cc);
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            border: none;
            padding: 10px 16px;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: #0066b3;
        }

        .btn-warning {
            background: #f0ad4e;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-success {
            background: #28a745;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .alert {
            padding: 13px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #d4edda;
            color: #155724;
        }

        .actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>📖 Buku Tamu Digital PLN</h2>
    <span>🛡️ Satpam</span>
</div>

<div class="container">

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="header">
            <div>
                <h2>Data Tamu</h2>
                <p>Daftar kunjungan tamu PLN</p>
            </div>

            <a href="{{ route('tamu.create') }}" class="btn btn-primary">
                + Tambah Tamu
            </a>
        </div>

        @if($tamus->count())

            <div style="overflow-x:auto;">
                <table>

                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tamu</th>
                        <th>Instansi</th>
                        <th>Keperluan</th>
                        <th>Bertemu Dengan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($tamus as $tamu)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $tamu->nama_tamu }}</strong>
                                @if($tamu->no_hp)
                                    <br>
                                    <small>{{ $tamu->no_hp }}</small>
                                @endif
                            </td>

                            <td>
                                {{ $tamu->instansi ?? '-' }}
                            </td>

                            <td>
                                {{ $tamu->keperluan }}
                            </td>

                            <td>
                                {{ $tamu->bertemu_dengan }}
                                @if($tamu->jabatan)
                                    <br>
                                    <small>{{ $tamu->jabatan }}</small>
                                @endif
                            </td>

                            <td>
                                {{ $tamu->jam_masuk }}
                            </td>

                            <td>
                                {{ $tamu->jam_keluar ?? '-' }}
                            </td>

                            <td>

                                @if($tamu->status === 'masih_di_lokasi')

                                    <span class="badge badge-warning">
                                        Masih di Lokasi
                                    </span>

                                @else

                                    <span class="badge badge-success">
                                        Sudah Keluar
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="actions">

                                    <a href="{{ route('tamu.show', $tamu) }}"
                                       class="btn btn-success">
                                        Detail
                                    </a>

                                    <a href="{{ route('tamu.edit', $tamu) }}"
                                       class="btn btn-warning">
                                        Edit
                                    </a>

                                    @if($tamu->status === 'masih_di_lokasi')

                                        <form action="{{ route('tamu.keluar', $tamu) }}"
                                              method="POST"
                                              style="display:inline;">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="btn btn-primary"
                                                    onclick="return confirm('Catat tamu sudah keluar?')">
                                                Tamu Keluar
                                            </button>

                                        </form>

                                    @endif

                                    <form action="{{ route('tamu.destroy', $tamu) }}"
                                          method="POST"
                                          style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>

        @else

            <div class="empty">
                <h3>Belum ada data tamu</h3>
                <p>Silakan tambahkan data tamu pertama.</p>

                <a href="{{ route('tamu.create') }}"
                   class="btn btn-primary">
                    + Tambah Tamu
                </a>
            </div>

        @endif

    </div>

</div>

</body>
</html>