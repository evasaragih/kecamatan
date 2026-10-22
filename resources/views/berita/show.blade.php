@extends('layouts.app')

@section('title', $berita->judul.' - Kecamatan Lubuk Kilangan')

@push('styles')
<style>
    .berita-show-head { padding: clamp(6.5rem, 10vw, 8.5rem) 0 1rem; }
    .berita-show-head .badge { background: var(--maroon-tint); color: var(--maroon); font-weight: 600; padding: .5rem 1rem; border-radius: 999px; }
    .berita-show-head h1 { font-size: clamp(1.9rem, 4vw, 3rem); font-weight: 800; letter-spacing: -.02em; line-height: 1.15; margin: 1rem 0; }
    .berita-meta { color: var(--muted); font-size: .92rem; }
    .berita-cover { border-radius: var(--radius-lg); overflow: hidden; box-shadow: 0 24px 55px rgba(15,10,10,.12); margin: 2rem 0; }
    .berita-cover img { width: 100%; display: block; }
    .berita-body { font-size: 1.05rem; color: var(--ink-soft); line-height: 1.85; }
    .berita-body img { border-radius: var(--radius-sm); }
    .related-title { font-size: 1.5rem; font-weight: 700; letter-spacing: -.01em; }
</style>
@endpush

@section('content')
<section class="container berita-show-head">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <span class="badge">{{ $berita->kategori }}</span>
            <h1>{{ $berita->judul }}</h1>
            <p class="berita-meta">
                <i class="fa-regular fa-calendar me-1"></i> {{ $berita->tanggal_publish->translatedFormat('d F Y') }}
                &nbsp;&bull;&nbsp;
                <i class="fa-regular fa-eye me-1"></i> {{ $berita->dilihat }} dilihat
            </p>
        </div>
    </div>
</section>

<section class="container pb-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="berita-cover">
                <img src="{{ $berita->foto ? asset('storage/'.$berita->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=1000&q=80' }}" alt="{{ $berita->judul }}">
            </div>
            <div class="berita-body">
                {!! $berita->isi !!}
            </div>

            <a href="{{ route('berita.index') }}" class="btn btn-outline-dark rounded-pill px-4 mt-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Berita
            </a>

            @if($terkait->count())
                <hr class="my-5">
                <h4 class="related-title mb-4">Berita Terkait</h4>
                <div class="row g-4">
                    @foreach($terkait as $item)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm card-news">
                                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=600&q=80' }}" class="card-img-top" alt="{{ $item->judul }}">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">{{ Str::limit($item->judul, 50) }}</h6>
                                    <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-sm btn-outline-secondary w-100 mt-auto">Baca</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
