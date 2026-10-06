@extends('layouts.app')

@section('title', 'Berita & Informasi - SMKN 4 Bogor')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}
<section class="artikel-hero">

    <div class="artikel-container artikel-hero-inner">

        <span class="artikel-eyebrow">
            NEFOUR • SMKN 4 BOGOR
        </span>

        <h1>
            Berita & Informasi Nefour
        </h1>

        <p>
            Temukan berbagai berita dan informasi terbaru
            seputar SMKN 4 Bogor.
        </p>

    </div>

</section>


{{-- =========================================================
     DAFTAR ARTIKEL
========================================================= --}}
<section class="artikel-section">

    <div class="artikel-container">

        @if($artikels->count())

            <div class="artikel-heading">

                <div>
                    <span class="section-label">
                        INFORMASI TERBARU
                    </span>

                    <h2>
                        Artikel Terbaru
                    </h2>
                </div>

                <p>
                    Ikuti berbagai informasi dan kegiatan
                    terbaru dari SMKN 4 Bogor.
                </p>

            </div>


            <div class="artikel-grid">

                @foreach($artikels as $artikel)

                    <button
                        type="button"
                        class="artikel-card"
                        onclick="openArtikelModal({{ $artikel->id }})"
                    >

                        {{-- GAMBAR --}}
                        <div class="artikel-image">

                            @if($artikel->foto)

                                <img
                                    src="{{ asset($artikel->foto) }}"
                                    alt="{{ $artikel->judul }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="artikel-no-image">
                                    NEFOUR
                                </div>

                            @endif

                        </div>


                        {{-- ISI CARD --}}
                        <div class="artikel-card-content">

                            <div class="artikel-meta">

                                @if($artikel->kategori)

                                    <span class="artikel-category">
                                        {{ $artikel->kategori }}
                                    </span>

                                @endif

                                <span class="artikel-date">
                                    {{ $artikel->tanggal_publikasi?->format('d M Y') }}
                                </span>

                            </div>


                            <h3 class="artikel-title">
                                {{ $artikel->judul }}
                            </h3>


                            @if($artikel->ringkasan)

                                <p class="artikel-summary">
                                    {{ $artikel->ringkasan }}
                                </p>

                            @endif


                            <div class="artikel-read">
                                Baca artikel
                                <span>→</span>
                            </div>

                        </div>

                    </button>

                @endforeach

            </div>

        @else

            {{-- =================================================
                 EMPTY
            ================================================== --}}
            <div class="artikel-empty">

                <div class="artikel-empty-icon">
                    NEFOUR
                </div>

                <h2>
                    Belum Ada Artikel
                </h2>

                <p>
                    Artikel dan informasi sekolah belum tersedia.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
     ARTIKEL MODAL
========================================================= --}}
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

                {{-- FOTO --}}
                @if($artikel->foto)

                    <div class="artikel-modal-image">

                        <img
                            src="{{ asset($artikel->foto) }}"
                            alt="{{ $artikel->judul }}"
                        >

                    </div>

                @endif


                {{-- DETAIL --}}
                <div class="artikel-modal-body">

                    <div class="artikel-modal-meta">

                        @if($artikel->kategori)

                            <span class="artikel-category">
                                {{ $artikel->kategori }}
                            </span>

                        @endif

                        <span class="artikel-date">
                            {{ $artikel->tanggal_publikasi?->format('d M Y') }}
                        </span>

                    </div>


                    <h2>
                        {{ $artikel->judul }}
                    </h2>


                    @if($artikel->jurusan)

                        <div class="artikel-modal-jurusan">
                            {{ $artikel->jurusan->nama }}
                        </div>

                    @endif


                    @if($artikel->ringkasan)

                        <p class="artikel-modal-summary">
                            {{ $artikel->ringkasan }}
                        </p>

                    @endif


                    @if($artikel->isi)

                        <div class="artikel-modal-text">
                            {!! nl2br(e($artikel->isi)) !!}
                        </div>

                    @endif

                </div>

            </article>

        @endforeach

    </div>

</div>


<style>

/* =========================================================
   CONTAINER
========================================================= */

.artikel-container {
    width: min(1180px, calc(100% - 40px));
    margin: 0 auto;
}


/* =========================================================
   HERO
========================================================= */

.artikel-hero {
    min-height: 300px;

    display: flex;
    align-items: center;

    background: #073b7a;

    color: #fff;
}

.artikel-hero-inner {
    padding: 70px 0;
}

.artikel-eyebrow {
    display: inline-block;

    margin-bottom: 15px;

    font-size: 12px;
    font-weight: 700;

    letter-spacing: 2px;

    color: rgba(255,255,255,.75);
}

.artikel-hero h1 {
    margin: 0 0 14px;

    font-size: clamp(34px, 5vw, 52px);

    line-height: 1.1;

    font-weight: 800;

    color: #fff;
}

.artikel-hero p {
    max-width: 650px;

    margin: 0;

    font-size: 16px;

    line-height: 1.7;

    color: rgba(255,255,255,.82);
}


/* =========================================================
   SECTION
========================================================= */

.artikel-section {
    padding: 70px 0 90px;

    background: #f7f9fc;

    min-height: 500px;
}


/* =========================================================
   HEADING
========================================================= */

.artikel-heading {
    display: flex;

    align-items: flex-end;
    justify-content: space-between;

    gap: 30px;

    margin-bottom: 35px;
}

.section-label {
    display: inline-block;

    margin-bottom: 8px;

    color: #1d5d99;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 1.5px;
}

.artikel-heading h2 {
    margin: 0;

    color: #16263d;

    font-size: 32px;

    line-height: 1.2;
}

.artikel-heading p {
    max-width: 420px;

    margin: 0;

    color: #64748b;

    font-size: 14px;

    line-height: 1.7;

    text-align: right;
}


/* =========================================================
   GRID
========================================================= */

.artikel-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 25px;
}


/* =========================================================
   CARD
========================================================= */

.artikel-card {
    display: block;

    width: 100%;

    padding: 0;

    overflow: hidden;

    background: #fff;

    border: 1px solid #e5eaf0;

    border-radius: 18px;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, .06);

    text-align: left;

    font: inherit;

    cursor: pointer;

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.artikel-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 18px 40px rgba(15, 23, 42, .12);
}


/* =========================================================
   IMAGE
========================================================= */

.artikel-image {
    width: 100%;

    aspect-ratio: 16 / 10;

    overflow: hidden;

    background: #e8eef5;
}

.artikel-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform .45s ease;
}

.artikel-card:hover .artikel-image img {
    transform: scale(1.05);
}

.artikel-no-image {
    width: 100%;
    height: 100%;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #073b7a;

    background: #e8eef5;

    font-size: 14px;

    font-weight: 800;

    letter-spacing: 2px;
}


/* =========================================================
   CARD CONTENT
========================================================= */

.artikel-card-content {
    padding: 21px;
}

.artikel-meta {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 10px;

    margin-bottom: 14px;
}

.artikel-category {
    display: inline-block;

    padding: 6px 10px;

    border-radius: 999px;

    background: #eaf2fb;

    color: #1d5d99;

    font-size: 11px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .4px;
}

.artikel-date {
    flex-shrink: 0;

    color: #64748b;

    font-size: 12px;
}

.artikel-title {
    margin: 0 0 11px;

    color: #16263d;

    font-size: 20px;

    line-height: 1.4;
}

.artikel-summary {
    margin: 0 0 19px;

    color: #64748b;

    font-size: 14px;

    line-height: 1.7;

    display: -webkit-box;

    -webkit-line-clamp: 3;

    -webkit-box-orient: vertical;

    overflow: hidden;
}

.artikel-read {
    display: flex;

    align-items: center;

    justify-content: space-between;

    color: #073b7a;

    font-size: 14px;

    font-weight: 700;
}

.artikel-read span {
    font-size: 19px;

    transition: transform .2s ease;
}

.artikel-card:hover .artikel-read span {
    transform: translateX(4px);
}


/* =========================================================
   EMPTY
========================================================= */

.artikel-empty {
    padding: 85px 20px;

    text-align: center;

    background: #fff;

    border: 1px solid #e5eaf0;

    border-radius: 20px;
}

.artikel-empty-icon {
    margin-bottom: 15px;

    color: #073b7a;

    font-size: 14px;

    font-weight: 800;

    letter-spacing: 2px;
}

.artikel-empty h2 {
    margin: 0 0 8px;

    color: #16263d;

    font-size: 24px;
}

.artikel-empty p {
    margin: 0;

    color: #64748b;
}


/* =========================================================
   MODAL
========================================================= */

.artikel-modal {
    position: fixed;

    inset: 0;

    z-index: 9999;

    display: flex;

    align-items: center;
    justify-content: center;

    padding: 25px;

    background: rgba(3, 17, 35, .82);

    opacity: 0;

    visibility: hidden;

    pointer-events: none;

    transition:
        opacity .25s ease,
        visibility .25s ease;
}

.artikel-modal.active {
    opacity: 1;

    visibility: visible;

    pointer-events: auto;
}

.artikel-modal-box {
    position: relative;

    width: 100%;

    max-width: 850px;

    max-height: 90vh;

    overflow-y: auto;

    background: #fff;

    border-radius: 20px;

    box-shadow:
        0 25px 80px rgba(0,0,0,.3);
}

.artikel-modal-close {
    position: absolute;

    top: 15px;
    right: 15px;

    z-index: 5;

    width: 42px;
    height: 42px;

    border: none;

    border-radius: 50%;

    background: #fff;

    color: #073b7a;

    font-size: 28px;

    line-height: 1;

    cursor: pointer;

    box-shadow:
        0 4px 18px rgba(0,0,0,.15);

    transition: .2s ease;
}

.artikel-modal-close:hover {
    transform: rotate(90deg);
}

.artikel-modal-content {
    display: none;
}

.artikel-modal-content.active {
    display: block;
}

.artikel-modal-image {
    width: 100%;

    height: 380px;

    overflow: hidden;

    background: #e8eef5;
}

.artikel-modal-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}

.artikel-modal-body {
    padding: 30px;
}

.artikel-modal-meta {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-bottom: 15px;
}

.artikel-modal-body h2 {
    margin: 0 0 12px;

    color: #16263d;

    font-size: 32px;

    line-height: 1.25;
}

.artikel-modal-jurusan {
    display: inline-block;

    margin-bottom: 20px;

    color: #1d5d99;

    font-size: 13px;

    font-weight: 700;
}

.artikel-modal-summary {
    margin: 0 0 22px;

    padding-bottom: 20px;

    border-bottom: 1px solid #e5eaf0;

    color: #475569;

    font-size: 16px;

    font-weight: 600;

    line-height: 1.75;
}

.artikel-modal-text {
    color: #475569;

    font-size: 15px;

    line-height: 1.85;

    white-space: normal;
}


/* =========================================================
   SCROLLBAR MODAL
========================================================= */

.artikel-modal-box {
    scrollbar-width: none;
}

.artikel-modal-box::-webkit-scrollbar {
    display: none;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .artikel-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 700px) {

    .artikel-container {
        width: calc(100% - 30px);
    }

    .artikel-hero {
        min-height: 270px;
    }

    .artikel-hero-inner {
        padding: 60px 0;
    }

    .artikel-heading {
        display: block;

        margin-bottom: 28px;
    }

    .artikel-heading p {
        max-width: 100%;

        margin-top: 10px;

        text-align: left;
    }

    .artikel-grid {
        grid-template-columns: 1fr;

        gap: 18px;
    }

    .artikel-modal {
        padding: 14px;
    }

    .artikel-modal-box {
        max-height: 92vh;

        border-radius: 16px;
    }

    .artikel-modal-image {
        height: 230px;
    }

    .artikel-modal-body {
        padding: 23px 20px;
    }

    .artikel-modal-body h2 {
        font-size: 25px;
    }

}


@media (max-width: 480px) {

    .artikel-container {
        width: calc(100% - 24px);
    }

    .artikel-hero h1 {
        font-size: 34px;
    }

    .artikel-hero p {
        font-size: 14px;
    }

    .artikel-card-content {
        padding: 17px;
    }

    .artikel-title {
        font-size: 18px;
    }

    .artikel-modal-meta {
        align-items: flex-start;

        flex-wrap: wrap;
    }

}

</style>


<script>

/* =========================================================
   BUKA ARTIKEL
========================================================= */

function openArtikelModal(id) {

    const modal =
        document.getElementById('artikelModal');

    const articles =
        document.querySelectorAll(
            '.artikel-modal-content'
        );


    articles.forEach(article => {

        article.classList.remove('active');

    });


    const selectedArticle =
        document.getElementById(
            'artikel-modal-' + id
        );


    if (!selectedArticle) {
        return;
    }


    selectedArticle.classList.add('active');

    modal.classList.add('active');

    document.body.style.overflow = 'hidden';
}


/* =========================================================
   TUTUP ARTIKEL
========================================================= */

function closeArtikelModal(event) {

    if (
        event &&
        event.target !== event.currentTarget
    ) {
        return;
    }


    const modal =
        document.getElementById('artikelModal');


    modal.classList.remove('active');

    document.body.style.overflow = '';
}


/* =========================================================
   ESC
========================================================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Escape') {

            closeArtikelModal();

        }

    }
);

</script>

@endsection