@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin SMKN 4 Bogor')

@section('content')

<style>
    .produk-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .produk-header h1 {
        margin: 0;
        font-size: 28px;
    }

    .produk-header p {
        margin: 6px 0 0;
        color: #6b7280;
    }

    .produk-button {
        display: inline-block;
        padding: 11px 17px;
        background: #0f3d91;
        color: white;
        text-decoration: none;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
    }

    .produk-button:hover {
        opacity: .9;
    }

    .produk-panel {
        background: white;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 4px 18px rgba(0,0,0,.05);
    }

    .produk-table-wrapper {
        overflow-x: auto;
    }

    .produk-table {
        width: 100%;
        border-collapse: collapse;
    }

    .produk-table th,
    .produk-table td {
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #edf0f5;
        vertical-align: middle;
        font-size: 14px;
    }

    .produk-table th {
        color: #64748b;
        font-size: 13px;
        background: #f8fafc;
    }

    .produk-image {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 9px;
        background: #f1f5f9;
    }

    .produk-no-image {
        width: 65px;
        height: 65px;
        border-radius: 9px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 11px;
    }

    .produk-name {
        font-weight: 600;
        color: #172033;
    }

    .produk-category {
        margin-top: 4px;
        color: #94a3b8;
        font-size: 12px;
    }

    .produk-price {
        font-weight: 600;
    }

    .produk-status {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-tersedia {
        background: #e9f8ef;
        color: #198754;
    }

    .status-terbatas {
        background: #fff5db;
        color: #a66a00;
    }

    .status-habis {
        background: #feecec;
        color: #c62828;
    }

    .produk-actions {
        display: flex;
        gap: 7px;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 8px 11px;
        border-radius: 7px;
        font-size: 12px;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-edit {
        background: #e8f1ff;
        color: #0f3d91;
    }

    .btn-delete {
        background: #feecec;
        color: #c62828;
    }

    .alert-success {
        background: #e9f8ef;
        color: #198754;
        padding: 13px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .produk-empty {
        text-align: center;
        padding: 50px 20px;
        color: #64748b;
    }

    @media (max-width: 700px) {
        .produk-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .produk-button {
            width: 100%;
            text-align: center;
        }
    }
</style>


<div class="produk-header">

    <div>
        <h1>Kelola Produk</h1>

        <p>
            Kelola produk dan karya siswa SMKN 4 Bogor.
        </p>
    </div>

    <a
        href="{{ route('admin.produk.create') }}"
        class="produk-button"
    >
        + Tambah Produk
    </a>

</div>


@if(session('success'))

    <div class="alert-success">
        {{ session('success') }}
    </div>

@endif


<div class="produk-panel">

    <div class="produk-table-wrapper">

        @if($produks->count())

            <table class="produk-table">

                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Penjual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($produks as $produk)

                        <tr>

                            {{-- FOTO --}}
                            <td>

                                @if($produk->foto)

                                    <img
                                        src="{{ asset('storage/' . $produk->foto) }}"
                                        alt="{{ $produk->nama }}"
                                        class="produk-image"
                                    >

                                @else

                                    <div class="produk-no-image">
                                        No Foto
                                    </div>

                                @endif

                            </td>


                            {{-- PRODUK --}}
                            <td>

                                <div class="produk-name">
                                    {{ $produk->nama }}
                                </div>

                                @if($produk->kategori)

                                    <div class="produk-category">
                                        {{ $produk->kategori }}
                                    </div>

                                @endif

                            </td>


                            {{-- HARGA --}}
                            <td>

                                @if($produk->harga)

                                    <span class="produk-price">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </span>

                                @else

                                    -

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($produk->status === 'Tersedia')

                                    <span class="produk-status status-tersedia">
                                        Tersedia
                                    </span>

                                @elseif($produk->status === 'Stok Terbatas')

                                    <span class="produk-status status-terbatas">
                                        Stok Terbatas
                                    </span>

                                @elseif($produk->status === 'Habis')

                                    <span class="produk-status status-habis">
                                        Habis
                                    </span>

                                @else

                                    <span class="produk-status status-habis">
                                        {{ $produk->status }}
                                    </span>

                                @endif

                            </td>


                            {{-- PENJUAL --}}
                            <td>
                                {{ $produk->penjual ?: '-' }}
                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="produk-actions">

                                    <a
                                        href="{{ route('admin.produk.edit', $produk->id) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('admin.produk.destroy', $produk->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
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

        @else

            <div class="produk-empty">

                <h3>Belum ada produk</h3>

                <p style="margin-top: 8px;">
                    Belum ada produk yang ditambahkan.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection