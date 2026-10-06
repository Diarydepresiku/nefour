@extends('layouts.admin')

@section('title', 'Edit Produk - Admin SMKN 4 Bogor')

@section('content')

<style>
    .produk-form-header {
        margin-bottom: 22px;
    }

    .produk-form-header h1 {
        margin: 0;
        font-size: 28px;
    }

    .produk-form-header p {
        margin-top: 6px;
        color: #6b7280;
    }

    .produk-form-card {
        background: white;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,.05);
        max-width: 900px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-size: 14px;
        font-weight: 600;
        color: #263247;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #8a94a6;
        font-size: 12px;
    }

    .form-control {
        width: 100%;
        border: 1px solid #dbe1ea;
        border-radius: 8px;
        padding: 11px 13px;
        font-size: 14px;
        outline: none;
        font-family: inherit;
        background: white;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #0f3d91;
        box-shadow: 0 0 0 3px rgba(15,61,145,.08);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .error {
        color: #c62828;
        font-size: 12px;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        padding-top: 8px;
        border-top: 1px solid #edf0f5;
        margin-top: 5px;
    }

    .btn {
        border: none;
        border-radius: 8px;
        padding: 11px 18px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        font-family: inherit;
    }

    .btn-primary {
        background: #0f3d91;
        color: white;
    }

    .btn-secondary {
        background: #eef2f7;
        color: #475569;
    }

    .btn-primary:hover {
        opacity: .9;
    }

    .required {
        color: #c62828;
    }

    .current-photo {
        margin-top: 12px;
    }

    .current-photo img {
        width: 180px;
        height: 130px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        display: block;
    }

    .current-photo span {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        color: #8a94a6;
    }

    @media (max-width: 700px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .produk-form-card {
            padding: 18px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            text-align: center;
        }

        .current-photo img {
            width: 100%;
            height: 180px;
        }
    }
</style>


<div class="produk-form-header">

    <h1>Edit Produk</h1>

    <p>
        Perbarui informasi produk atau karya siswa.
    </p>

</div>


<div class="produk-form-card">

    <form
        action="{{ route('admin.produk.update', $produk) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="form-grid">


            {{-- NAMA PRODUK --}}
            <div class="form-group full">

                <label for="nama">
                    Nama Produk <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama', $produk->nama) }}"
                    placeholder="Contoh: Kaos SMKN 4 Bogor"
                    required
                >

                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- JURUSAN --}}
            <div class="form-group full">

                <label for="jurusan_id">
                    Jurusan <span class="required">*</span>
                </label>

                <select
                    id="jurusan_id"
                    name="jurusan_id"
                    class="form-control"
                    required
                >

                    <option value="">
                        -- Pilih Jurusan --
                    </option>

                    @foreach($jurusans as $jurusan)

                        <option
                            value="{{ $jurusan->id }}"
                            {{ old('jurusan_id', $produk->jurusan_id) == $jurusan->id ? 'selected' : '' }}
                        >
                            {{ $jurusan->nama }}
                        </option>

                    @endforeach

                </select>

                <small>
                    Pilih jurusan yang memiliki atau membuat produk ini.
                </small>

                @error('jurusan_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- KATEGORI --}}
            <div class="form-group">

                <label for="kategori">
                    Kategori
                </label>

                <input
                    type="text"
                    id="kategori"
                    name="kategori"
                    class="form-control"
                    value="{{ old('kategori', $produk->kategori) }}"
                    placeholder="Contoh: Fashion"
                >

                @error('kategori')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- HARGA --}}
            <div class="form-group">

                <label for="harga">
                    Harga
                </label>

                <input
                    type="number"
                    id="harga"
                    name="harga"
                    class="form-control"
                    value="{{ old('harga', $produk->harga) }}"
                    placeholder="Contoh: 75000"
                    min="0"
                >

                <small>
                    Isi angka saja tanpa Rp atau titik.
                </small>

                @error('harga')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- STATUS --}}
            <div class="form-group">

                <label for="status">
                    Status <span class="required">*</span>
                </label>

                <select
                    id="status"
                    name="status"
                    class="form-control"
                    required
                >

                    <option value="">
                        -- Pilih Status --
                    </option>

                    <option
                        value="Tersedia"
                        {{ old('status', $produk->status) === 'Tersedia' ? 'selected' : '' }}
                    >
                        Tersedia
                    </option>

                    <option
                        value="Stok Terbatas"
                        {{ old('status', $produk->status) === 'Stok Terbatas' ? 'selected' : '' }}
                    >
                        Stok Terbatas
                    </option>

                    <option
                        value="Habis"
                        {{ old('status', $produk->status) === 'Habis' ? 'selected' : '' }}
                    >
                        Habis
                    </option>

                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- PRODUSEN --}}
            <div class="form-group">

                <label for="produsen">
                    Produsen
                </label>

                <input
                    type="text"
                    id="produsen"
                    name="produsen"
                    class="form-control"
                    value="{{ old('produsen', $produk->produsen) }}"
                    placeholder="Contoh: XI PPLG 2"
                >

                @error('produsen')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- PENJUAL --}}
            <div class="form-group">

                <label for="penjual">
                    Penjual
                </label>

                <input
                    type="text"
                    id="penjual"
                    name="penjual"
                    class="form-control"
                    value="{{ old('penjual', $produk->penjual) }}"
                    placeholder="Contoh: XI PPLG 2"
                >

                @error('penjual')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- NOMOR WHATSAPP --}}
            <div class="form-group">

                <label for="nomor_wa">
                    Nomor WhatsApp Penjual
                </label>

                <input
                    type="text"
                    id="nomor_wa"
                    name="nomor_wa"
                    class="form-control"
                    value="{{ old('nomor_wa', $produk->nomor_wa) }}"
                    placeholder="Contoh: 081234567890"
                >

                <small>
                    Nomor yang akan dihubungi pengunjung.
                </small>

                @error('nomor_wa')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- METODE PEMBELIAN --}}
            <div class="form-group">

                <label for="metode_pembelian">
                    Metode Pembelian
                </label>

                <select
                    id="metode_pembelian"
                    name="metode_pembelian"
                    class="form-control"
                >

                    <option value="">
                        -- Pilih Metode --
                    </option>

                    <option
                        value="Pesan melalui WhatsApp"
                        {{ old('metode_pembelian', $produk->metode_pembelian) === 'Pesan melalui WhatsApp' ? 'selected' : '' }}
                    >
                        Pesan melalui WhatsApp
                    </option>

                    <option
                        value="Datang langsung"
                        {{ old('metode_pembelian', $produk->metode_pembelian) === 'Datang langsung' ? 'selected' : '' }}
                    >
                        Datang langsung
                    </option>

                </select>

                @error('metode_pembelian')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- FOTO --}}
            <div class="form-group full">

                <label for="foto">
                    Foto Produk
                </label>

                <input
                    type="file"
                    id="foto"
                    name="foto"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small>
                    Upload foto baru jika ingin mengganti foto lama.
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>


                @if($produk->foto)

                    <div class="current-photo">

                        <img
                            src="{{ asset('storage/' . $produk->foto) }}"
                            alt="{{ $produk->nama }}"
                        >

                        <span>
                            Foto produk saat ini
                        </span>

                    </div>

                @endif


                @error('foto')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- DESKRIPSI --}}
            <div class="form-group full">

                <label for="deskripsi">
                    Deskripsi Produk
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    class="form-control"
                    placeholder="Jelaskan produk secara singkat..."
                >{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            {{-- KETERANGAN PEMBELIAN --}}
            <div class="form-group full">

                <label for="keterangan_pembelian">
                    Keterangan Pembelian
                </label>

                <textarea
                    id="keterangan_pembelian"
                    name="keterangan_pembelian"
                    class="form-control"
                    placeholder="Contoh: Pemesanan dilakukan melalui WhatsApp kepada penjual."
                >{{ old('keterangan_pembelian', $produk->keterangan_pembelian) }}</textarea>

                @error('keterangan_pembelian')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


        </div>


        {{-- ACTION --}}
        <div class="form-actions">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Simpan Perubahan
            </button>

            <a
                href="{{ route('admin.produk.index') }}"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </div>

    </form>

</div>

@endsection