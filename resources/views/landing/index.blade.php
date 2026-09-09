@extends('layouts.applanding')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .hero {
        min-height: calc(100vh - 70px);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background:
            linear-gradient(135deg, rgba(0, 48, 135, .96), rgba(0, 114, 188, .88)),
            url('https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1800&q=80');
        background-size: cover;
        background-position: center;
    }

    /* Efek cahaya */
    .hero::before,
    .hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(5px);
        opacity: .35;
    }

    .hero::before {
        width: 350px;
        height: 350px;
        background: #ffd700;
        top: -120px;
        left: -100px;
    }

    .hero::after {
        width: 450px;
        height: 450px;
        background: #00c6ff;
        bottom: -220px;
        right: -120px;
    }

    .hero-content {
        width: 100%;
        max-width: 1100px;
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1.5fr .8fr;
        gap: 50px;
        align-items: center;
    }

    /* RUNNING TEXT */
    .running-wrapper {
        width: 100%;
        overflow: hidden;
        margin-bottom: 25px;
        border-left: 5px solid #ffd400;
        padding-left: 18px;
    }

    .running-text {
        display: inline-block;
        white-space: nowrap;
        color: #fff;
        font-size: clamp(2rem, 5vw, 4.2rem);
        font-weight: 800;
        letter-spacing: -1px;
        text-shadow:
            0 0 10px rgba(255, 255, 255, .35),
            0 0 25px rgba(0, 198, 255, .4);
        animation: runningText 12s linear infinite;
    }

    @keyframes runningText {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .hero-description {
        color: rgba(255, 255, 255, .9);
        font-size: 18px;
        line-height: 1.8;
        max-width: 650px;
        margin-bottom: 30px;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 9px 18px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .25);
        color: white;
        backdrop-filter: blur(10px);
        margin-bottom: 20px;
        font-size: 14px;
    }

    .hero-badge span {
        width: 10px;
        height: 10px;
        background: #ffd400;
        border-radius: 50%;
        box-shadow: 0 0 12px #ffd400;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.5);
            opacity: .5;
        }
    }

    /* CARD */
    .hero-card {
        position: relative;
        padding: 40px 35px;
        border-radius: 28px;
        background: rgba(255, 255, 255, .14);
        border: 1px solid rgba(255, 255, 255, .3);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow:
            0 25px 70px rgba(0, 0, 0, .25),
            inset 0 1px 0 rgba(255, 255, 255, .25);
        color: white;
        text-align: center;
        transition: .4s ease;
    }

    .hero-card:hover {
        transform: translateY(-10px);
        box-shadow:
            0 35px 80px rgba(0, 0, 0, .35),
            0 0 35px rgba(255, 212, 0, .18);
    }

    .icon-circle {
        width: 90px;
        height: 90px;
        margin: 0 auto 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: linear-gradient(135deg, #ffd400, #ffb700);
        color: #06458a;
        font-size: 38px;
        box-shadow:
            0 10px 30px rgba(255, 212, 0, .35),
            0 0 35px rgba(255, 212, 0, .2);
    }

    .hero-card h2 {
        font-size: 30px;
        margin-bottom: 12px;
        font-weight: 800;
    }

    .hero-card p {
        color: rgba(255, 255, 255, .85);
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .btn-tamu {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 15px 25px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        color: #06458a;
        background: linear-gradient(135deg, #ffd400, #ffb700);
        box-shadow: 0 10px 25px rgba(255, 212, 0, .25);
        transition: .3s ease;
    }

    .btn-tamu:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 212, 0, .4);
        color: #003b73;
    }

    /* Dekorasi */
    .electric-line {
        position: absolute;
        width: 180px;
        height: 180px;
        border: 2px solid rgba(255, 255, 255, .12);
        border-radius: 50%;
        right: 8%;
        top: 10%;
        animation: rotate 12s linear infinite;
    }

    .electric-line::before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border: 2px solid rgba(255, 212, 0, .2);
        border-radius: 50%;
        top: 28px;
        left: 28px;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* RESPONSIVE */
    @media (max-width: 850px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .hero {
            padding: 60px 20px;
        }

        .hero-card {
            max-width: 500px;
            width: 100%;
            margin: auto;
        }

        .running-text {
            font-size: 2.3rem;
        }
    }

    @media (max-width: 500px) {
        .hero-card {
            padding: 30px 22px;
        }

        .hero-description {
            font-size: 16px;
        }
    }
</style>

<div class="hero">

    <div class="electric-line"></div>

    <div class="hero-content">

        <div class="hero-text">

            <div class="hero-badge">
                <span></span>
                Sistem Buku Tamu Digital PLN
            </div>

            <div class="running-wrapper">
                <h1 class="running-text">
                    ⚡ Selamat Datang di Buku Tamu PLN ⚡
                </h1>
            </div>

            <p class="hero-description">
                Selamat datang di layanan Buku Tamu Digital PLN.
                Silakan isi data kunjungan Anda dengan lengkap dan benar
                untuk mendukung kenyamanan, keamanan, serta pelayanan
                yang lebih cepat dan profesional.
            </p>

        </div>

        <div class="hero-card">

            <div class="icon-circle">
                ⚡
            </div>

            <h2>Isi Buku Tamu</h2>

            <p>
                Catat kunjungan Anda secara mudah, cepat,
                dan praktis melalui sistem digital.
            </p>

            <a href="{{ url('/bukutamu/create') }}" class="btn-tamu">
                📝 Isi Data Kunjungan
                <span>→</span>
            </a>

        </div>

    </div>


</div>

@endsection