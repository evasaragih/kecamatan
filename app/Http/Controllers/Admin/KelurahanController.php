<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::orderBy('nama')->paginate(10);

        return view('admin.kelurahan.index', compact('kelurahans'));
    }

    public function create()
    {
        return view('admin.kelurahan.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kelurahan', 'public');
        }

        Kelurahan::create($data);

        return redirect()->route('admin.kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan.');
    }

    public function edit(Kelurahan $kelurahan)
    {
        return view('admin.kelurahan.edit', compact('kelurahan'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['nama']);

        if ($request->hasFile('foto')) {
            if ($kelurahan->foto) {
                Storage::disk('public')->delete($kelurahan->foto);
            }
            $data['foto'] = $request->file('foto')->store('kelurahan', 'public');
        }

        $kelurahan->update($data);

        return redirect()->route('admin.kelurahan.index')->with('success', 'Kelurahan berhasil diperbarui.');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        if ($kelurahan->foto) {
            Storage::disk('public')->delete($kelurahan->foto);
        }
        $kelurahan->delete();

        return back()->with('success', 'Kelurahan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nama_lurah' => ['nullable', 'string', 'max:255'],
            'alamat_kantor' => ['nullable', 'string', 'max:255'],
            'jumlah_penduduk' => ['nullable', 'integer'],
            'luas_wilayah_km2' => ['nullable', 'integer'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:10240'],
        ]);
    }
}
