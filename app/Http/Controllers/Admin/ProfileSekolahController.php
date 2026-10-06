<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $profile = ProfileSekolah::first();

        if (!$profile) {
            $profile = ProfileSekolah::create([
                'nama_sekolah' => 'SMKN 4 Bogor',
            ]);
        }

        return view('admin.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = ProfileSekolah::first();

        $validated = $request->validate([
            'nama_sekolah' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'akreditasi' => 'nullable|string|max:50',
            'no_telepon' => 'nullable|string|max:30',
            'npsn' => 'nullable|string|max:30',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {

            if (
                $profile->foto &&
                Storage::disk('public')->exists($profile->foto)
            ) {
                Storage::disk('public')->delete($profile->foto);
            }

            $validated['foto'] = $request
                ->file('foto')
                ->store('profile-sekolah', 'public');
        }

        $profile->update($validated);

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Profile sekolah berhasil diperbarui.');
    }
}