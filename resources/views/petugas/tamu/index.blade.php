@extends('layouts.apppetugas')

@section('content')

<div class="tamu-container">

    {{-- HEADER --}}
<div class="page-header">

    <div>
        <h1>📖 Buku Tamu</h1>
        <p>Daftar data tamu yang berkunjung</p>
    </div>

<div class="header-actions">
    <a href="{{ route('petugas.tamu.export') }}" class="btn-excel">
        <i class="fa-solid fa-file-excel"></i>
        <span>Export Excel</span>
    </a>

        <a href="{{ route('petugas.tamu.create') }}" class="btn-tambah">
            ➕ Tambah Tamu
        </a>
    </div>

</div>



    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif


    {{-- PESAN ERROR --}}
    @if(session('error'))
        <div class="alert-error">
            ❌ {{ session('error') }}
        </div>
    @endif


    {{-- PENCARIAN --}}
    <div class="search-card">

        <form action="{{ route('petugas.tamu.index') }}" method="GET">

            <div class="search-wrapper">

                <input
                    type="text"
                    name="keyword"
                    value="{{ $keyword ?? '' }}"
                    placeholder="Cari nama, instansi, nomor HP..."
                >

                <button type="submit">
                    🔍 Cari
                </button>

                @if(!empty($keyword))
                    <a href="{{ route('petugas.tamu.index') }}" class="btn-reset">
                        Reset
                    </a>
                @endif

            </div>

        </form>

    </div>


    {{-- TABEL --}}
    <div class="table-card">

        <div class="table-header">

            <div>
                <h2>Data Tamu</h2>
                <span>
                    Total {{ $tamu->total() }} data tamu
                </span>
            </div>

        </div>


        <div class="table-responsive">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>No. HP</th>
                        <th>Keperluan</th>
                        <th>Bertemu Dengan</th>
                        <th>Waktu Datang</th>
                        <th>Waktu Pulang</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($tamu as $item)

                        <tr>

                            <td>
                                {{ $tamu->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong>
                                    {{ $item->nama }}
                                </strong>
                            </td>

                            <td>
                                {{ $item->instansi ?: '-' }}
                            </td>

                            <td>
                                {{ $item->no_hp ?: '-' }}
                            </td>

                            <td>
                                {{ $item->keperluan }}
                            </td>

                            <td>
                                {{ $item->bertemu_dengan ?: '-' }}
                            </td>

                            <td>
                                <span class="tanggal">
                                    {{ $item->waktu_datang ? $item->waktu_datang->format('d/m/Y') : '-' }}
                                </span>

                                <br>

                                <span class="jam">
                                    {{ $item->waktu_datang ? $item->waktu_datang->format('H:i') : '-' }}
                                </span>
                            </td>

                            <td>

                                @if($item->waktu_pulang)

                                    <span class="tanggal">
                                        {{ $item->waktu_pulang->format('d/m/Y') }}
                                    </span>

                                    <br>

                                    <span class="jam">
                                        {{ $item->waktu_pulang->format('H:i') }}
                                    </span>

                                @else

                                    <span class="belum-pulang">
                                        Belum pulang
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="aksi">

                                    <a
                                        href="{{ route('petugas.tamu.show', $item->id) }}"
                                        class="btn-detail"
                                        title="Lihat detail"
                                    >
                                        👁️
                                    </a>

                                    <a
                                        href="{{ route('petugas.tamu.edit', $item->id) }}"
                                        class="btn-edit"
                                        title="Edit"
                                    >
                                        ✏️
                                    </a>

                                    <form
                                        action="{{ route('petugas.tamu.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data tamu ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                            title="Hapus"
                                        >
                                            🗑️
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="empty">

                                <div class="empty-icon">
                                    📭
                                </div>

                                <h3>Belum ada data tamu</h3>

                                <p>
                                    Silakan tambahkan data tamu baru.
                                </p>

                                <a
                                    href="{{ route('petugas.tamu.create') }}"
                                    class="btn-tambah"
                                >
                                    ➕ Tambah Tamu
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($tamu->hasPages())

            <div class="pagination">

                {{ $tamu->links() }}

            </div>

        @endif

    </div>

</div>


<style>

    * {
        box-sizing: border-box;
    }


    .tamu-container {
        padding: 30px;
        max-width: 1600px;
        margin: 0 auto;
    }


    /* HEADER */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .page-header h1 {
        margin: 0;
        color: #244f70;
        font-size: 28px;
        font-weight: 700;
    }


    .page-header p {
        margin: 7px 0 0;
        color: #718096;
        font-size: 14px;
    }


    .btn-tambah {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        padding: 12px 18px;

        background: #244f70;
        color: white;

        border-radius: 10px;

        text-decoration: none;
        font-size: 14px;
        font-weight: 600;

        transition: .2s;
    }


    .btn-tambah:hover {
        background: #1b3d57;
        transform: translateY(-1px);
    }


    /* ALERT */

    .alert-success,
    .alert-error {
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }


    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }


    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }


    /* SEARCH */

    .search-card {
        background: white;
        padding: 18px;
        border-radius: 14px;
        box-shadow: 0 3px 15px rgba(0,0,0,.06);
        margin-bottom: 20px;
    }


    .search-wrapper {
        display: flex;
        gap: 10px;
    }


    .search-wrapper input {
        flex: 1;

        height: 45px;

        padding: 0 15px;

        border: 1px solid #dbe3ea;
        border-radius: 9px;

        outline: none;

        font-size: 14px;
    }


    .search-wrapper input:focus {
        border-color: #2e6388;
        box-shadow: 0 0 0 3px rgba(46,99,136,.10);
    }


    .search-wrapper button {
        border: none;

        background: #2e6388;
        color: white;

        padding: 0 20px;

        border-radius: 9px;

        cursor: pointer;

        font-weight: 600;
    }


    .search-wrapper button:hover {
        background: #244f70;
    }


    .btn-reset {
        display: flex;
        align-items: center;

        padding: 0 17px;

        background: #e5e7eb;
        color: #374151;

        text-decoration: none;

        border-radius: 9px;

        font-size: 14px;
    }


    /* TABLE CARD */

    .table-card {
        background: white;

        border-radius: 15px;

        box-shadow:
            0 3px 15px rgba(0,0,0,.06);

        overflow: hidden;
    }


    .table-header {
        padding: 20px 22px;

        border-bottom: 1px solid #edf0f3;
    }


    .table-header h2 {
        margin: 0;

        color: #243b53;

        font-size: 18px;
    }


    .table-header span {
        display: block;

        margin-top: 5px;

        color: #8492a6;

        font-size: 13px;
    }


    /* TABLE */

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }


    table {
        width: 100%;
        min-width: 1100px;

        border-collapse: collapse;
    }


    thead {
        background: #f5f8fa;
    }


    th {
        padding: 14px 13px;

        text-align: left;

        color: #52606d;

        font-size: 12px;

        text-transform: uppercase;

        white-space: nowrap;

        border-bottom: 1px solid #e8edf1;
    }


    td {
        padding: 15px 13px;

        color: #3f4e5c;

        font-size: 13px;

        border-bottom: 1px solid #edf0f3;

        vertical-align: middle;
    }


    tbody tr:hover {
        background: #f9fbfc;
    }


    td strong {
        color: #244f70;
    }


    .tanggal {
        color: #475569;
        font-size: 12px;
    }


    .jam {
        color: #244f70;
        font-weight: 600;
        font-size: 12px;
    }


    .belum-pulang {
        display: inline-block;

        padding: 5px 9px;

        background: #fff7ed;

        color: #c2410c;

        border-radius: 7px;

        font-size: 11px;

        font-weight: 600;
    }


    /* AKSI */

    .aksi {
        display: flex;
        align-items: center;
        gap: 6px;
    }


    .aksi a,
    .aksi button {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: none;

        border-radius: 8px;

        text-decoration: none;

        cursor: pointer;

        font-size: 15px;

        transition: .2s;
    }


    .aksi form {
        margin: 0;
    }


    .btn-detail {
        background: #e0f2fe;
    }


    .btn-detail:hover {
        background: #bae6fd;
    }


    .btn-edit {
        background: #fef3c7;
    }


    .btn-edit:hover {
        background: #fde68a;
    }


    .btn-hapus {
        background: #fee2e2;
    }


    .btn-hapus:hover {
        background: #fecaca;
    }


    /* EMPTY */

    .empty {
        padding: 60px 20px !important;

        text-align: center;
    }


    .empty-icon {
        font-size: 50px;

        margin-bottom: 12px;
    }


    .empty h3 {
        margin: 0;

        color: #334e68;

        font-size: 18px;
    }


    .empty p {
        color: #829ab1;

        margin: 7px 0 20px;
    }


    /* PAGINATION */

    .pagination {
        padding: 20px;

        display: flex;

        justify-content: center;
    }


    .pagination nav {
        display: flex;
        justify-content: center;
    }


    /* MOBILE */

    @media (max-width: 700px) {

        .tamu-container {
            padding: 20px 12px;
        }


        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }


        .page-header h1 {
            font-size: 23px;
        }


        .btn-tambah {
            width: 100%;
        }


        .search-wrapper {
            flex-wrap: wrap;
        }


        .search-wrapper input {
            width: 100%;
            flex: none;
        }


        .search-wrapper button,
        .btn-reset {
            height: 43px;
        }

    }
.btn-excel {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 11px 18px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 4px 10px rgba(22, 163, 74, 0.25);
    transition: all 0.25s ease;
}

.btn-excel i {
    font-size: 18px;
}

.btn-excel:hover {
    background: linear-gradient(135deg, #15803d, #166534);
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(22, 163, 74, 0.35);
}

.btn-excel:active {
    transform: translateY(0);
}

</style>

@endsection
