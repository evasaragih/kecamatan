@extends('layouts.app')

@section('title', 'PKK - Kecamatan Lubuk Kilangan')
@section('body-class', 'is-immersive')

@push('styles')
<style>
    /* ============================================================
       HERO
       ============================================================ */
    .pkk-hero {
        position: relative;
        overflow: hidden;
        padding: 9.5rem 0 7rem;
        background: linear-gradient(155deg, var(--maroon) 0%, var(--maroon-deep) 100%);
        color: #fff;
    }
    .pkk-hero::before {
        content: '';
        position: absolute; inset: 0;
        background-image: radial-gradient(rgba(255,255,255,.14) 1.5px, transparent 1.5px);
        background-size: 26px 26px;
        opacity: .5;
        pointer-events: none;
    }
    .pkk-hero-wave { position: absolute; left: 0; right: 0; bottom: -1px; line-height: 0; z-index: 2; }
    .pkk-hero-wave svg { display: block; width: 100%; height: 90px; }
    .pkk-hero .container { position: relative; z-index: 3; }

    .pkk-badge {
        display: inline-flex; align-items: center; gap: .55rem;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.22);
        color: #fff;
        font-size: .82rem; font-weight: 600;
        padding: .5rem 1.1rem; border-radius: 999px;
        backdrop-filter: blur(6px);
    }
    .pkk-badge .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--gold-soft); display: inline-block; }

    .pkk-hero h1 {
        font-weight: 800; letter-spacing: -.02em; color: #fff;
        font-size: clamp(2.6rem, 5.6vw, 4.4rem);
        line-height: 1.06;
        margin: 1.3rem 0 1.3rem;
    }
    .pkk-hero h1 .accent { color: var(--gold-soft); display: block; }

    .pkk-hero .lead-text {
        color: rgba(255,255,255,.84);
        font-weight: 300; font-size: 1.08rem; max-width: 480px;
        margin-bottom: 2.2rem;
    }

    .pkk-hero-actions { display: flex; gap: .9rem; flex-wrap: wrap; }
    .pkk-btn-solid {
        background: #fff; color: var(--maroon); border: none; font-weight: 700;
        border-radius: 999px; padding: .85rem 1.7rem; display: inline-flex; align-items: center; gap: .55rem;
        transition: transform .3s var(--ease), box-shadow .3s var(--ease);
    }
    .pkk-btn-solid:hover { color: var(--maroon-deep); transform: translateY(-3px); box-shadow: 0 14px 30px rgba(0,0,0,.22); }
    .pkk-btn-outline {
        background: transparent; color: #fff; border: 1.5px solid rgba(255,255,255,.55); font-weight: 600;
        border-radius: 999px; padding: .85rem 1.7rem; display: inline-flex; align-items: center; gap: .55rem;
        transition: transform .3s var(--ease), background .3s ease, border-color .3s ease;
    }
    .pkk-btn-outline:hover { background: rgba(255,255,255,.12); border-color: #fff; color: #fff; transform: translateY(-3px); }

    .pkk-stat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.1rem; }
    .pkk-stat-card {
        background: rgba(255,255,255,.09);
        border: 1px solid rgba(255,255,255,.16);
        border-radius: var(--radius-md);
        padding: 1.5rem 1.4rem;
        backdrop-filter: blur(8px);
        transition: transform .35s var(--ease), background .35s ease;
    }
    .pkk-stat-card:hover { transform: translateY(-5px); background: rgba(255,255,255,.14); }
    .pkk-stat-icon {
        width: 42px; height: 42px; border-radius: 12px;
        background: rgba(255,255,255,.16);
        display: flex; align-items: center; justify-content: center;
        color: var(--gold-soft); font-size: 1.05rem; margin-bottom: 1.1rem;
    }
    .pkk-stat-card .num { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1; }
    .pkk-stat-card .label { font-size: .82rem; color: rgba(255,255,255,.78); margin-top: .4rem; }

    @media (max-width: 991px) { .pkk-stat-grid { margin-top: 2.5rem; } }

    /* ============================================================
       SAMBUTAN
       ============================================================ */
    .pkk-sambutan { background: var(--paper); padding: clamp(4rem, 8vw, 6.5rem) 0; }
    .pkk-sambutan-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-lg);
        padding: clamp(2rem, 4vw, 3rem);
        box-shadow: 0 14px 34px rgba(15,10,10,.06);
    }
    .pkk-sambutan-photo {
        width: 100%; aspect-ratio: 4/5; object-fit: cover;
        border-radius: var(--radius-md);
    }
    .pkk-sambutan-photo-fallback {
        width: 100%; aspect-ratio: 4/5; border-radius: var(--radius-md);
        background: linear-gradient(160deg, var(--maroon), var(--maroon-deep));
        display: flex; align-items: center; justify-content: center;
        color: rgba(255,255,255,.6); font-size: 4rem;
    }
    .pkk-sambutan-text p { color: var(--muted); white-space: pre-line; }
    .pkk-sambutan-nama { font-weight: 800; color: var(--ink); margin-top: 1.2rem; margin-bottom: 0; }
    .pkk-sambutan-jabatan { color: var(--maroon); font-size: .85rem; font-weight: 600; }

    /* ---------- Visi Misi ---------- */
    .pkk-vm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 2rem; }
    @media (max-width: 767px) { .pkk-vm-grid { grid-template-columns: 1fr; } }
    .pkk-vm-card {
        border-radius: var(--radius-md);
        padding: 1.8rem;
        background: var(--surface);
        border: 1px solid var(--line);
        box-shadow: 0 12px 30px rgba(15,10,10,.06);
    }
    .pkk-vm-card .icon {
        width: 46px; height: 46px; border-radius: 13px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; margin-bottom: 1rem;
        background: var(--maroon-tint); color: var(--maroon);
    }
    .pkk-vm-card h5 { font-weight: 800; margin-bottom: .6rem; }
    .pkk-vm-card p { color: var(--muted); font-size: .95rem; white-space: pre-line; margin: 0; }

    /* ============================================================
       STRUKTUR PENGURUS
       ============================================================ */
    .pkk-pengurus-section { padding: clamp(4rem, 8vw, 6.5rem) 0; }
    .pkk-section-header h2 { font-size: clamp(2rem, 3.6vw, 2.8rem); font-weight: 800; letter-spacing: -.02em; }
    .pkk-section-header .accent { color: var(--maroon); }
    .pkk-section-header p { color: var(--muted); }

    .pkk-pengurus-card {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        height: 320px;
        background: linear-gradient(160deg, var(--ink-soft), var(--ink));
        box-shadow: 0 14px 34px rgba(11,12,16,.14);
        transition: box-shadow .35s ease, transform .35s ease;
    }
    .pkk-pengurus-card:hover { box-shadow: 0 26px 55px rgba(11,12,16,.28); transform: translateY(-6px); }
    .pkk-pengurus-photo { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
    .pkk-pengurus-noimg {
        position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
        font-size: 3.5rem; color: rgba(255,255,255,.25);
    }
    .pkk-pengurus-overlay { position: absolute; inset: 0; background: linear-gradient(0deg, rgba(11,12,16,.92) 0%, rgba(11,12,16,.5) 50%, rgba(11,12,16,0) 78%); }
    .pkk-pengurus-info { position: absolute; left: 0; right: 0; bottom: 0; padding: 1.25rem; color: #fff; }
    .pkk-pengurus-jabatan { display: block; font-size: .7rem; font-weight: 700; letter-spacing: .05em; text-transform: uppercase; color: var(--gold-soft); margin-bottom: .3rem; }
    .pkk-pengurus-nama { font-size: 1.02rem; font-weight: 700; margin: 0; line-height: 1.3; }

    /* ============================================================
       10 PROGRAM POKOK
       ============================================================ */
    .pkk-program-section { background: var(--paper); padding: clamp(4rem, 8vw, 6.5rem) 0; }
    .pkk-program-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 1.4rem; }
    .pkk-program-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-md);
        padding: 1.6rem;
        display: flex; gap: 1rem; align-items: flex-start;
        transition: transform .3s var(--ease), box-shadow .3s var(--ease);
    }
    .pkk-program-card:hover { transform: translateY(-5px); box-shadow: 0 18px 36px rgba(15,10,10,.1); }
    .pkk-program-num {
        width: 40px; height: 40px; flex-shrink: 0; border-radius: 11px;
        background: linear-gradient(155deg, var(--maroon), var(--maroon-deep));
        color: #fff; display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: .95rem;
    }
    .pkk-program-card h6 { font-weight: 700; margin-bottom: .3rem; font-size: .98rem; }
    .pkk-program-card p { font-size: .84rem; color: var(--muted); margin: 0; }

    /* ============================================================
       KEGIATAN
       ============================================================ */
    .pkk-kegiatan-section { padding: clamp(4rem, 8vw, 6.5rem) 0; }
    .pkk-kegiatan-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        background: var(--surface);
        box-shadow: 0 12px 30px rgba(15,10,10,.07);
        height: 100%;
        transition: transform .35s var(--ease), box-shadow .35s var(--ease);
    }
    .pkk-kegiatan-card:hover { transform: translateY(-6px); box-shadow: 0 24px 50px rgba(15,10,10,.14); }
    .pkk-kegiatan-media { height: 190px; background: linear-gradient(155deg, var(--maroon), var(--maroon-deep)); position: relative; }
    .pkk-kegiatan-media img { width: 100%; height: 100%; object-fit: cover; }
    .pkk-kegiatan-date {
        position: absolute; left: 1rem; bottom: 1rem;
        background: rgba(11,12,16,.6); color: #fff; font-size: .74rem; font-weight: 600;
        padding: .32rem .8rem; border-radius: 999px; backdrop-filter: blur(2px);
    }
    .pkk-kegiatan-body { padding: 1.4rem; }
    .pkk-kegiatan-body h5 { font-weight: 700; font-size: 1.02rem; margin-bottom: .5rem; }
    .pkk-kegiatan-body p { color: var(--muted); font-size: .87rem; margin: 0; }

    /* ---------- CTA Dasawisma ---------- */
    .pkk-cta {
        background: linear-gradient(155deg, var(--ink-soft), var(--ink));
        border-radius: var(--radius-lg);
        padding: clamp(2.5rem, 5vw, 3.5rem);
        color: #fff;
        display: flex; align-items: center; justify-content: space-between; gap: 2rem; flex-wrap: wrap;
    }
    .pkk-cta h4 { color: #fff; font-weight: 800; margin-bottom: .4rem; }
    .pkk-cta p { color: rgba(255,255,255,.75); margin: 0; max-width: 480px; }
</style>
@endpush

@section('content')

<section class="pkk-hero">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="pkk-badge"><span class="dot"></span> Gerakan Pemberdayaan Masyarakat</span>
                <h1>PKK<span class="accent">Kecamatan Lubuk Kilangan</span></h1>
                <p class="lead-text">Pemberdayaan Kesejahteraan Keluarga — gerakan masyarakat yang tumbuh dari, oleh, dan untuk keluarga guna mewujudkan keluarga sehat, sejahtera, maju, dan mandiri.</p>
                <div class="pkk-hero-actions">
                    <a href="#program-pokok" class="pkk-btn-solid"><i class="fa-solid fa-list-ul"></i> 10 Program Pokok</a>
                    <a href="#struktur-pengurus" class="pkk-btn-outline"><i class="fa-solid fa-users"></i> Struktur Pengurus</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="pkk-stat-grid">
                    <div class="pkk-stat-card">
                        <div class="pkk-stat-icon"><i class="fa-solid fa-user-group"></i></div>
                        <div class="num">{{ $pengurus->count() }}</div>
                        <div class="label">Pengurus Aktif</div>
                    </div>
                    <div class="pkk-stat-card">
                        <div class="pkk-stat-icon"><i class="fa-solid fa-list-check"></i></div>
                        <div class="num">{{ $programs->count() ?: 10 }}</div>
                        <div class="label">Program Pokok</div>
                    </div>
                    <div class="pkk-stat-card">
                        <div class="pkk-stat-icon"><i class="fa-solid fa-people-roof"></i></div>
                        <div class="num">{{ $totalDasawisma }}</div>
                        <div class="label">Kelompok Dasawisma</div>
                    </div>
                    <div class="pkk-stat-card">
                        <div class="pkk-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                        <div class="num">{{ $kegiatans->count() }}</div>
                        <div class="label">Kegiatan Terbaru</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pkk-hero-wave">
        <svg viewBox="0 0 1440 90" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#faf8f6" d="M0,64 C240,10 480,0 720,22 C960,44 1200,84 1440,50 L1440,90 L0,90 Z"></path>
        </svg>
    </div>
</section>

<section class="pkk-sambutan">
    <div class="container">
        <div class="pkk-sambutan-card">
            <div class="row g-4 align-items-start">
                <div class="col-lg-3">
                    @if($profil && $profil->foto)
                        <img src="{{ asset('storage/'.$profil->foto) }}" alt="{{ $profil->nama_ketua }}" class="pkk-sambutan-photo">
                    @else
                        <div class="pkk-sambutan-photo-fallback"><i class="fa-solid fa-user"></i></div>
                    @endif
                </div>
                <div class="col-lg-9">
                    <span class="kicker">Sambutan Ketua</span>
                    <div class="pkk-sambutan-text mt-3">
                        @if($profil && $profil->sambutan)
                            <p>{{ $profil->sambutan }}</p>
                        @else
                            <p>Sambutan Ketua TP PKK belum tersedia. Silakan lengkapi melalui panel admin.</p>
                        @endif
                    </div>
                    @if($profil && $profil->nama_ketua)
                        <p class="pkk-sambutan-nama">{{ $profil->nama_ketua }}</p>
                        <span class="pkk-sambutan-jabatan">Ketua TP PKK Kecamatan Lubuk Kilangan</span>
                    @endif
                </div>
            </div>
        </div>

        @if($profil && ($profil->visi || $profil->misi))
            <div class="pkk-vm-grid">
                @if($profil->visi)
                    <div class="pkk-vm-card">
                        <div class="icon"><i class="fa-solid fa-eye"></i></div>
                        <h5>Visi</h5>
                        <p>{{ $profil->visi }}</p>
                    </div>
                @endif
                @if($profil->misi)
                    <div class="pkk-vm-card">
                        <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
                        <h5>Misi</h5>
                        <p>{{ $profil->misi }}</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>

<section id="struktur-pengurus" class="pkk-pengurus-section">
    <div class="container">
        <div class="pkk-section-header text-center mb-5">
            <span class="kicker justify-content-center d-flex">Struktur Organisasi</span>
            <h2 class="mt-2">Susunan <span class="accent">Pengurus PKK</span></h2>
            <p>Tim Penggerak PKK Kecamatan Lubuk Kilangan</p>
        </div>

        <div class="row g-4">
            @forelse($pengurus as $item)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="pkk-pengurus-card">
                        @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama }}" class="pkk-pengurus-photo">
                        @else
                            <div class="pkk-pengurus-noimg"><i class="fa-solid fa-user"></i></div>
                        @endif
                        <div class="pkk-pengurus-overlay"></div>
                        <div class="pkk-pengurus-info">
                            <span class="pkk-pengurus-jabatan">{{ $item->jabatan }}</span>
                            <p class="pkk-pengurus-nama">{{ $item->nama }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-secondary">Data pengurus PKK belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="program-pokok" class="pkk-program-section">
    <div class="container">
        <div class="pkk-section-header text-center mb-5">
            <span class="kicker justify-content-center d-flex">Program Kerja</span>
            <h2 class="mt-2">10 <span class="accent">Program Pokok PKK</span></h2>
            <p>Landasan gerak PKK dalam mendampingi keluarga di Kecamatan Lubuk Kilangan</p>
        </div>

        <div class="pkk-program-grid">
            @forelse($programs as $i => $program)
                <div class="pkk-program-card">
                    <div class="pkk-program-num">{{ $i + 1 }}</div>
                    <div>
                        <h6>{{ $program->judul }}</h6>
                        <p>{{ $program->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-secondary">Data program pokok PKK belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="pkk-kegiatan-section">
    <div class="container">
        <div class="pkk-section-header text-center mb-5">
            <span class="kicker justify-content-center d-flex">Dokumentasi</span>
            <h2 class="mt-2">Kegiatan <span class="accent">Terbaru PKK</span></h2>
            <p>Rangkaian kegiatan yang telah dilaksanakan oleh TP PKK dan kader di lapangan</p>
        </div>

        <div class="row g-4 mb-5">
            @forelse($kegiatans as $kegiatan)
                <div class="col-lg-4 col-md-6">
                    <div class="pkk-kegiatan-card">
                        <div class="pkk-kegiatan-media">
                            @if($kegiatan->foto)
                                <img src="{{ asset('storage/'.$kegiatan->foto) }}" alt="{{ $kegiatan->judul }}">
                            @endif
                            @if($kegiatan->tanggal_kegiatan)
                                <span class="pkk-kegiatan-date"><i class="fa-regular fa-calendar me-1"></i> {{ $kegiatan->tanggal_kegiatan->translatedFormat('d M Y') }}</span>
                            @endif
                        </div>
                        <div class="pkk-kegiatan-body">
                            <h5>{{ $kegiatan->judul }}</h5>
                            <p>{{ Str::limit($kegiatan->keterangan, 110) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-secondary">Belum ada dokumentasi kegiatan PKK.</p>
            @endforelse
        </div>

        <div class="pkk-cta">
            <div>
                <h4>Ingin melihat kelompok Dasawisma?</h4>
                <p>Dasawisma adalah ujung tombak pelaksanaan program PKK di tingkat RT, tersebar di setiap kelurahan.</p>
            </div>
            <a href="{{ route('dasawisma.index') }}" class="pkk-btn-solid"><i class="fa-solid fa-people-roof"></i> Lihat Dasawisma</a>
        </div>
    </div>
</section>

@endsection
