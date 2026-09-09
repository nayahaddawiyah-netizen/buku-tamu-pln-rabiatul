@extends('layouts.apppetugas')

@section('content')

<style>
    .form-container {
        padding: 30px;
    }

    .form-card {
        max-width: 900px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0,0,0,.08);
    }

    .form-title {
        margin-bottom: 25px;
    }

    .form-title h1 {
        margin: 0;
        color: #244f70;
    }

    .form-title p {
        color: #777;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    label {
        margin-bottom: 7px;
        font-weight: bold;
        color: #333;
    }

    input,
    textarea {
        padding: 11px 13px;
        border: 1px solid #ddd;
        border-radius: 9px;
        font-size: 14px;
        outline: none;
        font-family: inherit;
    }

    input:focus,
    textarea:focus {
        border-color: #2e6388;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .error {
        margin-top: 5px;
        color: #e74c3c;
        font-size: 13px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        padding: 12px 18px;
        border: none;
        border-radius: 9px;
        text-decoration: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-simpan {
        background: #244f70;
        color: white;
    }

    .btn-kembali {
        background: #eee;
        color: #333;
    }

    @media(max-width: 650px) {
        .form-container {
            padding: 15px;
        }

        .form-card {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column;
        }
    }
</style>

<div class="form-container">

    <div class="form-card">

        <div class="form-title">
            <h1>➕ Tambah Tamu</h1>
            <p>Isi data tamu yang berkunjung.</p>
        </div>


        <form
            action="{{ route('petugas.tamu.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-grid">

                <div class="form-group">

                    <label>Nama Tamu *</label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Nama lengkap"
                        required
                    >

                    @error('nama')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Instansi</label>

                    <input
                        type="text"
                        name="instansi"
                        value="{{ old('instansi') }}"
                        placeholder="Nama instansi/perusahaan"
                    >

                    @error('instansi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>No. HP</label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx"
                    >

                    @error('no_hp')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Bertemu Dengan</label>

                    <input
                        type="text"
                        name="bertemu_dengan"
                        value="{{ old('bertemu_dengan') }}"
                        placeholder="Nama pegawai"
                    >

                    @error('bertemu_dengan')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group full">

                    <label>Alamat</label>

                    <textarea
                        name="alamat"
                        placeholder="Alamat tamu"
                    >{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group full">

                    <label>Keperluan *</label>

                    <textarea
                        name="keperluan"
                        placeholder="Tuliskan keperluan tamu"
                        required
                    >{{ old('keperluan') }}</textarea>

                    @error('keperluan')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Waktu Datang *</label>

                    <input
                        type="datetime-local"
                        name="waktu_datang"
                        value="{{ old('waktu_datang', now()->format('Y-m-d\TH:i')) }}"
                        required
                    >

                    @error('waktu_datang')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Waktu Pulang</label>

                    <input
                        type="datetime-local"
                        name="waktu_pulang"
                        value="{{ old('waktu_pulang') }}"
                    >

                    @error('waktu_pulang')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Foto Tamu</label>

                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                    >

                    @error('foto')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label>Keterangan</label>

                    <input
                        type="text"
                        name="keterangan"
                        value="{{ old('keterangan') }}"
                        placeholder="Keterangan tambahan"
                    >

                    @error('keterangan')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="form-actions">

                <a
                    href="{{ route('petugas.tamu.index') }}"
                    class="btn btn-kembali"
                >
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-simpan"
                >
                    💾 Simpan Tamu
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
