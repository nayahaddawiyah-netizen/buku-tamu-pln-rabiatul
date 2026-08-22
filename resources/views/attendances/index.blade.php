<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kehadiran</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<div class="p-10">

    {{-- Alert Success --}}
    @if(session('success'))

        <div class="bg-green-500 text-white px-6 py-4 rounded-2xl mb-6 shadow">
            {{ session('success') }}
        </div>

    @endif

    {{-- Search --}}
    <form action="/attendances" method="GET" class="mb-8">

        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Cari nama tamu..."
            class="w-full p-4 rounded-2xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-blue-300"
        >

    </form>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-5xl font-extrabold mb-2">
                Data kehadiran
            </h1>

        </div>

        <div class="flex gap-3">
@auth

@if(auth()->check() && auth()->user()->role == 'admin')

<a
    href="/attendances/create"
    class="bg-blue-600 text-white px-6 py-3 rounded-2xl hover:bg-blue-700 transition shadow"
>
    + Tambah Kehadiran
</a>

@endif

@endauth
            <a
                href="/attendances/pdf"
                class="bg-red-500 text-white px-6 py-3 rounded-2xl hover:bg-red-600 transition shadow"
            >
                Export PDF
            </a>

        </div>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-900 text-white">

                <tr>

                    <th class="p-5 text-left">
                        No
                    </th>

                    <th class="p-5 text-left">
                        Nama Tamu
                    </th>

                    <th class="p-5 text-left">
                        Tujuan
                    </th>

                    <th class="p-5 text-left">
                        Tanggal
                    </th>

                    <th class="p-5 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($attendances as $attendance)

                <tr class="border-b hover:bg-gray-100 transition">

                    <td class="p-5">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-5 font-semibold">
                        {{ $attendance->guest_name }}
                    </td>

                    <td class="p-5">
                        {{ $attendance->purpose }}
                    </td>

                    <td class="p-5">
                        {{ $attendance->visit_date }}
                    </td>

                    <td class="p-5">

                        <div class="flex gap-3">

                            {{-- Edit --}}
                            <a
                                href="/attendances/{{ $attendance->id }}/edit"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-xl transition"
                            >
                                Edit
                            </a>

                            {{-- Delete --}}
@if(auth()->check())

<form
    action="/attendances/{{ $attendance->id }}"
    method="POST"
>

    @csrf
    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('Yakin mau hapus data ini?')"
        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl transition"
    >
        Hapus
    </button>

</form>

@endif
                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-10 text-center text-gray-500">
                        Data attendance belum ada
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{-- Pagination --}}
        <div class="p-5">

            {{ $attendances->links() }}

        </div>

    </div>

</div>
<div class="mt-8">

    <a
        href="/dashboard"
        class="inline-block bg-blue-600 text-white px-5 py-3 rounded-2xl hover:bg-blue-700 transition"
    >
        ← Kembali ke Dashboard
    </a>

</div>
{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))

<script>

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    })

</script>

@endif

</body>
</html>