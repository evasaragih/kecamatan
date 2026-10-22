<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PkkProgram;
use Illuminate\Http\Request;

class PkkProgramController extends Controller
{
    public function index()
    {
        $programs = PkkProgram::orderBy('urutan')->orderBy('id')->get();

        return view('admin.pkk.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.pkk.program.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        PkkProgram::create($data);

        return redirect()->route('admin.pkk-program.index')->with('success', 'Program pokok PKK berhasil ditambahkan.');
    }

    public function edit(PkkProgram $pkk_program)
    {
        return view('admin.pkk.program.edit', ['program' => $pkk_program]);
    }

    public function update(Request $request, PkkProgram $pkk_program)
    {
        $data = $this->validateData($request);

        $pkk_program->update($data);

        return redirect()->route('admin.pkk-program.index')->with('success', 'Program pokok PKK berhasil diperbarui.');
    }

    public function destroy(PkkProgram $pkk_program)
    {
        $pkk_program->delete();

        return back()->with('success', 'Program pokok PKK berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'urutan' => ['nullable', 'integer'],
        ]);
    }
}
