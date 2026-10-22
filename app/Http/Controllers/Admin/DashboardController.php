<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Dasawisma;
use App\Models\Galeri;
use App\Models\Kelurahan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalKelurahan = Kelurahan::count();
        $totalDasawisma = Dasawisma::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalKelurahan', 'totalDasawisma', 'beritaTerbaru'));
    }
}
