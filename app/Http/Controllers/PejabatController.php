<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;

class PejabatController extends Controller
{
    public function index()
    {
        $pejabats = Pejabat::orderBy('urutan')->orderBy('id')->get();

        return view('pejabat.index', compact('pejabats'));
    }
}
