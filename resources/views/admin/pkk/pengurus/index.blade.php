@extends('layouts.admin')

@section('title', 'Kelola Pengurus PKK - Admin Panel')
@section('page-title', 'Kelola Pengurus PKK')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.pkk-pengurus.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Pengurus
    </a>
</div>

<div class="row g-4">
    @forelse($pengurus as $item)
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://ui-avatars.com/api/?name='.urlencode($item->nama).'&background=7f1d2e&color=fff&size=300' }}" class="card-img-top" style="height:180px;object-fit:cover;">
                <div class="card-body p-3">
                    <span class="badge bg-secondary-subtle text-secondary-emphasis mb-1">{{ $item->jabatan }}</span>
                    <p class="fw-semibold mb-1">{{ $item->nama }}</p>
                    <p class="small text-muted mb-2">Urutan: {{ $item->urutan }}</p>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.pkk-pengurus.edit', $item) }}" class="btn btn-sm btn-outline-primary flex-grow-1"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.pkk-pengurus.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data pengurus ini?')" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-secondary py-4">Belum ada data pengurus PKK.</p>
    @endforelse
</div>
@endsection
