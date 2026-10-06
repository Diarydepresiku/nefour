<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::create([
            'alamat' => 'Jl. Pendidikan Raya No. 4, Kota Bogor, Jawa Barat',
            'telepon' => '(0251) 123-4567',
            'email' => 'info@smkn4bogor.sch.id',
            'jam_operasional' => 'Senin - Jumat, 07.00 - 15.30 WIB',
            'maps' => 'https://www.google.com/maps',
        ]);
    }
}