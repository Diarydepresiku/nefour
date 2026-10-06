<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama' => 'Kaos Almamater SMKN 4 Bogor',
            'slug' => 'kaos-almamater-smkn-4-bogor',
            'kategori' => 'Atribut',
            'harga' => 95000,
            'status' => 'Tersedia',
            'foto' => 'https://picsum.photos/seed/produk1/700/700',
            'deskripsi' => 'Kaos almamater resmi berbahan katun combed nyaman dipakai sehari-hari.',
        ]);

        Produk::create([
            'nama' => 'Topi Sekolah',
            'slug' => 'topi-sekolah',
            'kategori' => 'Atribut',
            'harga' => 35000,
            'status' => 'Tersedia',
            'foto' => 'https://picsum.photos/seed/produk2/700/700',
            'deskripsi' => 'Topi identitas sekolah dengan bordir logo resmi.',
        ]);

        Produk::create([
            'nama' => 'Dasi Sekolah',
            'slug' => 'dasi-sekolah',
            'kategori' => 'Atribut',
            'harga' => 25000,
            'status' => 'Tersedia',
            'foto' => 'https://picsum.photos/seed/produk3/700/700',
            'deskripsi' => 'Dasi seragam resmi sesuai ketentuan sekolah.',
        ]);

        Produk::create([
            'nama' => 'Miniatur Robot Karya Siswa PPLG',
            'slug' => 'miniatur-robot-karya-siswa-pplg',
            'kategori' => 'Karya Siswa',
            'harga' => 150000,
            'status' => 'Stok Terbatas',
            'foto' => 'https://picsum.photos/seed/produk4/700/700',
            'deskripsi' => 'Hasil karya proyek siswa jurusan PPLG, dibuat dengan mikrokontroler.',
        ]);

        Produk::create([
            'nama' => 'Rak Besi Hasil Fabrikasi TPFL',
            'slug' => 'rak-besi-hasil-fabrikasi-tpfl',
            'kategori' => 'Karya Siswa',
            'harga' => 275000,
            'status' => 'Tersedia',
            'foto' => 'https://picsum.photos/seed/produk5/700/700',
            'deskripsi' => 'Rak besi hasil praktik fabrikasi logam siswa, kokoh dan siap pakai.',
        ]);

        Produk::create([
            'nama' => 'Perlengkapan Praktik Otomotif',
            'slug' => 'perlengkapan-praktik-otomotif',
            'kategori' => 'Perlengkapan',
            'harga' => 60000,
            'status' => 'Habis',
            'foto' => 'https://picsum.photos/seed/produk6/700/700',
            'deskripsi' => 'Paket perlengkapan dasar praktik untuk siswa jurusan Teknik Otomotif.',
        ]);
    }
}