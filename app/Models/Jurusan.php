<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Artikel;

class Jurusan extends Model
{
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }

    protected $fillable = [
        'nama',
        'slug',
        'panjang',
        'deskripsi',
        'kompetensi',
        'fasilitas',
        'kegiatan',
        'prospek',
    ];

    protected $casts = [
        'kompetensi' => 'array',
        'fasilitas' => 'array',
        'kegiatan' => 'array',
        'prospek' => 'array',
    ];
}