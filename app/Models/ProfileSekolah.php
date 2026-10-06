<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    protected $table = 'profile_sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'deskripsi',
        'visi',
        'misi',
        'akreditasi',
        'no_telepon',
        'npsn',
        'alamat',
        'email',
        'foto',
    ];
}