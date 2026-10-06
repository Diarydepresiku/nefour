<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('created_at', 'desc')->get();

        return view('produk.index', compact('produks'));
    }

    public function show($slug)
    {
        $produk = Produk::where('slug', $slug)->firstOrFail();

        return view('produk.show', compact('produk'));
    }
}