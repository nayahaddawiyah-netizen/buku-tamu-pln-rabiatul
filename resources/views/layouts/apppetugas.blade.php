<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Panel Petugas | Buku Tamu PLN')
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #eef2f6;
            color: #334e68;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /*
        |--------------------------------------------------------------------------
        | MAIN CONTENT
        |--------------------------------------------------------------------------
        */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            transition: all 0.3s ease;
        }

        .content {
            width: 100%;
            padding: 32px;

            flex: 1;
        }

        /*
        |--------------------------------------------------------------------------
        | TABLET
        |--------------------------------------------------------------------------
        */

        @media (max-width: 900px) {

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .content {
                padding: 24px;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HP / MOBILE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 650px) {

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);

                min-width: 0;
            }

            .content {
                width: 100%;
                padding: 15px;
            }

            /*
             * Supaya elemen yang terlalu lebar
             * tidak merusak tampilan HP
             */
            .content img {
                max-width: 100%;
                height: auto;
            }

            .content table {
                width: 100%;
                min-width: 600px;
            }

            /*
             * Jika ada tabel, bisa di-scroll horizontal
             */
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            /*
             * Input dan button tidak keluar layar
             */
            .content input,
            .content select,
            .content textarea {
                max-width: 100%;
            }

            /*
             * Button lebih nyaman disentuh di HP
             */
            .content button {
                min-height: 42px;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | HP KECIL
        |--------------------------------------------------------------------------
        */

        @media (max-width: 400px) {

            .main {
                margin-left: 60px;
                width: calc(100% - 60px);
            }

            .content {
                padding: 12px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="wrapper">

    {{-- SIDEBAR --}}
    @include('layouts.petugas.sidebar')

    <div class="main">

        {{-- NAVBAR --}}
        @include('layouts.petugas.navbar')

        {{-- CONTENT --}}
        <main class="content">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        @include('layouts.petugas.footer')

    </div>

</div>

@stack('scripts')

</body>
</html>