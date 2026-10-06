<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = PesanKontak::latest()->get();

        return view('admin.pesan', compact('pesans'));
    }

    public function show($id)
    {
        $pesan = PesanKontak::findOrFail($id);

        // Tandai pesan sebagai sudah dibaca
        if (!$pesan->sudah_dibaca) {
            $pesan->update([
                'sudah_dibaca' => true,
            ]);
        }

        return view('admin.pesan-detail', compact('pesan'));
    }

    public function dibaca($id)
    {
        $pesan = PesanKontak::findOrFail($id);

        $pesan->update([
            'sudah_dibaca' => true,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}