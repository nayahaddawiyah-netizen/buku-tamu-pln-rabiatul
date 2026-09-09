<header class="navbar">

    <div class="navbar-left">

        {{-- Tombol buka/tutup sidebar --}}
        <button class="sidebar-toggle" id="sidebarToggle" type="button">
            ☰
        </button>

        <div class="navbar-title">
            <h1>
                @yield('page-title', 'Dashboard')
            </h1>

            <p>
                Sistem Buku Tamu Digital PLN
            </p>
        </div>

    </div>


    <div class="user-box">

        <div class="user-icon">
            👤
        </div>

        <div>

            <strong>
                {{ Auth::user()->nama ?? Auth::user()->username }}
            </strong>

            <small>
                Petugas
            </small>

        </div>

    </div>

</header>


<style>

    .navbar {
        height: 85px;

        background: white;

        display: flex;

        justify-content: space-between;
        align-items: center;

        padding: 0 32px;

        border-bottom: 1px solid #e2e8f0;

        box-shadow: 0 3px 12px rgba(0,0,0,.04);
    }


    /* Bagian kiri navbar */
    .navbar-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }


    /* Tombol toggle sidebar */
    .sidebar-toggle {
        width: 42px;
        height: 42px;

        border: none;

        background: #f1f5f9;

        color: #244a66;

        border-radius: 10px;

        font-size: 23px;

        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;

        transition: all .2s ease;
    }


    .sidebar-toggle:hover {
        background: #e5f0f7;

        color: #1d6fa5;

        transform: scale(1.05);
    }


    .navbar-title h1 {
        margin: 0;

        color: #244a66;

        font-size: 25px;
    }


    .navbar-title p {
        margin-top: 4px;

        color: #718096;

        font-size: 13px;
    }


    /* User */
    .user-box {
        display: flex;

        align-items: center;

        gap: 10px;

        background: #f7fafc;

        padding: 9px 14px;

        border-radius: 12px;
    }


    .user-icon {
        width: 36px;
        height: 36px;

        background: #e5f0f7;

        border-radius: 50%;

        display: flex;

        align-items: center;
        justify-content: center;
    }


    .user-box strong {
        display: block;

        color: #244a66;

        font-size: 14px;
    }


    .user-box small {
        display: block;

        margin-top: 2px;

        color: #718096;
    }


    /* Mobile */
    @media (max-width: 650px) {

        .navbar {
            padding: 0 15px;
        }

        .navbar-title p {
            display: none;
        }

        .navbar-title h1 {
            font-size: 20px;
        }

        .user-box {
            padding: 7px;
        }

        .user-box > div:last-child {
            display: none;
        }

    }

</style>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        const toggle = document.getElementById('sidebarToggle');

        toggle.addEventListener('click', function () {

            document.body.classList.toggle('sidebar-collapsed');

        });

    });

</script>
