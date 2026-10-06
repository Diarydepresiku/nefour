@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

<div class="artikel-form-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>

            <a
                href="{{ route('admin.artikel.index') }}"
                class="back-link"
            >
                ← Kembali ke Artikel
            </a>

            <span class="page-label">
                CONTENT MANAGEMENT
            </span>

            <h1>
                Edit Artikel
            </h1>

            <p>
                Perbarui informasi artikel yang sudah tersimpan.
            </p>

        </div>

    </div>


    {{-- ERROR --}}
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


    {{-- FORM --}}
    <div class="form-card">

        <form
            action="{{ route('admin.artikel.update', $artikel) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-grid">

                {{-- JURUSAN --}}
                <div class="form-group full">

                    <label>
                        Jurusan
                    </label>

                    <select name="jurusan_id">

                        <option
                            value=""
                            {{ old('jurusan_id', $artikel->jurusan_id) === null || old('jurusan_id', $artikel->jurusan_id) === '' ? 'selected' : '' }}
                        >
                            Umum
                        </option>

                        @foreach($jurusans as $jurusan)

                            <option
                                value="{{ $jurusan->id }}"
                                {{ old('jurusan_id', $artikel->jurusan_id) == $jurusan->id ? 'selected' : '' }}
                            >
                                {{ $jurusan->nama }}
                            </option>

                        @endforeach

                    </select>

                    <small>
                        Pilih "Umum" jika artikel berkaitan dengan kegiatan atau informasi sekolah secara keseluruhan.
                    </small>

                </div>


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
                        value="{{ old('tanggal_publikasi', $artikel->tanggal_publikasi?->format('Y-m-d')) }}"
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
                        placeholder="Kosongkan untuk dibuat otomatis"
                    >

                    <small>
                        Jika dikosongkan, slug akan dibuat otomatis dari judul.
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
                                src="{{ asset($artikel->foto) }}"
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


            {{-- ACTION --}}
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

.artikel-form-page {
    max-width: 1000px;
    margin: 0 auto;
    padding: 15px 0 60px;
}

.page-header {
    margin-bottom: 25px;
}

.back-link {
    display: inline-block;
    margin-bottom: 18px;
    color: #2563eb;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
}

.page-label {
    display: block;
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


/* ALERT */

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


/* CARD */

.form-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 15px;
    padding: 28px;
    box-shadow: 0 7px 22px rgba(15, 23, 42, .05);
}


/* FORM */

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
.form-group textarea,
.form-group select {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #dbe1ea;
    border-radius: 8px;
    padding: 11px 12px;
    outline: none;
    font-size: 12px;
    color: #1e293b;
    background: white;
    transition: .2s ease;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
}

.form-group textarea {
    resize: vertical;
    line-height: 1.6;
}

.form-group select {
    cursor: pointer;
}

.form-group small {
    color: #94a3b8;
    font-size: 10px;
    line-height: 1.5;
}


/* FOTO SAAT INI */

.current-photo {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 12px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    background: #f8fafc;
    margin-bottom: 5px;
}

.current-photo img {
    width: 90px;
    height: 65px;
    object-fit: cover;
    border-radius: 8px;
}

.current-photo div {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.current-photo strong {
    font-size: 12px;
    color: #334155;
}

.current-photo small {
    color: #94a3b8;
    font-size: 10px;
}


/* ACTION */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
}

.btn-cancel,
.btn-save {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 18px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    cursor: pointer;
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


/* RESPONSIVE */

@media (max-width: 700px) {

    .artikel-form-page {
        padding: 20px 0 50px;
    }

    .page-header h1 {
        font-size: 28px;
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