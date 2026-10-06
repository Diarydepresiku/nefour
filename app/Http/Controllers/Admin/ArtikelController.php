<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('jurusan')
            ->orderBy('tanggal_publikasi', 'desc')
            ->get();

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();

        return view('admin.artikel.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:artikels,slug',
            'tanggal_publikasi' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'kategori' => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
        ]);

        // Kalau jurusan_id kosong, otomatis dianggap artikel umum
        $validated['jurusan_id'] = $validated['jurusan_id'] ?? null;

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['judul']);

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $filename = time() . '_' .
                Str::slug(
                    pathinfo(
                        $file->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('images'),
                $filename
            );

            $validated['foto'] = 'images/' . $filename;
        }

        Artikel::create($validated);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        $jurusans = Jurusan::orderBy('nama')->get();

        return view('admin.artikel.edit', compact('artikel', 'jurusans'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:artikels,slug,' . $artikel->id,
            'tanggal_publikasi' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'kategori' => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string',
            'isi' => 'nullable|string',
        ]);

        // Kalau jurusan_id kosong, otomatis dianggap artikel umum
        $validated['jurusan_id'] = $validated['jurusan_id'] ?? null;

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['judul']);

        if ($request->hasFile('foto')) {

            if ($artikel->foto) {

                $oldPhoto = public_path($artikel->foto);

                if (File::exists($oldPhoto)) {
                    File::delete($oldPhoto);
                }
            }

            $file = $request->file('foto');

            $filename = time() . '_' .
                Str::slug(
                    pathinfo(
                        $file->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )
                ) .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                public_path('images'),
                $filename
            );

            $validated['foto'] = 'images/' . $filename;

        } else {

            unset($validated['foto']);

        }

        $artikel->update($validated);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->foto) {

            $photoPath = public_path($artikel->foto);

            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }
        }

        $artikel->delete();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}