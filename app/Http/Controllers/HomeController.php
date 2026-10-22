<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kelurahan;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::published()->latest('tanggal_publish')->take(3)->get();
        $galeri = Galeri::latest('tanggal_kegiatan')->take(4)->get();
        $totalKelurahan = Kelurahan::count();

        return view('home', compact('beritaTerbaru', 'galeri', 'totalKelurahan'));
    }
}
