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

    h1 {
        color: #244f70;
        margin-top: 0;
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

    .full {
        grid-column: 1 / -1;
    }

    label {
        margin-bottom: 7px;
        font-weight: bold;
    }

    input,
    textarea {
        padding: 11px 13px;
        border: 1px solid #ddd;
        border-radius: 9px;
        font-family: inherit;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .error {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 5px;
    }

    .foto-lama {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .actions {
        margin-top: 25px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
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

    @media(max-width:650px) {
        .form-container {
            padding: 15px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .full {
            grid-column: auto;
        }

        .actions {
            flex-direction: column;
        }
    }
</style>

<div class="form-container">

    <div class="form-card">

        <h1>✏️ Edit Data Tamu</h1>

        <p>
            Perbarui data tamu di bawah ini.
        </p>


        <form
            action="{{ route('petugas.tamu.update', $tamu) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <div class="form-grid">

                <div class="form-group">

                    <label>Nama Tamu *</label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $tamu->nama) }}"
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
                        value="{{ old('instansi', $tamu->instansi) }}"
                    >

                </div>


                <div class="form-group">

                    <label>No. HP</label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp', $tamu->no_hp) }}"
                    >

                </div>


                <div class="form-group">

                    <label>Bertemu Dengan</label>

                    <input
                        type="text"
                        name="bertemu_dengan"
                        value="{{ old('bertemu_dengan', $tamu->bertemu_dengan) }}"
                    >

                </div>


                <div class="form-group full">

                    <label>Alamat</label>

                    <textarea name="alamat">{{ old('alamat', $tamu->alamat) }}</textarea>

                </div>


                <div class="form-group full">

                    <label>Keperluan *</label>

                    <textarea
                        name="keperluan"
                        required
                    >{{ old('keperluan', $tamu->keperluan) }}</textarea>

                </div>


                <div class="form-group">

                    <label>Waktu Datang *</label>

                    <input
                        type="datetime-local"
                        name="waktu_datang"
                        value="{{ old('waktu_datang', $tamu->waktu_datang?->format('Y-m-d\TH:i')) }}"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Waktu Pulang</label>

                    <input
                        type="datetime-local"
                        name="waktu_pulang"
                        value="{{ old('waktu_pulang', $tamu->waktu_pulang?->format('Y-m-d\TH:i')) }}"
                    >

                </div>


                <div class="form-group">

                    <label>Foto</label>

                    @if($tamu->foto)

                        <img
                            src="{{ asset($tamu->foto) }}"
                            class="foto-lama"
                            alt="Foto {{ $tamu->nama }}"
                        >

                    @endif

                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                    >

                </div>


                <div class="form-group">

                    <label>Keterangan</label>

                    <input
                        type="text"
                        name="keterangan"
                        value="{{ old('keterangan', $tamu->keterangan) }}"
                    >

                </div>

            </div>


            <div class="actions">

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
                    💾 Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
