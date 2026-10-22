<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::orderBy('nama')->get();

        return view('kelurahan.index', compact('kelurahans'));
    }

    public function show(string $slug)
    {
        $kelurahan = Kelurahan::where('slug', $slug)->firstOrFail();

        return view('kelurahan.show', compact('kelurahan'));
    }
}
