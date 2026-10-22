<?php

namespace App\Http\Controllers;

use App\Models\KantorPemerintahan;

class AlamatPemerintahanController extends Controller
{
    public function index()
    {
        $kantors = KantorPemerintahan::orderBy('urutan')->orderBy('id')->get();

        return view('alamat-pemerintahan.index', compact('kantors'));
    }
}
