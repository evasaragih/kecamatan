<?php

namespace App\Http\Controllers;

use App\Models\ProfilPage;

class ProfilController extends Controller
{
    public function show(string $slug)
    {
        $page = ProfilPage::where('slug', $slug)->firstOrFail();

        return view('profil.show', compact('page'));
    }
}
