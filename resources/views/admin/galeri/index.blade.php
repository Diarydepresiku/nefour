@extends('layouts.admin')

@section('title', 'Kelola Galeri')

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
                Kelola Galeri
            </h1>

            <p>
                Kelola dokumentasi kegiatan dan aktivitas SMKN 4 Bogor.
            </p>

        </div>

        <a
            href="{{ route('admin.galeri.create') }}"
            class="btn-add"
        >
            + Tambah Galeri
        </a>

    </div>


    {{-- =========================
         SUCCESS
    ========================== --}}
    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================
         GALERI TABLE
    ========================== --}}
    <div class="galeri-table-card">

        <div class="table-header">

            <div>

                <h2>
                    Daftar Galeri
                </h2>

                <p>
                    Semua dokumentasi yang tersimpan di database.
                </p>

            </div>

            <span>
                {{ $galeris->count() }} Galeri
            </span>

        </div>


        @if($galeris->count())

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($galeris as $galeri)

                            <tr>

                                {{-- FOTO --}}
                                <td>

                                    @if($galeri->gambar)

                                        <img
                                            src="{{ asset($galeri->gambar) }}"
                                            class="galeri-thumb"
                                            alt="{{ $galeri->judul }}"
                                        >

                                    @else

                                        <div class="no-thumb">
                                            -
                                        </div>

                                    @endif

                                </td>


                                {{-- JUDUL --}}
                                <td>

                                    <div class="galeri-name">

                                        <strong>
                                            {{ $galeri->judul }}
                                        </strong>

                                        <small>
                                            Galeri Sekolah
                                        </small>

                                    </div>

                                </td>


                                {{-- KATEGORI --}}
                                <td>

                                    @if($galeri->kategori)

                                        <span class="category">
                                            {{ $galeri->kategori }}
                                        </span>

                                    @else

                                        <span class="empty">
                                            Umum
                                        </span>

                                    @endif

                                </td>


                                {{-- DESKRIPSI --}}
                                <td>

                                    @if($galeri->deskripsi)

                                        <div class="description">
                                            {{ Str::limit($galeri->deskripsi, 90) }}
                                        </div>

                                    @else

                                        <span class="empty">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('admin.galeri.edit', $galeri) }}"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.galeri.destroy', $galeri) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    🖼️
                </div>

                <h3>
                    Belum ada galeri
                </h3>

                <p>
                    Tambahkan dokumentasi pertama untuk ditampilkan di website.
                </p>

                <a
                    href="{{ route('admin.galeri.create') }}"
                    class="btn-add-empty"
                >
                    + Tambah Galeri
                </a>

            </div>

        @endif

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
   BUTTON ADD
========================= */

.btn-add {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 11px 17px;

    border-radius: 9px;

    background: #1d4ed8;
    color: white;

    font-weight: 700;
    font-size: 13px;

    border: none;

    cursor: pointer;
    text-decoration: none;

    transition: .2s ease;
}

.btn-add:hover {
    background: #1e40af;
}


/* =========================
   SUCCESS
========================= */

.alert-success {
    margin-bottom: 20px;

    padding: 13px 16px;

    border-radius: 10px;

    background: #dcfce7;
    color: #166534;

    font-size: 13px;
    font-weight: 600;
}


/* =========================
   TABLE CARD
========================= */

.galeri-table-card {
    background: white;

    border: 1px solid #e5e7eb;

    border-radius: 15px;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(15, 23, 42, .05);
}


/* =========================
   TABLE HEADER
========================= */

.table-header {
    padding: 20px 22px;

    display: flex;
    justify-content: space-between;
    align-items: center;

    border-bottom: 1px solid #e5e7eb;
}

.table-header h2 {
    margin: 0;

    font-size: 18px;

    color: #0f172a;
}

.table-header p {
    margin: 4px 0 0;

    font-size: 11px;

    color: #64748b;
}

.table-header span {
    font-size: 12px;

    color: #64748b;
}


/* =========================
   TABLE
========================= */

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;

    border-collapse: collapse;
}

th {
    padding: 13px 18px;

    text-align: left;

    font-size: 10px;

    text-transform: uppercase;

    letter-spacing: .5px;

    color: #64748b;

    background: #f8fafc;

    white-space: nowrap;
}

td {
    padding: 15px 18px;

    border-top: 1px solid #f1f5f9;

    vertical-align: middle;

    font-size: 12px;

    color: #475569;
}


/* =========================
   FOTO
========================= */

.galeri-thumb,
.no-thumb {
    width: 75px;
    height: 55px;

    border-radius: 8px;

    object-fit: cover;
}

.no-thumb {
    display: flex;

    align-items: center;
    justify-content: center;

    background: #f1f5f9;

    color: #94a3b8;
}


/* =========================
   NAMA
========================= */

.galeri-name {
    display: flex;

    flex-direction: column;

    gap: 4px;
}

.galeri-name strong {
    color: #0f172a;
}

.galeri-name small {
    color: #94a3b8;

    font-size: 10px;
}


/* =========================
   CATEGORY
========================= */

.category {
    display: inline-block;

    padding: 5px 9px;

    border-radius: 999px;

    background: #dbeafe;

    color: #1d4ed8;

    font-size: 10px;

    font-weight: 700;
}


/* =========================
   DESCRIPTION
========================= */

.description {
    max-width: 300px;

    color: #64748b;

    line-height: 1.5;
}

.empty {
    color: #94a3b8;
}


/* =========================
   ACTION
========================= */

.actions {
    display: flex;

    align-items: center;

    gap: 7px;
}

.btn-edit,
.btn-delete {
    padding: 7px 11px;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 700;

    cursor: pointer;

    text-decoration: none;

    border: none;

    transition: .2s ease;
}

.btn-edit {
    background: #eff6ff;

    color: #1d4ed8;
}

.btn-edit:hover {
    background: #dbeafe;
}

.btn-delete {
    background: #fef2f2;

    color: #dc2626;
}

.btn-delete:hover {
    background: #fee2e2;
}


/* =========================
   EMPTY
========================= */

.empty-state {
    text-align: center;

    padding: 70px 25px;
}

.empty-icon {
    font-size: 42px;

    margin-bottom: 12px;
}

.empty-state h3 {
    margin: 0 0 7px;

    font-size: 20px;

    color: #0f172a;
}

.empty-state p {
    margin-bottom: 20px;

    color: #64748b;

    font-size: 12px;
}

.btn-add-empty {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    padding: 10px 15px;

    border-radius: 8px;

    background: #1d4ed8;

    color: white;

    text-decoration: none;

    font-size: 12px;

    font-weight: 700;
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

    .btn-add {
        width: 100%;
    }

}

</style>

@endsection