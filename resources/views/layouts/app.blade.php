<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kecamatan Lubuk Kilangan')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           DESIGN SYSTEM — Kecamatan Lubuk Kilangan
           Premium / editorial-modern tokens shared across every page.
           ============================================================ */
        :root {
            --ink:        #0b0c10;
            --ink-soft:   #1c1f26;
            --paper:      #faf8f6;
            --surface:    #ffffff;
            --muted:      #667085;
            --muted-soft: #98a2b3;
            --line:       #ece7e4;

            --maroon:      #7f1d2e;
            --maroon-deep: #4a0e18;
            --maroon-ink:  #5e0f1e;
            --maroon-tint: #fbeced;
            --gold:        #c9a55c;
            --gold-soft:   #e7d2a1;

            --radius-lg: 28px;
            --radius-md: 20px;
            --radius-sm: 12px;
            --ease: cubic-bezier(.22,.61,.36,1);
            --container-max: 1240px;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--ink-soft);
            background: var(--paper);
            -webkit-font-smoothing: antialiased;
            animation: pageFadeIn .45s ease both;
        }
        @keyframes pageFadeIn { from { opacity: 0; } to { opacity: 1; } }

        img { max-width: 100%; }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.01em;
            color: var(--ink);
        }
        p { line-height: 1.75; }

        .container { max-width: var(--container-max); }

        /* ---------- Eyebrow / kicker label ---------- */
        .kicker {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            font-size: .74rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--maroon);
        }
        .kicker::before {
            content: '';
            width: 26px;
            height: 2px;
            background: var(--gold);
            display: inline-block;
        }
        .kicker.kicker-light { color: var(--gold-soft); }
        .kicker.kicker-light::before { background: var(--gold-soft); }

        /* ---------- Section rhythm ---------- */
        .section-pad     { padding-top: clamp(4.5rem, 9vw, 8rem); padding-bottom: clamp(4.5rem, 9vw, 8rem); }
        .section-pad-sm  { padding-top: clamp(3rem, 6vw, 5rem);   padding-bottom: clamp(3rem, 6vw, 5rem); }
        .section-title-xl {
            font-size: clamp(2.1rem, 4vw, 3.35rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }
        .section-lede { color: var(--muted); font-size: 1.06rem; max-width: 620px; }
        .surface-dark { background: var(--ink); color: #e8e6e3; }
        .surface-dark h1, .surface-dark h2, .surface-dark h3 { color: #fff; }
        .surface-dark .section-lede { color: #a9aab0; }

        /* ============================================================
           TOPBAR + NAVBAR
           ============================================================ */
        @keyframes headerSlideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }

        .social-topbar {
            background: linear-gradient(90deg, var(--maroon-ink), var(--maroon));
            max-height: 42px;
            opacity: 1;
            overflow: hidden;
            transition: max-height .4s ease, opacity .3s ease, padding .4s ease;
            padding: .5rem 0;
            animation: headerSlideDown .6s var(--ease) both;
            position: relative;
            z-index: 1041;
        }
        .social-topbar.is-collapsed { max-height: 0; opacity: 0; padding-top: 0; padding-bottom: 0; }
        .social-topbar .social-circle {
            width: 28px; height: 28px; border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,.85);
            color: #fff;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: .78rem; margin-right: .5rem;
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }
        .social-topbar .social-circle:hover { background: #fff; color: var(--maroon); transform: translateY(-2px); }

        .navbar {
            position: sticky; top: 0; z-index: 1040;
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--line);
            padding-top: 1rem; padding-bottom: 1rem;
            transition: background .45s ease, box-shadow .35s ease, padding .35s ease, border-color .45s ease;
            animation: headerSlideDown .6s var(--ease) .1s both;
        }
        .navbar.is-scrolled { box-shadow: 0 10px 30px rgba(15,10,10,.08); padding-top:.65rem; padding-bottom:.65rem; }

        /* Immersive mode: transparent + white text while un-scrolled, over a dark hero */
        .navbar.is-on-dark { background: transparent; border-bottom-color: transparent; box-shadow: none; }
        .navbar.is-on-dark .brand-main,
        .navbar.is-on-dark .brand-sub,
        .navbar.is-on-dark .nav-link,
        .navbar.is-on-dark .dropdown-toggle { color: #fff; }
        .navbar.is-on-dark .navbar-toggler-icon { filter: invert(1) brightness(2); }
        .navbar.is-on-dark .nav-item:not(.dropdown) > .nav-link::after { background: var(--gold); }

        .navbar-brand-title { line-height: 1.2; }
        .navbar-brand-title .brand-main { display:block; font-size:1.02rem; font-weight:700; color: var(--maroon); transition: color .35s ease; }
        .navbar-brand-title .brand-sub  { display:block; font-size:.7rem; font-weight:600; letter-spacing:.04em; color:#111827; transition: color .35s ease; }
        .navbar-logo { width:44px; height:44px; object-fit:contain; }

        .navbar .nav-link {
            font-weight: 500;
            font-size: .93rem;
            position: relative;
            padding-bottom: 4px;
            transition: color .35s ease;
        }
        .navbar .nav-item:not(.dropdown) > .nav-link::after {
            content: ''; position: absolute; left: 0; bottom: 0; width: 0; height: 2px;
            background: var(--maroon); transition: width .3s ease, background .35s ease;
        }
        .navbar .nav-item:not(.dropdown) > .nav-link:hover::after { width: 100%; }
        .navbar .dropdown-toggle:hover { color: var(--maroon); }
        .navbar .dropdown-menu {
            border: none; border-radius: var(--radius-sm);
            box-shadow: 0 20px 45px rgba(15,10,10,.14);
            padding: .5rem; margin-top: .75rem;
        }
        .navbar .dropdown-item { border-radius: 10px; padding: .55rem .9rem; font-size: .92rem; }
        .navbar .dropdown-item:hover { background: var(--maroon-tint); color: var(--maroon); }

        /* ============================================================
           HERO — fullscreen / immersive
           ============================================================ */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            background: linear-gradient(180deg, rgba(8,9,14,.35) 0%, rgba(8,9,14,.55) 55%, rgba(8,9,14,.92) 100%),
                        url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1800&q=80') center/cover no-repeat fixed;
            padding: 8rem 1.5rem 6rem;
            overflow: hidden;
        }
        .hero-section .hero-inner { position: relative; z-index: 2; max-width: 900px; margin: 0 auto; }
        .hero-section .kicker { justify-content: center; color: var(--gold-soft); }
        .hero-section .kicker::before { background: var(--gold-soft); }
        .hero-section h1 {
            font-weight: 800;
            letter-spacing: -0.02em;
            font-size: clamp(2.6rem, 6.2vw, 5.2rem);
            line-height: 1.05;
            color: #fff;
            margin: 1.1rem 0 1.4rem;
        }
        .hero-section p.lead { font-size: clamp(1.05rem, 1.6vw, 1.3rem); color: rgba(255,255,255,.86); font-weight: 300; max-width: 620px; margin-left:auto; margin-right:auto; }

        .scroll-cue {
            position: absolute; left: 50%; bottom: 2.4rem; transform: translateX(-50%);
            z-index: 2; color: rgba(255,255,255,.75); font-size: 1.35rem;
            animation: scrollCueBounce 2.2s ease-in-out infinite;
            opacity: 0; animation-delay: 1s, 1s;
        }
        .hero-section .scroll-cue { animation: heroFadeUp .7s ease .8s forwards, scrollCueBounce 2.2s ease-in-out 1.5s infinite; }
        @keyframes scrollCueBounce { 0%,100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(10px); } }

        .badge-pill { border-radius: 999px; }
        .card-news img { height: 190px; object-fit: cover; }
        .card-news .btn { border-radius: 999px; }
        .section-title { font-weight: 700; }
        .kelurahan-card img { height:160px; object-fit:cover; }

        /* ============================================================
           BUTTONS — premium pill treatment applied over existing
           Bootstrap classes so markup across pages stays untouched.
           ============================================================ */
        .btn {
            border-radius: 999px;
            font-weight: 600;
            font-size: .93rem;
            padding: .72rem 1.6rem;
            transition: transform .3s var(--ease), box-shadow .3s var(--ease), background .3s ease, color .3s ease, border-color .3s ease;
        }
        .btn:hover { transform: translateY(-3px); }

        .btn-success {
            background: var(--maroon); border-color: var(--maroon); color: #fff;
            box-shadow: 0 10px 24px rgba(127,29,46,.28);
        }
        .btn-success:hover, .btn-success:focus {
            background: var(--maroon-deep); border-color: var(--maroon-deep); color: #fff;
            box-shadow: 0 16px 34px rgba(127,29,46,.36);
        }

        .btn-outline-dark {
            border: 1.5px solid var(--ink); color: var(--ink); background: transparent;
        }
        .btn-outline-dark:hover { background: var(--ink); border-color: var(--ink); color: #fff; }

        .btn-outline-secondary {
            border: 1.5px solid var(--line); color: var(--ink-soft); background: var(--surface);
        }
        .btn-outline-secondary:hover { background: var(--maroon); border-color: var(--maroon); color: #fff; }

        .btn-light, .btn-outline-light {
            border-radius: 999px; font-weight: 600;
        }

        .btn-success::after, .btn-outline-dark::after, .btn-outline-secondary::after {
            content: ""; position: absolute; top: 0; left: -75%; width: 50%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,.45), transparent);
            transform: skewX(-20deg); transition: left .6s ease;
        }
        .btn-success, .btn-outline-dark, .btn-outline-secondary { position: relative; overflow: hidden; }
        .btn-success:hover::after, .btn-outline-dark:hover::after, .btn-outline-secondary:hover::after { left: 130%; }

        /* ============================================================
           CARDS
           ============================================================ */
        .card {
            border: none;
            border-radius: var(--radius-md);
            transition: transform .45s var(--ease), box-shadow .45s var(--ease);
        }
        .card:hover { transform: translateY(-8px); box-shadow: 0 24px 50px rgba(15,10,10,.14) !important; }
        .card .card-img-top { overflow: hidden; }
        .card img { transition: transform .6s var(--ease); }
        .card:hover img { transform: scale(1.07); }
        .card-body { padding: 1.5rem; }
        .card-title { font-weight: 700; font-size: 1.05rem; }

        .badge-pill { transition: transform .25s ease; }
        .badge-pill:hover { transform: scale(1.06); }

        /* ============================================================
           SCROLL-REVEAL + HERO ENTRANCE (animation utility classes)
           ============================================================ */
        @keyframes heroFadeUp { from { opacity: 0; transform: translateY(26px); } to { opacity: 1; transform: translateY(0); } }
        .hero-section .kicker, .hero-section h1, .hero-section p, .hero-section .btn {
            opacity: 0; animation: heroFadeUp .8s var(--ease) forwards;
        }
        .hero-section .kicker { animation-delay: .1s; }
        .hero-section h1      { animation-delay: .25s; }
        .hero-section p       { animation-delay: .42s; }
        .hero-section .btn    { animation-delay: .58s; }

        .reveal-up {
            opacity: 0; transform: translateY(34px);
            transition: opacity .7s var(--ease), transform .7s var(--ease);
            will-change: opacity, transform;
        }
        .reveal-up.is-visible { opacity: 1; transform: translateY(0); }

        /* ============================================================
           FOOTER
           ============================================================ */
        footer { background: var(--ink); color: #a9aab0; }
        footer .footer-logo { width:44px; height:44px; object-fit:contain; }
        footer h5, footer h6 { color: #fff; }
        footer a { color:#cfd0d4; text-decoration:none; transition: color .2s ease, padding-left .2s ease; }
        footer a:hover { color:#fff; }
        footer ul.list-unstyled li a { position: relative; }
        footer ul.list-unstyled li a:hover { padding-left: 6px; }
        footer p.small { color: #8b8c92; }
        footer hr { border-color: rgba(255,255,255,.08); }

        .footer-map-frame {
            border-radius: var(--radius-sm);
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.08);
            filter: grayscale(.25) contrast(1.05);
        }
        .footer-map-link { color: var(--gold-soft); text-decoration: none; font-weight: 600; }
        .footer-map-link:hover { color: #fff; text-decoration: underline; }

        .back-to-top {
            position: fixed; right: 22px; bottom: 22px; width: 48px; height: 48px;
            border-radius: 50%; background: var(--maroon); color: #fff; border: none;
            display: flex; align-items: center; justify-content: center; font-size: 1rem;
            box-shadow: 0 12px 28px rgba(127,29,46,.35);
            opacity: 0; transform: translateY(18px) scale(.8); pointer-events: none;
            transition: opacity .3s ease, transform .3s ease, background .25s ease;
            z-index: 1000;
        }
        .back-to-top.is-visible { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
        .back-to-top:hover { background: var(--maroon-deep); transform: translateY(-4px) scale(1.05); }

        @media (max-width: 768px) {
            .hero-section { min-height: 92vh; background-attachment: scroll; }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            body,
            .hero-section .kicker, .hero-section h1, .hero-section p, .hero-section .btn,
            .reveal-up, .card, .card img, .btn, .back-to-top, .scroll-cue {
                animation: none !important; transition: none !important; opacity: 1 !important; transform: none !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="@yield('body-class')">

<div class="social-topbar" id="socialTopbar">
    <div class="container d-flex align-items-center">
        <a href="#" class="social-circle" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" class="social-circle" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="social-circle" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="social-circle" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-padang.png') }}" alt="Logo Kota Padang" class="navbar-logo">
            <span class="navbar-brand-title">
                <span class="brand-main">Kecamatan Lubuk Kilangan</span>
                <span class="brand-sub">Pemerintah Kota Padang</span>
            </span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profil.show', 'sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.show', 'visi-misi') }}">Visi &amp; Misi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.show', 'struktur-organisasi') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('pejabat.index') }}">Pejabat Struktural</a></li>
                        <li><a class="dropdown-item" href="{{ route('alamat-pemerintahan.index') }}">Alamat Pemerintahan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Publikasi</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('berita.index') }}">Berita</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dasawisma.index') }}">Dasawisma</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('galeri.index') }}">Galeri Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pkk.index') }}">PKK</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<button id="backToTop" class="back-to-top" aria-label="Kembali ke atas">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<footer class="pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <img src="{{ asset('images/logo-padang.png') }}" alt="Logo Kota Padang" class="footer-logo">
                    <h5 class="mb-0">Kecamatan Lubuk Kilangan</h5>
                </div>
                <p class="small mb-0">Sebuah Kecamatan di Kota Padang, Sumatera Barat, Indonesia.</p>
            </div>
            <div class="col-md-4">
                <h6>Tautan</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                    <li><a href="{{ route('dasawisma.index') }}">Dasawisma</a></li>
                    <li><a href="{{ route('pkk.index') }}">PKK</a></li>
                    <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li><a href="{{ route('galeri.index') }}">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('admin.login') }}">Login Admin</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Kontak</h6>
                <p class="small mb-0">Jl. Raya Indarung, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat</p>
            </div>
        </div>

        <div class="footer-map mt-5">
            <h6 class="mb-3"><i class="fa-solid fa-location-dot me-2"></i>Lokasi Kantor Camat Lubuk Kilangan</h6>
            <div class="footer-map-frame">
                <iframe
                    src="https://www.google.com/maps?q=-0.9551222,100.421815&z=16&output=embed"
                    width="100%"
                    height="320"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi Kantor Camat Lubuk Kilangan">
                </iframe>
            </div>
            <a href="https://www.google.com/maps?q=-0.9551222,100.421815" target="_blank" rel="noopener" class="footer-map-link small mt-2 d-inline-flex align-items-center gap-1">
                Buka di Google Maps <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:.7rem;"></i>
            </a>
        </div>

        <hr class="my-4">
        <p class="small text-center mb-0">&copy; {{ date('Y') }} Kecamatan Lubuk Kilangan. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function () {
        const topbar = document.getElementById('socialTopbar');
        const navbar = document.getElementById('mainNavbar');
        const isImmersive = document.body.classList.contains('is-immersive');
        const threshold = 30;

        function handleScroll() {
            const scrolled = window.scrollY > threshold;
            topbar.classList.toggle('is-collapsed', scrolled);
            navbar.classList.toggle('is-scrolled', scrolled);
            navbar.classList.toggle('is-on-dark', isImmersive && !scrolled);
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    })();
</script>

<script>
    // ================= SITE-WIDE SCROLL-REVEAL =================
    // Works automatically on every page: no need to edit individual views.
    (function () {
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduceMotion) return;

        const revealSelectors = [
            '.card',
            '.row > [class*="col-"]',
            '.text-center.mb-4',
            '.bg-white.rounded-4',
            '.kelurahan-card',
            '.reveal-target'
        ];

        const targets = new Set();
        revealSelectors.forEach(sel => {
            document.querySelectorAll(sel).forEach(el => {
                // skip elements already handled by their own load-in animation (hero content)
                if (!el.closest('.hero-section')) targets.add(el);
            });
        });

        // group siblings by parent so items in the same row/grid stagger nicely
        const groups = new Map();
        targets.forEach(el => {
            const parent = el.parentElement;
            if (!groups.has(parent)) groups.set(parent, []);
            groups.get(parent).push(el);
        });

        groups.forEach(list => {
            list.forEach((el, i) => {
                el.classList.add('reveal-up');
                el.style.transitionDelay = (Math.min(i, 6) * 0.08) + 's';
            });
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        targets.forEach(el => observer.observe(el));
    })();

    // ================= BACK TO TOP =================
    (function () {
        const btn = document.getElementById('backToTop');
        if (!btn) return;

        function toggleBtn() {
            btn.classList.toggle('is-visible', window.scrollY > 320);
        }

        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        window.addEventListener('scroll', toggleBtn, { passive: true });
        toggleBtn();
    })();
</script>
@stack('scripts')
</body>
</html>
