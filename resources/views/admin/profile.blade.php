@extends('layouts.admin')

@section('title', 'Dashboard Admin - SMKN 4 Bogor')

@section('content')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* NAVBAR */

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
        }

        .admin {
            font-size: 14px;
            color: #6b7280;
        }

        /* CONTAINER */

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 25px;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #6b7280;
        }

        /* CARD */

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;

            box-shadow: 0 5px 20px rgba(0, 0, 0, .05);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* FORM */

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;

            border: 1px solid #dfe3e8;
            border-radius: 10px;

            padding: 12px 14px;

            font-size: 14px;

            outline: none;

            font-family: inherit;

            transition: .2s;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, .08);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .small-textarea {
            min-height: 180px;
        }

        /* GRID */

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        /* BUTTON */

        .button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .btn {
            border: none;

            background: #2563eb;
            color: white;

            padding: 12px 22px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        /* ALERT */

        .alert {
            background: #dcfce7;
            color: #166534;

            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;
        }

        /* FOTO */

        .photo-area {
            display: flex;
            gap: 30px;

            align-items: center;

            flex-wrap: wrap;
        }

        .photo-preview {
            width: 280px;
            height: 180px;

            border-radius: 12px;

            border: 2px dashed #d1d5db;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;

            background: #f9fafb;

            color: #9ca3af;
        }

        .photo-preview img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .photo-input {
            flex: 1;
        }

        .photo-info {
            font-size: 12px;
            color: #9ca3af;

            margin-top: 7px;
        }

        /* MOBILE */

        @media (max-width: 768px) {

            .navbar {
                padding: 0 18px;
            }

            .container {
                margin-top: 25px;
                padding: 0 15px;
            }

            .grid-2 {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .photo-area {
                flex-direction: column;
                align-items: stretch;
            }

            .photo-preview {
                width: 100%;
            }
        }
    </style>

<body>


    <main class="container">


        {{-- TITLE --}}

        <div class="page-title">

            <h1>
                Kelola Profile
            </h1>

            <p>
                Kelola informasi profile sekolah.
            </p>

        </div>


        {{-- SUCCESS --}}

        @if(session('success'))

            <div class="alert">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR --}}

        @if($errors->any())

            <div
                class="alert"
                style="background:#fee2e2;color:#991b1b;"
            >

                <ul style="padding-left:20px;">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- DESKRIPSI --}}

            <div class="card">

                <div class="card-title">
                    Deskripsi Sekolah
                </div>

                <div class="field">

                    <textarea
                        name="deskripsi"
                        placeholder="Masukkan deskripsi sekolah..."
                    >{{ old('deskripsi', $profile->deskripsi) }}</textarea>

                </div>

            </div>


            {{-- VISI MISI --}}

            <div class="grid-2">


                {{-- VISI --}}

                <div class="card">

                    <div class="card-title">
                        Visi
                    </div>

                    <textarea
                        class="small-textarea"
                        name="visi"
                        placeholder="Masukkan visi sekolah..."
                    >{{ old('visi', $profile->visi) }}</textarea>

                </div>


                {{-- MISI --}}

                <div class="card">

                    <div class="card-title">
                        Misi
                    </div>

                    <textarea
                        class="small-textarea"
                        name="misi"
                        placeholder="Masukkan misi sekolah..."
                    >{{ old('misi', $profile->misi) }}</textarea>

                </div>


            </div>


            {{-- INFORMASI SEKOLAH --}}

            <div class="card">

                <div class="card-title">
                    Informasi Sekolah
                </div>


                <div class="grid-2">


                    {{-- KIRI --}}

                    <div>


                        {{-- NAMA --}}

                        <div class="field">

                            <label>
                                Nama Sekolah
                            </label>

                            <input
                                type="text"
                                name="nama_sekolah"
                                value="{{ old('nama_sekolah', $profile->nama_sekolah) }}"
                                placeholder="Nama sekolah"
                            >

                        </div>


                        {{-- AKREDITASI --}}

                        <div class="field">

                            <label>
                                Akreditasi
                            </label>

                            <input
                                type="text"
                                name="akreditasi"
                                value="{{ old('akreditasi', $profile->akreditasi) }}"
                                placeholder="Contoh: A"
                            >

                        </div>


                        {{-- TELEPON --}}

                        <div class="field">

                            <label>
                                No. Telepon
                            </label>

                            <input
                                type="text"
                                name="no_telepon"
                                value="{{ old('no_telepon', $profile->no_telepon) }}"
                                placeholder="Nomor telepon sekolah"
                            >

                        </div>


                    </div>


                    {{-- KANAN --}}

                    <div>


                        {{-- NPSN --}}

                        <div class="field">

                            <label>
                                NPSN
                            </label>

                            <input
                                type="text"
                                name="npsn"
                                value="{{ old('npsn', $profile->npsn) }}"
                                placeholder="NPSN sekolah"
                            >

                        </div>


                        {{-- ALAMAT --}}

                        <div class="field">

                            <label>
                                Alamat
                            </label>

                            <input
                                type="text"
                                name="alamat"
                                value="{{ old('alamat', $profile->alamat) }}"
                                placeholder="Alamat sekolah"
                            >

                        </div>


                        {{-- EMAIL --}}

                        <div class="field">

                            <label>
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $profile->email) }}"
                                placeholder="Email sekolah"
                            >

                        </div>


                    </div>

                </div>


            </div>


            {{-- FOTO --}}

            <div class="card">

                <div class="card-title">
                    Foto Sekolah
                </div>


                <div class="photo-area">


                    <div class="photo-preview">

                        @if($profile->foto)

                            <img
                                src="{{ asset('storage/' . $profile->foto) }}"
                                alt="Foto Sekolah"
                            >

                        @else

                            <span>
                                Belum ada foto
                            </span>

                        @endif

                    </div>


                    <div class="photo-input">

                        <label>
                            Pilih Foto Sekolah
                        </label>

                        <input
                            type="file"
                            name="foto"
                            accept="image/*"
                        >

                        <div class="photo-info">
                            JPG, JPEG, PNG atau WEBP. Maksimal 5MB.
                        </div>

                    </div>


                </div>

            </div>


            {{-- BUTTON --}}

            <div class="button-wrapper">

                <button
                    type="submit"
                    class="btn"
                >
                    Simpan Perubahan
                </button>

            </div>


        </form>


    </main>


</body>

@endsection