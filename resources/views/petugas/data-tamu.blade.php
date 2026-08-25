<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Tamu | Buku Tamu PLN</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6f9;
            color: #243b53;
        }

        .container {
            width: 95%;
            max-width: 1300px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        h1 {
            margin: 0;
        }

        .header p {
            margin-bottom: 0;
        }

        .button-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-dashboard {
            background: #546e7a;
        }

        .btn-tambah {
            background: #1675ad;
        }

        /* TOMBOL EXPORT EXCEL */
        .btn-excel {
            background: #198754;
        }

        .btn-excel:hover {
            background: #157347;
        }

        .btn-dashboard:hover {
            background: #455a64;
        }

        .btn-tambah:hover {
            background: #0f5f8f;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #e7eef4;
            color: #34495e;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #e3e8ed;
            text-align: left;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .selesai {
            background: #dcefe4;
            color: #23834d;
        }

        .belum {
            background: #f8dede;
            color: #bd3945;
        }

        .btn-edit {
            display: inline-block;
            background: #f0a500;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 13px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background: #d99100;
        }

        .btn-hapus {
            background: #e63946;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-hapus:hover {
            background: #c92f3a;
        }

        .success {
            background: #d9f5e5;
            color: #237a4b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        form {
            display: inline;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .button-group {
                width: 100%;
            }

            .btn {
                text-align: center;
            }

        }

    </style>

</head>

<body>

<div class="container">

    {{-- HEADER --}}
    <div class="header">

        <div>

            <h1>👥 Data Tamu</h1>

            <p>Daftar seluruh tamu Buku Tamu PLN</p>

        </div>


        {{-- TOMBOL --}}
        <div class="button-group">

            {{-- Dashboard --}}
            <a
                href="{{ route('petugas.dashboard') }}"
                class="btn btn-dashboard"
            >
                ← Dashboard
            </a>


            {{-- Tambah Tamu --}}
            <a
                href="{{ route('petugas.input-tamu') }}"
                class="btn btn-tambah"
            >
                + Tambah Tamu
            </a>


            {{-- EXPORT EXCEL --}}
            <a
                href="{{ route('buku-tamu.export') }}"
                class="btn btn-excel"
            >
                📊 Export Excel
            </a>

        </div>

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="success">

            {{ session('success') }}

        </div>

    @endif


    {{-- TABEL --}}
    <div class="card">

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>No Antrian</th>
                    <th>Tanggal / Jam</th>
                    <th>Nama</th>
                    <th>Perihal</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                @forelse($dataTamu as $tamu)

                    <tr>

                        {{-- NO --}}
                        <td>
                            {{ $loop->iteration }}
                        </td>


                        {{-- NO ANTRIAN --}}
                        <td>
                            {{ str_pad($tamu->no_antrian, 3, '0', STR_PAD_LEFT) }}
                        </td>


                        {{-- TANGGAL --}}
                        <td>
                            {{ \Carbon\Carbon::parse($tamu->tanggal_jam)->format('d/m/Y H:i') }}
                        </td>


                        {{-- NAMA --}}
                        <td>
                            {{ $tamu->nama }}
                        </td>


                        {{-- PERIHAL --}}
                        <td>
                            {{ $tamu->perihal }}
                        </td>


                        {{-- KELUHAN --}}
                        <td>
                            {{ $tamu->keluhan ?? '-' }}
                        </td>


                        {{-- STATUS --}}
                        <td>

                            @if($tamu->ket == 'SELESAI')

                                <span class="status selesai">
                                    SELESAI
                                </span>

                            @else

                                <span class="status belum">
                                    BELUM
                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td>

                            {{-- EDIT --}}
                            <a
                                href="{{ route('petugas.tamu.edit', $tamu->id) }}"
                                class="btn-edit"
                            >
                                ✏️ Edit
                            </a>


                            {{-- HAPUS --}}
                            <form
                                action="{{ route('petugas.tamu.delete', $tamu->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data {{ $tamu->nama }}?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-hapus"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="empty"
                        >
                            📭 Belum ada data tamu.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>
