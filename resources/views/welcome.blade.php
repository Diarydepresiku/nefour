@extends('layouts.app')

@section('title', 'NEFOUR • SMKN 4 Bogor')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .home-page {
        background: #ffffff;
        color: #102a43;
        min-height: 100vh;
        overflow: hidden;
    }

    .home-container {
        width: min(1120px, calc(100% - 40px));
        margin: auto;
    }


    /* =================================
       HERO
    ================================= */

    .home-hero {
        background: #f5f9ff;
        padding: 82px 0 70px;
        text-align: center;
    }

    .hero-container {
        width: min(900px, calc(100% - 40px));
        margin: auto;
    }

    .hero-label {
        display: inline-block;

        margin-bottom: 14px;

        color: #0b5ed7;

        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .hero-content h1 {
        margin: 0;

        color: #102a43;

        font-size: 52px;
        line-height: 1.08;
        font-weight: 900;
        letter-spacing: -1.5px;
    }

    .hero-content h1 span {
        color: #0b5ed7;
    }

    .hero-content p {
        max-width: 620px;

        margin: 18px auto 25px;

        color: #62758a;

        font-size: 14px;
        line-height: 1.8;
    }

    .hero-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        flex-wrap: wrap;
    }

    .hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 10px 18px;

        border-radius: 6px;

        text-decoration: none;

        font-size: 12px;
        font-weight: 800;

        transition: .2s ease;
    }

    .hero-btn-primary {
        background: #0b5ed7;
        color: #ffffff;
    }

    .hero-btn-primary:hover {
        background: #084db3;
        transform: translateY(-2px);
    }

    .hero-btn-secondary {
        background: #ffffff;
        color: #0b5ed7;

        border: 1px solid #b9cfea;
    }

    .hero-btn-secondary:hover {
        border-color: #0b5ed7;
        transform: translateY(-2px);
    }


    /* =================================
       JURUSAN
    ================================= */

    .major-section {
        padding: 0 0 75px;
        background: #f5f9ff;
    }

    .major-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    .major-card {
        min-height: 92px;

        display: flex;
        align-items: center;
        gap: 12px;

        padding: 14px;

        background: #ffffff;

        border: 1px solid #e4edf7;
        border-radius: 7px;

        text-decoration: none;

        box-shadow: 0 5px 15px rgba(16, 42, 67, .04);

        transition: .2s ease;
    }

    .major-card:hover {
        transform: translateY(-3px);
        border-color: #b8d2f5;
        box-shadow: 0 10px 22px rgba(11, 94, 215, .08);
    }

    .major-logo {
        width: 50px;
        height: 50px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .major-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .major-info {
        min-width: 0;
    }

    .major-info h3 {
        margin: 0 0 5px;

        color: #102a43;

        font-size: 12px;
        line-height: 1.3;
        font-weight: 900;
    }

    .major-info p {
        margin: 0;

        color: #718399;

        font-size: 9px;
        line-height: 1.45;
    }


    /* =================================
       GENERAL SECTION
    ================================= */

    .home-section {
        padding: 85px 0;
    }

    .section-label {
        display: inline-block;

        margin-bottom: 7px;

        color: #0b5ed7;

        font-size: 10px;
        font-weight: 900;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .section-heading {
        margin-bottom: 28px;
    }

    .section-heading h2 {
        margin: 0;

        color: #102a43;

        font-size: 31px;
        line-height: 1.2;
        font-weight: 900;
        letter-spacing: -.6px;
    }

    .section-heading p {
        max-width: 580px;

        margin: 10px 0 0;

        color: #718399;

        font-size: 13px;
        line-height: 1.7;
    }


    /* =================================
       TENTANG
    ================================= */

    .about-section {
        background: #ffffff;
    }

    .about-grid {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 75px;

        align-items: center;
    }

    .about-text {
        order: 1;
    }

    .about-text h2 {
        margin: 0 0 16px;

        color: #102a43;

        font-size: 32px;
        line-height: 1.18;
        font-weight: 900;
        letter-spacing: -.6px;
    }

    .about-text p {
        margin: 0 0 13px;

        color: #66798e;

        font-size: 13px;
        line-height: 1.8;
    }

    .about-button {
        display: inline-flex;

        margin-top: 7px;

        padding: 10px 16px;

        background: #0b5ed7;
        color: #ffffff;

        border-radius: 6px;

        text-decoration: none;

        font-size: 11px;
        font-weight: 800;

        transition: .2s ease;
    }

    .about-button:hover {
        background: #084db3;
        transform: translateY(-2px);
    }


    /* FOTO TENTANG */

    .about-visual {
        position: relative;

        min-height: 390px;
        order: 2;
    }

    .about-photo-main {
        position: absolute;

        top: 0;
        right: 70px;

        width: 245px;
        height: 285px;

        overflow: hidden;

        border-radius: 28px 28px 28px 5px;

        box-shadow: 0 15px 35px rgba(16, 42, 67, .12);
    }

    .about-photo-main img {
        width: 100%;
        height: 100%;

        object-fit: cover;
    }

    .about-photo-small {
        position: absolute;

        right: 0;
        bottom: 20px;

        width: 190px;
        height: 190px;

        overflow: hidden;

        border-radius: 8px 30px 30px 30px;

        border: 7px solid #ffffff;

        box-shadow: 0 15px 35px rgba(16, 42, 67, .13);
    }

    .about-photo-small img {
        width: 100%;
        height: 100%;

        object-fit: cover;
    }

    .about-shape {
        position: absolute;

        left: 35px;
        bottom: 28px;

        width: 105px;
        height: 105px;

        background: #0b5ed7;

        border-radius: 50% 10px 50% 50%;

        opacity: .08;
    }


    /* =================================
       BERITA
    ================================= */

    .news-section {
        background: #f5f9ff;
    }

    .horizontal-wrap {
        width: 100%;
    }

    .horizontal-scroll {
        display: flex;
        gap: 16px;

        overflow-x: auto;
        overflow-y: hidden;

        padding: 4px 2px 10px;

        scroll-behavior: smooth;

        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .horizontal-scroll::-webkit-scrollbar {
        display: none;
    }

    .article-card {
        flex: 0 0 300px;

        overflow: hidden;

        background: #ffffff;

        border: 1px solid #e2ebf5;
        border-radius: 8px;

        box-shadow: 0 5px 18px rgba(16, 42, 67, .04);
    }

    .article-image {
        height: 175px;

        overflow: hidden;

        background: #e8f0f8;
    }

    .article-image img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        transition: .3s ease;
    }

    .article-card:hover .article-image img {
        transform: scale(1.04);
    }

    .article-body {
        padding: 17px;
    }

    .article-category {
        color: #0b5ed7;

        font-size: 9px;
        font-weight: 900;
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .article-body h3 {
        margin: 7px 0 8px;

        color: #102a43;

        font-size: 15px;
        line-height: 1.4;
        font-weight: 900;
    }

    .article-body p {
        margin: 0;

        color: #718399;

        font-size: 11px;
        line-height: 1.6;
    }

    .article-link {
        display: inline-block;

        margin-top: 13px;

        color: #0b5ed7;

        text-decoration: none;

        font-size: 11px;
        font-weight: 900;
    }


    /* =================================
       GALERI
    ================================= */

    /* =========================
       GALERI
    ========================= */

    .gallery-card {
        flex: 0 0 280px;

        height: 210px;
        overflow: hidden;

        border-radius: 16px;

        background: #e2e8f0;

        position: relative;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;

        transition: .3s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.06);
    }

    .gallery-overlay {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;

        padding: 35px 16px 14px;

        background: linear-gradient(
            to top,
            rgba(2, 6, 23, .75),
            transparent
        );

        color: white;

        font-size: 13px;
        font-weight: 700;
    }



    /* =================================
       SECTION BUTTON
    ================================= */

    .section-action {
        margin-top: 22px;
    }

    .outline-btn {
        display: inline-flex;

        padding: 9px 15px;

        border: 1px solid #b9cfea;
        border-radius: 6px;

        background: #ffffff;
        color: #0b5ed7;

        text-decoration: none;

        font-size: 11px;
        font-weight: 800;

        transition: .2s ease;
    }

    .outline-btn:hover {
        background: #0b5ed7;
        border-color: #0b5ed7;
        color: #ffffff;
    }


    /* =================================
       CTA
    ================================= */

    .home-cta {
        padding: 70px 20px;

        background: #0b3d91;

        color: #ffffff;

        text-align: center;
    }

    .home-cta h2 {
        margin: 0 0 12px;

        font-size: 31px;
        line-height: 1.2;
        font-weight: 900;
    }

    .home-cta p {
        max-width: 570px;

        margin: 0 auto 22px;

        color: #dbeafe;

        font-size: 13px;
        line-height: 1.7;
    }

    .cta-btn {
        display: inline-flex;

        padding: 10px 19px;

        background: #ffffff;
        color: #0b3d91;

        border-radius: 6px;

        text-decoration: none;

        font-size: 11px;
        font-weight: 900;

        transition: .2s ease;
    }

    .cta-btn:hover {
        transform: translateY(-2px);
    }


    /* =================================
       RESPONSIVE
    ================================= */

    @media (max-width: 900px) {

        .hero-content h1 {
            font-size: 45px;
        }

        .major-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .about-grid {
            grid-template-columns: 1fr;
            gap: 45px;
        }

        .about-text {
            order: 1;
        }

        .about-visual {
            order: 2;
            max-width: 550px;
            width: 100%;
            margin: auto;
        }
    }


    @media (max-width: 600px) {

        .home-container {
            width: min(100% - 30px, 1120px);
        }

        .hero-container {
            width: min(100% - 30px, 900px);
        }

        .home-hero {
            padding: 65px 0 55px;
        }

        .hero-content h1 {
            font-size: 37px;
        }

        .hero-content p {
            font-size: 13px;
        }

        .major-section {
            padding-bottom: 55px;
        }

        .major-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .major-card {
            min-height: 82px;
            padding: 10px;
            gap: 8px;
        }

        .major-logo {
            width: 42px;
            height: 42px;
        }

        .major-info h3 {
            font-size: 10px;
        }

        .major-info p {
            display: none;
        }

        .home-section {
            padding: 60px 0;
        }

        .section-heading h2 {
            font-size: 27px;
        }

        .about-text h2 {
            font-size: 28px;
        }

        .about-visual {
            min-height: 340px;
        }

        .about-photo-main {
            right: 45px;

            width: 205px;
            height: 250px;
        }

        .about-photo-small {
            width: 155px;
            height: 155px;

            right: 0;
            bottom: 15px;
        }

        .about-shape {
            left: 10px;
            bottom: 20px;

            width: 80px;
            height: 80px;
        }

        .article-card {
            flex-basis: 275px;
        }

        .gallery-card {
            flex-basis: 235px;
            height: 175px;
        }

        .home-cta {
            padding: 58px 20px;
        }

        .home-cta h2 {
            font-size: 27px;
        }
    }
</style>


<div class="home-page">


    {{-- =================================
         HERO
    ================================= --}}

    <section class="home-hero">

        <div class="hero-container">

            <div class="hero-content">

                <div class="hero-label">
                    SELAMAT DATANG DI NEFOUR
                </div>

                <h1>
                    SMK Negeri 4 Bogor
                    <span>untuk Generasi Hebat</span>
                </h1>

                <p>
                    Mewujudkan generasi yang unggul, berkarakter,
                    kompeten, dan siap berkembang melalui pendidikan
                    kejuruan yang berkualitas.
                </p>

                <div class="hero-buttons">

                    <a
                        href="{{ route('profile.index') }}"
                        class="hero-btn hero-btn-primary">
                        Tentang Kami
                    </a>

                    <a
                        href="{{ route('galeri.index') }}"
                        class="hero-btn hero-btn-secondary">
                        Lihat Galeri
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =================================
         JURUSAN
    ================================= --}}

    @if(isset($jurusans) && $jurusans->count())

        <section class="major-section">

            <div class="home-container">

                <div class="major-grid">

                    @foreach($jurusans->take(4) as $jurusan)

                        <a
                            href="{{ route('jurusan.show', $jurusan->slug) }}"
                            class="major-card">

                            <div class="major-logo">

                            @php
                            $logoJurusan = match (strtolower($jurusan->nama)) {
                                'pplg', 'pengembangan perangkat lunak dan gim' => 'pplg.png',
                                'tjkt', 'teknik jaringan komputer dan telekomunikasi' => 'tkj.png',
                                'tpfl', 'teknik pengelasan dan fabrikasi logam' => 'tpfl.png',
                                'to', 'teknik kendaraan ringan dan otomotif' => 'to.png',
                                default => null,
                            };
                        @endphp

                        @if($logoJurusan)
                            <img
                                src="{{ asset('images/jurusan/' . $logoJurusan) }}"
                                alt="{{ $jurusan->nama }}">
                        @endif
                            </div>

                            <div class="major-info">

                                <h3>
                                    {{ $jurusan->nama }}
                                </h3>

                                <p>
                                    {{ $jurusan->deskripsi
                                        ? Str::limit($jurusan->deskripsi, 65)
                                        : 'Program keahlian SMKN 4 Bogor.' }}
                                </p>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =================================
         TENTANG
    ================================= --}}

    <section class="home-section about-section">

        <div class="home-container">

            <div class="about-grid">

                <div class="about-text">

                    <div class="section-label">
                        Tentang Kami
                    </div>

                    <h2>
                        SMKN 4 Bogor
                    </h2>

                    <p>
                        SMKN 4 Bogor merupakan sekolah menengah
                        kejuruan yang berorientasi pada pengembangan
                        kompetensi siswa melalui pendidikan vokasi.
                    </p>

                    <p>
                        Nefour menjadi ruang bagi siswa untuk belajar,
                        berkarya, berkolaborasi, dan mengembangkan
                        kemampuan sesuai bidang keahlian masing-masing.
                    </p>

                    <a
                        href="{{ route('profile.index') }}"
                        class="about-button">
                        Selengkapnya
                    </a>

                </div>


                <div class="about-visual">

                    <div class="about-shape"></div>

                    <div class="about-photo-main">
                        <img
                        src="{{ asset('images/lapagan aula.jpg') }}"
                        alt="NEFOUR">

                    </div>

                    <div class="about-photo-small">

                         <img
                        src="{{ asset('images/smkn lapangan.jpg') }}"
                        alt="NEFOUR">

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =================================
         BERITA
    ================================= --}}

    @if(isset($artikels) && $artikels->count())

        <section class="home-section news-section">

            <div class="home-container">

                <div class="section-heading">

                    <div class="section-label">
                        Berita
                    </div>

                    <h2>
                        Berita SMKN 4 Bogor
                    </h2>

                    <p>
                        Informasi terbaru mengenai kegiatan,
                        prestasi, dan berbagai aktivitas Nefour.
                    </p>

                </div>


                <div class="horizontal-wrap">

                    <div class="horizontal-scroll">

                        @foreach($artikels->take(8) as $artikel)

                            <article class="article-card">

                                <div class="article-image">

                                    <img
                                        src="{{ $artikel->foto ?: 'https://picsum.photos/seed/artikel'.$artikel->id.'/800/500' }}"
                                        alt="{{ $artikel->judul }}">

                                </div>


                                <div class="article-body">

                                    <div class="article-category">
                                        {{ $artikel->kategori ?: 'Berita Nefour' }}
                                    </div>

                                    <h3>
                                        {{ $artikel->judul }}
                                    </h3>

                                    <p>
                                        {{ Str::limit(
                                            $artikel->ringkasan ?: $artikel->isi,
                                            100
                                        ) }}
                                    </p>

                                    <a
                                        href="{{ route('artikel.show', $artikel->slug) }}"
                                        class="article-link">
                                        Baca Selengkapnya →
                                    </a>

                                </div>

                            </article>

                        @endforeach

                    </div>

                </div>


                <div class="section-action">

                    <a
                        href="{{ route('artikel.index') }}"
                        class="outline-btn">
                        Lihat Semua Berita
                    </a>

                </div>

            </div>

        </section>

    @endif


    {{-- =================================
         GALERI
    ================================= --}}

    @if(isset($galeris) && $galeris->count())

        <section class="home-section gallery-section">

            <div class="home-container">

                <div class="section-heading">

                    <div class="section-label">
                        Galeri
                    </div>

                    <h2>
                        Dokumentasi Nefour
                    </h2>

                    <p>
                        Berbagai dokumentasi kegiatan dan aktivitas
                        warga SMKN 4 Bogor.
                    </p>

                </div>


                <div class="horizontal-wrap">

                    <div class="horizontal-scroll">

                        @foreach($galeris->take(10) as $galeri)

                            <a
                                href="{{ route('galeri.index') }}"
                                class="gallery-card">

                                <img
                                    src="{{ asset($galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}">

                                <div class="gallery-overlay">
                                    {{ $galeri->judul }}
                                </div>

                            </a>

                        @endforeach

                    </div>

                </div>


                <div class="section-action">

                    <a
                        href="{{ route('galeri.index') }}"
                        class="outline-btn">
                        Lihat Semua Galeri
                    </a>

                </div>

            </div>

        </section>

    @endif


    {{-- =================================
         CTA
    ================================= --}}

    <section class="home-cta">

        <h2>
            Kenal Nefour Lebih Dekat
        </h2>

        <p>
            Temukan informasi sekolah, program keahlian,
            berita, kegiatan, galeri, dan berbagai karya
            siswa SMKN 4 Bogor.
        </p>

        <a
            href="{{ route('kontak.index') }}"
            class="cta-btn">
            Hubungi Kami
        </a>

    </section>


</div>

@endsection