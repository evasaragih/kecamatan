<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dasawisma;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DasawismaController extends Controller
{
    public function index()
    {
        $dasawismas = Dasawisma::with('kelurahan')->orderBy('nama')->paginate(10);

        return view('admin.dasawisma.index', compact('dasawismas'));
    }

    public function create()
    {
        $kelurahans = Kelurahan::orderBy('nama')->get();

        return view('admin.dasawisma.create', compact('kelurahans'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = Str::slug($data['nama']).'-'.Str::random(4);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('dasawisma', 'public');
        }

        Dasawisma::create($data);

        return redirect()->route('admin.dasawisma.index')->with('success', 'Dasawisma berhasil ditambahkan.');
    }

    public function edit(Dasawisma $dasawisma)
    {
        $kelurahans = Kelurahan::orderBy('nama')->get();

        return view('admin.dasawisma.edit', compact('dasawisma', 'kelurahans'));
    }

    public function update(Request $request, Dasawisma $dasawisma)
    {
        $data = $this->validateData($request);

        if ($dasawisma->nama !== $data['nama']) {
            $data['slug'] = Str::slug($data['nama']).'-'.Str::random(4);
        }

        if ($request->hasFile('foto')) {
            if ($dasawisma->foto) {
                Storage::disk('public')->delete($dasawisma->foto);
            }
            $data['foto'] = $request->file('foto')->store('dasawisma', 'public');
        }

        $dasawisma->update($data);

        return redirect()->route('admin.dasawisma.index')->with('success', 'Dasawisma berhasil diperbarui.');
    }

    public function destroy(Dasawisma $dasawisma)
    {
        if ($dasawisma->foto) {
            Storage::disk('public')->delete($dasawisma->foto);
        }
        $dasawisma->delete();

        return back()->with('success', 'Dasawisma berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'kelurahan_id' => ['nullable', 'exists:kelurahans,id'],
            'nama' => ['required', 'string', 'max:255'],
            'nama_ketua' => ['nullable', 'string', 'max:255'],
            'wilayah' => ['nullable', 'string', 'max:255'],
            'jumlah_kk' => ['nullable', 'integer'],
            'jumlah_anggota' => ['nullable', 'integer'],
            'kegiatan' => ['nullable', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:10240'],
        ]);
    }
}
