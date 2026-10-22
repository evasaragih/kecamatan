<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PkkProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PkkProfilController extends Controller
{
    public function edit()
    {
        $profil = PkkProfil::first();

        if (! $profil) {
            $profil = PkkProfil::create([
                'nama_ketua' => null,
                'sambutan' => null,
                'visi' => null,
                'misi' => null,
            ]);
        }

        return view('admin.pkk.profil', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = PkkProfil::first() ?? new PkkProfil();

        $data = $request->validate([
            'nama_ketua' => ['nullable', 'string', 'max:255'],
            'sambutan' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:10240'],
        ]);

        if ($request->hasFile('foto')) {
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('pkk', 'public');
        }

        $profil->fill($data)->save();

        return redirect()->route('admin.pkk-profil.edit')->with('success', 'Profil PKK berhasil diperbarui.');
    }
}
