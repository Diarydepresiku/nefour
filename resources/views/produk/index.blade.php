@extends('layouts.app')

@section('content')

<section class="product-hero">
    <div class="product-container">
        <span class="product-eyebrow">PRODUK SEKOLAH</span>

    <h1>Produk SMKN 4 Bogor</h1>

    <p>
        Temukan berbagai produk, karya siswa, dan perlengkapan
        yang tersedia di SMKN 4 Bogor.
    </p>
</div>

</section>

<section class="product-section">

<div class="product-container">

    @if ($produks->count())

        <div class="product-grid">

            @foreach ($produks as $produk)

                <article class="product-card">

                    <div class="product-image-wrapper">

                        <img
                            src="{{ asset('storage/' . $produk->foto) }}"
                            alt="{{ $produk->nama }}"
                            class="product-image"
                            loading="lazy"
                        >

                    </div>


                    <div class="product-card-content">

                        @if ($produk->kategori)
                            <span class="product-category">
                                {{ $produk->kategori }}
                            </span>
                        @endif

                        <h2>
                            {{ $produk->nama }}
                        </h2>

                        <div class="product-price">
                            Rp{{ number_format($produk->harga, 0, ',', '.') }}
                        </div>

                        <button
                            type="button"
                            class="product-detail-btn"
                            onclick="openProductModal(
                                {{ $produk->id }},
                                @js($produk->nama),
                                @js($produk->foto),
                                @js($produk->kategori),
                                @js($produk->harga),
                                @js($produk->status),
                                @js($produk->deskripsi),
                                @js($produk->produsen),
                                @js($produk->penjual),
                                @js($produk->metode_pembelian),
                                @js($produk->nomor_wa),
                                @js($produk->keterangan_pembelian)
                            )"
                        >
                            Lihat Detail
                        </button>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="product-empty">
            <div>🛍️</div>
            <h2>Belum Ada Produk</h2>
            <p>
                Produk sekolah akan ditampilkan di halaman ini.
            </p>
        </div>

    @endif

</div>

</section>

{{-- MODAL PRODUK --}}

<div
    id="productModal"
    class="product-modal"
    onclick="closeProductModal(event)"
>

<div
    class="product-modal-content"
    onclick="event.stopPropagation()"
>

    <button
        type="button"
        class="product-modal-close"
        onclick="closeProductModal()"
    >
        &times;
    </button>


    <div class="product-modal-grid">

        {{-- FOTO --}}

        <div class="product-modal-image">

            <img
                id="modalProductImage"
                src=""
                alt=""
            >

        </div>


        {{-- INFORMASI --}}

        <div class="product-modal-info">

            <span
                id="modalProductCategory"
                class="product-category"
            ></span>

            <h2 id="modalProductName"></h2>

            <div
                id="modalProductPrice"
                class="product-modal-price"
            ></div>


            <div class="product-status-wrapper">

                <span class="product-status-label">
                    Status
                </span>

                <span
                    id="modalProductStatus"
                    class="product-status"
                ></span>

            </div>


            <div class="product-detail-section">

                <h3>Deskripsi</h3>

                <p id="modalProductDescription"></p>

            </div>


            <div class="product-detail-info">

                <div>
                    <span>Produsen</span>
                    <strong id="modalProductProducer">-</strong>
                </div>

                <div>
                    <span>Penjual</span>
                    <strong id="modalProductSeller">-</strong>
                </div>

            </div>


            <div class="product-purchase-box">

                <span class="purchase-label">
                    Cara Pembelian
                </span>

                <strong id="modalPurchaseMethod"></strong>

                <p id="modalPurchaseDescription"></p>


                <a
                    id="modalWhatsappButton"
                    href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="product-whatsapp"
                >
                    Hubungi via WhatsApp
                </a>

            </div>

        </div>

    </div>

</div>

</div>

@push('styles')

<style>

    .product-container {
        width: min(1180px, calc(100% - 40px));
        margin: 0 auto;
    }


    /* HERO */

    .product-hero {
        padding: 90px 0;
        background:
            linear-gradient(
                135deg,
                rgba(7, 30, 58, .97),
                rgba(13, 62, 110, .90)
            );
        color: #fff;
    }

    .product-eyebrow {
        display: inline-block;
        margin-bottom: 15px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        opacity: .8;
    }

    .product-hero h1 {
        margin: 0 0 15px;
        font-size: clamp(36px, 5vw, 58px);
        line-height: 1.1;
        font-weight: 800;
    }

    .product-hero p {
        max-width: 680px;
        margin: 0;
        color: rgba(255,255,255,.85);
        font-size: 17px;
        line-height: 1.7;
    }


    /* SECTION */

    .product-section {
        padding: 75px 0 100px;
        background: #f7f9fc;
    }


    /* GRID */

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }


    /* CARD */

    .product-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e6ebf1;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(15,23,42,.06);
        transition: .25s ease;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(15,23,42,.12);
    }


    .product-image-wrapper {
        aspect-ratio: 4 / 3;
        overflow: hidden;
        background: #e9eef5;
    }

    .product-image {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }


    .product-card-content {
        padding: 22px;
    }

    .product-category {
        display: inline-block;
        margin-bottom: 9px;
        color: #1d5d99;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .7px;
        text-transform: uppercase;
    }

    .product-card-content h2 {
        margin: 0 0 12px;
        color: #16263d;
        font-size: 19px;
        line-height: 1.4;
    }

    .product-price {
        margin-bottom: 18px;
        color: #123b68;
        font-size: 21px;
        font-weight: 800;
    }


    .product-detail-btn {
        width: 100%;
        padding: 12px 18px;
        border: 0;
        border-radius: 10px;
        background: #123b68;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .product-detail-btn:hover {
        background: #0d2e52;
        transform: translateY(-1px);
    }


    /* EMPTY */

    .product-empty {
        padding: 80px 20px;
        text-align: center;
        background: #fff;
        border: 1px solid #e6ebf1;
        border-radius: 20px;
    }

    .product-empty > div {
        margin-bottom: 15px;
        font-size: 50px;
    }

    .product-empty h2 {
        margin: 0 0 8px;
        color: #16263d;
    }

    .product-empty p {
        margin: 0;
        color: #64748b;
    }


    /* MODAL */

    .product-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 25px;
        background: rgba(3,12,24,.82);
        backdrop-filter: blur(7px);
    }

    .product-modal.show {
        display: flex;
    }

    .product-modal-content {
        position: relative;
        width: min(1000px, 100%);
        max-height: 90vh;
        overflow-y: auto;
        border-radius: 22px;
        background: #fff;
        box-shadow: 0 25px 80px rgba(0,0,0,.3);
    }

    .product-modal-close {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        width: 42px;
        height: 42px;
        border: 0;
        border-radius: 50%;
        background: rgba(0,0,0,.55);
        color: #fff;
        font-size: 28px;
        cursor: pointer;
    }

    .product-modal-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .product-modal-image {
        min-height: 550px;
        background: #e9eef5;
    }

    .product-modal-image img {
        width: 100%;
        height: 100%;
        min-height: 550px;
        display: block;
        object-fit: cover;
    }

    .product-modal-info {
        padding: 45px 35px;
    }

    .product-modal-info h2 {
        margin: 0 0 10px;
        color: #16263d;
        font-size: 30px;
        line-height: 1.3;
    }

    .product-modal-price {
        margin-bottom: 22px;
        color: #123b68;
        font-size: 25px;
        font-weight: 800;
    }


    .product-status-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
    }

    .product-status-label {
        color: #64748b;
        font-size: 13px;
    }

    .product-status {
        padding: 6px 12px;
        border-radius: 999px;
        background: #eef3f8;
        color: #123b68;
        font-size: 12px;
        font-weight: 700;
    }


    .product-detail-section {
        margin-bottom: 25px;
    }

    .product-detail-section h3 {
        margin: 0 0 8px;
        color: #16263d;
        font-size: 16px;
    }

    .product-detail-section p {
        margin: 0;
        color: #64748b;
        line-height: 1.7;
    }


    .product-detail-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 25px;
    }

    .product-detail-info > div {
        padding: 15px;
        border-radius: 12px;
        background: #f7f9fc;
    }

    .product-detail-info span {
        display: block;
        margin-bottom: 5px;
        color: #64748b;
        font-size: 12px;
    }

    .product-detail-info strong {
        color: #16263d;
        font-size: 14px;
    }


    .product-purchase-box {
        padding: 20px;
        border-radius: 15px;
        background: #f1f6fb;
    }

    .purchase-label {
        display: block;
        margin-bottom: 7px;
        color: #1d5d99;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .product-purchase-box > strong {
        display: block;
        margin-bottom: 8px;
        color: #16263d;
    }

    .product-purchase-box p {
        margin: 0 0 15px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .product-whatsapp {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 12px 18px;
        border-radius: 10px;
        background: #168a42;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
    }


    @media (max-width: 900px) {

        .product-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .product-modal-grid {
            grid-template-columns: 1fr;
        }

        .product-modal-image,
        .product-modal-image img {
            min-height: 350px;
            height: 350px;
        }

    }


    @media (max-width: 600px) {

        .product-container {
            width: min(100% - 24px, 1180px);
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-hero {
            padding: 65px 0;
        }

        .product-section {
            padding: 55px 0 70px;
        }

        .product-modal {
            padding: 12px;
        }

        .product-modal-info {
            padding: 30px 20px;
        }

        .product-modal-info h2 {
            font-size: 24px;
        }

        .product-detail-info {
            grid-template-columns: 1fr;
        }

    }

</style>

@endpush

@push('scripts')

<script>

    function openProductModal(
        id,
        nama,
        foto,
        kategori,
        harga,
        status,
        deskripsi,
        produsen,
        penjual,
        metodePembelian,
        nomorWa,
        keteranganPembelian
    ) {

        document.getElementById('modalProductImage').src =
            "{{ asset('storage') }}/" + foto;

        document.getElementById('modalProductImage').alt = nama;

        document.getElementById('modalProductCategory').textContent =
            kategori || '';

        document.getElementById('modalProductName').textContent =
            nama || '';

        document.getElementById('modalProductPrice').textContent =
            'Rp' + Number(harga).toLocaleString('id-ID');

        document.getElementById('modalProductStatus').textContent =
            status || '-';

        document.getElementById('modalProductDescription').textContent =
            deskripsi || 'Tidak ada deskripsi.';

        document.getElementById('modalProductProducer').textContent =
            produsen || '-';

        document.getElementById('modalProductSeller').textContent =
            penjual || '-';

        document.getElementById('modalPurchaseMethod').textContent =
            metodePembelian || '-';

        document.getElementById('modalPurchaseDescription').textContent =
            keteranganPembelian || '';

        const whatsappButton =
            document.getElementById('modalWhatsappButton');

        if (metodePembelian === 'Pesan melalui WhatsApp' && nomorWa) {

            const nomor = nomorWa.replace(/\D/g, '');

            whatsappButton.href =
                'https://wa.me/' + nomor +
                '?text=' +
                encodeURIComponent(
                    'Halo, saya ingin membeli ' + nama
                );

            whatsappButton.style.display = 'inline-flex';

        } else {

            whatsappButton.style.display = 'none';

        }


        document.getElementById('productModal')
            .classList.add('show');

        document.body.style.overflow = 'hidden';
    }


    function closeProductModal(event) {

        if (
            event &&
            event.target &&
            event.target.id !== 'productModal'
        ) {
            return;
        }

        document.getElementById('productModal')
            .classList.remove('show');

        document.body.style.overflow = '';
    }


    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            const modal =
                document.getElementById('productModal');

            if (modal.classList.contains('show')) {

                modal.classList.remove('show');
                document.body.style.overflow = '';

            }

        }

    });

</script>

@endpush

@endsection