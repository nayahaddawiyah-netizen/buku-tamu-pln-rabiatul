<aside class="sidebar">

    {{-- BRAND --}}
    <div class="brand">

        <div class="logo">
            ⚡
        </div>

        <div class="brand-text">
            <h2>BUKU TAMU PLN</h2>
            <p>Panel Petugas / Satpam</p>
        </div>

    </div>


    {{-- MENU --}}
    <nav class="menu">

        {{-- DASHBOARD --}}
        <a
            href="{{ route('petugas.dashboard') }}"
            class="{{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}"
        >
            <span class="menu-icon">🏠</span>
            <span class="menu-text">Dashboard</span>
        </a>


        {{-- BUKU TAMU --}}
        <a
            href="{{ route('petugas.tamu.index') }}"
            class="{{ request()->routeIs('petugas.tamu.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">📖</span>
            <span class="menu-text">Buku Tamu</span>
        </a>


        {{-- LAPORAN --}}
        <a
            href="{{ route('petugas.laporan.index') }}"
            class="{{ request()->routeIs('petugas.laporan.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">📊</span>
            <span class="menu-text">Laporan</span>
        </a>

    </nav>


    {{-- LOGOUT --}}
    <div class="sidebar-bottom">

        <form
            action="{{ route('petugas.logout') }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="btn-logout"
            >
                <span>🚪</span>
                <span class="logout-text">Logout</span>
            </button>
        </form>

    </div>

</aside>


<style>

/* =========================================
   SIDEBAR DESKTOP
========================================= */

.sidebar {
    width: 250px;
    height: 100vh;

    position: fixed;
    left: 0;
    top: 0;

    display: flex;
    flex-direction: column;

    background:
        linear-gradient(
            180deg,
            #244f70 0%,
            #2e6388 100%
        );

    color: white;

    overflow-y: auto;

    z-index: 1000;
}


/* =========================================
   BRAND
========================================= */

.brand {
    padding: 25px 15px;

    text-align: center;

    border-bottom:
        1px solid rgba(255,255,255,.15);

    flex-shrink: 0;
}


.logo {
    width: 58px;
    height: 58px;

    margin: 0 auto 12px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #ffd429;

    color: #244f70;

    border-radius:
        0 0 18px 18px;

    font-size: 35px;
}


.brand h2 {
    font-size: 20px;
    font-weight: bold;
    color: white;
    margin: 0;
}


.brand p {
    margin-top: 6px;

    font-size: 13px;

    color: #d7e3ec;
}


/* =========================================
   MENU
========================================= */

.menu {
    padding: 25px 15px;

    flex: 1;
}


.menu a {
    display: flex;

    align-items: center;

    gap: 13px;

    width: 100%;

    padding: 14px 16px;

    margin-bottom: 8px;

    color: white;

    text-decoration: none;

    border-radius: 12px;

    font-size: 15px;

    transition: .2s;
}


.menu a:hover {
    background:
        rgba(255,255,255,.12);

    transform:
        translateX(3px);
}


.menu a.active {
    background:
        rgba(255,255,255,.20);

    box-shadow:
        inset 3px 0 0 #ffd429;
}


.menu-icon {
    width: 24px;
    min-width: 24px;

    text-align: center;

    font-size: 19px;
}


.menu-text {
    white-space: nowrap;
}


/* =========================================
   LOGOUT
========================================= */

.sidebar-bottom {
    padding:
        0 15px 20px;

    flex-shrink: 0;
}


.sidebar-bottom form {
    width: 100%;
}


.btn-logout {
    width: 100%;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    padding: 13px 15px;

    border: none;

    border-radius: 12px;

    background: #ef3340;

    color: white;

    font-size: 15px;

    font-weight: bold;

    cursor: pointer;

    transition: .2s;
}


.btn-logout:hover {
    background: #d92d39;
}


/* =========================================
   MOBILE
   SIDEBAR JADI HEADER / NAVBAR
========================================= */

@media (max-width: 650px) {

    .sidebar {

        position: relative;

        top: auto;
        left: auto;

        width: 100%;
        height: auto;

        min-height: auto;

        display: block;

        overflow: visible;

        background:
            linear-gradient(
                135deg,
                #244f70 0%,
                #2e6388 100%
            );

        box-shadow:
            0 4px 15px rgba(0,0,0,.12);
    }


    /* =========================
       BRAND MOBILE
    ========================== */

    .brand {

        display: flex;

        align-items: center;

        justify-content: flex-start;

        gap: 12px;

        padding: 13px 16px;

        text-align: left;

        border-bottom:
            1px solid rgba(255,255,255,.15);
    }


    .logo {

        width: 44px;
        height: 44px;

        min-width: 44px;

        margin: 0;

        border-radius: 11px;

        font-size: 25px;
    }


    .brand-text {
        display: block;
    }


    .brand h2 {
        font-size: 15px;
        line-height: 1.2;
    }


    .brand p {
        margin-top: 3px;

        font-size: 11px;
    }


    /* =========================
       MENU MOBILE
    ========================== */

    .menu {

        display: flex;

        align-items: stretch;

        gap: 7px;

        padding: 9px 10px;

        overflow-x: auto;

        flex: none;

        -webkit-overflow-scrolling: touch;

        scrollbar-width: none;
    }


    .menu::-webkit-scrollbar {
        display: none;
    }


    .menu a {

        flex: 1 0 auto;

        width: auto;

        min-width: 105px;

        margin: 0;

        padding: 10px 12px;

        justify-content: center;

        gap: 6px;

        border-radius: 9px;

        font-size: 12px;

        white-space: nowrap;
    }


    .menu a:hover {
        transform: none;
    }


    .menu a.active {

        box-shadow:
            inset 0 -3px 0 #ffd429;
    }


    .menu-icon {

        width: auto;
        min-width: auto;

        font-size: 17px;
    }


    .menu-text {
        display: inline;
    }


    /* =========================
       LOGOUT MOBILE
    ========================== */

    .sidebar-bottom {

        padding:
            0 10px 10px;
    }


    .btn-logout {

        padding: 10px;

        border-radius: 9px;

        font-size: 12px;
    }


    .logout-text {
        display: inline;
    }

}


/* =========================================
   HP KECIL
========================================= */

@media (max-width: 380px) {

    .brand {
        padding: 11px 13px;
    }


    .logo {
        width: 40px;
        height: 40px;

        min-width: 40px;

        font-size: 22px;
    }


    .brand h2 {
        font-size: 14px;
    }


    .brand p {
        font-size: 10px;
    }


    .menu {
        padding: 8px;
        gap: 5px;
    }


    .menu a {
        min-width: 95px;

        padding: 9px 8px;

        font-size: 11px;
    }


    .menu-icon {
        font-size: 15px;
    }

}

</style>
