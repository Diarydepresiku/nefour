<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\PesanKontak;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahJurusan = Jurusan::count();

        $jumlahArtikel = Artikel::count();

        $jumlahGaleri = Galeri::count();

        $jumlahProduk = Produk::count();

        $jumlahPesan = PesanKontak::count();

        $pesanBelumDibaca = PesanKontak::where(
            'sudah_dibaca',
            false
        )->count();

        $pesanTerbaru = PesanKontak::latest()
            ->take(5)
            ->get();

        $artikelTerbaru = Artikel::latest(
            'tanggal_publikasi'
        )->take(5)->get();

        $galeriTerbaru = Galeri::latest()
            ->take(4)
            ->get();

        return view('admin.dashboard', compact(
            'jumlahJurusan',
            'jumlahArtikel',
            'jumlahGaleri',
            'jumlahProduk',
            'jumlahPesan',
            'pesanBelumDibaca',
            'pesanTerbaru',
            'artikelTerbaru',
            'galeriTerbaru'
        ));
    }
}