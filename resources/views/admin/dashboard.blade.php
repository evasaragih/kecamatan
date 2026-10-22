@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-newspaper fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $totalBerita }}</h3>
                    <p class="text-secondary small mb-0">Total Berita</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-images fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $totalGaleri }}</h3>
                    <p class="text-secondary small mb-0">Total Foto Galeri</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-city fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $totalKelurahan }}</h3>
                    <p class="text-secondary small mb-0">Total Kelurahan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-people-roof fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $totalDasawisma }}</h3>
                    <p class="text-secondary small mb-0">Total Dasawisma</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Berita Terbaru</div>
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritaTerbaru as $berita)
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
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
