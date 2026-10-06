<?php

namespace App\Models;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'slug',
        'tanggal_publikasi',
        'foto',
        'kategori',
        'ringkasan',
        'isi',
        'jurusan_id',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}