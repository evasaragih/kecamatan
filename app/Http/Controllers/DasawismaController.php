<?php

namespace App\Http\Controllers;

use App\Models\Dasawisma;

class DasawismaController extends Controller
{
    public function index()
    {
        $dasawismas = Dasawisma::with('kelurahan')->orderBy('nama')->get();

        return view('dasawisma.index', compact('dasawismas'));
    }

    public function show(string $slug)
    {
        $dasawisma = Dasawisma::with('kelurahan')->where('slug', $slug)->firstOrFail();

        return view('dasawisma.show', compact('dasawisma'));
    }
}
