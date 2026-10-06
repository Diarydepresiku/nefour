@extends('layouts.app')

@section('content')

<section class="gallery-hero">
    <div class="gallery-hero-overlay">
        <div class="gallery-container">

            <span class="gallery-eyebrow">
                DOKUMENTASI SEKOLAH
            </span>

            <h1>
                Galeri SMKN 4 Bogor
            </h1>

            <p>
                Dokumentasi kegiatan, pembelajaran, prestasi, event,
                dan berbagai aktivitas di SMKN 4 Bogor.
            </p>

        </div>
    </div>
</section>


<section class="gallery-section">

    <div class="gallery-container">

        {{-- FILTER KATEGORI --}}
        <div class="gallery-filter">

            <a
                href="{{ route('galeri.index') }}"
                class="gallery-filter-btn {{ !request('kategori') ? 'active' : '' }}"
            >
                Semua
            </a>

            @php
                $kategoriList = $galeris
                    ->pluck('kategori')
                    ->filter()
                    ->unique()
                    ->values();
            @endphp

            @foreach ($kategoriList as $kategori)

                <a
                    href="{{ route('galeri.index', ['kategori' => $kategori]) }}"
                    class="gallery-filter-btn {{ request('kategori') === $kategori ? 'active' : '' }}"
                >
                    {{ $kategori }}
                </a>

            @endforeach

        </div>


        {{-- GRID GALERI --}}
        @if ($galeris->count())

            <div class="gallery-grid">

                @foreach ($galeris as $galeri)

                    <article
                        class="gallery-card"
                        onclick="openGallery(
                            '{{ asset($galeri->gambar) }}',
                            '{{ addslashes($galeri->judul) }}',
                            '{{ addslashes($galeri->deskripsi ?? '') }}',
                            '{{ addslashes($galeri->kategori ?? '') }}'
                        )"
                    >

                        <div class="gallery-image-wrapper">

                            @if ($galeri->gambar)

                                <img
                                    src="{{ asset($galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="gallery-image"
                                    loading="lazy"
                                >

                            @else

                                <div class="gallery-no-image">
                                    <span>📷</span>
                                    <small>
                                        Foto tidak tersedia
                                    </small>
                                </div>

                            @endif


                            <div class="gallery-overlay">

                                <div class="gallery-overlay-content">
                                    <span>
                                        Lihat Foto
                                    </span>
                                </div>

                            </div>

                        </div>


                        <div class="gallery-card-content">

                            @if ($galeri->kategori)

                                <span class="gallery-category">
                                    {{ $galeri->kategori }}
                                </span>

                            @endif


                            <h3>
                                {{ $galeri->judul }}
                            </h3>


                            @if ($galeri->deskripsi)

                                <p>
                                    {{ $galeri->deskripsi }}
                                </p>

                            @endif

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="gallery-empty">

                <div class="gallery-empty-icon">
                    📷
                </div>

                <h3>
                    Belum Ada Dokumentasi
                </h3>

                <p>
                    Belum ada foto pada kategori yang dipilih.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- LIGHTBOX --}}

<div
    id="galleryLightbox"
    class="gallery-lightbox"
    onclick="closeGallery(event)"
>

    <button
        type="button"
        class="gallery-close"
        onclick="closeGallery()"
        aria-label="Tutup"
    >
        &times;
    </button>


    <div
        class="gallery-lightbox-content"
        onclick="event.stopPropagation()"
    >

        <div class="gallery-lightbox-image-wrapper">

            <img
                id="galleryLightboxImage"
                src=""
                alt=""
            >

        </div>


        <div class="gallery-lightbox-info">

            <span id="galleryLightboxCategory"></span>

            <h2 id="galleryLightboxTitle"></h2>

            <p id="galleryLightboxDescription"></p>

        </div>

    </div>

</div>


@push('styles')

<style>

/* =========================================================
   CONTAINER
========================================================= */

.gallery-container {
    width: min(1180px, calc(100% - 40px));
    margin: 0 auto;
}


/* =========================================================
   HERO
========================================================= */

.gallery-hero {
    min-height: 330px;

    display: flex;
    align-items: center;

    background: #073b7a;
        url('/images/gallery-bg.jpg') center / cover;

    color: #fff;
}

.gallery-hero-overlay {
    width: 100%;
    padding: 80px 0;
}

.gallery-eyebrow {
    display: inline-block;

    margin-bottom: 15px;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 2px;

    color: rgba(255,255,255,.8);
}

.gallery-hero h1 {
    margin: 0 0 15px;

    font-size: clamp(36px, 5vw, 58px);

    line-height: 1.1;

    font-weight: 800;

    color: #fff;
}

.gallery-hero p {
    max-width: 680px;

    margin: 0;

    font-size: 17px;

    line-height: 1.7;

    color: rgba(255,255,255,.86);
}


/* =========================================================
   SECTION
========================================================= */

.gallery-section {
    padding: 70px 0 90px;

    background: #f7f9fc;

    min-height: 500px;
}


/* =========================================================
   FILTER
========================================================= */

.gallery-filter {
    display: flex;

    flex-wrap: wrap;

    justify-content: center;

    gap: 10px;

    margin-bottom: 42px;
}

.gallery-filter-btn {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    padding: 11px 19px;

    border-radius: 999px;

    border: 1px solid #dbe2ea;

    background: #fff;

    color: #334155;

    text-decoration: none;

    font-size: 14px;

    font-weight: 600;

    transition: .2s ease;
}

.gallery-filter-btn:hover {
    transform: translateY(-2px);

    border-color: #123b68;

    color: #123b68;
}

.gallery-filter-btn.active {
    background: #123b68;

    border-color: #123b68;

    color: #fff;
}


/* =========================================================
   GRID
========================================================= */

.gallery-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 22px;
}


/* =========================================================
   CARD
========================================================= */

.gallery-card {
    overflow: hidden;

    background: #fff;

    border-radius: 18px;

    border: 1px solid #e8edf3;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, .06);

    cursor: pointer;

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.gallery-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 18px 40px rgba(15, 23, 42, .12);
}


/* =========================================================
   IMAGE
========================================================= */

.gallery-image-wrapper {
    position: relative;

    width: 100%;

    aspect-ratio: 1 / 1;

    overflow: hidden;

    background: #e9eef5;
}

.gallery-image {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform .45s ease;
}

.gallery-card:hover .gallery-image {
    transform: scale(1.06);
}


/* =========================================================
   NO IMAGE
========================================================= */

.gallery-no-image {
    width: 100%;
    height: 100%;

    display: flex;

    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 8px;

    color: #94a3b8;

    background: #e9eef5;
}

.gallery-no-image span {
    font-size: 42px;
}

.gallery-no-image small {
    font-size: 11px;
}


/* =========================================================
   IMAGE OVERLAY
========================================================= */

.gallery-overlay {
    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    background:
        rgba(7, 30, 58, .48);

    opacity: 0;

    transition: .25s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay-content {
    padding: 10px 18px;

    border: 1px solid rgba(255,255,255,.45);

    border-radius: 999px;

    background:
        rgba(255,255,255,.15);

    backdrop-filter: blur(8px);

    color: #fff;

    font-size: 14px;

    font-weight: 700;
}


/* =========================================================
   CARD CONTENT
========================================================= */

.gallery-card-content {
    padding: 18px;
}

.gallery-category {
    display: inline-block;

    margin-bottom: 9px;

    color: #1d5d99;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;
}

.gallery-card-content h3 {
    margin: 0;

    color: #16263d;

    font-size: 17px;

    line-height: 1.35;
}

.gallery-card-content p {
    margin: 8px 0 0;

    color: #64748b;

    font-size: 13px;

    line-height: 1.6;

    display: -webkit-box;

    -webkit-line-clamp: 3;

    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =========================================================
   EMPTY
========================================================= */

.gallery-empty {
    padding: 80px 20px;

    text-align: center;

    background: #fff;

    border: 1px solid #e8edf3;

    border-radius: 20px;
}

.gallery-empty-icon {
    margin-bottom: 15px;

    font-size: 48px;
}

.gallery-empty h3 {
    margin: 0 0 8px;

    color: #16263d;

    font-size: 22px;
}

.gallery-empty p {
    margin: 0;

    color: #64748b;
}


/* =========================================================
   LIGHTBOX
========================================================= */

.gallery-lightbox {
    position: fixed;

    inset: 0;

    z-index: 9999;

    display: none;

    align-items: center;
    justify-content: center;

    padding: 30px;

    background:
        rgba(3, 12, 24, .88);

    backdrop-filter: blur(8px);
}

.gallery-lightbox.show {
    display: flex;
}

.gallery-lightbox-content {
    width: min(900px, 100%);

    max-height: 90vh;

    overflow: auto;

    border-radius: 20px;

    background: #fff;

    box-shadow:
        0 25px 80px rgba(0,0,0,.3);
}

.gallery-lightbox-image-wrapper {
    width: 100%;

    background: #111827;
}

.gallery-lightbox-content > .gallery-lightbox-image-wrapper > img {
    width: 100%;

    max-height: 65vh;

    display: block;

    margin: 0 auto;

    object-fit: contain;
}

.gallery-lightbox-info {
    padding: 22px 25px 25px;
}

.gallery-lightbox-info span {
    display: block;

    color: #1d5d99;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .5px;
}

.gallery-lightbox-info h2 {
    margin: 7px 0;

    color: #16263d;

    font-size: 24px;
}

.gallery-lightbox-info p {
    margin: 0;

    color: #64748b;

    line-height: 1.7;
}


/* =========================================================
   CLOSE BUTTON
========================================================= */

.gallery-close {
    position: fixed;

    top: 20px;
    right: 25px;

    z-index: 10000;

    width: 44px;
    height: 44px;

    border: 0;

    border-radius: 50%;

    background:
        rgba(255,255,255,.15);

    color: #fff;

    font-size: 30px;

    line-height: 1;

    cursor: pointer;

    transition: .2s ease;
}

.gallery-close:hover {
    background:
        rgba(255,255,255,.25);

    transform: rotate(90deg);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .gallery-grid {
        grid-template-columns:
            repeat(3, minmax(0, 1fr));
    }

}


@media (max-width: 700px) {

    .gallery-container {
        width: min(
            100% - 30px,
            1180px
        );
    }

    .gallery-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 15px;
    }

    .gallery-card-content {
        padding: 14px;
    }

    .gallery-card-content h3 {
        font-size: 15px;
    }

    .gallery-card-content p {
        font-size: 12px;
    }

    .gallery-hero {
        min-height: 280px;
    }

    .gallery-hero-overlay {
        padding: 60px 0;
    }

}


@media (max-width: 480px) {

    .gallery-container {
        width: calc(100% - 24px);
    }

    .gallery-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 10px;
    }

    .gallery-filter {
        justify-content: flex-start;

        overflow-x: auto;

        flex-wrap: nowrap;

        padding-bottom: 5px;

        scrollbar-width: none;
    }

    .gallery-filter::-webkit-scrollbar {
        display: none;
    }

    .gallery-filter-btn {
        flex-shrink: 0;
    }

    .gallery-lightbox {
        padding: 15px;
    }

    .gallery-lightbox-info {
        padding: 18px;
    }

    .gallery-lightbox-info h2 {
        font-size: 20px;
    }

    .gallery-close {
        top: 12px;
        right: 12px;
    }

}

</style>

@endpush


@push('scripts')

<script>

function openGallery(
    image,
    title,
    description,
    category
) {

    const lightbox =
        document.getElementById(
            'galleryLightbox'
        );

    const lightboxImage =
        document.getElementById(
            'galleryLightboxImage'
        );

    const lightboxTitle =
        document.getElementById(
            'galleryLightboxTitle'
        );

    const lightboxDescription =
        document.getElementById(
            'galleryLightboxDescription'
        );

    const lightboxCategory =
        document.getElementById(
            'galleryLightboxCategory'
        );


    lightboxImage.src = image;

    lightboxImage.alt = title;

    lightboxTitle.textContent = title;

    lightboxDescription.textContent =
        description || '';

    lightboxCategory.textContent =
        category || 'DOKUMENTASI SEKOLAH';


    lightbox.classList.add('show');

    document.body.style.overflow =
        'hidden';
}


function closeGallery(event) {

    if (
        event &&
        event.target &&
        event.target.id !==
            'galleryLightbox'
    ) {
        return;
    }


    const lightbox =
        document.getElementById(
            'galleryLightbox'
        );


    lightbox.classList.remove('show');

    document.body.style.overflow =
        '';
}


/* ESC UNTUK MENUTUP */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Escape') {

            const lightbox =
                document.getElementById(
                    'galleryLightbox'
                );

            if (
                lightbox.classList.contains(
                    'show'
                )
            ) {

                lightbox.classList.remove(
                    'show'
                );

                document.body.style.overflow =
                    '';

            }

        }

    }
);

</script>

@endpush

@endsection