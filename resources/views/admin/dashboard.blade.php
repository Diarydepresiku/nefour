@extends('layouts.admin')

@section('title', 'Dashboard Admin - SMKN 4 Bogor')

@section('content')

{{-- =========================
     WELCOME
========================= --}}
<section class="welcome-banner">

    <div class="welcome-text">

        <small>
            Panel Admin SMKN 4 Bogor
        </small>

        <h1>
            Selamat Datang, {{ Auth::user()->name }}!
        </h1>

        <p>
            Kelola informasi sekolah, artikel, jurusan,
            produk, galeri, dan pesan dari pengunjung
            melalui satu panel administrasi.
        </p>

    </div>

</section>


{{-- =========================
     STATISTICS
========================= --}}
<section class="stats">

    {{-- ARTIKEL --}}
    <div class="stat-card">

        <div class="stat-top">

            <span class="stat-title">
                Artikel
            </span>

            <div class="stat-icon">
                ▤
            </div>

        </div>

        <div class="stat-number">
            {{ $jumlahArtikel }}
        </div>

        <div class="stat-note">
            Total artikel sekolah
        </div>

    </div>


    {{-- PRODUK --}}
    <div class="stat-card">

        <div class="stat-top">

            <span class="stat-title">
                Produk
            </span>

            <div class="stat-icon">
                ▣
            </div>

        </div>

        <div class="stat-number">
            {{ $jumlahProduk }}
        </div>

        <div class="stat-note">
            Produk siswa
        </div>

    </div>


    {{-- GALERI --}}
    <div class="stat-card">

        <div class="stat-top">

            <span class="stat-title">
                Galeri
            </span>

            <div class="stat-icon">
                ▧
            </div>

        </div>

        <div class="stat-number">
            {{ $jumlahGaleri }}
        </div>

        <div class="stat-note">
            Foto kegiatan
        </div>

    </div>


    {{-- PESAN KONTAK --}}
    <div class="stat-card">

        <div class="stat-top">

            <span class="stat-title">
                Pesan Kontak
            </span>

            <div class="stat-icon">
                ✉
            </div>

        </div>

        {{-- TOTAL SEMUA PESAN --}}
        <div
            class="stat-number"
            id="jumlahPesan"
        >
            {{ $jumlahPesan }}
        </div>

        {{-- PESAN BELUM DIBACA --}}
        <div
            class="stat-note {{ $pesanBelumDibaca > 0 ? 'danger' : '' }}"
            id="pesanBelumDibaca"
        >

            <span id="angkaPesanBelumDibaca">
                {{ $pesanBelumDibaca }}
            </span>

            pesan belum dibaca

        </div>

    </div>

</section>


{{-- =========================
     ARTICLE + QUICK ACTION
========================= --}}
<section class="dashboard-grid">

    {{-- ARTIKEL TERBARU --}}
    <div class="panel">

        <div class="panel-header">

            <div>

                <h3>
                    Artikel Terbaru
                </h3>

                <p>
                    Daftar artikel yang baru diterbitkan
                </p>

            </div>

            <a
                href="{{ url('/admin/artikel') }}"
                class="panel-link"
            >
                Lihat Semua →
            </a>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            Judul Artikel
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($artikelTerbaru as $artikel)

                        <tr>

                            <td class="title">
                                {{ $artikel->judul }}
                            </td>

                            <td>

                                <span class="badge">
                                    {{ $artikel->kategori ?? 'Umum' }}
                                </span>

                            </td>

                            <td>

                                {{ $artikel->tanggal_publikasi
                                    ? $artikel->tanggal_publikasi->format('d M Y')
                                    : '-' }}

                            </td>

                            <td>

                                <a
                                    href="{{ url('/admin/artikel') }}"
                                    class="action"
                                >
                                    👁
                                </a>

                                <a
                                    href="{{ url('/admin/artikel') }}"
                                    class="action"
                                >
                                    ✎
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">
                                Belum ada artikel.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- QUICK ACTION --}}
    <div class="panel">

        <div class="panel-header">

            <div>

                <h3>
                    Akses Cepat
                </h3>

                <p>
                    Kelola konten sekolah
                </p>

            </div>

        </div>


        <div class="quick-grid">

            {{-- PROFIL --}}
            <a
                href="{{ url('/admin/profile') }}"
                class="quick-item"
            >

                <div class="quick-icon">
                    ⌂
                </div>

                <strong>
                    Profil
                </strong>

                <span>
                    Visi, Misi, Sejarah
                </span>

            </a>


            
            {{-- ARTIKEL --}}
            <a
                href="{{ url('/admin/artikel') }}"
                class="quick-item"
            >

                <div class="quick-icon">
                    ▤
                </div>

                <strong>
                    Artikel
                </strong>

                <span>
                    Berita Sekolah
                </span>

            </a>


            {{-- PRODUK --}}
            <a
                href="{{ url('/admin/produk') }}"
                class="quick-item"
            >

                <div class="quick-icon">
                    ▣
                </div>

                <strong>
                    Produk
                </strong>

                <span>
                    Produk Siswa
                </span>

            </a>


            {{-- GALERI --}}
            <a
                href="{{ url('/admin/galeri') }}"
                class="quick-item"
            >

                <div class="quick-icon">
                    ▧
                </div>

                <strong>
                    Galeri
                </strong>

                <span>
                    Foto Kegiatan
                </span>

            </a>


            {{-- KONTAK --}}
            <a
                href="{{ url('/admin/kontak') }}"
                class="quick-item"
            >

                <div class="quick-icon">
                    ✉
                </div>

                <strong>
                    Kontak
                </strong>

                <span>
                    Alamat, Telepon, Email
                </span>

            </a>

        </div>

    </div>

</section>


{{-- =========================
     PESAN KONTAK TERBARU
========================= --}}
<section
    class="panel"
    style="margin-top:16px;"
>

    <div class="panel-header">

        <div>

            <h3>
                Pesan Kontak Terbaru
            </h3>

            <p>
                Pesan yang dikirim melalui halaman kontak
            </p>

        </div>

        <a
            href="{{ route('admin.pesan') }}"
            class="panel-link"
        >
            Kelola Pesan →
        </a>

    </div>


    <div class="message-list">

        @forelse($pesanTerbaru as $pesan)

            <a
                href="{{ route('admin.pesan') }}"
                class="message-item"
            >

                <div class="message-main">

                    <div class="message-name">
                        {{ $pesan->nama }}
                    </div>

                    <div class="message-subject">
                        {{ $pesan->subjek ?? 'Tanpa subjek' }}
                    </div>

                    <div class="message-time">
                        {{ $pesan->created_at->format('d M Y, H:i') }}
                    </div>

                </div>


                @if(!$pesan->sudah_dibaca)

                    <span class="message-status new">
                        Baru
                    </span>

                @else

                    <span class="message-status read">
                        Dibaca
                    </span>

                @endif

            </a>

        @empty

            <div class="empty-message">
                Belum ada pesan dari pengunjung.
            </div>

        @endforelse

    </div>

</section>


{{-- =========================
     GALERI TERBARU
========================= --}}
<section
    class="panel"
    style="margin-top:16px;"
>

    <div class="panel-header">

        <div>

            <h3>
                Galeri Terbaru
            </h3>

            <p>
                Dokumentasi kegiatan sekolah
            </p>

        </div>

        <a
            href="{{ url('/admin/galeri') }}"
            class="panel-link"
        >
            Kelola Galeri →
        </a>

    </div>


    <div class="gallery-grid">

        @forelse($galeriTerbaru as $galeri)

            <div class="gallery-item">

                <img
                    src="{{ asset($galeri->gambar) }}"
                    alt="{{ $galeri->judul }}"
                    loading="lazy"
                >
            
                <div class="gallery-title">
                    {{ $galeri->judul }}
                </div>

            </div>

        @empty

            <div class="empty-message">
                Belum ada galeri.
            </div>

        @endforelse

    </div>

</section>


{{-- =========================
     UPDATE JUMLAH PESAN
========================= --}}
<script>

    function updatePesanBelumDibaca(jumlah) {

        const angka =
            document.getElementById(
                'angkaPesanBelumDibaca'
            );

        const note =
            document.getElementById(
                'pesanBelumDibaca'
            );


        if (angka) {

            angka.textContent = jumlah;

        }


        if (note) {

            if (jumlah > 0) {

                note.classList.add('danger');

            } else {

                note.classList.remove('danger');

            }

        }

    }


    // Ambil jumlah terakhir dari localStorage
    // saat dashboard pertama kali dibuka

    document.addEventListener(
        'DOMContentLoaded',
        function() {

            const saved =
                localStorage.getItem(
                    'pesanBelumDibaca'
                );


            if (saved !== null) {

                updatePesanBelumDibaca(
                    parseInt(saved) || 0
                );

            }

        }
    );


    // Update dashboard jika localStorage
    // berubah dari tab/browser lain

    window.addEventListener(
        'storage',
        function(event) {

            if (
                event.key ===
                'pesanBelumDibaca'
            ) {

                updatePesanBelumDibaca(
                    parseInt(event.newValue) || 0
                );

            }

        }
    );

</script>

@endsection