<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital PLN</title>

    <!-- Font Poppins untuk tampilan modern dan profesional -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================
           1. CSS VARIABLES & RESET
           ========================================== */
        :root {
            --pln-blue-dark: #002B5B;
            --pln-blue-mid: #005B96;
            --pln-blue-primary: #0081C9;
            --pln-cyan: #00E5FF;
            --pln-yellow: #FFD600;
            --pln-yellow-hover: #FFF176;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f7fe;
        }

        /* ==========================================
           2. NAVBAR CONTAINER STYLING
           ========================================== */
        .pln-navbar {
            background: linear-gradient(135deg, var(--pln-blue-dark) 0%, var(--pln-blue-mid) 60%, var(--pln-blue-primary) 100%);
            border-bottom: 3.5px solid var(--pln-yellow);
            box-shadow: 0 4px 20px rgba(0, 43, 91, 0.35);
            padding: 14px 24px; /* Padding kiri-kanan disesuaikan agar tidak terlalu rapat ke bingkai layar */
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            width: 100%; /* Menggunakan lebar penuh layar */
            max-width: 100%; /* Menghapus batasan 1280px agar terdorong ke ujung */
            margin: 0 auto;
            display: flex;
            justify-content: space-between; /* Mendorong elemen kiri ke ujung kiri, elemen kanan ke ujung kanan */
            align-items: center;
        }

        /* ==========================================
           3. LOGO & BRAND STYLING
           ========================================== */
        .brand-link {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
        }

        .logo-box {
            width: 48px;
            height: 48px;
            background: radial-gradient(circle, rgba(255, 214, 0, 0.25) 0%, rgba(0, 43, 91, 0.9) 70%);
            border: 2px solid var(--pln-yellow);
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(255, 214, 0, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .brand-link:hover .logo-box {
            transform: scale(1.08) rotate(-6deg);
            box-shadow: 0 0 25px rgba(255, 214, 0, 0.8);
            border-color: #FFFFFF;
        }

        .lightning-icon {
            font-size: 24px;
            color: var(--pln-yellow);
            filter: drop-shadow(0 0 6px rgba(255, 214, 0, 0.8));
        }

        .brand-text h2 {
            color: var(--white);
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .brand-text .sub-text {
            color: var(--pln-cyan);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-shadow: 0 0 8px rgba(0, 229, 255, 0.3);
        }

        /* ==========================================
           4. LOGIN BUTTON STYLING
           ========================================== */
        .btn-login {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--pln-yellow) 0%, #FFC107 100%);
            color: var(--pln-blue-dark);
            padding: 10px 22px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(255, 214, 0, 0.35);
            transition: all 0.3s ease;
        }

        .btn-login .btn-icon {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
            stroke: var(--pln-blue-dark);
        }

        .btn-login:hover {
            background: var(--white);
            color: var(--pln-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.5);
        }

        .btn-login:hover .btn-icon {
            transform: translateX(4px);
            stroke: var(--pln-blue-dark);
        }

        /* Responsive penyesuaian HP */
        @media (max-width: 576px) {
            .pln-navbar {
                padding: 12px 16px;
            }
            .brand-text h2 {
                font-size: 0.95rem;
            }
            .brand-text .sub-text {
                font-size: 0.65rem;
            }
            .btn-login {
                padding: 8px 16px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR START -->
    <nav class="pln-navbar">
        <div class="nav-container">
            <!-- Brand / Logo -->
            <a href="#" class="brand-link">
                <div class="logo-box">
                    <span class="lightning-icon">⚡</span>
                </div>
                <div class="brand-text">
                    <h2>Buku Tamu Digital</h2>
                    <span class="sub-text">PT PLN (PERSERO)</span>
                </div>
            </a>

            <!-- Action Button -->
            <a href="{{ route('petugas.login') }}" class="btn-login">
                <span class="btn-text">Login Petugas</span>
                <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10 17 15 12 10 7"></polyline>
                    <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>
            </a>
        </div>
    </nav>
    <!-- NAVBAR END -->

</body>
</html>