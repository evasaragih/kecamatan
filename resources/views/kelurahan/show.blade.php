@extends('layouts.app')

@section('title', $kelurahan->nama.' - Kecamatan Lubuk Kilangan')

@push('styles')
<style>
    .kel-show-hero {
        position: relative;
        min-height: 46vh;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        color: #fff;
        padding: 8rem 0 3.5rem;
    }
    .kel-show-hero .hero-bg-img {
        position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;
    }
    .kel-show-hero .hero-bg-overlay {
        position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(180deg, rgba(11,12,16,.15) 0%, rgba(11,12,16,.88) 100%);
    }
    .kel-show-hero .container { position: relative; z-index: 2; }
    .kel-show-hero .kicker { color: var(--gold-soft); }
    .kel-show-hero .kicker::before { background: var(--gold-soft); }
    .kel-show-hero h1 { color: #fff; font-size: clamp(2.2rem, 4.6vw, 3.6rem); font-weight: 800; letter-spacing: -.02em; margin-top: .6rem; }

    .kel-detail-body { padding: clamp(3rem, 6vw, 5rem) 0; }
    .kel-fact-card {
        background: var(--surface);
        border-radius: var(--radius-md);
        box-shadow: 0 20px 45px rgba(15,10,10,.08);
        padding: clamp(1.75rem, 3vw, 2.5rem);
    }
    .kel-fact-row { display: flex; justify-content: space-between; gap: 1rem; padding: .95rem 0; border-bottom: 1px solid var(--line); }
    .kel-fact-row:last-child { border-bottom: none; }
    .kel-fact-label { color: var(--muted); font-size: .88rem; }
    .kel-fact-value { font-weight: 600; text-align: right; color: var(--ink); font-size: .92rem; }
    .kel-desc-title { font-size: 1.6rem; font-weight: 700; letter-spacing: -.01em; }
    .kel-desc-text { color: var(--muted); font-size: 1.02rem; white-space: pre-line; }
</style>
@endpush

@section('content')

<section class="kel-show-hero">
    <img src="{{ $kelurahan->foto ? asset('storage/'.$kelurahan->foto) : 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1600&q=80' }}" alt="{{ $kelurahan->nama }}" class="hero-bg-img">
    <div class="hero-bg-overlay"></div>
    <div class="container">
        <span class="kicker">Profil Kelurahan</span>
        <h1>{{ $kelurahan->nama }}</h1>
    </div>
</section>

<section class="kel-detail-body">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="kel-desc-title mb-3">Deskripsi</h2>
                <p class="kel-desc-text">{{ $kelurahan->deskripsi }}</p>

                <a href="{{ route('kelurahan.index') }}" class="btn btn-outline-dark rounded-pill px-4 mt-3">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Kelurahan
                </a>
            </div>
            <div class="col-lg-5">
                <div class="kel-fact-card">
                    <div class="kel-fact-row">
                        <span class="kel-fact-label">Lurah</span>
                        <span class="kel-fact-value">{{ $kelurahan->nama_lurah ?? '-' }}</span>
                    </div>
                    <div class="kel-fact-row">
                        <span class="kel-fact-label">Alamat Kantor</span>
                        <span class="kel-fact-value">{{ $kelurahan->alamat_kantor ?? '-' }}</span>
                    </div>
                    <div class="kel-fact-row">
                        <span class="kel-fact-label">Jumlah Penduduk</span>
                        <span class="kel-fact-value">{{ $kelurahan->jumlah_penduduk ? number_format($kelurahan->jumlah_penduduk, 0, ',', '.').' jiwa' : '-' }}</span>
                    </div>
                    <div class="kel-fact-row">
                        <span class="kel-fact-label">Luas Wilayah</span>
                        <span class="kel-fact-value">{{ $kelurahan->luas_wilayah_km2 ? $kelurahan->luas_wilayah_km2.' km²' : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
