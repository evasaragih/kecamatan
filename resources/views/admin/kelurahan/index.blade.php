@extends('layouts.admin')

@section('title', 'Kelola Kelurahan - Admin Panel')
@section('page-title', 'Kelola Kelurahan')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.kelurahan.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kelurahan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Kelurahan</th>
                    <th>Lurah</th>
                    <th>Jumlah Penduduk</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelurahans as $kelurahan)
                    <tr>
                        <td>{{ $kelurahan->nama }}</td>
                        <td>{{ $kelurahan->nama_lurah ?? '-' }}</td>
                        <td>{{ $kelurahan->jumlah_penduduk ? number_format($kelurahan->jumlah_penduduk, 0, ',', '.') : '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('kelurahan.show', $kelurahan->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.kelurahan.edit', $kelurahan) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.kelurahan.destroy', $kelurahan) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kelurahan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada data kelurahan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $kelurahans->links() }}
</div>
@endsection
