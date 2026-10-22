@extends('layouts.admin')

@section('title', 'Kelola Program Pokok PKK - Admin Panel')
@section('page-title', 'Kelola 10 Program Pokok PKK')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.pkk-program.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Program
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:60px;">Urutan</th>
                    <th style="width:60px;">Ikon</th>
                    <th>Judul Program</th>
                    <th>Deskripsi</th>
                    <th class="text-end" style="width:120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programs as $program)
                    <tr>
                        <td>{{ $program->urutan }}</td>
                        <td><i class="{{ $program->icon ?: 'fa-solid fa-star' }} text-danger"></i></td>
                        <td class="fw-semibold">{{ $program->judul }}</td>
                        <td class="small text-muted">{{ Str::limit($program->deskripsi, 80) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.pkk-program.edit', $program) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.pkk-program.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus program ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data program pokok PKK.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
