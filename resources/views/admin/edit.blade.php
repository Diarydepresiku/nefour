@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

<div class="edit-artikel-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <span class="page-label">
                CONTENT MANAGEMENT
            </span>

            <h1>
                Edit Artikel
            </h1>

            <p>
                Perbarui informasi artikel SMKN 4 Bogor.
            </p>
        </div>

        <a
            href="{{ route('admin.artikel.index') }}"
            class="btn-back"
        >
            ← Kembali
        </a>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert-error">

            <strong>
                Ada data yang belum benar:
            </strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    {{-- FORM EDIT --}}
    <div class="form-card">

        <div class="form-header">

            <div>
                <span class="form-label">
                    EDIT ARTIKEL
                </span>

                <h2>
                    {{ $artikel->judul }}
                </h2>

                <p>
                    Ubah data artikel kemudian simpan perubahan.
                </p>
            </div>

        </div>


        <form
            action="{{ route('admin.artikel.update', $artikel) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="form-grid">

                {{-- JUDUL --}}
                <div class="form-group full">

                    <label>
                        Judul Artikel
                    </label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul', $artikel->judul) }}"
                        placeholder="Masukkan judul artikel"
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
                        value="{{ old('kategori', $artikel->kategori) }}"
                        placeholder="Contoh: Berita Sekolah"
                    >

                </div>


                {{-- TANGGAL --}}
                <div class="form-group">

                    <label>
                        Tanggal Publikasi
                    </label>

                    <input
                        type="date"
                        name="tanggal_publikasi"
                        value="{{ old(
                            'tanggal_publikasi',
                            $artikel->tanggal_publikasi?->format('Y-m-d')
                        ) }}"
                    >

                </div>


                {{-- SLUG --}}
                <div class="form-group full">

                    <label>
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        value="{{ old('slug', $artikel->slug) }}"
                        placeholder="Slug artikel"
                    >

                    <small>
                        Contoh: kegiatan-upacara-hari-senin
                    </small>

                </div>


                {{-- FOTO --}}
                <div class="form-group full">

                    <label>
                        Foto Artikel
                    </label>


                    @if($artikel->foto)

                        <div class="current-photo">

                            <img
                                src="{{ asset('storage/' . $artikel->foto) }}"
                                alt="{{ $artikel->judul }}"
                            >

                            <div>
                                <strong>
                                    Foto saat ini
                                </strong>

                                <small>
                                    Upload foto baru jika ingin menggantinya.
                                </small>
                            </div>

                        </div>

                    @endif


                    <input
                        type="file"
                        name="foto"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small>
                        Maksimal 5 MB. Format JPG, JPEG, PNG, atau WEBP.
                    </small>

                </div>


                {{-- RINGKASAN --}}
                <div class="form-group full">

                    <label>
                        Ringkasan
                    </label>

                    <textarea
                        name="ringkasan"
                        rows="5"
                        placeholder="Tuliskan ringkasan artikel..."
                    >{{ old('ringkasan', $artikel->ringkasan) }}</textarea>

                </div>


                {{-- ISI --}}
                <div class="form-group full">

                    <label>
                        Isi Artikel
                    </label>

                    <textarea
                        name="isi"
                        rows="12"
                        placeholder="Tuliskan isi artikel..."
                    >{{ old('isi', $artikel->isi) }}</textarea>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="form-actions">

                <a
                    href="{{ route('admin.artikel.index') }}"
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

.edit-artikel-page {
    max-width: 1000px;
    margin: 0 auto;
    padding: 15px 0 60px;
}


/* =========================
   HEADER
========================= */

.page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
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
   BUTTON
========================= */

.btn-back,
.btn-cancel,
.btn-save {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 17px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    border: none;
}

.btn-back {
    background: #f1f5f9;
    color: #475569;
}

.btn-back:hover {
    background: #e2e8f0;
}

.btn-cancel {
    background: #f1f5f9;
    color: #475569;
}

.btn-save {
    background: #1d4ed8;
    color: white;
}

.btn-save:hover {
    background: #1e40af;
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
   FORM
========================= */

.form-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 15px;
    padding: 27px;
    box-shadow: 0 7px 22px rgba(15, 23, 42, .05);
}

.form-header {
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eef2f7;
}

.form-label {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
    color: #64748b;
}

.form-header h2 {
    margin: 6px 0;
    font-size: 21px;
    color: #0f172a;
}

.form-header p {
    margin: 0;
    font-size: 12px;
    color: #64748b;
}


/* =========================
   GRID
========================= */

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
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
    border: 1px solid #dbe1ea;
    border-radius: 8px;
    padding: 11px 12px;
    outline: none;
    font-size: 12px;
    color: #1e293b;
    background: white;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
}

.form-group textarea {
    resize: vertical;
    line-height: 1.6;
}

.form-group small {
    color: #94a3b8;
    font-size: 10px;
}


/* =========================
   FOTO SAAT INI
========================= */

.current-photo {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
}

.current-photo img {
    width: 120px;
    height: 85px;
    border-radius: 8px;
    object-fit: cover;
}

.current-photo strong {
    display: block;
    font-size: 12px;
    color: #334155;
    margin-bottom: 4px;
}

.current-photo small {
    display: block;
    color: #94a3b8;
}


/* =========================
   ACTION
========================= */

.form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #eef2f7;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 700px) {

    .edit-artikel-page {
        padding: 20px 0 50px;
    }

    .page-header {
        flex-direction: column;
        align-items: stretch;
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

    .current-photo {
        align-items: flex-start;
        flex-direction: column;
    }

    .current-photo img {
        width: 100%;
        height: 180px;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn-cancel,
    .btn-save {
        width: 100%;
    }

}

</style>

@endsection