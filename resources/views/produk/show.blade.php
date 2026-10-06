@extends('layouts.app')

@section('title', $produk->nama . ' - SMKN 4 Bogor')

@section('content')

<!-- HEADER DETAIL -->
<section class="produk-detail-hero">

    <div class="produk-detail-container">

        <a href="{{ route('produk.index') }}" class="back-link">
            ← Kembali ke Produk
        </a>

        <div class="detail-heading">

            @if($produk->kategori)

                <span class="detail-category">
                    {{ $produk->kategori }}
                </span>

            @endif

            <h1>
                {{ $produk->nama }}
            </h1>

        </div>

    </div>

</section>


<!-- DETAIL PRODUK -->
<main class="produk-detail-main">

    <div class="produk-detail-grid">


        <!-- FOTO -->
        <div class="produk-detail-image">

            @if($produk->foto)

                <img
                    src="{{ $produk->foto }}"
                    alt="{{ $produk->nama }}"
                >

            @else

                <div class="detail-no-image">
                    Tidak ada gambar
                </div>

            @endif

        </div>


        <!-- INFORMASI -->
        <div class="produk-detail-info">

            <div class="detail-status-wrapper">

                @if($produk->status)

                    <span class="detail-status
                        @if($produk->status === 'Habis')
                            status-habis
                        @elseif($produk->status === 'Stok Terbatas')
                            status-terbatas
                        @else
                            status-tersedia
                        @endif
                    ">
                        {{ $produk->status }}
                    </span>

                @endif

            </div>


            <h2>
                {{ $produk->nama }}
            </h2>


            @if($produk->harga !== null)

                <div class="detail-price">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </div>

            @endif


            @if($produk->deskripsi)

                <div class="detail-description">

                    <h3>
                        Deskripsi
                    </h3>

                    <p>
                        {{ $produk->deskripsi }}
                    </p>

                </div>

            @endif


            <!-- INFORMASI PEMESANAN -->
            <div class="order-info">

                <h3>
                    Informasi Pemesanan
                </h3>

                <p>
                    Untuk informasi pembelian atau pemesanan produk,
                    silakan hubungi pihak SMKN 4 Bogor melalui halaman kontak.
                </p>

                <a href="{{ route('kontak.index') }}"
                   class="contact-button">
                    Hubungi Kami
                </a>

            </div>

        </div>

    </div>


    <!-- KEMBALI -->
    <div class="detail-back-bottom">

        <a href="{{ route('produk.index') }}">
            ← Kembali ke semua produk
        </a>

    </div>

</main>


<style>

.produk-detail-hero {
    background: linear-gradient(135deg, #0f172a, #1e3a8a);
    padding: 55px 20px;
    color: white;
}

.produk-detail-container {
    max-width: 1100px;
    margin: auto;
}

.back-link {
    color: #dbeafe;
    text-decoration: none;
    font-size: 14px;
}

.back-link:hover {
    color: white;
}

.detail-heading {
    margin-top: 30px;
}

.detail-category {
    display: inline-block;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.2);
    padding: 7px 13px;
    border-radius: 999px;
    font-size: 13px;
    margin-bottom: 15px;
}

.detail-heading h1 {
    font-size: 42px;
    line-height: 1.2;
    margin: 0;
    font-weight: 800;
}


.produk-detail-main {
    max-width: 1100px;
    margin: auto;
    padding: 60px 20px 90px;
}

.produk-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 55px;
    align-items: start;
}


.produk-detail-image {
    width: 100%;
    height: 500px;
    border-radius: 20px;
    overflow: hidden;
    background: #e5e7eb;
}

.produk-detail-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.detail-no-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
}


.produk-detail-info {
    padding-top: 10px;
}

.detail-status-wrapper {
    margin-bottom: 15px;
}

.detail-status {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}


.produk-detail-info h2 {
    font-size: 30px;
    line-height: 1.3;
    color: #0f172a;
    margin: 0 0 15px;
}

.detail-price {
    font-size: 28px;
    font-weight: 800;
    color: #1d4ed8;
    margin-bottom: 35px;
}


.detail-description {
    border-top: 1px solid #e5e7eb;
    padding-top: 25px;
}

.detail-description h3,
.order-info h3 {
    color: #0f172a;
    margin: 0 0 12px;
    font-size: 18px;
}

.detail-description p,
.order-info p {
    color: #64748b;
    line-height: 1.8;
    margin: 0;
}


.order-info {
    margin-top: 35px;
    padding: 25px;
    background: #eff6ff;
    border-radius: 16px;
    border: 1px solid #dbeafe;
}


.contact-button {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 20px;
    background: #1d4ed8;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 700;
    transition: .2s;
}

.contact-button:hover {
    background: #1e40af;
}


.detail-back-bottom {
    margin-top: 50px;
    padding-top: 25px;
    border-top: 1px solid #e5e7eb;
}

.detail-back-bottom a {
    color: #1d4ed8;
    font-weight: 700;
    text-decoration: none;
}


@media (max-width: 800px) {

    .produk-detail-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .produk-detail-image {
        height: 380px;
    }

}


@media (max-width: 600px) {

    .detail-heading h1 {
        font-size: 32px;
    }

    .produk-detail-image {
        height: 300px;
    }

    .produk-detail-info h2 {
        font-size: 25px;
    }

}

</style>

@endsection
