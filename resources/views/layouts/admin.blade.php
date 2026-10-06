<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/nefour-logo.png') }}">

    <title>@yield('title', 'Dashboard Admin - SMKN 4 Bogor')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        button,
        input {
            font-family: inherit;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 235px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e7ebf2;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            height: 76px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px;
            border-bottom: 1px solid #edf0f5;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            object-fit: cover;
        }

        .brand-text h2 {
            font-size: 14px;
            color: #123b80;
            margin-bottom: 3px;
        }

        .brand-text span {
            font-size: 10px;
            color: #8a94a6;
        }

        .sidebar-menu {
            padding: 22px 14px;
            flex: 1;
        }

        .menu-title {
            font-size: 9px;
            color: #9ba4b3;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 10px 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 12px;
            border-radius: 7px;
            margin-bottom: 5px;
            font-size: 12px;
            color: #596477;
            transition: .2s ease;
        }

        .menu-item:hover {
            background: #f0f5ff;
            color: #16449a;
        }

        /* ACTIVE MENU */
        .menu-item.active {
            background: #173f91;
            color: #ffffff;
            box-shadow: 0 5px 12px rgba(23, 63, 145, .16);
        }

        .menu-item.active .menu-icon {
            color: #ffffff;
        }

        .menu-icon {
            width: 16px;
            text-align: center;
            font-size: 13px;
        }

        .logout-area {
            padding: 18px 14px;
            border-top: 1px solid #edf0f5;
        }

        .logout {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #df5555;
            font-size: 11px;
            padding: 10px 12px;
        }

        /* =========================
           MAIN
        ========================== */

        .main {
            margin-left: 235px;
            width: calc(100% - 235px);
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================== */

        .topbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #e9edf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .search-box {
            width: 300px;
            height: 38px;
            background: #f4f7fb;
            border: 1px solid #e7ebf2;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 0 13px;
            gap: 9px;
        }

        .search-box span {
            color: #929baa;
            font-size: 13px;
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 11px;
            color: #333;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-info {
            text-align: right;
        }

        .admin-info strong {
            display: block;
            font-size: 11px;
            color: #273044;
        }

        .admin-info span {
            font-size: 9px;
            color: #929baa;
        }

        .admin-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e8eefb;
        }

        /* =========================
           CONTENT
        ========================== */

        .content {
            padding: 26px 30px 45px;
        }

        /* =========================
           DASHBOARD STYLES
        ========================== */

        .welcome-banner {
            background: linear-gradient(
                110deg,
                #123678,
                #294ca4
            );
            border-radius: 8px;
            padding: 22px 25px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 7px 18px rgba(26, 57, 123, .12);
        }

        .welcome-text small {
            display: inline-block;
            background: rgba(255,255,255,.13);
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 8px;
            margin-bottom: 7px;
        }

        .welcome-text h1 {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .welcome-text p {
            font-size: 10px;
            line-height: 1.6;
            color: rgba(255,255,255,.82);
            max-width: 560px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-top: 18px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e9edf3;
            border-radius: 8px;
            padding: 17px;
            min-height: 115px;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-title {
            font-size: 9px;
            color: #737e91;
            text-transform: uppercase;
            font-weight: 700;
        }

        .stat-icon {
            width: 29px;
            height: 29px;
            border-radius: 7px;
            background: #e9f0ff;
            color: #214b9b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: 700;
            margin-top: 13px;
            color: #14213a;
        }

        .stat-note {
            font-size: 8px;
            color: #7e899b;
            margin-top: 4px;
        }

        .stat-note.danger {
            color: #df5555;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.65fr) minmax(250px, .75fr);
            gap: 16px;
            margin-top: 18px;
        }

        .panel {
            background: white;
            border: 1px solid #e9edf3;
            border-radius: 8px;
            overflow: hidden;
        }

        .panel-header {
            padding: 15px 17px;
            border-bottom: 1px solid #edf0f5;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-header h3 {
            font-size: 12px;
            color: #24304a;
        }

        .panel-header p {
            font-size: 9px;
            color: #8b95a6;
            margin-top: 3px;
        }

        .panel-link {
            color: #17479d;
            font-size: 9px;
            font-weight: 600;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5f8fd;
            color: #7c879a;
            font-size: 8px;
            text-transform: uppercase;
            text-align: left;
            padding: 10px 14px;
            white-space: nowrap;
        }

        td {
            padding: 12px 14px;
            border-top: 1px solid #f0f2f6;
            font-size: 9px;
            color: #4c5669;
        }

        td.title {
            color: #28344d;
            font-weight: 600;
            max-width: 220px;
        }

        .badge {
            display: inline-block;
            background: #edf3ff;
            color: #2853a0;
            padding: 4px 7px;
            border-radius: 4px;
            font-size: 7px;
        }

        .action {
            color: #4567a5;
            font-size: 10px;
            margin-right: 5px;
        }

        .quick-grid {
            padding: 14px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .quick-item {
            border: 1px solid #e9edf3;
            background: #f8faff;
            border-radius: 7px;
            padding: 13px 8px;
            text-align: center;
            transition: .2s ease;
        }

        .quick-item:hover {
            border-color: #b9c9eb;
            transform: translateY(-1px);
        }

        .quick-icon {
            width: 27px;
            height: 27px;
            margin: 0 auto 7px;
            border-radius: 6px;
            background: #e5edff;
            color: #214c9d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        .quick-item strong {
            display: block;
            font-size: 8px;
            color: #39455d;
            margin-bottom: 3px;
        }

        .quick-item span {
            font-size: 7px;
            color: #929baa;
        }

        .message-list {
            padding: 5px 0;
        }

        .message-item {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            padding: 12px 16px;
            border-bottom: 1px solid #f0f2f6;
        }

        .message-item:last-child {
            border-bottom: none;
        }

        .message-main {
            min-width: 0;
        }

        .message-name {
            font-size: 9px;
            font-weight: 700;
            color: #2c3850;
        }

        .message-subject {
            font-size: 8px;
            color: #5e6879;
            margin-top: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .message-time {
            font-size: 7px;
            color: #9ba3b1;
            margin-top: 4px;
        }

        .message-status {
            font-size: 7px;
            padding: 4px 6px;
            border-radius: 4px;
            white-space: nowrap;
        }

        .message-status.new {
            background: #fff0f0;
            color: #d64c4c;
        }

        .message-status.read {
            background: #f0f3f7;
            color: #8a94a4;
        }

        .empty-message {
            padding: 25px;
            text-align: center;
            color: #929baa;
            font-size: 9px;
        }

        .gallery-grid {
            padding: 15px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .gallery-item {
            height: 125px;
            border-radius: 7px;
            overflow: hidden;
            position: relative;
            background: #e8edf5;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .gallery-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 8px;
            background: linear-gradient(
                transparent,
                rgba(0,0,0,.75)
            );
            color: white;
            font-size: 8px;
            padding-top: 22px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 1050px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .admin-layout {
                display: block;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .sidebar-menu {
                display: none;
            }

            .logout-area {
                display: none;
            }

            .topbar {
                padding: 0 15px;
            }

            .search-box {
                width: 180px;
            }

            .content {
                padding: 18px 15px 35px;
            }

            .welcome-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 9px;
            }

            .stat-card {
                padding: 13px;
            }

            .stat-number {
                font-size: 21px;
            }

            .admin-info {
                display: none;
            }

            .search-box {
                width: 150px;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="brand">

            <img
                src="{{ asset('images/admin/logo.png') }}"
                class="brand-logo"
                alt="Logo SMKN 4 Bogor"
            >

            <div class="brand-text">
                <h2>SMKN 4 Bogor</h2>
                <span>PANEL ADMIN</span>
            </div>

        </div>


        <div class="sidebar-menu">

            <div class="menu-title">
                Menu Utama
            </div>


            {{-- =========================
                 BERANDA
            ========================== --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >
                <span class="menu-icon">▦</span>
                <span>Beranda</span>
            </a>


            {{-- =========================
                 KELOLA PROFIL
            ========================== --}}
            <a
                href="{{ route('admin.profile') }}"
                class="menu-item {{ request()->routeIs('admin.profile*') ? 'active' : '' }}"
            >
                <span class="menu-icon">⌂</span>
                <span>Kelola Profil</span>
            </a>

            {{-- =========================
                 KELOLA ARTIKEL
            ========================== --}}
            <a
                href="{{ route('admin.artikel.index') }}"
                class="menu-item {{ request()->routeIs('admin.artikel*') ? 'active' : '' }}"
            >
                <span class="menu-icon">▤</span>
                <span>Kelola Artikel</span>
            </a>


            {{-- =========================
                 KELOLA PRODUK
            ========================== --}}
            <a
                href="{{ url('/admin/produk') }}"
                class="menu-item {{ request()->is('admin/produk*') ? 'active' : '' }}"
            >
                <span class="menu-icon">▣</span>
                <span>Kelola Produk</span>
            </a>


            {{-- =========================
                 KELOLA GALERI
            ========================== --}}
            <a
                href="{{ url('/admin/galeri') }}"
                class="menu-item {{ request()->is('admin/galeri*') ? 'active' : '' }}"
            >
                <span class="menu-icon">▧</span>
                <span>Kelola Galeri</span>
            </a>


            {{-- =========================
                 KELOLA PESAN
            ========================== --}}
            <a
                href="{{ route('admin.pesan') }}"
                class="menu-item {{ request()->routeIs('admin.pesan*') ? 'active' : '' }}"
            >
                <span class="menu-icon">✉</span>
                <span>Kelola Pesan</span>
            </a>


            {{-- =========================
                 KONTAK
            ========================== --}}
            <a
                href="{{ route('admin.kontak') }}"
                class="menu-item {{ request()->routeIs('admin.kontak*') ? 'active' : '' }}"
            >
                <span class="menu-icon">✉</span>
                <span>Kontak</span>
            </a>

        </div>


        {{-- =========================
             LOGOUT
        ========================== --}}
        <div class="logout-area">

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout"
                    style="
                        background:none;
                        border:none;
                        cursor:pointer;
                        width:100%;
                        text-align:left;
                    "
                >
                    <span>↪</span>
                    <span>Keluar</span>
                </button>

            </form>

        </div>

    </aside>


    {{-- =========================
         MAIN
    ========================== --}}
    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="search-box">

                <span>⌕</span>

                <input
                    type="text"
                    placeholder="Cari data siswa, artikel, berita..."
                >

            </div>


            <div class="admin-profile">

                <div class="admin-info">

                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

                <img
                    src="{{ asset('images/admin/logo.png') }}"
                    class="admin-avatar"
                    alt="Admin"
                >

            </div>

        </header>


        {{-- ISI HALAMAN --}}
        <div class="content">

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>