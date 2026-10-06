@extends('layouts.admin')

@section('title', 'Kelola Pesan - SMKN 4 Bogor')

@section('content')

<div class="panel">

    <div class="panel-header">

        <div>
            <h3>
                Kelola Pesan
            </h3>

            <p>
                Semua pesan yang dikirim melalui halaman kontak
            </p>
        </div>

        <div>
            <strong>
                {{ $pesans->count() }}
            </strong>
            pesan
        </div>

    </div>


    <div class="message-list">

        @forelse($pesans as $pesan)

            <div
                class="message-item"
                onclick="bukaPesan({{ $pesan->id }})"
                style="cursor: pointer;"
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

            </div>

        @empty

            <div class="empty-message">
                Belum ada pesan dari pengunjung.
            </div>

        @endforelse

    </div>

</div>


{{-- =========================
     POPUP DETAIL PESAN
========================= --}}

<div
    id="popupPesan"
    style="
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.45);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    "
>

    <div
        onclick="event.stopPropagation()"
        style="
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            border-radius: 14px;
            box-shadow: 0 20px 50px rgba(0,0,0,.2);
        "
    >

        {{-- HEADER POPUP --}}
        <div
            style="
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                border-bottom: 1px solid #edf0f5;
            "
        >

            <div>

                <h3
                    style="
                        margin: 0;
                        color: #2c3850;
                        font-size: 16px;
                    "
                >
                    Detail Pesan
                </h3>

                <p
                    style="
                        margin: 5px 0 0;
                        color: #8b95a6;
                        font-size: 11px;
                    "
                >
                    Pesan dari pengunjung
                </p>

            </div>

            <button
                onclick="tutupPesan()"
                style="
                    border: none;
                    background: #f1f3f7;
                    width: 32px;
                    height: 32px;
                    border-radius: 50%;
                    cursor: pointer;
                    font-size: 18px;
                    color: #596579;
                "
            >
                ×
            </button>

        </div>


        {{-- ISI POPUP --}}
        <div style="padding: 20px;">

            {{-- NAMA --}}
            <div style="margin-bottom: 16px;">

                <div
                    style="
                        font-size: 9px;
                        color: #8b95a6;
                        margin-bottom: 5px;
                    "
                >
                    Nama
                </div>

                <div
                    id="popupNama"
                    style="
                        font-size: 13px;
                        font-weight: 700;
                        color: #2c3850;
                    "
                ></div>

            </div>


            {{-- EMAIL --}}
            <div style="margin-bottom: 16px;">

                <div
                    style="
                        font-size: 9px;
                        color: #8b95a6;
                        margin-bottom: 5px;
                    "
                >
                    Email
                </div>

                <div
                    id="popupEmail"
                    style="
                        font-size: 11px;
                        color: #4c5669;
                    "
                ></div>

            </div>


            {{-- SUBJEK --}}
            <div style="margin-bottom: 16px;">

                <div
                    style="
                        font-size: 9px;
                        color: #8b95a6;
                        margin-bottom: 5px;
                    "
                >
                    Subjek
                </div>

                <div
                    id="popupSubjek"
                    style="
                        font-size: 11px;
                        color: #4c5669;
                    "
                ></div>

            </div>


            {{-- TANGGAL --}}
            <div style="margin-bottom: 16px;">

                <div
                    style="
                        font-size: 9px;
                        color: #8b95a6;
                        margin-bottom: 5px;
                    "
                >
                    Tanggal
                </div>

                <div
                    id="popupTanggal"
                    style="
                        font-size: 11px;
                        color: #4c5669;
                    "
                ></div>

            </div>


            {{-- ISI PESAN --}}
            <div>

                <div
                    style="
                        font-size: 9px;
                        color: #8b95a6;
                        margin-bottom: 7px;
                    "
                >
                    Isi Pesan
                </div>

                <div
                    id="popupIsi"
                    style="
                        font-size: 11px;
                        line-height: 1.7;
                        color: #4c5669;
                        background: #f8faff;
                        border: 1px solid #e9edf3;
                        border-radius: 8px;
                        padding: 14px;
                        white-space: pre-line;
                    "
                ></div>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     DATA PESAN + JAVASCRIPT
========================= --}}

<script>

    const daftarPesan = @json($pesans);


    // =========================
    // BUKA POPUP PESAN
    // =========================

    function bukaPesan(id) {

        const pesan = daftarPesan.find(
            item => item.id === id
        );

        if (!pesan) {
            return;
        }


        // Isi data popup

        document.getElementById('popupNama').textContent =
            pesan.nama;

        document.getElementById('popupEmail').textContent =
            pesan.email;

        document.getElementById('popupSubjek').textContent =
            pesan.subjek || 'Tanpa subjek';

        document.getElementById('popupTanggal').textContent =
            new Date(pesan.created_at).toLocaleString('id-ID');

        document.getElementById('popupIsi').textContent =
            pesan.pesan;


        // Tampilkan popup

        document.getElementById('popupPesan').style.display =
            'flex';


        // =========================
        // TANDAI SUDAH DIBACA
        // =========================

        if (!pesan.sudah_dibaca) {

            fetch(
                "{{ url('/admin/pesan') }}/" +
                id +
                "/dibaca",
                {
                    method: 'POST',

                    headers: {

                        'X-CSRF-TOKEN':
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            ).getAttribute('content'),

                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json'

                    }
                }
            )

            .then(response => {

                if (!response.ok) {
                    throw new Error(
                        'Gagal menandai pesan sebagai dibaca.'
                    );
                }

                return response.json();

            })

            .then(data => {

                console.log(
                    'HASIL DIBACA:',
                    data
                );


                if (data.success) {

                    // Update data pesan di browser

                    pesan.sudah_dibaca = true;


                    // Simpan jumlah pesan belum dibaca

                    localStorage.setItem(
                        'pesanBelumDibaca',
                        data.jumlahBelumDibaca
                    );


                    // Ubah badge "Baru" menjadi "Dibaca"
                    // tanpa reload halaman

                    const messageItems =
                        document.querySelectorAll(
                            '.message-item'
                        );

                    messageItems.forEach(item => {

                        const onclickValue =
                            item.getAttribute('onclick');

                        if (
                            onclickValue &&
                            onclickValue.includes(
                                '(' + id + ')'
                            )
                        ) {

                            const status =
                                item.querySelector(
                                    '.message-status'
                                );

                            if (status) {

                                status.classList.remove(
                                    'new'
                                );

                                status.classList.add(
                                    'read'
                                );

                                status.textContent =
                                    'Dibaca';

                            }

                        }

                    });

                }

            })

            .catch(error => {

                console.error(
                    'Gagal menandai pesan:',
                    error
                );

            });

        }

    }


    // =========================
    // TUTUP POPUP
    // =========================

    function tutupPesan() {

        document.getElementById('popupPesan').style.display =
            'none';

    }


    // =========================
    // KLIK AREA LUAR POPUP
    // =========================

    document
        .getElementById('popupPesan')
        .addEventListener(
            'click',
            function(event) {

                if (event.target === this) {

                    tutupPesan();

                }

            }
        );


    // =========================
    // TOMBOL ESC
    // =========================

    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                tutupPesan();

            }

        }
    );

</script>

@endsection