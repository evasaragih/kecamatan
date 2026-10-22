@extends('layouts.admin')

@section('title', 'Kelola Pejabat Struktural - Admin Panel')
@section('page-title', 'Kelola Pejabat Struktural')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.pejabat.create') }}" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Pejabat
    </a>
</div>

<div class="row g-4">
    @forelse($pejabats as $pejabat)
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ $pejabat->foto ? asset('storage/'.$pejabat->foto) : 'https://ui-avatars.com/api/?name='.urlencode($pejabat->nama).'&background=0f172a&color=fff&size=300' }}" class="card-img-top" style="height:180px;object-fit:cover;">
                <div class="card-body p-3">
                    <span class="badge bg-secondary-subtle text-secondary-emphasis mb-1">{{ $pejabat->jabatan }}</span>
                    <p class="fw-semibold mb-1">{{ $pejabat->nama }}</p>
                    <p class="small text-muted mb-2">Urutan: {{ $pejabat->urutan }}</p>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.pejabat.edit', $pejabat) }}" class="btn btn-sm btn-outline-primary flex-grow-1"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.pejabat.destroy', $pejabat) }}" method="POST" onsubmit="return confirm('Hapus data pejabat ini?')" class="flex-grow-1">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-secondary py-4">Belum ada data pejabat.</p>
    @endforelse
</div>
@endsection
