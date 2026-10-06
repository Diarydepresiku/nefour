@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')

<div class="admin-artikel-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <span class="page-label">
                CONTENT MANAGEMENT
            </span>

            <h1>
                Kelola Artikel
            </h1>

            <p>
                Kelola berita, informasi, dan kegiatan SMKN 4 Bogor.
            </p>
        </div>

        <a
            href="{{ route('admin.artikel.create') }}"
            class="btn-add"
        >
            + Tambah Artikel
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


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


    {{-- DAFTAR ARTIKEL --}}
    <div class="artikel-table-card">

        <div class="table-header">

            <div>
                <h2>
                    Daftar Artikel
                </h2>

                <p>
                    Semua artikel yang sudah diposting atau tersimpan.
                </p>
            </div>

            <span>
                {{ $artikels->count() }} Artikel
            </span>

        </div>


        @if($artikels->count())

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Foto</th>
                            <th>Jurusan</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach($artikels as $artikel)

                            <tr>

                                {{-- FOTO --}}
                                <td>

                                    @if($artikel->foto)

                                        <img
                                            src="{{ asset($artikel->foto) }}"
                                            class="artikel-thumb"
                                            alt="{{ $artikel->judul }}"
                                        >

                                    @else

                                        <div class="no-thumb">
                                            -
                                        </div>

                                    @endif

                                </td>


                                {{-- JURUSAN --}}
                                <td>

                                    @if($artikel->jurusan)

                                        <span class="jurusan-badge">
                                            {{ $artikel->jurusan->nama }}
                                        </span>

                                    @else

                                        <span class="empty">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- JUDUL --}}
                                <td>

                                    <div class="artikel-name">

                                        <strong>
                                            {{ $artikel->judul }}
                                        </strong>

                                        <small>
                                            /{{ $artikel->slug }}
                                        </small>

                                    </div>

                                </td>


                                {{-- KATEGORI --}}
                                <td>

                                    @if($artikel->kategori)

                                        <span class="category">
                                            {{ $artikel->kategori }}
                                        </span>

                                    @else

                                        <span class="empty">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    {{ $artikel->tanggal_publikasi?->format('d M Y') ?? '-' }}

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('admin.artikel.edit', $artikel) }}"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            action="{{ route('admin.artikel.destroy', $artikel) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
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
                    📰
                </div>

                <h3>
                    Belum ada artikel
                </h3>

                <p>
                    Belum ada artikel yang ditambahkan.
                </p>

                <a
                    href="{{ route('admin.artikel.create') }}"
                    class="btn-empty-add"
                >
                    + Tambah Artikel
                </a>

            </div>

        @endif

    </div>

</div>


<style>

.admin-artikel-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px 0 60px;
}


/* HEADER */

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


/* BUTTON */

.btn-add,
.btn-empty-add {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 17px;
    border-radius: 9px;
    background: #1d4ed8;
    color: white;
    font-weight: 700;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-size: 13px;
}

.btn-add:hover,
.btn-empty-add:hover {
    background: #1e40af;
}


/* ALERT */

.alert-success {
    margin-bottom: 20px;
    padding: 13px 16px;
    border-radius: 10px;
    background: #dcfce7;
    color: #166534;
    font-size: 13px;
    font-weight: 600;
}

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


/* TABLE */

.artikel-table-card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 7px 22px rgba(15, 23, 42, .05);
}

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
    margin-top: 4px;
    font-size: 11px;
    color: #64748b;
}

.table-header span {
    font-size: 12px;
    color: #64748b;
}

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


/* FOTO */

.artikel-thumb,
.no-thumb {
    width: 65px;
    height: 52px;
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


/* JURUSAN */

.jurusan-badge {
    display: inline-block;
    padding: 5px 9px;
    border-radius: 999px;
    background: #eff6ff;
    color: #1d4ed8;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}


/* JUDUL */

.artikel-name {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.artikel-name strong {
    color: #0f172a;
}

.artikel-name small {
    color: #94a3b8;
}


/* CATEGORY */

.category {
    display: inline-block;
    padding: 5px 9px;
    border-radius: 999px;
    background: #dbeafe;
    color: #1d4ed8;
    font-size: 10px;
    font-weight: 700;
}

.empty {
    color: #94a3b8;
}


/* ACTION */

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
}

.btn-edit {
    background: #eff6ff;
    color: #1d4ed8;
}

.btn-delete {
    background: #fef2f2;
    color: #dc2626;
}


/* EMPTY */

.empty-state {
    text-align: center;
    padding: 70px 25px;
}

.empty-icon {
    font-size: 40px;
    margin-bottom: 12px;
}

.empty-state h3 {
    margin: 0 0 7px;
    font-size: 20px;
    color: #0f172a;
}

.empty-state p {
    color: #64748b;
    font-size: 12px;
    margin-bottom: 20px;
}


/* RESPONSIVE */

@media (max-width: 700px) {

    .admin-artikel-page {
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

    .table-wrapper {
        overflow-x: auto;
    }

}

</style>

@endsection