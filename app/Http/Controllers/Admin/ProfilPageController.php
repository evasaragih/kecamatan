<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPageController extends Controller
{
    public function index()
    {
        $pages = ProfilPage::orderBy('judul')->get();

        return view('admin.profil.index', compact('pages'));
    }

    public function edit(ProfilPage $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, ProfilPage $profil)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'konten' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'max:10240'],
        ]);

        if ($request->hasFile('foto')) {
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        $profil->update($data);

        return redirect()->route('admin.profil.index')->with('success', 'Halaman profil berhasil diperbarui.');
    }
}
