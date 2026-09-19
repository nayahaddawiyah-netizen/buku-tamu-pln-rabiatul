@extends('layouts.apppetugas')

@section('content')

<div class="tamu-container">
    {{-- HEADER --}}
    <div class="page-header">

        <div class="page-heading">
            <h1>📖 Buku Tamu</h1>
            <p>Daftar data tamu yang berkunjung</p>
        </div>

        <div class="header-actions">

            <a href="{{ route('petugas.tamu.export') }}" class="btn-excel">
                <i class="fa-solid fa-file-excel"></i>
                <span>Export Excel</span>
            </a>

            <a href="{{ route('petugas.tamu.create') }}" class="btn-tambah">
                ➕ <span>Tambah Tamu</span>
            </a>

        </div>

    </div>

    {{-- PESAN SUKSES --}}
    @if(session('success'))
    <div class="alert-success">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- PESAN ERROR --}}
    @if(session('error'))
    <div class="alert-error">
        <span>❌</span>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    {{-- PENCARIAN --}}
    <div class="search-card">

        <form action="{{ route('petugas.tamu.index') }}" method="GET">

            <div class="search-wrapper">

                <div class="search-input-wrapper">

                    <span class="search-icon">
                        🔍
                    </span>

                    <input
                        type="text"
                        name="keyword"
                        value="{{ $keyword ?? '' }}"
                        placeholder="Cari nama, instansi, nomor HP...">

                </div>

                <button type="submit" class="btn-search">
                    <span>🔍</span>
                    <span>Cari</span>
                </button>

                @if(!empty($keyword))

                <a
                    href="{{ route('petugas.tamu.index') }}"
                    class="btn-reset">
                    ↻ <span>Reset</span>
                </a>

                @endif

            </div>

        </form>

    </div>

    {{-- DATA TAMU --}}
    <div class="table-card">

        <div class="table-header">

            <div>
                <h2>Data Tamu</h2>

                <span>
                    Total {{ $tamu->total() }} data tamu
                </span>
            </div>

        </div>

        {{-- =====================================================
         DESKTOP TABLE
    ====================================================== --}}

        <div class="desktop-table">

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

                            <td class="nomor">
                                {{ $tamu->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong class="nama">
                                    {{ $item->nama }}
                                </strong>
                            </td>

                            <td>
                                {{ $item->instansi ?: '-' }}
                            </td>

                            <td class="no-hp">
                                {{ $item->no_hp ?: '-' }}
                            </td>

                            <td>
                                {{ $item->keperluan }}
                            </td>

                            <td>
                                {{ $item->bertemu_dengan ?: '-' }}
                            </td>

                            <td>

                                @if($item->waktu_datang)

                                <span class="tanggal">
                                    {{ $item->waktu_datang->format('d/m/Y') }}
                                </span>

                                <br>

                                <span class="jam">
                                    {{ $item->waktu_datang->format('H:i') }}
                                </span>

                                @else

                                <span>-</span>

                                @endif

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
                                        title="Lihat detail">
                                        👁️
                                    </a>

                                    <a
                                        href="{{ route('petugas.tamu.edit', $item->id) }}"
                                        class="btn-edit"
                                        title="Edit">
                                        ✏️
                                    </a>

                                    <form
                                        action="{{ route('petugas.tamu.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data tamu ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-hapus"
                                            title="Hapus">
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
                                    class="btn-tambah">
                                    ➕ Tambah Tamu
                                </a>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- =====================================================
         MOBILE CARD
    ====================================================== --}}

        <div class="mobile-list">

            @forelse($tamu as $item)

            <div class="guest-card">

                {{-- CARD HEADER --}}
                <div class="guest-card-header">

                    <div class="guest-number">

                        <span>
                            NO
                        </span>

                        <strong>
                            {{ $tamu->firstItem() + $loop->index }}
                        </strong>

                    </div>

                    <div class="guest-actions">

                        <a
                            href="{{ route('petugas.tamu.show', $item->id) }}"
                            class="btn-detail"
                            title="Lihat detail">
                            👁️
                        </a>

                        <a
                            href="{{ route('petugas.tamu.edit', $item->id) }}"
                            class="btn-edit"
                            title="Edit">
                            ✏️
                        </a>

                        <form
                            action="{{ route('petugas.tamu.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data tamu ini?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-hapus"
                                title="Hapus">
                                🗑️
                            </button>

                        </form>

                    </div>

                </div>

                <div class="guest-divider"></div>

                {{-- NAMA --}}
                <div class="guest-name">
                    {{ $item->nama }}
                </div>

                {{-- DETAIL --}}
                <div class="guest-info">

                    <div class="info-item">

                        <span>🏢 Instansi</span>

                        <strong>
                            {{ $item->instansi ?: '-' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>📱 No. HP</span>

                        <strong>
                            {{ $item->no_hp ?: '-' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>📌 Keperluan</span>

                        <strong>
                            {{ $item->keperluan ?: '-' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>👤 Bertemu Dengan</span>

                        <strong>
                            {{ $item->bertemu_dengan ?: '-' }}
                        </strong>

                    </div>

                    <div class="time-row">

                        <div class="time-box">

                            <span>
                                🟢 Waktu Datang
                            </span>

                            @if($item->waktu_datang)

                            <strong>
                                {{ $item->waktu_datang->format('d/m/Y') }}
                            </strong>

                            <small>
                                {{ $item->waktu_datang->format('H:i') }}
                            </small>

                            @else

                            <strong>-</strong>

                            @endif

                        </div>

                        <div class="time-box">

                            <span>
                                🔴 Waktu Pulang
                            </span>

                            @if($item->waktu_pulang)

                            <strong>
                                {{ $item->waktu_pulang->format('d/m/Y') }}
                            </strong>

                            <small>
                                {{ $item->waktu_pulang->format('H:i') }}
                            </small>

                            @else

                            <span class="belum-pulang">
                                Belum pulang
                            </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="mobile-empty">

                <div class="empty-icon">
                    📭
                </div>

                <h3>
                    Belum ada data tamu
                </h3>

                <p>
                    Silakan tambahkan data tamu baru.
                </p>

                <a
                    href="{{ route('petugas.tamu.create') }}"
                    class="btn-tambah">
                    ➕ Tambah Tamu
                </a>

            </div>

            @endforelse

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
    /* =========================================================
GLOBAL
========================================================= */

        {
        box-sizing: border-box;
    }

    .tamu-container {
        width: 100%;
        max-width: 1600px;

        padding: 30px;

        margin: 0 auto;

    }

    /* =========================================================
HEADER
========================================================= */

    .page-header {
        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;

    }

    .page-heading {
        min-width: 0;
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

    .header-actions {
        display: flex;

        align-items: center;

        gap: 10px;

        flex-shrink: 0;

    }

    /* =========================================================
BUTTON
========================================================= */

    .btn-tambah,
    .btn-excel {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 7px;

        min-height: 44px;

        padding: 11px 17px;

        border-radius: 10px;

        text-decoration: none;

        font-size: 14px;

        font-weight: 600;

        transition: all .2s ease;

    }

    .btn-tambah {
        background: #244f70;

        color: white;

    }

    .btn-tambah:hover {
        background: #1b3d57;

        transform: translateY(-1px);

    }

    .btn-excel {
        background: linear-gradient(135deg,
                #16a34a,
                #15803d);

        color: white;

        box-shadow:
            0 4px 10px rgba(22, 163, 74, .20);

    }

    .btn-excel:hover {
        background: linear-gradient(135deg,
                #15803d,
                #166534);

        transform: translateY(-1px);

    }

    .btn-excel i {
        font-size: 17px;
    }

    /* =========================================================
ALERT
========================================================= */

    .alert-success,
    .alert-error {
        display: flex;

        align-items: center;

        gap: 8px;

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

    /* =========================================================
SEARCH
========================================================= */

    .search-card {
        background: white;

        padding: 18px;

        border-radius: 14px;

        box-shadow:
            0 3px 15px rgba(0, 0, 0, .06);

        margin-bottom: 20px;

    }

    .search-wrapper {
        display: flex;

        align-items: center;

        gap: 10px;

    }

    .search-input-wrapper {
        position: relative;

        flex: 1;

        min-width: 0;

    }

    .search-icon {
        position: absolute;

        left: 14px;

        top: 50%;

        transform: translateY(-50%);

        pointer-events: none;

    }

    .search-wrapper input {
        width: 100%;

        height: 45px;

        padding: 0 15px 0 43px;

        border: 1px solid #dbe3ea;

        border-radius: 9px;

        outline: none;

        font-size: 14px;

        color: #334e68;

    }

    .search-wrapper input:focus {
        border-color: #2e6388;

        box-shadow:
            0 0 0 3px rgba(46, 99, 136, .10);

    }

    .btn-search,
    .btn-reset {
        height: 45px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 6px;

        border-radius: 9px;

        font-size: 14px;

        font-weight: 600;

        text-decoration: none;

        white-space: nowrap;

    }

    .btn-search {
        border: none;

        padding: 0 20px;

        background: #2e6388;

        color: white;

        cursor: pointer;

    }

    .btn-search:hover {
        background: #244f70;
    }

    .btn-reset {
        padding: 0 16px;

        background: #e5e7eb;

        color: #374151;

    }

    .btn-reset:hover {
        background: #d1d5db;
    }

    /* =========================================================
TABLE CARD
========================================================= */

    .table-card {
        background: white;

        border-radius: 15px;

        box-shadow:
            0 3px 15px rgba(0, 0, 0, .06);

        overflow: hidden;

    }

    .table-header {
        padding: 20px 22px;

        border-bottom:
            1px solid #edf0f3;

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

    /* =========================================================
DESKTOP TABLE
========================================================= */

    .desktop-table {
        display: block;
    }

    .table-responsive {
        width: 100%;

        overflow-x: auto;

        overflow-y: hidden;

        -webkit-overflow-scrolling: touch;

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

        border-bottom:
            1px solid #e8edf1;

    }

    td {
        padding: 15px 13px;

        color: #3f4e5c;

        font-size: 13px;

        border-bottom:
            1px solid #edf0f3;

        vertical-align: middle;

    }

    tbody tr {
        transition: background .15s ease;
    }

    tbody tr:hover {
        background: #f9fbfc;
    }

    td strong {
        color: #244f70;
    }

    .nomor {
        color: #8492a6;

        font-weight: 600;

        white-space: nowrap;

    }

    .nama {
        white-space: nowrap;
    }

    .no-hp {
        white-space: nowrap;
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

        white-space: nowrap;

    }

    /* =========================================================
AKSI
========================================================= */

    .aksi,
    .guest-actions {
        display: flex;

        align-items: center;

        gap: 6px;

    }

    .aksi form,
    .guest-actions form {
        margin: 0;
    }

    .aksi a,
    .aksi button,
    .guest-actions a,
    .guest-actions button {
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

        transition: all .2s ease;

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

    /* =========================================================
EMPTY DESKTOP
========================================================= */

    .empty {
        padding: 60px 20px !important;

        text-align: center;

    }

    .empty-icon {
        font-size: 50px;

        margin-bottom: 12px;

    }

    .empty h3,
    .mobile-empty h3 {
        margin: 0;

        color: #334e68;

        font-size: 18px;

    }

    .empty p,
    .mobile-empty p {
        color: #829ab1;

        margin: 7px 0 20px;

    }

    /* =========================================================
MOBILE LIST
========================================================= */

    .mobile-list {
        display: none;
    }

    .guest-card {
        background: #ffffff;

        border: 1px solid #e5eaf0;

        border-radius: 14px;

        padding: 15px;

        margin: 14px;

        box-shadow:
            0 3px 12px rgba(0, 0, 0, .04);

    }

    .guest-card-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

    }

    .guest-number {
        display: flex;

        align-items: baseline;

        gap: 5px;

    }

    .guest-number span {
        color: #94a3b8;

        font-size: 10px;

        font-weight: 700;

        letter-spacing: .5px;

    }

    .guest-number strong {
        color: #244f70;

        font-size: 23px;

        font-weight: 800;

    }

    .guest-divider {
        height: 1px;

        background: #edf0f3;

        margin: 13px 0;

    }

    .guest-name {
        color: #244f70;

        font-size: 17px;

        font-weight: 700;

        line-height: 1.35;

        margin-bottom: 14px;

        overflow-wrap: anywhere;

    }

    .guest-info {
        display: flex;

        flex-direction: column;

        gap: 11px;

    }

    .info-item {
        display: flex;

        flex-direction: column;

        gap: 3px;

        min-width: 0;

    }

    .info-item span {
        color: #8492a6;

        font-size: 11px;

        font-weight: 500;

    }

    .info-item strong {
        color: #475569;

        font-size: 13px;

        line-height: 1.4;

        overflow-wrap: anywhere;

    }

    /* =========================================================
TIME
========================================================= */

    .time-row {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 9px;

        margin-top: 3px;

    }

    .time-box {
        min-width: 0;

        padding: 11px;

        background: #f8fafc;

        border-radius: 9px;

        border: 1px solid #edf0f3;

    }

    .time-box>span {
        display: block;

        margin-bottom: 5px;

        color: #64748b;

        font-size: 10px;

        font-weight: 600;

    }

    .time-box strong {
        display: block;

        color: #244f70;

        font-size: 12px;

    }

    .time-box small {
        display: block;

        margin-top: 2px;

        color: #64748b;

        font-size: 11px;

    }

    .time-box .belum-pulang {
        margin-top: 4px;
    }

    /* =========================================================
MOBILE EMPTY
========================================================= */

    .mobile informasi waktu-empty {
        text-align: center;

        padding: 45px 20px;

    }

    .mobile-empty .btn-tambah {
        display: inline-flex;
    }

    /* =========================================================
PAGINATION
========================================================= */

    .pagination {
        padding: 20px;

        display: flex;

        justify-content: center;

        overflow-x: auto;

    }

    /* =========================================================
TABLET
========================================================= */

    @media (max-width: 900px) {

        .tamu-container {
            padding: 24px 18px;
        }

        .page-header {
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 25px;
        }

        .header-actions {
            flex-wrap: wrap;

            justify-content: flex-end;
        }

        .btn-tambah,
        .btn-excel {
            padding: 10px 14px;
        }

    }

    /* =========================================================
MOBILE
========================================================= */

    @media (max-width: 700px) {

        .tamu-container {
            padding: 16px 10px;
        }

        /* HEADER */

        .page-header {
            flex-direction: column;

            align-items: stretch;

            gap: 14px;

            margin-bottom: 18px;
        }

        .page-header h1 {
            font-size: 22px;
        }

        .page-header p {
            font-size: 12px;

            margin-top: 5px;
        }

        .header-actions {
            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 8px;
        }

        .header-actions .btn-tambah,
        .header-actions .btn-excel {
            width: 100%;

            min-height: 43px;

            padding: 9px 8px;

            font-size: 12px;
        }

        .btn-excel i {
            font-size: 15px;
        }

        /* ALERT */

        .alert-success,
        .alert-error {
            padding: 11px 13px;

            margin-bottom: 14px;

            font-size: 12px;
        }

        /* SEARCH */

        .search-card {
            padding: 12px;

            border-radius: 12px;

            margin-bottom: 14px;
        }

        .search-wrapper {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr) auto;

            gap: 8px;
        }

        .search-input-wrapper {
            grid-column: 1 / -1;
        }

        .search-wrapper input {
            height: 43px;

            font-size: 13px;

            padding-left: 40px;
        }

        .btn-search,
        .btn-reset {
            height: 41px;

            padding: 0 13px;

            font-size: 12px;
        }

        /* TABLE CARD */

        .table-card {
            border-radius: 13px;
        }

        .table-header {
            padding: 15px;
        }

        .table-header h2 {
            font-size: 17px;
        }

        .table-header span {
            font-size: 11px;

            margin-top: 4px;
        }

        /* HIDE DESKTOP TABLE */

        .desktop-table {
            display: none;
        }

        /* SHOW MOBILE CARD */

        .mobile-list {
            display: block;
        }

        /* PAGINATION */

        .pagination {
            padding: 15px 10px;
        }

    }

    /* =========================================================
HP KECIL
========================================================= */

    @media (max-width: 400px) {

        .tamu-container {
            padding: 12px 8px;
        }

        .page-header h1 {
            font-size: 20px;
        }

        .header-actions {
            grid-template-columns: 1fr;
        }

        .header-actions .btn-tambah,
        .header-actions .btn-excel {
            font-size: 13px;
        }

        .search-wrapper {
            grid-template-columns:
                1fr 1fr;
        }

        .search-input-wrapper {
            grid-column: 1 / -1;
        }

        .btn-search,
        .btn-reset {
            width: 100%;
        }

        .guest-card {
            margin: 10px;

            padding: 13px;

            border-radius: 12px;
        }

        .guest-number strong {
            font-size: 21px;
        }

        .guest-name {
            font-size: 16px;
        }

        .info-item strong {
            font-size: 12px;
        }

        .time-row {
            grid-template-columns: 1fr;
        }

        .guest-actions a,
        .guest-actions button {
            width: 31px;

            height: 31px;

            font-size: 13px;
        }

    }
</style>
@endsection