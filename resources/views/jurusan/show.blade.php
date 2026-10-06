@extends('layouts.app')

@section('content')

@php
    $logoJurusan = match (strtolower(trim($jurusan->nama))) {
        'pplg',
        'pengembangan perangkat lunak dan gim',
        'pengembangan perangkat lunak dan game' => 'pplg.png',

        'tjkt',
        'teknik jaringan komputer dan telekomunikasi' => 'tkj.png',

        'tp',
        'tpfl',
        'teknik pengelasan dan fabrikasi logam' => 'tpfl.png',

        'to',
        'teknik otomotif',
        'teknik kendaraan ringan dan otomotif' => 'to.png',

        default => null,
    };

    $artikels = $jurusan->artikels ?? collect();
    $produks = $jurusan->produks ?? collect();
@endphp


<div class="jurusan-page">

    {{-- =========================================
         HERO
    ========================================== --}}
    <section class="jurusan-hero">

        <div class="jurusan-container jurusan-hero-inner">

            <div class="jurusan-hero-text">

                <span class="jurusan-label">
                    JURUSAN • NEFOUR
                </span>

                <h1>
                    {{ $jurusan->nama }}
                </h1>

                @if($jurusan->panjang)
                    <p class="jurusan-panjang">
                        {{ $jurusan->panjang }}
                    </p>
                @endif

                <p class="jurusan-hero-description">
                    {{ $jurusan->deskripsi ?? 'Kenali lebih dekat jurusan dan kompetensi yang ada di SMKN 4 Bogor.' }}
                </p>

            </div>


            @if($logoJurusan)
                <div class="jurusan-logo-wrap">

                    <div class="logo-decoration"></div>

                    <img
                        src="{{ asset('images/jurusan/' . $logoJurusan) }}"
                        alt="{{ $jurusan->nama }}"
                    >

                </div>
            @endif

        </div>

    </section>


    {{-- =========================================
         INTRO
    ========================================== --}}
    <section class="jurusan-intro">

        <div class="jurusan-container intro-inner">

            <div class="intro-heading">

                <span class="section-label">
                    TENTANG JURUSAN
                </span>

                <h2>
                    Belajar bukan hanya<br>
                    tentang teori.
                </h2>

            </div>


            <div class="intro-text">

                            <p>
                @php
                    $deskripsiJurusan = match (strtolower(trim($jurusan->nama))) {
                        'pplg',
                        'pengembangan perangkat lunak dan gim',
                        'pengembangan perangkat lunak dan game' =>
                            'Jurusan ini mempelajari berbagai proses dalam pengembangan perangkat lunak dan gim, mulai dari perancangan konsep, pemrograman, pembuatan aplikasi, hingga pengembangan produk digital. Siswa dibekali kemampuan berpikir logis, kreatif, dan problem solving untuk menghasilkan solusi teknologi yang sesuai dengan kebutuhan di dunia digital.',

                        'tjkt',
                        'teknik jaringan komputer dan telekomunikasi' =>
                            'Jurusan ini mempelajari teknologi jaringan komputer dan telekomunikasi, mulai dari instalasi, konfigurasi, pengelolaan, hingga pemeliharaan jaringan. Siswa dibekali kemampuan dalam membangun dan mengelola infrastruktur jaringan serta memahami teknologi komunikasi yang digunakan untuk mendukung kebutuhan teknologi informasi.',

                        'tp',
                        'tpfl',
                        'teknik pengelasan dan fabrikasi logam' =>
                            'Jurusan ini mempelajari berbagai teknik pengelasan dan proses fabrikasi logam, mulai dari persiapan material, penggunaan peralatan, teknik penyambungan, hingga pembuatan dan perakitan berbagai produk berbahan logam. Siswa dibekali keterampilan kerja yang mengutamakan ketelitian, keselamatan, dan kualitas sesuai kebutuhan dunia industri.',

                        'to',
                        'teknik otomotif',
                        'teknik kendaraan ringan dan otomotif' =>
                            'Jurusan ini mempelajari berbagai sistem dan teknologi pada kendaraan, mulai dari perawatan, pemeriksaan, perbaikan mesin, kelistrikan, hingga sistem pendukung kendaraan lainnya. Siswa dibekali keterampilan dalam melakukan perawatan dan perbaikan kendaraan dengan mengutamakan ketelitian, keselamatan kerja, serta mengikuti perkembangan teknologi otomotif.',

                        default =>
                            $jurusan->deskripsi ?? 'Jurusan ini menjadi salah satu bagian dari program keahlian di SMKN 4 Bogor yang dirancang untuk mengembangkan kemampuan siswa sesuai bidang keahliannya.',
                    };
                @endphp

                {{ $deskripsiJurusan }}
            </p>

                <div class="intro-line"></div>

            </div>

        </div>

    </section>


    {{-- =========================================
         KOMPETENSI
    ========================================== --}}
    @if(!empty($jurusan->kompetensi))

        <section class="kompetensi-section">

            <div class="jurusan-container">

                <div class="section-heading">

                    <span class="section-label">
                        YANG DIPELAJARI
                    </span>

                    <h2>
                        Kompetensi Keahlian
                    </h2>

                </div>


                <div class="kompetensi-list">

                    @foreach($jurusan->kompetensi as $index => $kompetensi)

                        <div class="kompetensi-item">

                            <span class="kompetensi-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span class="kompetensi-text">
                                {{ $kompetensi }}
                            </span>

                            <span class="kompetensi-arrow">
                                →
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================
         KEGIATAN / ARTIKEL
    ========================================== --}}
    @if($artikels->count())

        <section class="kegiatan-section">

            <div class="jurusan-container">

                <div class="kegiatan-heading">

                    <div>

                        <span class="section-label">
                            AKTIVITAS SISWA
                        </span>

                        <h2>
                            Kegiatan & Cerita
                        </h2>

                    </div>

                    <p>
                        Lihat berbagai kegiatan dan cerita siswa
                        {{ $jurusan->nama }} di Nefour.
                    </p>

                </div>


                <div class="artikel-scroll">

                    @foreach($artikels as $artikel)

                    <button
                        type="button"
                        class="artikel-card"
                        onclick="openArtikelModal({{ $artikel->id }})"
                    >

                        <div class="artikel-image">

                            @if($artikel->foto)

                                <img
                                    src="{{ asset($artikel->foto) }}"
                                    alt="{{ $artikel->judul }}"
                                >

                            @else

                                <div class="artikel-placeholder">
                                    NEFOUR
                                </div>

                            @endif

                        </div>


                        <div class="artikel-content">

                            <span>
                                {{ $artikel->created_at?->format('d M Y') }}
                            </span>

                            <h3>
                                {{ $artikel->judul }}
                            </h3>

                            <div class="artikel-link">
                                Baca artikel <span>→</span>
                            </div>

                        </div>

                    </button>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================
         PRODUK
    ========================================== --}}
    @if($produks->count())

        <section class="produk-section">

            <div class="jurusan-container">

                <div class="produk-heading">

                    <div>

                        <span class="section-label">
                            KARYA JURUSAN
                        </span>

                        <h2>
                            Produk & Karya Siswa
                        </h2>

                    </div>

                    <p>
                        Hasil karya dan produk yang dibuat
                        oleh siswa {{ $jurusan->nama }}.
                    </p>

                </div>


                <div class="produk-grid">

                    @foreach($produks as $produk)

                        <div class="produk-item">

                            <div class="produk-image">

                                @if($produk->foto)

                                    <img
                                        src="{{ asset('storage/' . $produk->foto) }}"
                                        alt="{{ $produk->nama }}"
                                    >

                                @else

                                    <div class="produk-placeholder">
                                        NEFOUR
                                    </div>

                                @endif

                            </div>


                            <div class="produk-info">

                                @if($produk->kategori)
                                    <span class="produk-category">
                                        {{ $produk->kategori }}
                                    </span>
                                @endif

                                <h3>
                                    {{ $produk->nama }}
                                </h3>

                                @if($produk->deskripsi)
                                    <p>
                                        {{ Str::limit($produk->deskripsi, 110) }}
                                    </p>
                                @endif


                                @if($produk->nomor_wa)

                                    <a
                                        href="{{ $produk->nomor_wa }}"
                                        target="_blank"
                                        rel="noopener"
                                        class="produk-button"
                                    >
                                        Hubungi Penjual
                                        <span>↗</span>
                                    </a>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================
         CTA
    ========================================== --}}
    <section class="jurusan-cta">

        <div class="jurusan-container">

            <span>
                NEFOUR • SMKN 4 BOGOR
            </span>

            <h2>
                Temukan potensi dan<br>
                bidang keahlianmu.
            </h2>

            <a href="{{ route('jurusan.index') }}">
                Lihat Jurusan Lain
                <span>→</span>
            </a>

        </div>

    </section>


    {{-- =========================================
         ARTIKEL MODAL
    ========================================== --}}
    <div
        id="artikelModal"
        class="artikel-modal"
        onclick="closeArtikelModal(event)"
    >

        <div
            class="artikel-modal-box"
            onclick="event.stopPropagation()"
        >

            <button
                type="button"
                class="artikel-modal-close"
                onclick="closeArtikelModal()"
                aria-label="Tutup"
            >
                ×
            </button>


            @foreach($artikels as $artikel)

                <article
                    class="artikel-modal-content"
                    id="artikel-modal-{{ $artikel->id }}"
                >

                    @if($artikel->foto)

                        <div class="artikel-modal-image">

                            <img
                                src="{{ asset($artikel->foto) }}"
                                alt="{{ $artikel->judul }}"
                            >

                        </div>

                    @endif


                    <div class="artikel-modal-body">

                        <span class="artikel-modal-date">
                            {{ $artikel->created_at?->format('d M Y') }}
                        </span>

                        <h2>
                            {{ $artikel->judul }}
                        </h2>

                        @if($artikel->jurusan)

                            <div class="artikel-modal-jurusan">
                                {{ $artikel->jurusan->nama }}
                            </div>

                        @endif


                        <div class="artikel-modal-text">
                            {!! nl2br(e($artikel->isi)) !!}
                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</div>


<style>

/* =========================================
   ARTIKEL MODAL
========================================= */

.artikel-card {
    border: 0;
    padding: 0;

    background: transparent;

    text-align: left;

    cursor: pointer;

    font-family: inherit;
}

.artikel-modal {
    position: fixed;

    inset: 0;

    z-index: 9999;

    display: none;

    align-items: center;
    justify-content: center;

    padding: 25px;

    background: rgba(7, 31, 58, .72);

    overflow-y: auto;
}

.artikel-modal.active {
    display: flex;
}

.artikel-modal-box {
    position: relative;

    width: min(850px, 100%);

    max-height: 90vh;

    overflow-y: auto;

    background: #ffffff;

    box-shadow: 0 25px 70px rgba(15, 23, 42, .25);

    animation: artikelModalIn .25s ease;
}

@keyframes artikelModalIn {

    from {
        opacity: 0;
        transform: translateY(15px) scale(.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}


.artikel-modal-close {
    position: absolute;

    top: 15px;
    right: 15px;

    z-index: 5;

    width: 38px;
    height: 38px;

    border: 0;

    border-radius: 50%;

    background: #ffffff;

    color: #0b1f3a;

    font-size: 25px;

    line-height: 1;

    cursor: pointer;

    box-shadow: 0 5px 20px rgba(15, 23, 42, .18);
}

.artikel-modal-close:hover {
    background: #eaf2ff;
    color: #2563eb;
}


/* CONTENT */

.artikel-modal-content {
    display: none;
}

.artikel-modal-content.active {
    display: block;
}


.artikel-modal-image {
    width: 100%;
    height: 350px;

    overflow: hidden;

    background: #eaf2ff;
}

.artikel-modal-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}


.artikel-modal-body {
    padding: 35px 40px 45px;
}

.artikel-modal-date {
    display: block;

    margin-bottom: 10px;

    color: #2563eb;

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1px;
}

.artikel-modal-body h2 {
    margin: 0;

    max-width: 720px;

    color: #0b1f3a;

    font-size: 34px;

    line-height: 1.25;

    font-weight: 800;
}

.artikel-modal-jurusan {
    display: inline-block;

    margin-top: 14px;

    padding: 6px 10px;

    background: #eaf2ff;

    color: #2563eb;

    font-size: 11px;

    font-weight: 800;
}

.artikel-modal-text {
    margin-top: 28px;

    color: #475569;

    font-size: 15px;

    line-height: 1.9;

    white-space: normal;
}


/* MOBILE */

@media (max-width: 650px) {

    .artikel-modal {
        padding: 12px;
    }

    .artikel-modal-box {
        max-height: 94vh;
    }

    .artikel-modal-image {
        height: 220px;
    }

    .artikel-modal-body {
        padding: 28px 22px 35px;
    }

    .artikel-modal-body h2 {
        font-size: 26px;
    }

    .artikel-modal-text {
        font-size: 14px;
        line-height: 1.8;
    }

}


/* =========================================
   BASE
========================================= */

.jurusan-page {
    background: #ffffff;
    color: #0f172a;
}

.jurusan-container {
    width: min(1120px, calc(100% - 40px));
    margin: 0 auto;
}

.section-label {
    display: block;
    margin-bottom: 11px;

    color: #2563eb;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
}


/* =========================================
   HERO
========================================= */

.jurusan-hero {
    position: relative;

    min-height: 430px;

    display: flex;
    align-items: center;

    overflow: hidden;

    background: #f5f8fc;
}

.jurusan-hero-inner {
    display: grid;

    grid-template-columns: 1fr 350px;

    align-items: center;

    gap: 80px;

    padding: 70px 0;
}

.jurusan-hero-text {
    max-width: 650px;
}

.jurusan-label {
    display: block;

    margin-bottom: 16px;

    color: #2563eb;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.jurusan-hero h1 {
    margin: 0;

    color: #0b1f3a;

    font-size: clamp(42px, 6vw, 65px);
    line-height: 1.02;

    font-weight: 850;

    letter-spacing: -2px;
}

.jurusan-panjang {
    margin: 14px 0 0;

    color: #2563eb;

    font-size: 15px;
    font-weight: 700;
}

.jurusan-hero-description {
    max-width: 590px;

    margin: 22px 0 0;

    color: #64748b;

    font-size: 15px;
    line-height: 1.8;
}


/* LOGO */

.jurusan-logo-wrap {
    position: relative;

    width: 300px;
    height: 300px;

    display: flex;
    align-items: center;
    justify-content: center;

    justify-self: center;
}

.jurusan-logo-wrap img {
    position: relative;

    width: 220px;
    height: 220px;

    object-fit: contain;

    z-index: 2;
}

.logo-decoration {
    position: absolute;

    width: 245px;
    height: 245px;

    border: 1px solid #bfdbfe;

    transform: rotate(8deg);
}

.logo-decoration::after {
    content: "";

    position: absolute;

    width: 55px;
    height: 55px;

    right: -20px;
    bottom: -20px;

    background: #2563eb;
}


/* =========================================
   INTRO
========================================= */

.jurusan-intro {
    padding: 95px 0;

    background: #ffffff;
}

.intro-inner {
    display: grid;

    grid-template-columns: .8fr 1.2fr;

    gap: 100px;

    align-items: end;
}

.intro-heading h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: clamp(30px, 4vw, 43px);

    line-height: 1.2;

    font-weight: 800;

    letter-spacing: -1px;
}

.intro-text {
    max-width: 620px;
}

.intro-text p {
    margin: 0;

    color: #64748b;

    font-size: 16px;
    line-height: 1.9;
}

.intro-line {
    width: 50px;
    height: 4px;

    margin-top: 25px;

    background: #2563eb;
}


/* =========================================
   KOMPETENSI
========================================= */

.kompetensi-section {
    padding: 90px 0 100px;

    background: #f8fafc;
}

.section-heading {
    margin-bottom: 35px;
}

.section-heading h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: 34px;

    font-weight: 800;
}

.kompetensi-list {
    border-top: 1px solid #dbe4ef;
}

.kompetensi-item {
    display: grid;

    grid-template-columns: 70px 1fr 30px;

    align-items: center;

    min-height: 82px;

    border-bottom: 1px solid #dbe4ef;

    transition: padding .2s ease;
}

.kompetensi-item:hover {
    padding-left: 8px;
}

.kompetensi-number {
    color: #2563eb;

    font-size: 12px;
    font-weight: 800;
}

.kompetensi-text {
    color: #0f172a;

    font-size: 16px;
    font-weight: 600;
}

.kompetensi-arrow {
    color: #94a3b8;

    font-size: 20px;

    text-align: right;
}


/* =========================================
   KEGIATAN
========================================= */

.kegiatan-section {
    padding: 95px 0;

    background: #ffffff;
}

.kegiatan-heading,
.produk-heading {
    display: flex;

    justify-content: space-between;
    align-items: end;

    gap: 50px;

    margin-bottom: 35px;
}

.kegiatan-heading h2,
.produk-heading h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: 34px;

    font-weight: 800;
}

.kegiatan-heading p,
.produk-heading p {
    max-width: 330px;

    margin: 0;

    color: #64748b;

    font-size: 14px;
    line-height: 1.7;
}


/* ARTICLE SCROLL */

.artikel-scroll {
    display: flex;

    gap: 22px;

    overflow-x: auto;

    padding: 10px 5px 25px 0;

    scrollbar-width: none;
    -ms-overflow-style: none;
}

.artikel-scroll::-webkit-scrollbar {
    display: none;
}

.artikel-card {
    flex: 0 0 310px;

    color: inherit;
    text-decoration: none;
}

.artikel-image {
    width: 100%;
    height: 205px;

    overflow: hidden;

    background: #eaf2ff;
}

.artikel-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform .4s ease;
}

.artikel-card:hover .artikel-image img {
    transform: scale(1.05);
}

.artikel-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #2563eb;

    font-size: 22px;
    font-weight: 900;
    letter-spacing: 2px;
}

.artikel-content {
    padding-top: 17px;
}

.artikel-content > span {
    color: #94a3b8;

    font-size: 11px;
    font-weight: 700;
}

.artikel-content h3 {
    margin: 8px 0 12px;

    color: #0f172a;

    font-size: 19px;
    line-height: 1.35;

    font-weight: 800;
}

.artikel-link {
    color: #2563eb;

    font-size: 13px;
    font-weight: 700;
}

.artikel-link span {
    margin-left: 5px;
}


/* =========================================
   PRODUK
========================================= */

.produk-section {
    padding: 95px 0 110px;

    background: #f8fafc;
}

.produk-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 25px;
}

.produk-item {
    background: #ffffff;

    overflow: hidden;
}

.produk-image {
    height: 235px;

    background: #eaf2ff;

    overflow: hidden;
}

.produk-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition: transform .4s ease;
}

.produk-item:hover .produk-image img {
    transform: scale(1.04);
}

.produk-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #2563eb;

    font-size: 22px;
    font-weight: 900;
}

.produk-info {
    padding: 22px;
}

.produk-category {
    color: #2563eb;

    font-size: 10px;
    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: 1.3px;
}

.produk-info h3 {
    margin: 7px 0 9px;

    color: #0f172a;

    font-size: 20px;
    font-weight: 800;
}

.produk-info p {
    margin: 0 0 17px;

    color: #64748b;

    font-size: 13px;
    line-height: 1.7;
}

.produk-button {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: #2563eb;

    font-size: 13px;
    font-weight: 800;

    text-decoration: none;
}

.produk-button:hover {
    color: #0b1f3a;
}


/* =========================================
   CTA
========================================= */

.jurusan-cta {
    padding: 85px 0;

    background: #073b7a;

    color: #ffffff;
}

.jurusan-cta span {
    font-size: 11px;

    font-weight: 800;

    letter-spacing: 2px;
}

.jurusan-cta h2 {
    margin: 13px 0 28px;

    font-size: clamp(32px, 5vw, 46px);

    line-height: 1.15;

    font-weight: 800;

    letter-spacing: -1px;
}

.jurusan-cta a {
    display: inline-flex;

    align-items: center;

    gap: 10px;

    padding: 12px 19px;

    background: #ffffff;

    color: #073b7a;

    text-decoration: none;

    font-size: 13px;

    font-weight: 800;
}

.jurusan-cta a:hover {
    background: #eaf2ff;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 900px) {

    .jurusan-hero-inner {
        grid-template-columns: 1fr;

        gap: 45px;

        padding: 60px 0;
    }

    .jurusan-logo-wrap {
        justify-self: start;

        width: 240px;
        height: 240px;
    }

    .jurusan-logo-wrap img {
        width: 175px;
        height: 175px;
    }

    .logo-decoration {
        width: 205px;
        height: 205px;
    }

    .intro-inner {
        grid-template-columns: 1fr;

        gap: 35px;
    }

    .produk-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


@media (max-width: 650px) {

    .jurusan-container {
        width: min(100% - 30px, 600px);
    }

    .jurusan-hero {
        min-height: auto;
    }

    .jurusan-hero-inner {
        padding: 55px 0 65px;
    }

    .jurusan-hero h1 {
        font-size: 42px;
    }

    .jurusan-logo-wrap {
        width: 200px;
        height: 200px;
    }

    .jurusan-logo-wrap img {
        width: 145px;
        height: 145px;
    }

    .logo-decoration {
        width: 170px;
        height: 170px;
    }

    .jurusan-intro,
    .kompetensi-section,
    .kegiatan-section,
    .produk-section {
        padding: 65px 0 75px;
    }

    .intro-heading h2 {
        font-size: 31px;
    }

    .section-heading h2,
    .kegiatan-heading h2,
    .produk-heading h2 {
        font-size: 29px;
    }

    .kegiatan-heading,
    .produk-heading {
        display: block;
    }

    .kegiatan-heading p,
    .produk-heading p {
        margin-top: 12px;
    }

    .kompetensi-item {
        grid-template-columns: 48px 1fr 20px;

        min-height: 72px;
    }

    .kompetensi-text {
        font-size: 14px;
        line-height: 1.5;
    }

    .produk-grid {
        grid-template-columns: 1fr;
    }

    .artikel-card {
        flex-basis: 280px;
    }

    .artikel-image {
        height: 185px;
    }

    .jurusan-cta {
        padding: 65px 0;
    }

}

</style>


<script>

function openArtikelModal(id) {

    const modal = document.getElementById('artikelModal');

    const articles = document.querySelectorAll('.artikel-modal-content');

    articles.forEach(article => {
        article.classList.remove('active');
    });


    const selectedArticle = document.getElementById(
        'artikel-modal-' + id
    );

    if (!selectedArticle) return;


    selectedArticle.classList.add('active');

    modal.classList.add('active');

    document.body.style.overflow = 'hidden';
}


function closeArtikelModal(event) {

    if (event && event.target !== event.currentTarget) {
        return;
    }

    const modal = document.getElementById('artikelModal');

    modal.classList.remove('active');

    document.body.style.overflow = '';
}


/* Tutup dengan tombol ESC */

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {
        closeArtikelModal();
    }

});

</script>

@endsection