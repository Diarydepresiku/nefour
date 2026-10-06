<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Kontak - Admin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #172033;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 0 24px;
        }

        .card {
            background: white;
            border: 1px solid #d9e0ea;
            border-radius: 16px;
            padding: 30px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 24px;
        }

        .subtitle {
            color: #7285a3;
            margin-bottom: 28px;
            font-size: 14px;
        }

        .success {
            background: #e5f4ec;
            color: #2e8b57;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d9e0ea;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 12px 18px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #eef2f7;
            color: #172033;
        }
    </style>
</head>

<body>

    <main class="container">

        <div class="card">

            <h1>Kelola Kontak</h1>

            <p class="subtitle">
                Ubah informasi kontak yang ditampilkan pada halaman Kontak.
            </p>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('admin.kontak.update') }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="alamat">
                        Alamat
                    </label>

                    <input
                        type="text"
                        id="alamat"
                        name="alamat"
                        value="{{ old('alamat', $kontak->alamat) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="telepon">
                        Telepon
                    </label>

                    <input
                        type="text"
                        id="telepon"
                        name="telepon"
                        value="{{ old('telepon', $kontak->telepon) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $kontak->email) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="jam_operasional">
                        Jam Operasional
                    </label>

                    <input
                        type="text"
                        id="jam_operasional"
                        name="jam_operasional"
                        value="{{ old('jam_operasional', $kontak->jam_operasional) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="maps">
                        Link Google Maps
                    </label>

                    <textarea
                        id="maps"
                        name="maps"
                        placeholder="Masukkan link Google Maps"
                    >{{ old('maps', $kontak->maps) }}</textarea>
                </div>

                <div class="actions">

                    <a
                        href="{{ route('kontak.index') }}"
                        class="btn btn-secondary"
                    >
                        Lihat Kontak
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>

</html>