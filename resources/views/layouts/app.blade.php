<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('images/nefour-logo.png') }}">
    <title>
        @yield('title', 'NEFOUR • SMKN 4 Bogor')
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: #102a43;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* =================================
           NAVBAR
        ================================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: #ffffff;

            border-bottom: 1px solid #e8eef5;
        }

        .navbar-inner {
            width: min(1120px, calc(100% - 40px));
            height: 68px;

            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* BRAND */

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #0b3d91;
            text-decoration: none;
        }

        .brand-logo {
                width: 42px;
                height: 42px;

                display: flex;
                align-items: center;
                justify-content: center;

                flex-shrink: 0;
            }

            .brand-logo img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                display: block;
            }

        .brand-logo span {
            transform: skew(12deg);
        }

        .brand-name {
            font-size: 15px;
            font-weight: 900;
            letter-spacing: -.2px;
        }

        .brand-subtitle {
            margin-top: 2px;

            color: #7b8da1;

            font-size: 9px;
            font-weight: 500;
        }

        /* MENU */

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-link {
            position: relative;

            padding: 9px 12px;

            color: #52677d;
            text-decoration: none;

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .nav-link:hover {
            color: #0b5ed7;
        }

        .nav-link.active {
            color: #0b5ed7;
        }

        .nav-link.active::after {
            content: "";

            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 2px;

            height: 2px;

            background: #0b5ed7;
            border-radius: 5px;
        }

        /* LOGIN */

        .nav-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 68px;

            padding: 9px 17px;

            border-radius: 6px;

            background: #0b5ed7;
            color: #ffffff;

            text-decoration: none;

            font-size: 11px;
            font-weight: 800;

            transition: .2s ease;
        }

        .nav-login:hover {
            background: #084db3;
            transform: translateY(-1px);
        }

        /* MOBILE BUTTON */

        .mobile-menu-button {
            display: none;

            width: 38px;
            height: 38px;

            border: 0;
            background: transparent;

            color: #0b3d91;

            font-size: 23px;

            cursor: pointer;
        }

        /* =================================
           MAIN
        ================================= */

        .main-content {
            min-height: calc(100vh - 68px);
        }

        /* =================================
           FOOTER
        ================================= */

        .footer {
            background: #3f4144;
            color: #ffffff;
        }

        .footer-inner {
            width: min(1120px, calc(100% - 40px));

            margin: auto;

            padding: 55px 0 35px;

            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;

            gap: 55px;
        }

        .footer-brand {
            margin-bottom: 12px;

            font-size: 18px;
            font-weight: 900;
        }

        .footer-description {
            max-width: 380px;

            margin: 0;

            color: #dbeafe;

            font-size: 12px;
            line-height: 1.8;
        }

        .footer-title {
            margin: 0 0 15px;

            font-size: 13px;
            font-weight: 800;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .footer-links a {
            color: #dbeafe;

            text-decoration: none;

            font-size: 12px;

            transition: .2s ease;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .footer-contact {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .footer-contact div {
            color: #dbeafe;

            font-size: 12px;
            line-height: 1.6;
        }

        .footer-bottom {
            width: min(1120px, calc(100% - 40px));

            margin: auto;

            padding: 18px 0;

            border-top: 1px solid rgba(255, 255, 255, .18);

            color: #bfdbfe;

            font-size: 11px;
        }

        /* =================================
           RESPONSIVE
        ================================= */

        @media (max-width: 800px) {

            .navbar-inner {
                height: 64px;
            }

            .nav-menu {
                display: none;

                position: absolute;

                left: 15px;
                right: 15px;
                top: 73px;

                padding: 8px;

                background: #ffffff;

                border: 1px solid #e3ebf5;
                border-radius: 12px;

                box-shadow: 0 12px 30px rgba(15, 42, 67, .10);

                flex-direction: column;
                align-items: stretch;
            }

            .nav-menu.show {
                display: flex;
            }

            .nav-link {
                width: 100%;
                padding: 12px;
            }

            .nav-link.active::after {
                display: none;
            }

            .nav-login {
                margin: 5px 12px 10px;
            }

            .mobile-menu-button {
                display: block;
            }

            .footer-inner {
                grid-template-columns: 1fr;
                gap: 30px;

                padding: 45px 0 30px;
            }
        }

        @media (max-width: 500px) {

            .navbar-inner {
                width: min(100% - 30px, 1120px);
            }

            .brand-subtitle {
                display: none;
            }

            .brand-name {
                font-size: 14px;
            }

            .footer-inner,
            .footer-bottom {
                width: min(100% - 30px, 1120px);
            }
        }
    </style>

    @stack('styles')
</head>


<body>

    {{-- =================================
         NAVBAR
    ================================= --}}

    <header class="navbar">

        <div class="navbar-inner">

            <a href="{{ url('/') }}" class="brand">

                <div class="brand-logo">
                    <img
                        src="{{ asset('images/nefour-logo.png') }}"
                        alt="NEFOUR">
                </div>

                <div class="brand-text">

                    <div class="brand-name">
                        NEFOUR
                    </div>

                    <div class="brand-subtitle">
                        SMKN 4 BOGOR
                    </div>

                </div>

            </a>

            <button
                class="mobile-menu-button"
                id="mobileMenuButton"
                type="button"
                aria-label="Buka menu">

                ☰

            </button>


            <nav class="nav-menu" id="navMenu">

                <a
                    href="{{ url('/') }}"
                    class="nav-link">
                    Beranda
                </a>

                <a
                    href="{{ route('profile.index') }}"
                    class="nav-link">
                    Tentang
                </a>

                <a
                    href="{{ route('artikel.index') }}"
                    class="nav-link">
                    Berita
                </a>

                <a
                    href="{{ route('galeri.index') }}"
                    class="nav-link">
                    Galeri
                </a>

                <a
                    href="{{ route('kontak.index') }}"
                    class="nav-link">
                    Kontak
                </a>

            </nav>

        </div>

    </header>


    {{-- =================================
         MAIN
    ================================= --}}

    <main class="main-content">

        @yield('content')

    </main>


    {{-- =================================
         FOOTER
    ================================= --}}

    <footer class="footer">

        <div class="footer-inner">

            <div>

                <div class="footer-brand">
                    NEFOUR
                </div>

                <p class="footer-description">
                    SMK Negeri 4 Bogor merupakan ruang belajar,
                    berkarya, dan berkembang untuk membentuk
                    generasi yang kompeten, kreatif, dan berkarakter.
                </p>

            </div>


            <div>

                <h3 class="footer-title">
                    Navigasi
                </h3>

                <div class="footer-links">

                    <a href="{{ url('/') }}">
                        Beranda
                    </a>

                    <a href="{{ route('profile.index') }}">
                        Tentang
                    </a>

                    <a href="{{ route('artikel.index') }}">
                        Berita
                    </a>

                    <a href="{{ route('galeri.index') }}">
                        Galeri
                    </a>

                    <a href="{{ route('kontak.index') }}">
                        Kontak
                    </a>

                </div>

            </div>


            <div>

                <h3 class="footer-title">
                    Kontak
                </h3>

                <div class="footer-contact">

                    <div>
                        SMKN 4 Bogor
                    </div>

                    <div>
                        Jl. Pendidikan Raya No. 4,
                        Kota Bogor, Jawa Barat
                    </div>

                    <div>
                        0821-2262-442
                    </div>

                    <div>
                        smkn4@smkn4bogor.sch.id
                    </div>

                </div>

            </div>

        </div>


        <div class="footer-bottom">

            © {{ date('Y') }} NEFOUR • SMKN 4 Bogor.
            Semua hak cipta dilindungi.

        </div>

    </footer>


    {{-- =================================
         JAVASCRIPT
    ================================= --}}

    <script>

        const mobileMenuButton =
            document.getElementById('mobileMenuButton');

        const navMenu =
            document.getElementById('navMenu');


        if (mobileMenuButton && navMenu) {

            mobileMenuButton.addEventListener('click', function () {

                navMenu.classList.toggle('show');

            });


            document
                .querySelectorAll('.nav-link, .nav-login')
                .forEach(link => {

                    link.addEventListener('click', function () {

                        navMenu.classList.remove('show');

                    });

                });

        }

    </script>


    @stack('scripts')

</body>

</html>