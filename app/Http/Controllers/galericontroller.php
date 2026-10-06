<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $galeris = $query
            ->orderBy('created_at', 'desc')
            ->get();

        return view('galeri.index', compact('galeris'));
    }
}