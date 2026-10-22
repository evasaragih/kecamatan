<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PkkKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PkkKegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = PkkKegiatan::orderByDesc('tanggal_kegiatan')->orderByDesc('id')->paginate(12);

        return view('admin.pkk.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.pkk.kegiatan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
            'foto' => ['required', 'image', 'max:10240'],
            'tanggal_kegiatan' => ['required', 'date'],
        ]);

        $data['foto'] = $request->file('foto')->store('pkk/kegiatan', 'public');

        PkkKegiatan::create($data);

        return redirect()->route('admin.pkk-kegiatan.index')->with('success', 'Kegiatan PKK berhasil ditambahkan.');
    }

    public function edit(PkkKegiatan $pkk_kegiatan)
    {
        return view('admin.pkk.kegiatan.edit', ['kegiatan' => $pkk_kegiatan]);
    }

    public function update(Request $request, PkkKegiatan $pkk_kegiatan)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:10240'],
            'tanggal_kegiatan' => ['required', 'date'],
        ]);

        if ($request->hasFile('foto')) {
            if ($pkk_kegiatan->foto) {
                Storage::disk('public')->delete($pkk_kegiatan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pkk/kegiatan', 'public');
        }

        $pkk_kegiatan->update($data);

        return redirect()->route('admin.pkk-kegiatan.index')->with('success', 'Kegiatan PKK berhasil diperbarui.');
    }

    public function destroy(PkkKegiatan $pkk_kegiatan)
    {
        if ($pkk_kegiatan->foto) {
            Storage::disk('public')->delete($pkk_kegiatan->foto);
        }
        $pkk_kegiatan->delete();

        return back()->with('success', 'Kegiatan PKK berhasil dihapus.');
    }
}
