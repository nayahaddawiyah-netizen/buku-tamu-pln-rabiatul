@extends('layouts.apppetugas')

@section('content')

<style>
    .detail-container {
        padding: 30px;
    }

    .detail-card {
        max-width: 850px;
        margin: auto;
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,.08);
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .detail-header h1 {
        margin: 0;
        color: #244f70;
    }

    .foto-detail {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
        display: block;
        margin: 0 auto 25px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 12px;
    }

    .detail-grid div {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    .label {
        font-weight: bold;
        color: #555;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
    }

    .btn-kembali {
        background: #eee;
        color: #333;
    }

    .btn-edit {
        background: #f39c12;
        color: white;
    }

    .aksi {
        margin-top: 25px;
        display: flex;
        gap: 10px;
    }

    @media(max-width:650px) {
        .detail-container {
            padding: 15px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="detail-container">

    <div class="detail-card">

        <div class="detail-header">
            <h1>👤 Detail Tamu</h1>
        </div>


        @if($tamu->foto)

            <img
                src="{{ asset($tamu->foto) }}"
                class="foto-detail"
                alt="Foto {{ $tamu->nama }}"
            >

        @endif


        <div class="detail-grid">

            <div class="label">Nama</div>
            <div>{{ $tamu->nama }}</div>

            <div class="label">Instansi</div>
            <div>{{ $tamu->instansi ?: '-' }}</div>

            <div class="label">No. HP</div>
            <div>{{ $tamu->no_hp ?: '-' }}</div>

            <div class="label">Alamat</div>
            <div>{{ $tamu->alamat ?: '-' }}</div>

            <div class="label">Keperluan</div>
            <div>{{ $tamu->keperluan }}</div>

            <div class="label">Bertemu Dengan</div>
            <div>{{ $tamu->bertemu_dengan ?: '-' }}</div>

            <div class="label">Waktu Datang</div>
            <div>
                {{ $tamu->waktu_datang?->format('d-m-Y H:i') }}
            </div>

            <div class="label">Waktu Pulang</div>
            <div>
                {{ $tamu->waktu_pulang?->format('d-m-Y H:i') ?: '-' }}
            </div>

            <div class="label">Keterangan</div>
            <div>{{ $tamu->keterangan ?: '-' }}</div>

        </div>


        <div class="aksi">

            <a
                href="{{ route('petugas.tamu.index') }}"
                class="btn btn-kembali"
            >
                ← Kembali
            </a>

            <a
                href="{{ route('petugas.tamu.edit', $tamu) }}"
                class="btn btn-edit"
            >
                ✏️ Edit
            </a>

        </div>

    </div>

</div>

@endsection