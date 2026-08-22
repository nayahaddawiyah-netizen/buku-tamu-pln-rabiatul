<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-10">

<div class="max-w-2xl mx-auto bg-white p-10 rounded-3xl shadow">

    <h1 class="text-4xl font-bold mb-8">
        Tambah User
    </h1>

    <form action="/users" method="POST">

        @csrf

        <div class="mb-5">

            <label class="block mb-2 font-bold">
                Nama
            </label>

            <input
                type="text"
                name="name"
                class="w-full border p-4 rounded-xl"
            >

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-bold">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="w-full border p-4 rounded-xl"
            >

        </div>

        <div class="mb-5">

            <label class="block mb-2 font-bold">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="w-full border p-4 rounded-xl"
            >

        </div>

        <div class="mb-8">

            <label class="block mb-2 font-bold">
                Role
            </label>

            <select
                name="role"
                class="w-full border p-4 rounded-xl"
            >
                <option value="admin">
                    Admin
                </option>

                <option value="petugas">
                    Petugas
                </option>
            </select>

        </div>

        <button
            class="bg-blue-600 text-white px-6 py-3 rounded-xl"
        >
            Simpan
        </button>

    </form>

</div>

</body>
</html>