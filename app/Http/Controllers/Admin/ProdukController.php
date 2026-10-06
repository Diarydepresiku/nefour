<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Menampilkan semua produk
     */
    public function index()
    {
        $produks = Produk::with('jurusan')
            ->latest()
            ->get();

        return view('admin.produk.index', compact('produks'));
    }


    /**
     * Form tambah produk
     */
    public function create()
    {
        $jurusans = Jurusan::orderBy('nama')->get();

        return view('admin.produk.create', compact('jurusans'));
    }


    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',

            'nama' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:produks,slug',

            'deskripsi' => 'nullable|string',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'harga' => 'nullable|numeric|min:0',

            'status' => 'required|string|max:50',

            'kategori' => 'nullable|string|max:100',

            'produsen' => 'nullable|string|max:255',

            'penjual' => 'nullable|string|max:255',

            'metode_pembelian' => 'nullable|string|max:255',

            'nomor_wa' => 'nullable|string|max:30',

            'keterangan_pembelian' => 'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($data['nama']);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('produk', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        Produk::create($data);


        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    /**
     * Form edit produk
     */
    public function edit(Produk $produk)
    {
        $jurusans = Jurusan::orderBy('nama')->get();

        return view(
            'admin.produk.edit',
            compact('produk', 'jurusans')
        );
    }


    /**
     * Update produk
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',

            'nama' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:produks,slug,' . $produk->id,

            'deskripsi' => 'nullable|string',

            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'harga' => 'nullable|numeric|min:0',

            'status' => 'required|string|max:50',

            'kategori' => 'nullable|string|max:100',

            'produsen' => 'nullable|string|max:255',

            'penjual' => 'nullable|string|max:255',

            'metode_pembelian' => 'nullable|string|max:255',

            'nomor_wa' => 'nullable|string|max:30',

            'keterangan_pembelian' => 'nullable|string',
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($data['nama']);


        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }


            $data['foto'] = $request
                ->file('foto')
                ->store('produk', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $produk->update($data);


        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Hapus produk
     */
    public function destroy(Produk $produk)
    {
        /*
        |--------------------------------------------------------------------------
        | HAPUS FOTO
        |--------------------------------------------------------------------------
        */

        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $produk->delete();


        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}