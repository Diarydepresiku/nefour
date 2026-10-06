<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        Jurusan::create([
            'nama' => 'PPLG',
            'slug' => 'pplg',
            'panjang' => 'Pengembangan Perangkat Lunak dan Gim',
            'deskripsi' => 'Jurusan yang mempelajari pengembangan perangkat lunak dan gim.',
            'kompetensi' => [
                'Pemrograman',
                'Pengembangan aplikasi',
                'Pengembangan gim',
                'Basis data',
            ],
            'fasilitas' => [
                'Laboratorium komputer',
                'Perangkat pengembangan software',
            ],
            'kegiatan' => [
                'Praktik pemrograman',
                'Pengembangan aplikasi',
                'Proyek gim',
            ],
            'prospek' => [
                'Programmer',
                'Web Developer',
                'Game Developer',
                'Software Developer',
            ],
        ]);

        Jurusan::create([
            'nama' => 'TJKT',
            'slug' => 'tjkt',
            'panjang' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'deskripsi' => 'Jurusan yang mempelajari jaringan komputer dan telekomunikasi.',
            'kompetensi' => [
                'Jaringan komputer',
                'Administrasi jaringan',
                'Telekomunikasi',
                'Keamanan jaringan',
            ],
            'fasilitas' => [
                'Laboratorium jaringan',
                'Perangkat jaringan',
            ],
            'kegiatan' => [
                'Praktik jaringan',
                'Konfigurasi perangkat',
                'Proyek jaringan',
            ],
            'prospek' => [
                'Network Administrator',
                'Network Engineer',
                'Teknisi jaringan',
                'IT Support',
            ],
        ]);

        Jurusan::create([
            'nama' => 'TPFL',
            'slug' => 'tpfl',
            'panjang' => 'Teknik Pengelasan dan Fabrikasi Logam',
            'deskripsi' => 'Jurusan yang mempelajari teknik pengelasan dan fabrikasi logam.',
            'kompetensi' => [
                'Teknik pengelasan',
                'Fabrikasi logam',
                'Keselamatan kerja',
            ],
            'fasilitas' => [
                'Bengkel pengelasan',
                'Peralatan fabrikasi',
            ],
            'kegiatan' => [
                'Praktik pengelasan',
                'Fabrikasi logam',
                'Praktik bengkel',
            ],
            'prospek' => [
                'Welder',
                'Teknisi fabrikasi',
                'Operator produksi',
                'Industri manufaktur',
            ],
        ]);

        Jurusan::create([
            'nama' => 'TO',
            'slug' => 'to',
            'panjang' => 'Teknik Otomotif',
            'deskripsi' => 'Jurusan yang mempelajari teknik kendaraan dan otomotif.',
            'kompetensi' => [
                'Perawatan kendaraan',
                'Perbaikan kendaraan',
                'Sistem mesin',
                'Kelistrikan otomotif',
            ],
            'fasilitas' => [
                'Bengkel otomotif',
                'Peralatan praktik kendaraan',
            ],
            'kegiatan' => [
                'Praktik mesin',
                'Perawatan kendaraan',
                'Praktik kelistrikan',
            ],
            'prospek' => [
                'Mekanik',
                'Teknisi otomotif',
                'Service Advisor',
                'Industri otomotif',
            ],
        ]);
    }
}