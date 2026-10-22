@extends('layouts.admin')

@section('title', 'Kelola Alamat Pemerintahan - Admin Panel')
@section('page-title', 'Kelola Alamat Pemerintahan')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.kantor.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kantor
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Kantor</th>
                    <th>Tipe</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kantors as $kantor)
                    <tr>
                        <td>{{ $kantor->nama }}</td>
                        <td>
                            @if($kantor->tipe === 'camat')
                                <span class="badge bg-danger-subtle text-danger-emphasis">Camat</span>
                            @else
                                <span class="badge bg-info-subtle text-info-emphasis">Kelurahan</span>
                            @endif
                        </td>
                        <td class="small">{{ Str::limit($kantor->alamat, 50) }}</td>
                        <td>{{ $kantor->telepon ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.kantor.edit', $kantor) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.kantor.destroy', $kantor) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data kantor ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data kantor.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
