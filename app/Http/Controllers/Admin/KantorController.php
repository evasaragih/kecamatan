<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KantorPemerintahan;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    public function index()
    {
        $kantors = KantorPemerintahan::orderBy('urutan')->orderBy('id')->get();

        return view('admin.kantor.index', compact('kantors'));
    }

    public function create()
    {
        return view('admin.kantor.create');
    }

    public function store(Request $request)
    {
        KantorPemerintahan::create($this->validateData($request));

        return redirect()->route('admin.kantor.index')->with('success', 'Kantor berhasil ditambahkan.');
    }

    public function edit(KantorPemerintahan $kantor)
    {
        return view('admin.kantor.edit', compact('kantor'));
    }

    public function update(Request $request, KantorPemerintahan $kantor)
    {
        $kantor->update($this->validateData($request));

        return redirect()->route('admin.kantor.index')->with('success', 'Data kantor berhasil diperbarui.');
    }

    public function destroy(KantorPemerintahan $kantor)
    {
        $kantor->delete();

        return back()->with('success', 'Data kantor berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'in:camat,kelurahan'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'urutan' => ['nullable', 'integer'],
        ]);
    }
}
