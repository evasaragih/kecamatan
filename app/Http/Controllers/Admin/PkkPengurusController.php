<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PkkPengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PkkPengurusController extends Controller
{
    public function index()
    {
        $pengurus = PkkPengurus::orderBy('urutan')->orderBy('id')->get();

        return view('admin.pkk.pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        return view('admin.pkk.pengurus.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pkk/pengurus', 'public');
        }

        PkkPengurus::create($data);

        return redirect()->route('admin.pkk-pengurus.index')->with('success', 'Pengurus PKK berhasil ditambahkan.');
    }

    public function edit(PkkPengurus $pkk_pengurus)
    {
        return view('admin.pkk.pengurus.edit', ['pengurus' => $pkk_pengurus]);
    }

    public function update(Request $request, PkkPengurus $pkk_pengurus)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('foto')) {
            if ($pkk_pengurus->foto) {
                Storage::disk('public')->delete($pkk_pengurus->foto);
            }
            $data['foto'] = $request->file('foto')->store('pkk/pengurus', 'public');
        }

        $pkk_pengurus->update($data);

        return redirect()->route('admin.pkk-pengurus.index')->with('success', 'Data pengurus PKK berhasil diperbarui.');
    }

    public function destroy(PkkPengurus $pkk_pengurus)
    {
        if ($pkk_pengurus->foto) {
            Storage::disk('public')->delete($pkk_pengurus->foto);
        }
        $pkk_pengurus->delete();

        return back()->with('success', 'Data pengurus PKK berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'urutan' => ['nullable', 'integer'],
            'foto' => ['nullable', 'image', 'max:10240'],
        ]);
    }
}
