<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital PLN</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #020b18 url('https://images.unsplash.com/photo-1511447333015-45b65e60f6d5?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        nav {
            height: 80px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(2, 11, 24, 0.6);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 210, 255, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #ff9d00, #ff5500);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 0 15px #ff9d00;
        }

        .logo h2 {
            font-size: 20px;
            letter-spacing: 1px;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
        }

        .login-btn {
            text-decoration: none;
            background: rgba(0, 136, 255, 0.2);
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: bold;
            border: 1px solid #00d2ff;
            box-shadow: 0 0 10px rgba(0, 210, 255, 0.3);
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #00d2ff;
            color: #000;
            box-shadow: 0 0 20px #00d2ff;
        }

        .hero {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 8%;
            gap: 50px;
        }

        .hero-text {
            max-width: 600px;
            flex: 1;
        }

        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            margin-bottom: 20px;
        }

        .marquee-text {
            display: inline-block;
            font-size: 42px;
            font-weight: 800;
            line-height: 1.2;
            color: #ffffff;
            text-shadow: 0 0 10px #00d2ff, 0 0 20px #00d2ff, 0 0 40px #0088ff;
            animation: marquee 12s linear infinite;
        }

        .marquee-text span {
            color: #ffffff;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .hero-text p {
            font-size: 16px;
            line-height: 1.7;
            color: #cfd8dc;
            margin-bottom: 30px;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        }

        .hero-btn {
            display: inline-block;
            background: linear-gradient(90deg, #d47a00, #ff9d00);
            color: #fff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: bold;
            border: 1px solid #ffaa00;
            box-shadow: 0 0 15px rgba(255, 157, 0, 0.5);
            transition: all 0.3s ease;
        }

        .hero-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(255, 157, 0, 0.9);
        }

        .hero-card {
            width: 380px;
            padding: 40px;
            background: rgba(10, 25, 50, 0.7);
            border: 2px solid #00d2ff;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(12px);
            box-shadow: 0 0 30px rgba(0, 210, 255, 0.25),
                        inset 0 0 15px rgba(0, 210, 255, 0.15);
        }

        .hero-card .big-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 25px;
            background: rgba(0, 136, 255, 0.2);
            border: 2px solid #00d2ff;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            color: #ffcc00;
            text-shadow: 0 0 15px #ffcc00;
            box-shadow: 0 0 20px #00d2ff;
        }

        .hero-card h2 {
            margin-bottom: 10px;
            font-size: 24px;
            text-shadow: 0 0 10px #00d2ff;
        }

        .hero-card p {
            color: #b0bec5;
            line-height: 1.6;
            font-size: 14px;
        }

        footer {
            position: fixed;
            bottom: 15px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 13px;
            color: #b0bec5;
            text-shadow: 0 0 5px #000;
        }

        @media(max-width: 800px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-card {
                width: 100%;
                max-width: 380px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    @include('layouts.landing.navbar')

    {{-- ISI LANDING --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('layouts.landing.footer')

</body>
</html>