<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-10">

<div class="max-w-2xl mx-auto bg-white p-10 rounded-3xl shadow">

    <h1 class="text-4xl font-bold mb-8">
        Edit User
    </h1>

    <form
        action="/users/{{ $user->id }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="mb-5">

            <label class="block mb-2 font-bold">
                Nama
            </label>

            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
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
                value="{{ $user->email }}"
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

                <option
                    value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}
                >
                    Admin
                </option>

                <option
                    value="petugas"
                    {{ $user->role == 'petugas' ? 'selected' : '' }}
                >
                    Petugas
                </option>

            </select>

        </div>

        <button
            class="bg-yellow-500 text-white px-6 py-3 rounded-xl"
        >
            Update
        </button>

    </form>

</div>

</body>
</html>