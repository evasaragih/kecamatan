<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::published()->latest('tanggal_publish')->paginate(9);

        return view('berita.index', compact('beritas'));
    }

    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->increment('dilihat');

        $terkait = Berita::published()
            ->where('id', '!=', $berita->id)
            ->latest('tanggal_publish')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'terkait'));
    }
}
