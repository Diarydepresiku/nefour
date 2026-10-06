<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Kegiatan Siswa',
            'Kegiatan Sekolah',
            'Pembelajaran',
            'Prestasi',
            'Event',
            'Fasilitas',
        ];

        for ($i = 1; $i <= 20; $i++) {
            $kategoriSekarang = $kategori[($i - 1) % count($kategori)];

            Galeri::create([
                'judul' => 'Galeri ' . $i,
                'gambar' => "https://picsum.photos/seed/galeri{$i}/600/600",
                'deskripsi' => 'Dokumentasi ' . strtolower($kategoriSekarang) . ' SMKN 4 Bogor',
            ]);
        }
    }
}