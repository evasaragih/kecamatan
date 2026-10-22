@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin Panel')
@section('page-title', 'Kelola Galeri Kegiatan')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Foto
    </a>
</div>

<div class="row g-4">
    @forelse($galeris as $foto)
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ $foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80' }}" class="card-img-top" style="height:140px;object-fit:cover;">
                <div class="card-body p-2">
                    <p class="small fw-semibold mb-1">{{ Str::limit($foto->judul, 35) }}</p>
                    <p class="small text-muted mb-2">{{ $foto->tanggal_kegiatan?->translatedFormat('d M Y') }}</p>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.galeri.edit', $foto) }}" class="btn btn-sm btn-outline-primary flex-grow-1"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-secondary py-4">Belum ada foto galeri.</p>
    @endforelse
</div>

<div class="mt-4">
    {{ $galeris->links() }}
</div>
@endsection
