@extends('layouts.app')

@section('content')

@php
    $kegiatan = \App\Models\Galeri::latest()->take(4)->get();
@endphp

<div class="profile-page">

    {{-- HERO --}}
    <section class="profile-hero">

        @if ($profile?->foto)
            <img
                src="{{ asset('storage/' . $profile->foto) }}"
                alt="{{ $profile->nama_sekolah ?? 'SMKN 4 Bogor' }}"
                class="hero-image"
            >
        @else
            <div class="hero-placeholder">
                NEFOUR
            </div>
        @endif

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <span>NEFOUR • SMKN 4 BOGOR</span>

            <h1>Profile Sekolah</h1>

            <p>
                Mengenal lebih dekat sekolah, lingkungan belajar,
                dan perjalanan SMKN 4 Bogor.
            </p>
        </div>

    </section>


    {{-- SAMBUTAN --}}
    <section class="profile-intro">

        <div class="profile-container">

            <span class="section-label">TENTANG KAMI</span>

            <h2>
                Membangun generasi yang<br>
                kompeten dan berkarakter.
            </h2>

            <div class="intro-line"></div>

            <p>
                {{ $profile?->deskripsi ?? 'SMKN 4 Bogor merupakan sekolah kejuruan yang berkomitmen menghadirkan lingkungan belajar yang mendukung perkembangan kompetensi, kreativitas, dan karakter peserta didik.' }}
            </p>

        </div>

    </section>


    {{-- VISI MISI + KEGIATAN --}}
    <section class="vision-section">

        <div class="profile-container vision-layout">

            {{-- KIRI --}}
            <div class="vision-content">

                <span class="section-label">ARAH SEKOLAH</span>

                <h2>Visi & Misi</h2>

                <div class="blue-line"></div>


                <div class="vision-block">

                    <span class="number">01</span>

                    <div>
                        <h3>Visi</h3>

                        <p>
                            {{ $profile?->visi ?? 'Visi sekolah belum tersedia.' }}
                        </p>
                    </div>

                </div>


                <div class="vision-block">

                    <span class="number">02</span>

                    <div>
                        <h3>Misi</h3>

                        <p>
                            {{ $profile?->misi ?? 'Misi sekolah belum tersedia.' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- KANAN --}}
            <div class="activities">

                <div class="activities-title">
                    <span class="section-label">AKTIVITAS</span>
                    <h2>Kegiatan Siswa</h2>
                </div>


                <div class="photo-collage">

                    @forelse ($kegiatan as $index => $galeri)

                        <div class="activity-photo photo-{{ $index + 1 }}">

                            <img
                                src="{{ asset($galeri->gambar) }}"
                                alt="{{ $galeri->judul ?? 'Kegiatan siswa' }}"
                            >

                        </div>

                    @empty

                        <div class="empty-gallery">
                            <span>Belum ada foto kegiatan.</span>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </section>


    {{-- DETAIL SEKOLAH --}}
    <section class="identity-section">

        <div class="profile-container">

            <div class="identity-heading">

                <div>
                    <span class="section-label">INFORMASI SEKOLAH</span>
                    <h2>Detail Sekolah</h2>
                </div>

                <p>
                    Informasi singkat mengenai identitas SMKN 4 Bogor.
                </p>

            </div>


            <div class="identity-list">

                <div class="identity-row">
                    <span>Nama Sekolah</span>
                    <strong>
                        {{ $profile?->nama_sekolah ?? 'SMKN 4 Bogor' }}
                    </strong>
                </div>

                <div class="identity-row">
                    <span>NPSN</span>
                    <strong>
                        {{ $profile?->npsn ?? '-' }}
                    </strong>
                </div>

                <div class="identity-row">
                    <span>Status Sekolah</span>
                    <strong>Negeri</strong>
                </div>

                <div class="identity-row">
                    <span>Alamat</span>
                    <strong>
                        {{ $profile?->alamat ?? '-' }}
                    </strong>
                </div>
                <div class="identity-row">
                    <span>Alamat</span>
                    <strong>
                        {{ $profile?->akreditasi ?? '-' }}
                    </strong>
                </div>
                <div class="identity-row">
                    <span>No telepon</span>
                    <strong>
                        {{ $profile?->no_telepon ?? '-' }}
                    </strong>
                </div>
              
                <div class="identity-row">
                    <span>Alamat Email</span>
                    <strong>
                        {{ $profile?->email ?? '-' }}
                    </strong>
                </div>

            </div>

        </div>

    </section>


    {{-- PENUTUP --}}
    <section class="profile-ending">

        <div class="profile-container">

            <span>NEFOUR</span>

            <h2>
                Tumbuh, belajar,<br>
                dan berkarya bersama.
            </h2>

        </div>

    </section>

</div>


<style>

/* =========================================
   GLOBAL
========================================= */

.profile-page {
    background: #ffffff;
    color: #0f172a;
}

.profile-container {
    width: min(1120px, calc(100% - 40px));
    margin: 0 auto;
}

.section-label {
    display: block;
    margin-bottom: 12px;

    color: #2563eb;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
}


/* =========================================
   HERO
========================================= */

.profile-hero {
    position: relative;

    height: 430px;

    overflow: hidden;

    background: #0b1f3a;
}

.hero-image {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

.hero-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;

    font-size: 42px;
    font-weight: 900;
    letter-spacing: 4px;
}

.hero-overlay {
    position: absolute;
    inset: 0;

    background: rgba(7, 35, 78, .55);
}

.hero-content {
    position: absolute;

    left: 50%;
    top: 50%;

    transform: translate(-50%, -50%);

    width: min(850px, calc(100% - 40px));

    text-align: center;

    color: #ffffff;
}

.hero-content span {
    font-size: 11px;
    font-weight: 800;

    letter-spacing: 2px;

    opacity: .9;
}

.hero-content h1 {
    margin: 12px 0 12px;

    font-size: clamp(38px, 5vw, 54px);
    line-height: 1.05;

    font-weight: 800;
    letter-spacing: -1.5px;
}

.hero-content p {
    max-width: 550px;

    margin: 0 auto;

    font-size: 15px;
    line-height: 1.7;

    color: rgba(255,255,255,.9);
}


/* =========================================
   INTRO
========================================= */

.profile-intro {
    padding: 90px 0 100px;

    text-align: center;

    background: #ffffff;
}

.profile-intro .profile-container {
    max-width: 850px;
}

.profile-intro h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: clamp(30px, 4vw, 42px);
    line-height: 1.25;

    font-weight: 800;
    letter-spacing: -1px;
}

.intro-line {
    width: 45px;
    height: 4px;

    margin: 25px auto;

    background: #2563eb;
}

.profile-intro p {
    max-width: 680px;

    margin: 0 auto;

    color: #64748b;

    font-size: 15px;
    line-height: 1.9;
}


/* =========================================
   VISI MISI + KEGIATAN
========================================= */

.vision-section {
    padding: 85px 0 110px;

    background: #f8fafc;
}

.vision-layout {
    display: grid;

    grid-template-columns: .85fr 1.15fr;

    gap: 90px;

    align-items: center;
}


/* LEFT */

.vision-content h2,
.activities h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: 34px;
    line-height: 1.2;

    font-weight: 800;
}

.blue-line {
    width: 42px;
    height: 4px;

    margin: 18px 0 42px;

    background: #2563eb;
}

.vision-block {
    display: grid;

    grid-template-columns: 35px 1fr;

    gap: 15px;

    margin-bottom: 34px;
}

.vision-block:last-child {
    margin-bottom: 0;
}

.number {
    color: #2563eb;

    font-size: 13px;
    font-weight: 800;

    padding-top: 4px;
}

.vision-block h3 {
    margin: 0 0 8px;

    color: #0f172a;

    font-size: 19px;
    font-weight: 800;
}

.vision-block p {
    margin: 0;

    color: #64748b;

    font-size: 14px;
    line-height: 1.8;
}


/* =========================================
   PHOTO COLLAGE
========================================= */

.activities {
    position: relative;
}

.activities-title {
    margin-bottom: 10px;
}

.photo-collage {
    position: relative;

    width: 100%;
    height: 430px;

    margin-top: 5px;
}


/* FOTO */

.activity-photo {
    position: absolute;

    overflow: hidden;

    background: #ffffff;

    padding: 8px;

    box-shadow: 0 15px 30px rgba(15, 23, 42, .14);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}

.activity-photo img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}

.activity-photo:hover {
    z-index: 10;

    box-shadow: 0 20px 40px rgba(15, 23, 42, .2);
}


/* FOTO 1 */

.photo-1 {
    width: 245px;
    height: 285px;

    top: 20px;
    left: 40px;

    transform: rotate(-6deg);

    z-index: 3;
}

.photo-1:hover {
    transform: rotate(-3deg) scale(1.03);
}


/* FOTO 2 */

.photo-2 {
    width: 220px;
    height: 250px;

    top: 0;
    right: 35px;

    transform: rotate(5deg);

    z-index: 2;
}

.photo-2:hover {
    transform: rotate(2deg) scale(1.03);
}


/* FOTO 3 */

.photo-3 {
    width: 240px;
    height: 205px;

    bottom: 15px;
    left: 135px;

    transform: rotate(4deg);

    z-index: 4;
}

.photo-3:hover {
    transform: rotate(1deg) scale(1.03);
}


/* FOTO 4 */

.photo-4 {
    width: 180px;
    height: 215px;

    bottom: 35px;
    right: 55px;

    transform: rotate(-5deg);

    z-index: 5;
}

.photo-4:hover {
    transform: rotate(-2deg) scale(1.03);
}


/* =========================================
   EMPTY
========================================= */

.empty-gallery {
    height: 300px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #94a3b8;

    font-size: 14px;
}


/* =========================================
   DETAIL
========================================= */

.identity-section {
    padding: 90px 0 100px;

    background: #ffffff;
}

.identity-heading {
    display: flex;

    justify-content: space-between;
    align-items: flex-end;

    gap: 40px;

    margin-bottom: 35px;
}

.identity-heading h2 {
    margin: 0;

    color: #0b1f3a;

    font-size: 34px;
    font-weight: 800;
}

.identity-heading p {
    max-width: 350px;

    margin: 0;

    color: #64748b;

    font-size: 14px;
    line-height: 1.7;
}

.identity-list {
    border-top: 1px solid #e2e8f0;
}

.identity-row {
    display: grid;

    grid-template-columns: 220px 1fr;

    gap: 30px;

    padding: 22px 0;

    border-bottom: 1px solid #e2e8f0;
}

.identity-row span {
    color: #94a3b8;

    font-size: 13px;
}

.identity-row strong {
    color: #0f172a;

    font-size: 14px;
    font-weight: 700;

    line-height: 1.6;
}


/* =========================================
   ENDING
========================================= */

.profile-ending {
    padding: 75px 0;

    background: #073b7a;

    color: #ffffff;
}

.profile-ending span {
    font-size: 11px;

    font-weight: 800;

    letter-spacing: 2px;
}

.profile-ending h2 {
    margin: 12px 0 0;

    font-size: clamp(30px, 4vw, 43px);

    line-height: 1.2;

    font-weight: 800;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 900px) {

    .vision-layout {
        grid-template-columns: 1fr;

        gap: 70px;
    }

    .photo-collage {
        max-width: 650px;

        margin: 10px auto 0;
    }

}


@media (max-width: 650px) {

    .profile-container {
        width: min(100% - 30px, 600px);
    }

    .profile-hero {
        height: 350px;
    }

    .hero-content h1 {
        font-size: 38px;
    }

    .profile-intro {
        padding: 65px 0 70px;
    }

    .profile-intro h2 {
        font-size: 29px;
    }

    .vision-section {
        padding: 65px 0 80px;
    }

    .vision-content h2,
    .activities h2,
    .identity-heading h2 {
        font-size: 29px;
    }

    .photo-collage {
        height: 400px;

        width: 100%;
    }

    .photo-1 {
        width: 190px;
        height: 225px;

        left: 10px;
        top: 25px;
    }

    .photo-2 {
        width: 175px;
        height: 205px;

        right: 5px;
        top: 5px;
    }

    .photo-3 {
        width: 190px;
        height: 165px;

        left: 65px;
        bottom: 20px;
    }

    .photo-4 {
        width: 145px;
        height: 175px;

        right: 20px;
        bottom: 15px;
    }

    .identity-heading {
        display: block;
    }

    .identity-heading p {
        margin-top: 12px;
    }

    .identity-row {
        grid-template-columns: 1fr;

        gap: 5px;

        padding: 18px 0;
    }

    .profile-ending {
        padding: 60px 0;
    }

}

</style>

@endsection