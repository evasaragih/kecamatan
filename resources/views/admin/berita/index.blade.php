@extends('layouts.admin')

@section('title', 'Kelola Berita - Admin Panel')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.berita.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Berita
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Dilihat</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                    <tr>
                        <td>{{ Str::limit($berita->judul, 50) }}</td>
                        <td><span class="badge bg-secondary-subtle text-secondary-emphasis">{{ $berita->kategori }}</span></td>
                        <td>{{ $berita->tanggal_publish?->translatedFormat('d M Y') }}</td>
                        <td>
                            @if($berita->is_published)
                                <span class="badge bg-success">Terbit</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>{{ $berita->dilihat }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $beritas->links() }}
</div>
@endsection
