<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');

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
                public_path('images/galeri'),
                $filename
            );

            $validated['gambar'] = 'images/galeri/' . $filename;
        }

        Galeri::create($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {

            if ($galeri->gambar) {
                $oldPhoto = public_path($galeri->gambar);

                if (File::exists($oldPhoto)) {
                    File::delete($oldPhoto);
                }
            }

            $file = $request->file('gambar');

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
                public_path('images/galeri'),
                $filename
            );

            $validated['gambar'] = 'images/galeri/' . $filename;
        } else {
            unset($validated['gambar']);
        }

        $galeri->update($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            $photoPath = public_path($galeri->gambar);

            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}
