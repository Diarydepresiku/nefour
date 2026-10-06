<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();

        return view('kontak.index', compact('kontak'));
    }

    /*
    |--------------------------------------------------------------------------
    | Simpan pesan dari pengunjung
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subjek' => 'nullable|string|max:150',
            'pesan' => 'required|string',
        ]);

        PesanKontak::create($data);

        return back()->with(
            'success',
            'Pesan berhasil dikirim. Terima kasih sudah menghubungi SMKN 4 Bogor.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Admin - Edit informasi kontak sekolah
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $kontak = Kontak::first();

        return view('admin.kontak', compact('kontak'));
    }

    /*
    |--------------------------------------------------------------------------
    | Admin - Update informasi kontak sekolah
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'jam_operasional' => 'required|string|max:255',
            'maps' => 'nullable|string',
        ]);

        $kontak = Kontak::first();

        $kontak->update([
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'jam_operasional' => $request->jam_operasional,
            'maps' => $request->maps,
        ]);

        return redirect()
            ->route('admin.kontak')
            ->with(
                'success',
                'Informasi kontak berhasil disimpan.'
            );
    }
}