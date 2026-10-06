<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Produk extends Model
{
    protected $fillable = [
    'jurusan_id',
    'nama',
    'slug',
    'deskripsi',
    'foto',
    'harga',
    'status',
    'kategori',
    'produsen',
    'penjual',
    'metode_pembelian',
    'nomor_wa',
    'keterangan_pembelian',
];
public function jurusan()
{
    return $this->belongsTo(Jurusan::class);
}
}