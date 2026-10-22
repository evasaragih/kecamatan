@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Kecamatan Lubuk Kilangan')

@push('styles')
<style>
    .galeri-head { padding: clamp(6.5rem, 10vw, 8.5rem) 0 1rem; text-align: center; }
    .galeri-head h1 { font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; letter-spacing: -.02em; margin-top: .8rem; }
    .gallery-tile { position: relative; border-radius: var(--radius-sm); overflow: hidden; aspect-ratio: 4/5; }
    .gallery-tile img { width: 100%; height: 100%; object-fit: cover; transition: transform .6s var(--ease); }
    .gallery-tile:hover img { transform: scale(1.08); }
    .gallery-tile .tile-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(11,12,16,.88) 0%, rgba(11,12,16,0) 55%);
        display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem;
        opacity: 0; transition: opacity .35s ease;
    }
    .gallery-tile:hover .tile-overlay { opacity: 1; }
    .gallery-tile .tile-overlay p { color: #fff; font-size: .85rem; font-weight: 600; margin: 0; line-height: 1.35; }
    .gallery-tile .tile-overlay span { color: var(--gold-soft); font-size: .74rem; margin-top: .25rem; }
    .pagination .page-link { border-radius: 999px !important; margin: 0 .2rem; border: none; color: var(--ink-soft); }
    .pagination .page-item.active .page-link { background: var(--maroon); color: #fff; }
</style>
@endpush

@section('content')
<section class="container galeri-head">
    <span class="kicker d-inline-flex">Dokumentasi</span>
    <h1>Galeri Kegiatan</h1>
    <p class="section-lede mx-auto mt-2">Dokumentasi kegiatan Kecamatan Lubuk Kilangan</p>
</section>

@include('partials.marquee')

<section class="container pb-5">
    <div class="row g-3">
        @forelse($galeris as $foto)
            <div class="col-md-3 col-6">
                <div class="gallery-tile">
                    <img src="{{ $foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80' }}" alt="{{ $foto->judul }}" loading="lazy">
                    <div class="tile-overlay">
                        <p>{{ Str::limit($foto->judul, 45) }}</p>
                        @if($foto->tanggal_kegiatan)
                            <span>{{ $foto->tanggal_kegiatan->translatedFormat('d F Y') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-secondary">Belum ada dokumentasi.</p>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $galeris->links() }}
    </div>
</section>
@endsection
