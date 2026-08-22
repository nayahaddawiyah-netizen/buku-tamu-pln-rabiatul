<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">

<div class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-10">

    <div class="mb-8">

        <h1 class="text-4xl font-extrabold text-yellow-600 mb-2">
            Edit Kehadiran
        </h1>

        <p class="text-gray-500">
            Update data attendance
        </p>

    </div>

    @if ($errors->any())

        <div class="bg-red-500 text-white p-4 rounded-2xl mb-6">

            <ul>
                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="/attendances/{{ $attendance->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-5">

            <label class="block mb-2 font-bold text-gray-700">
                Nama Tamu
            </label>

            <input
                type="text"
                name="guest_name"
                value="{{ $attendance->guest_name }}"
                class="w-full p-4 border rounded-2xl focus:ring-4 focus:ring-yellow-300"
            >

        </div>

        <!-- Tujuan -->
        <div class="mb-5">

            <label class="block mb-2 font-bold text-gray-700">
                Tujuan
            </label>

            <input
                type="text"
                name="purpose"
                value="{{ $attendance->purpose }}"
                class="w-full p-4 border rounded-2xl focus:ring-4 focus:ring-yellow-300"
            >

        </div>

        <!-- Tanggal -->
        <div class="mb-8">

            <label class="block mb-2 font-bold text-gray-700">
                Tanggal
            </label>

            <input
                type="date"
                name="visit_date"
                value="{{ $attendance->visit_date }}"
                class="w-full p-4 border rounded-2xl focus:ring-4 focus:ring-yellow-300"
            >

        </div>

        <!-- Button -->
        <div class="flex gap-4">

    <a
        href="/attendances"
        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-4 rounded-2xl"
    >
        ← Kembali
    </a>

    <button
        type="submit"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-4 rounded-2xl font-bold"
    >
        Update
    </button>

</div>

    </form>

</div>

</body>
</html>