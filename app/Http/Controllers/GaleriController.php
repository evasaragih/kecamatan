<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest('tanggal_kegiatan')->paginate(12);

        return view('galeri.index', compact('galeris'));
    }
}
