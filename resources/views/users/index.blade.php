<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-10">

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-4xl font-bold mb-2">
            Data User
        </h1>
    </div>

    <a
        href="/users/create"
        class="bg-blue-600 text-white px-5 py-3 rounded-xl hover:bg-blue-700 transition"
    >
        + Tambah User
    </a>

</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-blue-900 text-white">

            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Nama</th>
                <th class="p-4 text-left">Email</th>
                <th class="p-4 text-left">Role</th>
                <th class="p-4 text-left">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

            <tr class="border-b hover:bg-gray-100 transition">

                <td class="p-4">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4">
                    {{ $user->name }}
                </td>

                <td class="p-4">
                    {{ $user->email }}
                </td>

                <td class="p-4">
                    {{ $user->role }}
                </td>

                <td class="p-4 flex gap-2">

                    <a
                        href="/users/{{ $user->id }}/edit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg transition"
                    >
                        Edit
                    </a>

                    <form
                        action="/users/{{ $user->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Yakin hapus user?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition"
                        >
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<div class="mt-8">

    <a
        href="/dashboard"
        class="inline-block bg-blue-600 text-white px-5 py-3 rounded-2xl hover:bg-blue-700 transition"
    >
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>