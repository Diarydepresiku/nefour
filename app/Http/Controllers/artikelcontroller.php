<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy(
            'tanggal_publikasi',
            'desc'
        )->get();

        return view(
            'artikel.index',
            compact('artikels')
        );
    }

    public function show($slug)
    {
        $artikel = Artikel::where(
            'slug',
            $slug
        )->firstOrFail();

        return view(
            'artikel.show',
            compact('artikel')
        );
    }
}