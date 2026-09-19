<!DOCTYPE html> <html lang="id"> <head> <meta charset="UTF-8">
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

    /* =========================================
       MAIN
    ========================================= */

    .main {
        margin-left: 250px;
        width: calc(100% - 250px);
        min-height: 100vh;

        display: flex;
        flex-direction: column;

        transition: margin-left .3s ease,
                    width .3s ease;
    }

    .content {
        width: 100%;
        padding: 32px;
        flex: 1;
    }

    /* =========================================
       SIDEBAR COLLAPSED DESKTOP
    ========================================= */

    body.sidebar-collapsed .sidebar {
        width: 80px;
    }

    body.sidebar-collapsed .main {
        margin-left: 80px;
        width: calc(100% - 80px);
    }

    body.sidebar-collapsed .brand-text,
    body.sidebar-collapsed .menu-text,
    body.sidebar-collapsed .logout-text {
        display: none;
    }

    body.sidebar-collapsed .brand {
        padding: 20px 10px;
    }

    body.sidebar-collapsed .menu {
        padding-left: 10px;
        padding-right: 10px;
    }

    body.sidebar-collapsed .menu a {
        justify-content: center;
        padding: 14px 10px;
    }

    body.sidebar-collapsed .btn-logout {
        padding: 13px;
    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 900px) {

        .main {
            margin-left: 220px;
            width: calc(100% - 220px);
        }

        body.sidebar-collapsed .main {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        .content {
            padding: 24px;
        }
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 650px) {

        .main,
        body.sidebar-collapsed .main {
            margin-left: 0;
            width: 100%;
        }

        .content {
            width: 100%;
            padding: 15px;
        }

        /*
         * Sidebar mobile tidak ikut layout.
         * Sidebar menjadi drawer.
         */

        .sidebar {
            transform: translateX(-100%);
            width: 280px !important;

            box-shadow:
                8px 0 30px rgba(0, 0, 0, .20);
        }

        body.sidebar-mobile-open .sidebar {
            transform: translateX(0);
        }

        /*
         * Overlay
         */

        .sidebar-overlay {
            position: fixed;
            inset: 0;

            background: rgba(15, 23, 42, .45);

            z-index: 999;

            opacity: 0;
            visibility: hidden;

            transition: .25s ease;
        }

        body.sidebar-mobile-open .sidebar-overlay {
            opacity: 1;
            visibility: visible;
        }

        /*
         * Reset collapsed desktop
         */

        body.sidebar-collapsed .sidebar {
            width: 280px !important;
        }

        body.sidebar-collapsed .brand-text,
        body.sidebar-collapsed .menu-text,
        body.sidebar-collapsed .logout-text {
            display: block;
        }

        body.sidebar-collapsed .brand {
            padding: 20px 15px;
        }

        body.sidebar-collapsed .menu {
            padding: 25px 15px;
        }

        body.sidebar-collapsed .menu a {
            justify-content: flex-start;
            padding: 14px 16px;
        }

        body.sidebar-collapsed .btn-logout {
            padding: 13px 15px;
        }

        /*
         * Hindari scroll horizontal
         */

        .content img {
            max-width: 100%;
            height: auto;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    /* =========================================
       SMALL MOBILE
    ========================================= */

    @media (max-width: 400px) {

        .content {
            padding: 12px;
        }
    }
</style>

@stack('styles')

</head> <body> <div class="wrapper">
{{-- OVERLAY MOBILE --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

{{-- SIDEBAR --}}
@include('layouts.petugas.sidebar')

{{-- MAIN --}}
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

</body> </html>