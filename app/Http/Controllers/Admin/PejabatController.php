<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PejabatController extends Controller
{
    public function index()
    {
        $pejabats = Pejabat::orderBy('urutan')->orderBy('id')->get();

        return view('admin.pejabat.index', compact('pejabats'));
    }

    public function create()
    {
        return view('admin.pejabat.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        Pejabat::create($data);

        return redirect()->route('admin.pejabat.index')->with('success', 'Pejabat berhasil ditambahkan.');
    }

    public function edit(Pejabat $pejabat)
    {
        return view('admin.pejabat.edit', compact('pejabat'));
    }

    public function update(Request $request, Pejabat $pejabat)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('foto')) {
            if ($pejabat->foto) {
                Storage::disk('public')->delete($pejabat->foto);
            }
            $data['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        $pejabat->update($data);

        return redirect()->route('admin.pejabat.index')->with('success', 'Data pejabat berhasil diperbarui.');
    }

    public function destroy(Pejabat $pejabat)
    {
        if ($pejabat->foto) {
            Storage::disk('public')->delete($pejabat->foto);
        }
        $pejabat->delete();

        return back()->with('success', 'Data pejabat berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'urutan' => ['nullable', 'integer'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
