@extends('layouts.app')

@section('title', 'Dasawisma - Kecamatan Lubuk Kilangan')
@section('body-class', 'is-immersive')

@push('styles')
<style>
    /* ============================================================
       HERO — flat maroon gradient (mengikuti referensi desain),
       bukan foto, dengan pola titik halus + statistik 2x2 di kanan.
       ============================================================ */
    .dw-hero {
        position: relative;
        overflow: hidden;
        padding: 9.5rem 0 7rem;
        background: linear-gradient(155deg, var(--maroon) 0%, var(--maroon-deep) 100%);
        color: #fff;
    }
    .dw-hero::before {
        content: '';
        position: absolute; inset: 0;
        background-image: radial-gradient(rgba(255,255,255,.14) 1.5px, transparent 1.5px);
        background-size: 26px 26px;
        opacity: .5;
        pointer-events: none;
    }
    .dw-hero-wave {
        position: absolute; left: 0; right: 0; bottom: -1px; line-height: 0; z-index: 2;
    }
    .dw-hero-wave svg { display: block; width: 100%; height: 90px; }
    .dw-hero .container { position: relative; z-index: 3; }

    .dw-badge {
        display: inline-flex; align-items: center; gap: .55rem;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.22);
        color: #fff;
        font-size: .82rem; font-weight: 600;
        padding: .5rem 1.1rem; border-radius: 999px;
        backdrop-filter: blur(6px);
        opacity: 0; animation: heroFadeUp .8s var(--ease) .1s forwards;
    }
    .dw-badge .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--gold-soft); display: inline-block; }

    .dw-hero h1 {
        font-weight: 800; letter-spacing: -.02em; color: #fff;
        font-size: clamp(2.6rem, 5.6vw, 4.4rem);
        line-height: 1.06;
        margin: 1.3rem 0 1.3rem;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .25s forwards;
    }
    .dw-hero h1 .accent { color: var(--gold-soft); display: block; }

    .dw-hero .lead-text {
        color: rgba(255,255,255,.84);
        font-weight: 300; font-size: 1.08rem; max-width: 480px;
        margin-bottom: 2.2rem;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .4s forwards;
    }

    .dw-hero-actions { display: flex; gap: .9rem; flex-wrap: wrap; opacity: 0; animation: heroFadeUp .8s var(--ease) .55s forwards; }
    .dw-btn-solid {
        background: #fff; color: var(--maroon); border: none; font-weight: 700;
        border-radius: 999px; padding: .85rem 1.7rem; display: inline-flex; align-items: center; gap: .55rem;
        transition: transform .3s var(--ease), box-shadow .3s var(--ease);
    }
    .dw-btn-solid:hover { color: var(--maroon-deep); transform: translateY(-3px); box-shadow: 0 14px 30px rgba(0,0,0,.22); }
    .dw-btn-outline {
        background: transparent; color: #fff; border: 1.5px solid rgba(255,255,255,.55); font-weight: 600;
        border-radius: 999px; padding: .85rem 1.7rem; display: inline-flex; align-items: center; gap: .55rem;
        transition: transform .3s var(--ease), background .3s ease, border-color .3s ease;
    }
    .dw-btn-outline:hover { background: rgba(255,255,255,.12); border-color: #fff; color: #fff; transform: translateY(-3px); }

    /* ---------- Stat grid 2x2 ---------- */
    .dw-stat-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 1.1rem;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .5s forwards;
    }
    .dw-stat-card {
        background: rgba(255,255,255,.09);
        border: 1px solid rgba(255,255,255,.16);
        border-radius: var(--radius-md);
        padding: 1.5rem 1.4rem;
        backdrop-filter: blur(8px);
        transition: transform .35s var(--ease), background .35s ease;
    }
    .dw-stat-card:hover { transform: translateY(-5px); background: rgba(255,255,255,.14); }
    .dw-stat-icon {
        width: 42px; height: 42px; border-radius: 12px;
        background: rgba(255,255,255,.16);
        display: flex; align-items: center; justify-content: center;
        color: var(--gold-soft); font-size: 1.05rem; margin-bottom: 1.1rem;
    }
    .dw-stat-card .num { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1; }
    .dw-stat-card .label { font-size: .82rem; color: rgba(255,255,255,.78); margin-top: .4rem; }

    @media (max-width: 991px) { .dw-stat-grid { margin-top: 2.5rem; } }

    /* ============================================================
       TENTANG PROGRAM (target tombol "Pelajari Lebih")
       ============================================================ */
    .dw-about { background: var(--paper); padding: clamp(4rem, 8vw, 6.5rem) 0; }
    .dw-about-badge {
        display: inline-flex; align-items: center; gap: .5rem;
        background: var(--maroon-tint); color: var(--maroon);
        font-size: .82rem; font-weight: 700;
        padding: .5rem 1.1rem; border-radius: 999px;
        margin-bottom: 1.3rem;
    }
    .dw-about h2 { font-size: clamp(2rem, 3.6vw, 2.9rem); font-weight: 800; letter-spacing: -.02em; line-height: 1.15; }
    .dw-about h2 .accent { color: var(--maroon); }
    .dw-about > .container > .row > .col-lg-6 > p { color: var(--muted); font-size: 1.04rem; max-width: 540px; margin-top: 1.2rem; }

    .dw-point-list { margin-top: 2.2rem; display: flex; flex-direction: column; gap: 1.5rem; }
    .dw-point { display: flex; gap: 1rem; align-items: flex-start; }
    .dw-point .icon {
        width: 46px; height: 46px; border-radius: 13px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center; font-size: 1.05rem;
    }
    .dw-point.tone-a .icon { background: var(--maroon-tint); color: var(--maroon); }
    .dw-point.tone-b .icon { background: #e9f6ee; color: #2f7d4f; }
    .dw-point.tone-c .icon { background: #eaf3fc; color: #2563a8; }
    .dw-point.tone-d .icon { background: #fdf1de; color: var(--gold); }
    .dw-point h6 { font-weight: 700; margin-bottom: .25rem; font-size: 1.02rem; color: var(--ink); }
    .dw-point p { font-size: .9rem; margin: 0; color: var(--muted); }

    /* ---------- Bento grid 2x2 kanan ---------- */
    .dw-bento {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-auto-rows: minmax(0, auto);
        gap: 1.1rem;
        height: 100%;
    }
    .dw-bento-card {
        border-radius: var(--radius-md);
        padding: 1.7rem;
        display: flex; flex-direction: column; justify-content: flex-end;
        transition: transform .35s var(--ease), box-shadow .35s var(--ease);
    }
    .dw-bento-card:hover { transform: translateY(-6px); }
    .dw-bento-card .icon {
        width: 46px; height: 46px; border-radius: 13px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.15rem; margin-bottom: 1.1rem;
    }
    .dw-bento-solid {
        background: linear-gradient(155deg, var(--maroon), var(--maroon-deep));
        color: #fff;
        box-shadow: 0 16px 34px rgba(127,29,46,.25);
    }
    .dw-bento-solid .icon { background: rgba(255,255,255,.16); color: var(--gold-soft); }
    .dw-bento-solid .num { font-size: 2.1rem; font-weight: 800; line-height: 1; }
    .dw-bento-solid h6 { color: #fff; font-size: 1.15rem; font-weight: 800; margin: 0; }
    .dw-bento-solid span { color: rgba(255,255,255,.82); font-size: .84rem; }

    .dw-bento-white {
        background: var(--surface);
        box-shadow: 0 14px 30px rgba(15,10,10,.07);
        border: 1px solid var(--line);
    }
    .dw-bento-white .icon { background: var(--maroon-tint); color: var(--maroon); }
    .dw-bento-white h6 { font-size: 1.1rem; font-weight: 800; color: var(--ink); margin: 0; }
    .dw-bento-white span { color: var(--muted); font-size: .84rem; }

    .dw-bento-tall { grid-row: span 2; min-height: 230px; }
    .dw-bento-short { min-height: 130px; }

    @media (max-width: 991px) {
        .dw-bento { margin-top: 2.5rem; }
        .dw-bento-tall { min-height: 190px; }
    }

    /* ============================================================
       DAFTAR (kartu, sudah ada sebelumnya)
       ============================================================ */
    .dw-list-section { background: var(--paper); padding: clamp(2rem, 5vw, 4rem) 0 clamp(4rem, 8vw, 7rem); }
    .dw-list-header h2 { font-size: clamp(2rem, 3.6vw, 2.8rem); font-weight: 800; letter-spacing: -.02em; }
    .dw-list-header .accent { color: var(--maroon); }
    .dw-list-header p { color: var(--muted); }

    .dw-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 12px 34px rgba(15,10,10,.08);
        background: var(--surface);
        height: 100%;
        transition: box-shadow .4s var(--ease), transform .4s var(--ease);
    }
    .dw-card:hover { box-shadow: 0 26px 55px rgba(15,10,10,.15); transform: translateY(-6px); }
    .dw-card-media {
        position: relative; height: 190px;
        background: linear-gradient(155deg, var(--maroon), var(--maroon-deep));
    }
    .dw-card-media img { width: 100%; height: 100%; object-fit: cover; }
    .dw-card-initials {
        position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
        font-size: 2.4rem; font-weight: 800; color: rgba(255,255,255,.85);
    }
    .dw-card-badge {
        position: absolute; left: 1rem; bottom: 1rem;
        background: rgba(11,12,16,.55); color: #fff; font-weight: 600; font-size: .76rem;
        padding: .32rem .75rem; border-radius: 999px; backdrop-filter: blur(2px);
    }
    .dw-card-body { padding: 1.5rem; }
    .dw-card-body h5 { font-weight: 700; font-size: 1.05rem; margin-bottom: .35rem; }
    .dw-card-sub { color: var(--muted); font-size: .82rem; margin-bottom: .9rem; }
    .dw-card-meta { display: flex; gap: 1rem; margin-bottom: 1.1rem; }
    .dw-card-meta div { flex: 1; }
    .dw-card-meta .num { font-weight: 800; color: var(--maroon); font-size: 1.15rem; line-height: 1; }
    .dw-card-meta .label { font-size: .72rem; color: var(--muted-soft); margin-top: .2rem; }
    .dw-card-btn {
        border-radius: 999px; font-weight: 600; padding: .55rem 1.3rem; font-size: .85rem;
        background: var(--maroon); border: none; color: #fff; transition: background .3s ease, transform .3s ease;
    }
    .dw-card-btn:hover { background: var(--maroon-deep); transform: translateY(-2px); color: #fff; }
</style>
@endpush

@section('content')

<section class="dw-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="dw-badge"><span class="dot"></span> Program Pemberdayaan Masyarakat</span>
                <h1>Dasawisma<span class="accent">Kecamatan Lubuk Kilangan</span></h1>
                <p class="lead-text">Kelompok Wanita untuk Kesejahteraan Keluarga sebagai garda terdepan dalam membangun masyarakat yang mandiri, sehat, dan sejahtera.</p>
                <div class="dw-hero-actions">
                    <a href="#daftar-dasawisma" class="dw-btn-solid"><i class="fa-solid fa-list-ul"></i> Lihat Daftar</a>
                    <a href="#tentang-dasawisma" class="dw-btn-outline"><i class="fa-solid fa-circle-info"></i> Pelajari Lebih</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dw-stat-grid">
                    <div class="dw-stat-card">
                        <div class="dw-stat-icon"><i class="fa-solid fa-house"></i></div>
                        <div class="num">{{ $dasawismas->count() }}</div>
                        <div class="label">Dasawisma Aktif</div>
                    </div>
                    <div class="dw-stat-card">
                        <div class="dw-stat-icon"><i class="fa-solid fa-people-group"></i></div>
                        <div class="num">{{ number_format($dasawismas->sum('jumlah_kk'), 0, ',', '.') }}</div>
                        <div class="label">Kepala Keluarga</div>
                    </div>
                    <div class="dw-stat-card">
                        <div class="dw-stat-icon"><i class="fa-solid fa-users"></i></div>
                        <div class="num">{{ number_format($dasawismas->sum('jumlah_anggota'), 0, ',', '.') }}</div>
                        <div class="label">Warga Terlayani</div>
                    </div>
                    <div class="dw-stat-card">
                        <div class="dw-stat-icon"><i class="fa-solid fa-store"></i></div>
                        <div class="num">{{ number_format($dasawismas->sum('jumlah_umkm'), 0, ',', '.') }}</div>
                        <div class="label">UMKM Binaan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dw-hero-wave">
        <svg viewBox="0 0 1440 90" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#faf8f6" d="M0,64 C240,10 480,0 720,22 C960,44 1200,84 1440,50 L1440,90 L0,90 Z"></path>
        </svg>
    </div>
</section>

<section id="tentang-dasawisma" class="dw-about">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <span class="dw-about-badge"><i class="fa-solid fa-seedling"></i> Tentang Dasawisma</span>
                <h2>Apa itu <span class="accent">Dasawisma?</span></h2>
                <p>Dasawisma adalah kelompok kerja wanita di tingkat RT yang berfungsi sebagai pendataan, pemantauan, dan pelaporan masyarakat di wilayah kerjanya. Dasawisma merupakan ujung tombak pelaksanaan program PKK di lapangan.</p>

                <div class="dw-point-list">
                    <div class="dw-point tone-a reveal-target">
                        <div class="icon"><i class="fa-solid fa-clipboard-list"></i></div>
                        <div>
                            <h6>Pendataan Keluarga</h6>
                            <p>Mengumpulkan data keluarga dan tingkat kesejahteraan</p>
                        </div>
                    </div>
                    <div class="dw-point tone-b reveal-target">
                        <div class="icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                        <div>
                            <h6>Pemberdayaan Ekonomi</h6>
                            <p>Meningkatkan kemandirian ekonomi keluarga melalui UMKM</p>
                        </div>
                    </div>
                    <div class="dw-point tone-c reveal-target">
                        <div class="icon"><i class="fa-solid fa-heart-pulse"></i></div>
                        <div>
                            <h6>Pelayanan Kesehatan</h6>
                            <p>Menggerakkan program kesehatan keluarga berencana</p>
                        </div>
                    </div>
                    <div class="dw-point tone-d reveal-target">
                        <div class="icon"><i class="fa-solid fa-people-carry-box"></i></div>
                        <div>
                            <h6>Gotong Royong</h6>
                            <p>Membangun solidaritas dan kerja sama masyarakat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="dw-bento">
                    <div class="dw-bento-card dw-bento-solid dw-bento-tall reveal-target">
                        <div class="icon"><i class="fa-solid fa-people-group"></i></div>
                        <div class="num">10+</div>
                        <span>Program Aktif</span>
                    </div>
                    <div class="dw-bento-card dw-bento-white dw-bento-short reveal-target">
                        <div class="icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                        <h6>Peduli</h6>
                        <span>Sosial Masyarakat</span>
                    </div>
                    <div class="dw-bento-card dw-bento-white dw-bento-short reveal-target">
                        <div class="icon"><i class="fa-solid fa-heart"></i></div>
                        <h6>Solidaritas</h6>
                        <span>Gotong Royong</span>
                    </div>
                    <div class="dw-bento-card dw-bento-solid dw-bento-tall reveal-target">
                        <div class="icon"><i class="fa-solid fa-chart-line"></i></div>
                        <h6>Berkembang</h6>
                        <span>Terus Meningkat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.marquee')

<section id="daftar-dasawisma" class="dw-list-section">
    <div class="container">
        <div class="dw-list-header text-center mb-5">
            <h2>Daftar <span class="accent">Kelompok Dasawisma</span></h2>
            <p>Pilih kelompok dasawisma untuk melihat informasi lengkap dan kegiatannya</p>
        </div>

        <div class="row g-4">
            @forelse($dasawismas as $dasawisma)
                <div class="col-lg-4 col-md-6">
                    <div class="dw-card">
                        <div class="dw-card-media">
                            @if($dasawisma->foto)
                                <img src="{{ asset('storage/'.$dasawisma->foto) }}" alt="{{ $dasawisma->nama }}">
                            @else
                                <div class="dw-card-initials">{{ Str::upper(Str::substr($dasawisma->nama, 0, 2)) }}</div>
                            @endif
                            <span class="dw-card-badge"><i class="fa-solid fa-location-dot me-1"></i> {{ $dasawisma->kelurahan->nama ?? 'Belum diatur' }}</span>
                        </div>
                        <div class="dw-card-body">
                            <h5>{{ $dasawisma->nama }}</h5>
                            <p class="dw-card-sub"><i class="fa-solid fa-user me-1"></i> Ketua: {{ $dasawisma->nama_ketua ?? '-' }}</p>
                            <div class="dw-card-meta">
                                <div>
                                    <div class="num">{{ $dasawisma->jumlah_kk ?? 0 }}</div>
                                    <div class="label">Kepala Keluarga</div>
                                </div>
                                <div>
                                    <div class="num">{{ $dasawisma->jumlah_anggota ?? 0 }}</div>
                                    <div class="label">Anggota</div>
                                </div>
                            </div>
                            <a href="{{ route('dasawisma.show', $dasawisma->slug) }}" class="btn dw-card-btn w-100">
                                Lihat Detail <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-secondary">Belum ada data dasawisma.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
