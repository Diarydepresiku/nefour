<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'logo',
        'foto',
        'deskripsi',
        'visi',
        'misi',
        'npsn',
        'akreditasi',
        'alamat',
        'telepon',
        'email',
    ];

    protected $casts = [
        'misi' => 'array',
    ];
}