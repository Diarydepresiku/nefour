<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = ProfileSekolah::first();

        return view('profile.index', compact('profile'));
    }
}
