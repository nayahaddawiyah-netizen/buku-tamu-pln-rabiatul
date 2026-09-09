@extends('layouts.apppetugas')

@section('content')

<div class="laporan-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1>📊 Laporan Buku Tamu</h1>

            <p>
                Laporan kunjungan tamu PLN
            </p>
        </div>

        <button
            type="button"
            onclick="window.print()"
            class="btn-cetak"
        >
            🖨️ Cetak
        </button>

    </div>


    {{-- FILTER --}}
    <div class="filter-card">

        <form
            action="{{ route('petugas.laporan.index') }}"
            method="GET"
        >

            <div class="filter-grid">

                <div class="form-group">

                    <label>
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        name="tanggal_mulai"
                        value="{{ request('tanggal_mulai') }}"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Tanggal Selesai
                    </label>

                    <input
                        type="date"
                        name="tanggal_selesai"
                        value="{{ request('tanggal_selesai') }}"
                    >

                </div>


                <div class="filter-buttons">

                    <button
                        type="submit"
                        class="btn-filter"
                    >
                        🔍 Filter
                    </button>

                    <a
                        href="{{ route('petugas.laporan.index') }}"
                        class="btn-reset"
                    >
                        ↻ Reset
                    </a>

                </div>

            </div>

        </form>

    </div>


    {{-- RINGKASAN --}}

    <div class="summary-card">

        <div class="summary-icon">
            👥
        </div>

        <div>

            <span>
                Data Ditampilkan
            </span>

            <strong>
                {{ $laporan->total() }} Tamu
            </strong>

        </div>

    </div>


    {{-- TABEL --}}

    <div class="table-card">

        <div class="table-header">

            <div>
                <h2>
                    Data Kunjungan
                </h2>

                <p>
                    Daftar tamu berdasarkan periode yang dipilih
                </p>
            </div>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Tamu</th>

                        <th>Instansi</th>

                        <th>No. HP</th>

                        <th>Keperluan</th>

                        <th>Tanggal</th>

                        <th>Jam Masuk</th>

                        <th>Jam Keluar</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($laporan as $tamu)

                        <tr>

                            <td>
                                {{ $laporan->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong>
                                    {{ $tamu->nama }}
                                </strong>
                            </td>

                            <td>
                                {{ $tamu->instansi ?? '-' }}
                            </td>

                            <td>
                                {{ $tamu->no_hp ?? '-' }}
                            </td>

                            <td>
                                {{ $tamu->keperluan }}
                            </td>

                            <td>
                                {{ $tamu->tanggal_kunjungan?->format('d/m/Y') ?? '-' }}
                            </td>

                            <td>
                                {{ $tamu->jam_masuk ?? '-' }}
                            </td>

                            <td>
                                {{ $tamu->jam_keluar ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="empty"
                            >

                                <div class="empty-icon">
                                    📭
                                </div>

                                <strong>
                                    Tidak ada data
                                </strong>

                                <p>
                                    Tidak ditemukan data tamu pada periode tersebut.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}

        @if($laporan->hasPages())

            <div class="pagination">

                {{ $laporan->links() }}

            </div>

        @endif

    </div>

</div>


<style>

/* =========================================
   PAGE
========================================= */

.laporan-page {
    padding: 30px;
}


/* =========================================
   HEADER
========================================= */

.page-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 25px;

}

.page-header h1 {

    margin: 0;

    color: #244f70;

    font-size: 28px;

}

.page-header p {

    margin-top: 6px;

    color: #777;

}


/* =========================================
   BUTTON CETAK
========================================= */

.btn-cetak {

    border: none;

    background: #244f70;

    color: white;

    padding: 12px 20px;

    border-radius: 10px;

    font-weight: bold;

    cursor: pointer;

}

.btn-cetak:hover {

    background: #1c405b;

}


/* =========================================
   FILTER
========================================= */

.filter-card {

    background: white;

    padding: 22px;

    border-radius: 15px;

    box-shadow:
        0 4px 20px rgba(0,0,0,.07);

    margin-bottom: 20px;

}

.filter-grid {

    display: grid;

    grid-template-columns:
        1fr 1fr auto;

    gap: 15px;

    align-items: end;

}

.form-group {

    display: flex;

    flex-direction: column;

}

.form-group label {

    margin-bottom: 7px;

    font-size: 14px;

    font-weight: bold;

    color: #444;

}

.form-group input {

    padding: 11px 13px;

    border: 1px solid #d5dce2;

    border-radius: 9px;

    outline: none;

}

.form-group input:focus {

    border-color: #244f70;

}


/* =========================================
   FILTER BUTTON
========================================= */

.filter-buttons {

    display: flex;

    gap: 8px;

}

.btn-filter,
.btn-reset {

    padding: 11px 16px;

    border-radius: 9px;

    border: none;

    font-weight: bold;

    text-decoration: none;

    cursor: pointer;

}

.btn-filter {

    background: #244f70;

    color: white;

}

.btn-reset {

    background: #e9edf0;

    color: #444;

}


/* =========================================
   SUMMARY
========================================= */

.summary-card {

    display: flex;

    align-items: center;

    gap: 15px;

    background: white;

    padding: 18px 22px;

    border-radius: 15px;

    margin-bottom: 20px;

    box-shadow:
        0 4px 20px rgba(0,0,0,.07);

    width: fit-content;

}

.summary-icon {

    width: 48px;

    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #eaf3f9;

    border-radius: 12px;

    font-size: 24px;

}

.summary-card span {

    display: block;

    color: #777;

    font-size: 13px;

}

.summary-card strong {

    display: block;

    margin-top: 3px;

    color: #244f70;

    font-size: 20px;

}


/* =========================================
   TABLE
========================================= */

.table-card {

    background: white;

    border-radius: 15px;

    overflow: hidden;

    box-shadow:
        0 4px 20px rgba(0,0,0,.07);

}

.table-header {

    padding: 20px 22px;

    border-bottom: 1px solid #eee;

}

.table-header h2 {

    margin: 0;

    color: #244f70;

    font-size: 19px;

}

.table-header p {

    margin-top: 5px;

    color: #777;

    font-size: 13px;

}

.table-wrapper {

    width: 100%;

    overflow-x: auto;

}

table {

    width: 100%;

    border-collapse: collapse;

}

thead {

    background: #244f70;

    color: white;

}

th,
td {

    padding: 14px 15px;

    text-align: left;

    border-bottom: 1px solid #eee;

    white-space: nowrap;

}

tbody tr:hover {

    background: #f7fafc;

}


/* =========================================
   EMPTY
========================================= */

.empty {

    text-align: center;

    padding: 50px !important;

    color: #777;

}

.empty-icon {

    font-size: 40px;

    margin-bottom: 10px;

}


/* =========================================
   PAGINATION
========================================= */

.pagination {

    padding: 20px;

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 700px) {

    .laporan-page {

        padding: 20px 10px;

    }

    .page-header {

        align-items: flex-start;

        gap: 15px;

    }

    .page-header h1 {

        font-size: 22px;

    }

    .filter-grid {

        grid-template-columns: 1fr;

    }

    .filter-buttons {

        width: 100%;

    }

    .btn-filter,
    .btn-reset {

        flex: 1;

        text-align: center;

    }

}


/* =========================================
   PRINT
========================================= */

@media print {

    .sidebar,
    .btn-cetak,
    .filter-card,
    .pagination {

        display: none !important;

    }

    .laporan-page {

        padding: 0;

    }

    .table-card {

        box-shadow: none;

    }

    .table-header {

        text-align: center;

    }

    body {

        background: white !important;

    }

}

</style>

@endsection