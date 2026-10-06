<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        Artikel::create([
            'judul' => 'Siswa PPLG Raih Juara di Kompetisi Coding Nasional',
            'slug' => 'siswa-pplg-raih-juara-di-kompetisi-coding-nasional',
            'tanggal_publikasi' => Carbon::now()->subDays(1),
            'foto' => 'https://picsum.photos/seed/artikel1/800/500',
            'kategori' => 'Prestasi',
            'ringkasan' => 'Tim PPLG SMKN 4 Bogor berhasil membawa pulang penghargaan dari kompetisi coding tingkat nasional.',
            'isi' => 'Tim Pengembangan Perangkat Lunak dan Gim SMKN 4 Bogor berhasil meraih juara pada kompetisi coding tingkat nasional yang diselenggarakan awal bulan ini. Prestasi ini menjadi bukti nyata kualitas pembelajaran di jurusan PPLG yang terus mendorong siswa untuk berinovasi dan berkompetisi di tingkat yang lebih tinggi. Para siswa mempersiapkan diri melalui pelatihan intensif bersama guru pembimbing selama beberapa minggu sebelum perlombaan berlangsung.',
        ]);

        Artikel::create([
            'judul' => 'Kunjungan Industri Jurusan TJKT ke Perusahaan Telekomunikasi',
            'slug' => 'kunjungan-industri-jurusan-tjkt-ke-perusahaan-telekomunikasi',
            'tanggal_publikasi' => Carbon::now()->subDays(3),
            'foto' => 'https://picsum.photos/seed/artikel2/800/500',
            'kategori' => 'Kegiatan',
            'ringkasan' => 'Siswa TJKT melakukan kunjungan industri untuk melihat langsung penerapan jaringan skala besar.',
            'isi' => 'Dalam rangka memperluas wawasan siswa mengenai dunia kerja, jurusan Teknik Jaringan Komputer dan Telekomunikasi mengadakan kunjungan industri ke salah satu perusahaan telekomunikasi terkemuka. Siswa berkesempatan melihat langsung proses instalasi dan pemeliharaan jaringan berskala besar serta berdiskusi dengan para praktisi di lapangan.',
        ]);

        Artikel::create([
            'judul' => 'Bengkel Las TPFL Raih Sertifikasi Standar Industri',
            'slug' => 'bengkel-las-tpfl-raih-sertifikasi-standar-industri',
            'tanggal_publikasi' => Carbon::now()->subDays(6),
            'foto' => 'https://picsum.photos/seed/artikel3/800/500',
            'kategori' => 'Sekolah',
            'ringkasan' => 'Fasilitas bengkel pengelasan sekolah kini telah memenuhi standar sertifikasi industri.',
            'isi' => 'Bengkel pengelasan milik jurusan Teknik Pengelasan dan Fabrikasi Logam SMKN 4 Bogor resmi mendapatkan sertifikasi sesuai standar industri. Pencapaian ini diharapkan dapat meningkatkan kualitas lulusan agar semakin siap bersaing di dunia kerja maupun membuka usaha sendiri di bidang fabrikasi logam.',
        ]);

        Artikel::create([
            'judul' => 'Penerimaan Peserta Didik Baru Tahun Ajaran Mendatang Segera Dibuka',
            'slug' => 'penerimaan-peserta-didik-baru-tahun-ajaran-mendatang-segera-dibuka',
            'tanggal_publikasi' => Carbon::now()->subDays(7),
            'foto' => 'https://picsum.photos/seed/artikel4/800/500',
            'kategori' => 'Pengumuman',
            'ringkasan' => 'Simak jadwal dan alur pendaftaran PPDB SMKN 4 Bogor untuk tahun ajaran mendatang.',
            'isi' => 'SMKN 4 Bogor akan segera membuka pendaftaran peserta didik baru untuk tahun ajaran mendatang. Calon peserta didik dapat mempersiapkan berkas-berkas yang diperlukan mulai dari sekarang. Informasi lebih lanjut mengenai jadwal, jalur pendaftaran, dan persyaratan akan diumumkan melalui kanal resmi sekolah.',
        ]);

        Artikel::create([
            'judul' => 'Praktik Servis Kendaraan Gratis untuk Warga Sekitar Sekolah',
            'slug' => 'praktik-servis-kendaraan-gratis-untuk-warga-sekitar-sekolah',
            'tanggal_publikasi' => Carbon::now()->subDays(12),
            'foto' => 'https://picsum.photos/seed/artikel5/800/500',
            'kategori' => 'Kegiatan',
            'ringkasan' => 'Jurusan Teknik Otomotif mengadakan layanan servis kendaraan gratis sebagai bentuk pengabdian masyarakat.',
            'isi' => 'Sebagai wujud pengabdian kepada masyarakat sekaligus sarana praktik langsung bagi siswa, jurusan Teknik Otomotif mengadakan kegiatan servis kendaraan gratis untuk warga di sekitar lingkungan sekolah. Kegiatan ini disambut antusias dan menjadi agenda rutin setiap semester.',
        ]);

        Artikel::create([
            'judul' => 'Workshop Pengembangan Gim Bersama Praktisi Industri',
            'slug' => 'workshop-pengembangan-gim-bersama-praktisi-industri',
            'tanggal_publikasi' => Carbon::now()->subDays(20),
            'foto' => 'https://picsum.photos/seed/artikel6/800/500',
            'kategori' => 'Kegiatan',
            'ringkasan' => 'Siswa PPLG mengikuti workshop pengembangan gim yang dipandu langsung oleh praktisi industri.',
            'isi' => 'Jurusan Pengembangan Perangkat Lunak dan Gim mengadakan workshop bersama praktisi dari industri pengembangan gim. Kegiatan ini memberikan wawasan praktis kepada siswa mengenai alur kerja produksi gim, mulai dari perancangan konsep hingga tahap publikasi.',
        ]);
    }
}