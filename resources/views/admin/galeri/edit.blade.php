@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')

<div class="admin-galeri-page">

    {{-- =========================
         HEADER
    ========================== --}}
    <div class="page-header">

        <div>

            <span class="page-label">
                CONTENT MANAGEMENT
            </span>

            <h1>
                Edit Galeri
            </h1>

            <p>
                Perbarui informasi dan dokumentasi galeri sekolah.
            </p>

        </div>

        <a
            href="{{ route('admin.galeri.index') }}"
            class="btn-back"
        >
            ← Kembali ke Galeri
        </a>

    </div>


    {{-- =========================
         ERROR
    ========================== --}}
    @if($errors->any())

        <div class="alert-error">

            <strong>
                Ada data yang belum benar:
            </strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================
         FORM
    ========================== --}}
    <div class="form-card">

        <div class="form-header">

            <div>

                <span class="form-label">
                    EDIT GALERI
                </span>

                <h2>
                    {{ $galeri->judul }}
                </h2>

                <p>
                    Perbarui informasi galeri atau ganti foto dokumentasi.
                </p>

            </div>

        </div>


        <form
            action="{{ route('admin.galeri.update', $galeri) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">


                {{-- JUDUL --}}
                <div class="form-group full">

                    <label>
                        Judul Galeri
                    </label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul', $galeri->judul) }}"
                        placeholder="Masukkan judul galeri"
                        required
                    >

                </div>


                {{-- KATEGORI --}}
                <div class="form-group">

                    <label>
                        Kategori
                    </label>

                    <input
                        type="text"
                        name="kategori"
                        value="{{ old('kategori', $galeri->kategori) }}"
                        placeholder="Contoh: Kegiatan Sekolah"
                    >

                    <small>
                        Contoh: Kegiatan, Prestasi, Lomba, Upacara, dan lainnya.
                    </small>

                </div>


                {{-- FOTO BARU --}}
                <div class="form-group">

                    <label>
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small>
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                </div>


                {{-- FOTO SAAT INI --}}
                @if($galeri->gambar)

                    <div class="form-group full">

                        <label>
                            Foto Saat Ini
                        </label>

                        <div class="current-image-wrapper">

                            <img
                                src="{{ asset($galeri->gambar) }}"
                                alt="{{ $galeri->judul }}"
                                class="current-image"
                            >

                        </div>

                    </div>

                @endif


                {{-- DESKRIPSI --}}
                <div class="form-group full">

                    <label>
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="7"
                        placeholder="Tuliskan deskripsi singkat tentang foto kegiatan..."
                    >{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                </div>


            </div>


            {{-- ACTION --}}
            <div class="form-actions">

                <a
                    href="{{ route('admin.galeri.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-save"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


<style>

/* =========================
   PAGE
========================= */

.admin-galeri-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px 0 60px;
}


/* =========================
   HEADER
========================= */

.page-header {
    display: flex;

    justify-content: space-between;

    align-items: flex-end;

    gap: 30px;

    margin-bottom: 25px;
}

.page-label {
    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.5px;

    color: #64748b;
}

.page-header h1 {
    margin: 7px 0;

    font-size: 32px;

    color: #0f172a;
}

.page-header p {
    margin: 0;

    color: #64748b;

    font-size: 13px;
}


/* =========================
   BACK
========================= */

.btn-back {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 10px 15px;

    border-radius: 9px;

    background: #f1f5f9;

    color: #334155;

    border: 1px solid #e2e8f0;

    font-weight: 700;

    font-size: 12px;

    text-decoration: none;

    transition: .2s ease;
}

.btn-back:hover {
    background: #e2e8f0;
}


/* =========================
   ERROR
========================= */

.alert-error {
    margin-bottom: 20px;

    padding: 15px 18px;

    border-radius: 10px;

    background: #fef2f2;

    color: #991b1b;

    font-size: 13px;
}

.alert-error ul {
    margin: 8px 0 0 20px;
}


/* =========================
   FORM CARD
========================= */

.form-card {
    background: white;

    border: 1px solid #e5e7eb;

    border-radius: 15px;

    padding: 25px;

    box-shadow:
        0 7px 22px rgba(15, 23, 42, .05);
}

.form-header {
    margin-bottom: 25px;

    padding-bottom: 18px;

    border-bottom: 1px solid #f1f5f9;
}

.form-label {
    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1.2px;

    color: #64748b;
}

.form-header h2 {
    margin: 6px 0;

    font-size: 20px;

    color: #0f172a;
}

.form-header p {
    margin: 0;

    color: #64748b;

    font-size: 12px;
}


/* =========================
   GRID
========================= */

.form-grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;
}

.form-group {
    display: flex;

    flex-direction: column;

    gap: 7px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 12px;

    font-weight: 700;

    color: #334155;
}

.form-group input,
.form-group textarea {
    width: 100%;

    box-sizing: border-box;

    border: 1px solid #dbe1ea;

    border-radius: 9px;

    padding: 11px 12px;

    outline: none;

    font-family: inherit;

    font-size: 12px;

    color: #1e293b;

    background: #fff;

    transition: .2s ease;
}

.form-group input {
    min-height: 42px;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #2563eb;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .08);
}

.form-group textarea {
    resize: vertical;

    line-height: 1.6;
}

.form-group input[type="file"] {
    padding: 9px 10px;

    cursor: pointer;
}

.form-group small {
    color: #94a3b8;

    font-size: 10px;

    line-height: 1.5;
}


/* =========================
   CURRENT IMAGE
========================= */

.current-image-wrapper {
    padding: 15px;

    background: #f8fafc;

    border: 1px solid #e5e7eb;

    border-radius: 10px;

    width: fit-content;
}

.current-image {
    display: block;

    width: 280px;

    height: 190px;

    object-fit: cover;

    border-radius: 8px;
}


/* =========================
   ACTION
========================= */

.form-actions {
    margin-top: 25px;

    padding-top: 20px;

    border-top: 1px solid #f1f5f9;

    display: flex;

    justify-content: flex-end;

    align-items: center;

    gap: 10px;
}

.btn-save {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 11px 18px;

    border-radius: 9px;

    background: #1d4ed8;

    color: white;

    font-weight: 700;

    font-size: 13px;

    border: none;

    cursor: pointer;

    transition: .2s ease;
}

.btn-save:hover {
    background: #1e40af;
}

.btn-cancel {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 10px 17px;

    border-radius: 9px;

    background: #f8fafc;

    color: #475569;

    border: 1px solid #e2e8f0;

    font-weight: 700;

    font-size: 13px;

    text-decoration: none;

    transition: .2s ease;
}

.btn-cancel:hover {
    background: #f1f5f9;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 700px) {

    .admin-galeri-page {
        padding: 20px 0 50px;
    }

    .page-header {
        flex-direction: column;

        align-items: stretch;
    }

    .page-header h1 {
        font-size: 28px;
    }

    .btn-back {
        width: 100%;
    }

    .form-card {
        padding: 20px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full {
        grid-column: auto;
    }

    .current-image {
        width: 100%;

        max-width: 280px;

        height: auto;

        aspect-ratio: 16 / 10;
    }

    .form-actions {
        flex-direction: column-reverse;

        align-items: stretch;
    }

    .btn-save,
    .btn-cancel {
        width: 100%;
    }

}

</style>

@endsection