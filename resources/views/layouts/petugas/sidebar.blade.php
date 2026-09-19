<aside class="sidebar">

    {{-- =========================================
         BRAND
    ========================================== --}}

    <div class="brand">

        <div class="logo">
            ⚡
        </div>

        <div class="brand-text">

            <h2>BUKU TAMU PLN</h2>

            <p>Panel Petugas / Satpam</p>

        </div>

    </div>


    {{-- =========================================
         MENU
    ========================================== --}}

    <nav class="menu">

        {{-- DASHBOARD --}}
        <a
            href="{{ route('petugas.dashboard') }}"
            class="{{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}"
        >
            <span class="menu-icon">🏠</span>

            <span class="menu-text">
                Dashboard
            </span>
        </a>


        {{-- BUKU TAMU --}}
        <a
            href="{{ route('petugas.tamu.index') }}"
            class="{{ request()->routeIs('petugas.tamu.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">📖</span>

            <span class="menu-text">
                Buku Tamu
            </span>
        </a>


        {{-- LAPORAN --}}
        <a
            href="{{ route('petugas.laporan.index') }}"
            class="{{ request()->routeIs('petugas.laporan.*') ? 'active' : '' }}"
        >
            <span class="menu-icon">📊</span>

            <span class="menu-text">
                Laporan
            </span>
        </a>

    </nav>


    {{-- =========================================
         LOGOUT
    ========================================== --}}

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
                <span class="logout-icon">🚪</span>

                <span class="logout-text">
                    Logout
                </span>
            </button>

        </form>

    </div>

</aside>


<style>

/* =========================================
   RESET SIDEBAR
========================================= */

.sidebar,
.sidebar * {
    box-sizing: border-box;
}


/* =========================================
   SIDEBAR DESKTOP
========================================= */

.sidebar {
    position: fixed;

    left: 0;
    top: 0;

    width: 250px;
    height: 100vh;

    display: flex;
    flex-direction: column;

    background: linear-gradient(
        180deg,
        #244f70 0%,
        #2e6388 100%
    );

    color: #ffffff;

    overflow-y: auto;
    overflow-x: hidden;

    z-index: 1000;

    transition:
        width 0.3s ease,
        transform 0.3s ease;

    scrollbar-width: thin;
    scrollbar-color:
        rgba(255,255,255,0.25)
        transparent;
}


/* =========================================
   SCROLLBAR
========================================= */

.sidebar::-webkit-scrollbar {
    width: 5px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.25);
    border-radius: 10px;
}


/* =========================================
   BRAND
========================================= */

.brand {
    padding: 25px 15px;

    text-align: center;

    border-bottom:
        1px solid
        rgba(255,255,255,0.15);

    flex-shrink: 0;
}


/* LOGO */

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

    box-shadow:
        0 4px 10px
        rgba(0,0,0,0.12);
}


/* BRAND TITLE */

.brand h2 {
    margin: 0;

    color: #ffffff;

    font-size: 20px;

    font-weight: 700;

    line-height: 1.3;
}


/* BRAND SUBTITLE */

.brand p {
    margin:
        6px 0 0;

    color: #d7e3ec;

    font-size: 13px;

    line-height: 1.4;
}


/* =========================================
   MENU DESKTOP
========================================= */

.menu {
    padding: 25px 15px;

    flex: 1;
}


.menu a {
    width: 100%;

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 14px 16px;

    margin-bottom: 8px;

    color: #ffffff;

    text-decoration: none;

    border-radius: 12px;

    font-size: 15px;

    transition:
        background 0.2s ease,
        transform 0.2s ease,
        color 0.2s ease;
}


/* HOVER */

.menu a:hover {
    background:
        rgba(255,255,255,0.12);

    transform:
        translateX(3px);

    color: #ffffff;
}


/* ACTIVE */

.menu a.active {
    background:
        rgba(255,255,255,0.20);

    box-shadow:
        inset 3px 0 0 #ffd429;

    color: #ffffff;
}


/* ICON */

.menu-icon {
    width: 24px;

    min-width: 24px;

    display: flex;

    align-items: center;
    justify-content: center;

    text-align: center;

    font-size: 19px;

    line-height: 1;
}


/* TEXT */

.menu-text {
    white-space: nowrap;
}


/* =========================================
   LOGOUT DESKTOP
========================================= */

.sidebar-bottom {
    padding:
        0 15px 20px;

    flex-shrink: 0;
}


.sidebar-bottom form {
    width: 100%;

    margin: 0;
}


/* LOGOUT BUTTON */

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

    color: #ffffff;

    font-family: inherit;

    font-size: 15px;

    font-weight: 700;

    cursor: pointer;

    transition:
        background 0.2s ease,
        transform 0.2s ease;
}


/* LOGOUT HOVER */

.btn-logout:hover {
    background: #d92d39;

    transform:
        translateY(-1px);
}


/* LOGOUT ICON */

.logout-icon {
    font-size: 18px;

    line-height: 1;
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 900px) {

    .sidebar {
        width: 220px;
    }

    .brand {
        padding:
            22px 12px;
    }

    .brand h2 {
        font-size: 18px;
    }

    .brand p {
        font-size: 12px;
    }

    .menu {
        padding:
            22px 12px;
    }

    .menu a {
        padding:
            13px 14px;

        font-size: 14px;
    }

    .sidebar-bottom {
        padding:
            0 12px 18px;
    }

}


/* =========================================
   MOBILE
   SIDEBAR BERUBAH MENJADI BOTTOM NAVIGATION
========================================= */

@media (max-width: 650px) {

    /* -----------------------------------------
       SIDEBAR MENJADI FOOTER NAVIGATION
    ----------------------------------------- */

    .sidebar {

        position: fixed;

        left: 0;
        right: 0;

        top: auto;
        bottom: 0;

        width: 100%;

        height: auto;

        min-height: 70px;

        display: flex;

        flex-direction: row;

        align-items: center;

        justify-content: space-between;

        background:
            linear-gradient(
                180deg,
                #244f70 0%,
                #2e6388 100%
            );

        border-top:
            1px solid
            rgba(255,255,255,0.18);

        box-shadow:
            0 -5px 20px
            rgba(0,0,0,0.15);

        overflow: hidden;

        z-index: 9999;

        transform: none;
    }


    /* -----------------------------------------
       BRAND DISEMBUNYIKAN
    ----------------------------------------- */

    .brand {
        display: none;
    }


    /* -----------------------------------------
       MENU MOBILE
    ----------------------------------------- */

    .menu {

        flex: 1;

        width: 100%;

        height: 70px;

        padding:
            6px 5px;

        margin: 0;

        display: flex;

        align-items: center;

        justify-content: space-around;

        gap: 3px;

        overflow-x: auto;

        overflow-y: hidden;

        scrollbar-width: none;
    }


    .menu::-webkit-scrollbar {
        display: none;
    }


    /* -----------------------------------------
       MENU ITEM MOBILE
    ----------------------------------------- */

    .menu a {

        width: auto;

        min-width: 65px;

        height: 58px;

        flex: 1;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 4px;

        padding:
            7px 4px;

        margin: 0;

        border-radius: 10px;

        font-size: 11px;

        line-height: 1.2;

        transform: none !important;

        white-space: nowrap;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }


    /* HOVER MOBILE */

    .menu a:hover {

        background:
            rgba(255,255,255,0.10);

        color: #ffffff;
    }


    /* ACTIVE MOBILE */

    .menu a.active {

        background:
            rgba(255,255,255,0.18);

        box-shadow: none;

        color: #ffd429;
    }


    /* -----------------------------------------
       ICON MOBILE
    ----------------------------------------- */

    .menu-icon {

        width: auto;

        min-width: auto;

        height: 23px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;

        line-height: 1;
    }


    /* -----------------------------------------
       TEXT MOBILE
    ----------------------------------------- */

    .menu-text {

        display: block;

        font-size: 11px;

        line-height: 1.2;

        white-space: nowrap;
    }


    /* -----------------------------------------
       LOGOUT MOBILE
    ----------------------------------------- */

    .sidebar-bottom {

        width: 73px;

        height: 70px;

        padding:
            6px 5px;

        margin: 0;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .sidebar-bottom form {

        width: 100%;

        height: 100%;

        margin: 0;
    }


    .btn-logout {

        width: 100%;

        height: 58px;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 4px;

        padding:
            7px 4px;

        border-radius: 10px;

        font-size: 11px;

        font-weight: 400;

        line-height: 1.2;
    }


    .btn-logout:hover {

        background: #d92d39;

        transform: none;
    }


    .logout-icon {

        font-size: 21px;

        height: 23px;

        display: flex;

        align-items: center;

        justify-content: center;

        line-height: 1;
    }


    .logout-text {

        display: block;

        font-size: 11px;

        line-height: 1.2;

        white-space: nowrap;
    }


    /* -----------------------------------------
       AGAR CONTENT TIDAK TERTUTUP NAVBAR
    ----------------------------------------- */

    body {

        padding-bottom: 80px;
    }

}


/* =========================================
   MOBILE SANGAT KECIL
========================================= */

@media (max-width: 380px) {

    .sidebar {
        min-height: 65px;
    }

    .menu {
        height: 65px;

        padding:
            5px 3px;
    }

    .menu a {
        min-width: 58px;

        height: 55px;

        padding:
            6px 3px;
    }

    .menu-icon {
        font-size: 19px;

        height: 21px;
    }

    .menu-text {
        font-size: 10px;
    }

    .sidebar-bottom {

        width: 65px;

        height: 65px;

        padding:
            5px 3px;
    }

    .btn-logout {

        height: 55px;

        font-size: 10px;
    }

    .logout-icon {
        font-size: 19px;

        height: 21px;
    }

    .logout-text {
        font-size: 10px;
    }

    body {
        padding-bottom: 72px;
    }

}


/* =========================================
   SAFE AREA UNTUK HP MODERN
========================================= */

@supports (padding-bottom: env(safe-area-inset-bottom)) {

    @media (max-width: 650px) {

        .sidebar {

            padding-bottom:
                env(safe-area-inset-bottom);
        }

        body {

            padding-bottom:
                calc(
                    80px +
                    env(safe-area-inset-bottom)
                );
        }

    }

}

</style>
