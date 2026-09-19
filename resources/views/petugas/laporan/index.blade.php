@extends('layouts.apppetugas')

@section('content')

<div class="laporan-page">
{{-- HEADER --}}
<div class="page-header">

    <div class="header-content">
        <h1>📊 Laporan Buku Tamu</h1>
        <p>Laporan kunjungan tamu PLN</p>
    </div>

    <button
        type="button"
        onclick="window.print()"
        class="btn-cetak"
    >
        🖨️ <span>Cetak</span>
    </button>

</div>

{{-- FILTER --}}
<div class="filter-card">

    <div class="filter-title">
        <div class="filter-title-icon">🔎</div>
        <div>
            <h2>Filter Laporan</h2>
            <p>Pilih periode tanggal kunjungan</p>
        </div>
    </div>

    <form
        action="{{ route('petugas.laporan.index') }}"
        method="GET"
    >

        <div class="filter-grid">

            <div class="form-group">

                <label for="tanggal_mulai">
                    Tanggal Mulai
                </label>

                <input
                    id="tanggal_mulai"
                    type="date"
                    name="tanggal_mulai"
                    value="{{ request('tanggal_mulai') }}"
                >

            </div>

            <div class="form-group">

                <label for="tanggal_selesai">
                    Tanggal Selesai
                </label>

                <input
                    id="tanggal_selesai"
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
                    🔍 <span>Filter</span>
                </button>

                <a
                    href="{{ route('petugas.laporan.index') }}"
                    class="btn-reset"
                >
                    ↻ <span>Reset</span>
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

    <div class="summary-content">

        <span>Data Ditampilkan</span>

        <strong>
            {{ number_format($laporan->total(), 0, ',', '.') }}
            <small>Tamu</small>
        </strong>

    </div>

</div>

{{-- TABEL --}}
<div class="table-card">

    <div class="table-header">

        <div>
            <h2>Data Kunjungan</h2>

            <p>
                Daftar tamu berdasarkan periode yang dipilih
            </p>
        </div>

        @if(request('tanggal_mulai') || request('tanggal_selesai'))
            <div class="filter-status">
                📅 Periode aktif
            </div>
        @endif

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

                        <td class="col-no">
                            {{ $laporan->firstItem() + $loop->index }}
                        </td>

                        <td class="col-nama">
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

                        <td class="col-keperluan">
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

            {{ $laporan->withQueryString()->links() }}

        </div>

    @endif

</div>

</div> <style>
/* =========================================================
RESET & BASE
========================================================= */

.laporan-page {
width: 100%;
max-width: 1600px;
margin: 0 auto;
padding: 30px;
box-sizing: border-box;
color: #263238;
}

.laporan-page *,
.laporan-page *::before,
.laporan-page *::after {
box-sizing: border-box;
}

/* =========================================================
HEADER
========================================================= */

.page-header {
display: flex;
align-items: center;
justify-content: space-between;
gap: 20px;
margin-bottom: 24px;
}

.header-content {
min-width: 0;
}

.page-header h1 {
margin: 0;
color: #244f70;
font-size: 28px;
font-weight: 700;
line-height: 1.25;
}

.page-header p {
margin: 7px 0 0;
color: #7a858d;
font-size: 14px;
}

/* =========================================================
BUTTON CETAK
========================================================= */

.btn-cetak {
display: inline-flex;
align-items: center;
justify-content: center;
gap: 7px;
flex-shrink: 0;
min-height: 44px;
padding: 11px 18px;
border: 0;
border-radius: 10px;
background: #244f70;
color: #fff;
font-size: 14px;
font-weight: 700;
cursor: pointer;
transition:
background .2s ease,
transform .2s ease,
box-shadow .2s ease;
}

.btn-cetak:hover {
background: #1c405b;
box-shadow: 0 5px 14px rgba(36, 79, 112, .18);
transform: translateY(-1px);
}

.btn-cetak:active {
transform: translateY(0);
}

/* =========================================================
CARD
========================================================= */

.filter-card,
.summary-card,
.table-card {
background: #fff;
border: 1px solid rgba(36, 79, 112, .06);
box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
}

/* =========================================================
FILTER
========================================================= */

.filter-card {
padding: 22px;
margin-bottom: 18px;
border-radius: 15px;
}

.filter-title {
display: flex;
align-items: center;
gap: 12px;
margin-bottom: 18px;
}

.filter-title-icon {
width: 42px;
height: 42px;
display: flex;
align-items: center;
justify-content: center;
flex-shrink: 0;
border-radius: 11px;
background: #eaf3f9;
font-size: 19px;
}

.filter-title h2 {
margin: 0;
color: #244f70;
font-size: 17px;
line-height: 1.3;
}

.filter-title p {
margin: 3px 0 0;
color: #89939a;
font-size: 12px;
}

.filter-grid {
display: grid;
grid-template-columns: minmax(0, 1fr) minmax(0, 1fr) auto;
gap: 14px;
align-items: end;
}

.form-group {
display: flex;
flex-direction: column;
min-width: 0;
}

.form-group label {
margin-bottom: 7px;
color: #3e4b53;
font-size: 13px;
font-weight: 700;
}

.form-group input {
width: 100%;
height: 44px;
padding: 0 12px;
border: 1px solid #d8e0e5;
border-radius: 9px;
outline: none;
background: #fff;
color: #37474f;
font-family: inherit;
font-size: 14px;
transition:
border-color .2s ease,
box-shadow .2s ease;
}

.form-group input:hover {
border-color: #b9c8d1;
}

.form-group input:focus {
border-color: #244f70;
box-shadow: 0 0 0 3px rgba(36, 79, 112, .09);
}

/* =========================================================
FILTER BUTTON
========================================================= */

.filter-buttons {
display: flex;
gap: 8px;
}

.btn-filter,
.btn-reset {
min-height: 44px;
padding: 10px 16px;
border-radius: 9px;
border: 0;
font-family: inherit;
font-size: 13px;
font-weight: 700;
text-decoration: none;
cursor: pointer;
display: inline-flex;
align-items: center;
justify-content: center;
gap: 6px;
white-space: nowrap;
transition: .2s ease;
}

.btn-filter {
background: #244f70;
color: #fff;
}

.btn-filter:hover {
background: #1c405b;
}

.btn-reset {
background: #edf1f3;
color: #45545d;
}

.btn-reset:hover {
background: #dfe6ea;
}

/* =========================================================
SUMMARY
========================================================= */

.summary-card {
width: fit-content;
max-width: 100%;
min-width: 220px;
display: flex;
align-items: center;
gap: 14px;
padding: 15px 19px;
margin-bottom: 18px;
border-radius: 14px;
}

.summary-icon {
width: 46px;
height: 46px;
display: flex;
align-items: center;
justify-content: center;
flex-shrink: 0;
background: #eaf3f9;
border-radius: 11px;
font-size: 22px;
}

.summary-content span {
display: block;
color: #7b878e;
font-size: 12px;
}

.summary-content strong {
display: flex;
align-items: baseline;
gap: 5px;
margin-top: 3px;
color: #244f70;
font-size: 20px;
line-height: 1.2;
}

.summary-content strong small {
font-size: 12px;
font-weight: 600;
color: #71808a;
}

/* =========================================================
TABLE CARD
========================================================= */

.table-card {
border-radius: 15px;
overflow: hidden;
}

.table-header {
display: flex;
align-items: center;
justify-content: space-between;
gap: 15px;
padding: 19px 22px;
border-bottom: 1px solid #edf0f2;
}

.table-header h2 {
margin: 0;
color: #244f70;
font-size: 18px;
font-weight: 700;
}

.table-header p {
margin: 5px 0 0;
color: #89939a;
font-size: 12px;
}

.filter-status {
flex-shrink: 0;
padding: 7px 10px;
border-radius: 8px;
background: #eef6fb;
color: #244f70;
font-size: 11px;
font-weight: 700;
}

/* =========================================================
TABLE
========================================================= */

.table-wrapper {
width: 100%;
overflow-x: auto;
-webkit-overflow-scrolling: touch;
}

.table-wrapper::-webkit-scrollbar {
height: 7px;
}

.table-wrapper::-webkit-scrollbar-track {
background: #f1f3f5;
}

.table-wrapper::-webkit-scrollbar-thumb {
background: #b9c5cc;
border-radius: 10px;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
background: #9eabb3;
}

table {
width: 100%;
min-width: 900px;
border-collapse: collapse;
font-size: 13px;
}

thead {
background: #244f70;
color: #fff;
}

th,
td {
padding: 13px 15px;
text-align: left;
border-bottom: 1px solid #edf0f2;
vertical-align: middle;
white-space: nowrap;
}

th {
font-size: 12px;
font-weight: 700;
letter-spacing: .1px;
}

td {
color: #4c5960;
}

tbody tr {
transition: background .15s ease;
}

tbody tr:hover {
background: #f7fafc;
}

tbody tr:last-child td {
border-bottom: 0;
}

td strong {
color: #30424d;
font-weight: 700;
}

.col-no {
width: 55px;
text-align: center;
}

.col-nama {
min-width: 150px;
}

.col-keperluan {
min-width: 180px;
max-width: 260px;
}

/* =========================================================
EMPTY STATE
========================================================= */

.empty {
text-align: center !important;
padding: 55px 20px !important;
color: #7c888f !important;
white-space: normal !important;
}

.empty-icon {
margin-bottom: 10px;
font-size: 40px;
}

.empty strong {
display: block;
color: #45545d;
font-size: 15px;
}

.empty p {
margin: 6px 0 0;
color: #8a969d;
font-size: 12px;
}

/* =========================================================
PAGINATION
========================================================= */

.pagination {
padding: 18px 20px;
border-top: 1px solid #edf0f2;
overflow-x: auto;
}

/* =========================================================
TABLET
========================================================= */

@media (max-width: 900px) {

.laporan-page {
    padding: 24px 20px;
}

.filter-grid {
    grid-template-columns: 1fr 1fr;
}

.filter-buttons {
    grid-column: 1 / -1;
}

.btn-filter,
.btn-reset {
    flex: 1;
}

}

/* =========================================================
MOBILE
========================================================= */

@media (max-width: 600px) {

.laporan-page {
    padding: 16px 10px 25px;
}

/* HEADER */

.page-header {
    align-items: stretch;
    flex-direction: column;
    gap: 13px;
    margin-bottom: 17px;
}

.page-header h1 {
    font-size: 21px;
}

.page-header p {
    margin-top: 5px;
    font-size: 12px;
}

.btn-cetak {
    width: 100%;
    min-height: 43px;
}

/* FILTER */

.filter-card {
    padding: 16px;
    margin-bottom: 14px;
    border-radius: 13px;
}

.filter-title {
    margin-bottom: 15px;
}

.filter-title-icon {
    width: 38px;
    height: 38px;
    font-size: 17px;
}

.filter-title h2 {
    font-size: 15px;
}

.filter-title p {
    font-size: 11px;
}

.filter-grid {
    grid-template-columns: 1fr;
    gap: 12px;
}

.form-group input {
    height: 43px;
}

.filter-buttons {
    width: 100%;
    grid-column: auto;
    margin-top: 2px;
}

.btn-filter,
.btn-reset {
    flex: 1;
    min-height: 43px;
}

/* SUMMARY */

.summary-card {
    width: 100%;
    min-width: 0;
    padding: 14px 16px;
    margin-bottom: 14px;
    border-radius: 13px;
}

.summary-icon {
    width: 43px;
    height: 43px;
    font-size: 20px;
}

.summary-content strong {
    font-size: 19px;
}

/* TABLE HEADER */

.table-card {
    border-radius: 13px;
}

.table-header {
    align-items: flex-start;
    flex-direction: column;
    padding: 16px;
    gap: 9px;
}

.table-header h2 {
    font-size: 16px;
}

.table-header p {
    font-size: 11px;
}

.filter-status {
    font-size: 10px;
}

/* TABLE */

table {
    min-width: 850px;
    font-size: 12px;
}

th,
td {
    padding: 12px 13px;
}

.empty {
    padding: 45px 15px !important;
}

.empty-icon {
    font-size: 34px;
}

/* PAGINATION */

.pagination {
    padding: 15px;
}

}

/* =========================================================
VERY SMALL MOBILE
========================================================= */

@media (max-width: 380px) {

.laporan-page {
    padding-left: 8px;
    padding-right: 8px;
}

.page-header h1 {
    font-size: 19px;
}

.filter-card {
    padding: 14px;
}

.filter-buttons {
    gap: 6px;
}

.btn-filter,
.btn-reset {
    padding-left: 10px;
    padding-right: 10px;
    font-size: 12px;
}

}

/* =========================================================
PRINT
========================================================= */

@media print {

@page {
    size: landscape;
    margin: 10mm;
}

body {
    background: #fff !important;
}

.sidebar,
.btn-cetak,
.filter-card,
.pagination,
.filter-status {
    display: none !important;
}

.laporan-page {
    width: 100%;
    max-width: none;
    padding: 0;
}

.page-header {
    margin-bottom: 15px;
}

.page-header h1 {
    font-size: 22px;
}

.page-header p {
    font-size: 11px;
}

.summary-card {
    margin-bottom: 15px;
    box-shadow: none;
    border: 1px solid #ddd;
}

.table-card {
    box-shadow: none;
    border: 1px solid #ddd;
    overflow: visible;
}

.table-header {
    text-align: center;
    justify-content: center;
}

.table-wrapper {
    overflow: visible;
}

table {
    width: 100%;
    min-width: 0;
    font-size: 10px;
}

th,
td {
    padding: 7px 6px;
    white-space: normal;
}

thead {
    background: #244f70 !important;
    color: #fff !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}

tbody tr:hover {
    background: transparent;
}

}
</style>

@endsection