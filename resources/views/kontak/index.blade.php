@extends('layouts.app')

@section('content')

<style>
    .contact-page {
        background: #f5f7fb;
        min-height: 100vh;
        padding-bottom: 80px;
    }

    /* CONTAINER */
    .contact-container {
        max-width: 1180px;
        margin: 50px auto 0;
        padding: 0 20px;
    }

    /* GRID INFORMASI + FORM */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }

    /* CARD */
    .contact-card,
    .contact-map-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
        border: 1px solid #edf1f6;
    }

    .section-label {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #2563eb;
        margin-bottom: 5px;
    }

    .contact-card h2,
    .contact-map-card h2 {
        margin: 0 0 25px;
        color: #0b1f3a;
        font-size: 25px;
        font-weight: 750;
    }

    /* INFORMASI KONTAK */
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .contact-icon {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #eef4ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-icon svg {
        width: 21px;
        height: 21px;
        stroke: #0b1f3a;
        stroke-width: 2;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .contact-item span {
        display: block;
        font-size: 13px;
        color: #718096;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .contact-item p {
        margin: 0;
        color: #243447;
        line-height: 1.6;
        font-size: 15px;
    }

    /* SOCIAL MEDIA */
    .social-section {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #edf1f6;
    }

    .social-section h3 {
        margin: 0 0 15px;
        color: #0b1f3a;
        font-size: 16px;
    }

    .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 13px;
        background: #f5f7fb;
        border: 1px solid #e5eaf1;
        border-radius: 9px;
        text-decoration: none;
        color: #334155;
        font-size: 13px;
        transition: .2s ease;
    }

    .social-link:hover {
        background: #eef4ff;
        border-color: #bfdbfe;
        color: #1d4ed8;
    }

    .contact-intro {
        margin: -10px 0 28px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    /* FORM */
    .form-group {
        margin-bottom: 17px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-size: 14px;
        font-weight: 600;
        color: #243447;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        background: #fff;
        color: #243447;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        box-sizing: border-box;
        transition: .2s ease;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #9aa5b1;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 130px;
    }

    .btn-submit {
        width: 100%;
        border: none;
        border-radius: 10px;
        padding: 14px 18px;
        background: #0b1f3a;
        color: white;
        font-family: inherit;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-submit:hover {
        background: #12345b;
        transform: translateY(-1px);
    }

    .contact-success {
        display: none;
        margin-top: 15px;
        padding: 13px 15px;
        border-radius: 10px;
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
        font-size: 14px;
        line-height: 1.5;
    }

    /* GOOGLE MAPS */
    .contact-map-card {
        width: 100%;
        box-sizing: border-box;
    }

    .map-header {
        margin-bottom: 20px;
    }

    .map-header h2 {
        margin-bottom: 0;
    }

    .map-wrapper {
        width: 100%;
        height: 380px;
        overflow: hidden;
        border-radius: 16px;
        background: #eef2f7;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: 0;
        display: block;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .map-wrapper {
            height: 330px;
        }
    }

    @media (max-width: 560px) {
        .contact-container {
            margin-top: 30px;
            padding: 0 15px;
        }

        .contact-card,
        .contact-map-card {
            padding: 22px;
            border-radius: 16px;
        }

        .contact-card h2,
        .contact-map-card h2 {
            font-size: 22px;
        }

        .map-wrapper {
            height: 270px;
            border-radius: 12px;
        }
    }
</style>


<div class="contact-page">

    {{-- CONTENT --}}
    <div class="contact-container">

        {{-- INFORMASI KONTAK + KIRIM PESAN --}}
        <div class="contact-grid">

            {{-- INFORMASI KONTAK --}}
            <div class="contact-card">

                <div class="section-label">
                    Hubungi Kami
                </div>

                <h2>Informasi Kontak</h2>

                <p class="contact-intro">
                    SMKN 4 Bogor terbuka untuk memberikan informasi
                    seputar sekolah, program keahlian, kegiatan,
                    dan layanan pendidikan.
                </p>

                <div class="contact-info">

                    {{-- ALAMAT --}}
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                <circle cx="12" cy="10" r="2.5"/>
                            </svg>
                        </div>

                        <div>
                            <span>Alamat</span>
                            <p>
                                {{ $kontak->alamat }}
                            </p>
                        </div>
                    </div>


                    {{-- TELEPON --}}
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                                    19.79 19.79 0 0 1-8.63-3.07
                                    19.5 19.5 0 0 1-6-6
                                    A19.79 19.79 0 0 1 2.12 4.18
                                    2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72
                                    12.84 12.84 0 0 0 .7 2.81
                                    2 2 0 0 1-.45 2.11L8.09 9.91
                                    a16 16 0 0 0 6 6l1.27-1.27
                                    a2 2 0 0 1 2.11-.45
                                    12.84 12.84 0 0 0 2.81.7
                                    A2 2 0 0 1 22 16.92Z"/>
                            </svg>
                        </div>

                        <div>
                            <span>Telepon</span>
                            <p>
                                {{ $kontak->telepon }}
                            </p>
                        </div>
                    </div>


                    {{-- EMAIL --}}
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="14" rx="2"/>
                                <path d="m3 7 9 6 9-6"/>
                            </svg>
                        </div>

                        <div>
                            <span>Email</span>
                            <p>
                                {{ $kontak->email }}
                            </p>
                        </div>
                    </div>


                    {{-- JAM OPERASIONAL --}}
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 7v5l3 2"/>
                            </svg>
                        </div>

                        <div>
                            <span>Jam Operasional</span>
                            <p>
                                {{ $kontak->jam_operasional }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>


            {{-- KIRIM PESAN --}}
            <div class="contact-card">

                <div class="section-label">
                    Pesan
                </div>

                <h2>Kirim Pesan</h2>

                @if(session('success'))
                    <div class="contact-success" style="display: block;">
                        {{ session('success') }}
                    </div>
                @endif

                <form
                    id="contactForm"
                    action="{{ route('kontak.store') }}"
                    method="POST"
                >
                    @csrf

                    {{-- NAMA --}}
                    <div class="form-group">
                        <label for="nama">
                            Nama
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama Anda"
                            required
                        >
                    </div>


                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email Anda"
                            required
                        >
                    </div>


                    {{-- SUBJEK --}}
                    <div class="form-group">
                        <label for="subjek">
                            Subjek
                        </label>

                        <input
                            type="text"
                            id="subjek"
                            name="subjek"
                            placeholder="Masukkan subjek pesan"
                            required
                        >
                    </div>


                    {{-- PESAN --}}
                    <div class="form-group">
                        <label for="pesan">
                            Pesan
                        </label>

                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="5"
                            placeholder="Tulis pesan Anda..."
                            required
                        ></textarea>
                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>


        {{-- GOOGLE MAPS — DI BAWAH KEDUA CARD --}}
        <div class="contact-map-card">

            <div class="map-header">

                <div class="section-label">
                    Lokasi Sekolah
                </div>

                <h2>Google Maps</h2>

            </div>


            <div class="map-wrapper">

                <iframe
                    src="https://www.google.com/maps?q=-6.6407334,106.8246939&z=17&output=embed"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>

        </div>

    </div>

</div>


@endsection