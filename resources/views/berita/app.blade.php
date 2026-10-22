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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; color: #1f2937; background:#fff; }
        .navbar-brand-title { line-height:1.2; }
        .navbar-brand-title .brand-main { display:block; font-size:1.05rem; font-weight:700; color:#7f1d2e; }
        .navbar-brand-title .brand-sub { display:block; font-size:.72rem; font-weight:600; letter-spacing:.2px; color:#111827; }
        .navbar-logo { width:46px; height:46px; object-fit:contain; }
        footer .footer-logo { width:44px; height:44px; object-fit:contain; }

        /* Maroon header slide reveal on load - applied per element, not on a wrapping ancestor,
           so it never breaks the navbar's sticky positioning while scrolling */
        @keyframes headerSlideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }

        /* Social topbar with collapse-on-scroll animation */
        .social-topbar {
            background: linear-gradient(90deg, #5e0f1e, #86182b);
            max-height: 42px;
            opacity: 1;
            overflow: hidden;
            transition: max-height .4s ease, opacity .3s ease, padding .4s ease;
            padding: .5rem 0;
            animation: headerSlideDown .6s cubic-bezier(.22,.61,.36,1) both;
        }
        .social-topbar.is-collapsed {
            max-height: 0;
            opacity: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
        .social-topbar .social-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,.85);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            margin-right: .5rem;
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }
        .social-topbar .social-circle:hover {
            background: #fff;
            color: #7f1d2e;
            transform: translateY(-2px);
        }

        .navbar {
            transition: box-shadow .3s ease, padding .3s ease;
            border-bottom-color: #f1d9dd !important;
            animation: headerSlideDown .6s cubic-bezier(.22,.61,.36,1) .1s both;
        }
        .navbar.is-scrolled { box-shadow: 0 6px 20px rgba(127,29,46,.15); padding-top:.6rem !important; padding-bottom:.6rem !important; }

        /* Animated underline on nav links */
        .navbar .nav-link {
            font-weight: 500;
            position: relative;
            padding-bottom: 4px;
        }
        .navbar .nav-item:not(.dropdown) > .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: 0;
            width: 0;
            height: 2px;
            background: #7f1d2e;
            transition: width .3s ease;
        }
        .navbar .nav-item:not(.dropdown) > .nav-link:hover::after {
            width: 100%;
        }
        .navbar .dropdown-toggle:hover { color: #7f1d2e; }
        .navbar .dropdown-item:hover { background:#fbeced; color:#7f1d2e; }

        .hero-section {
            background: linear-gradient(180deg, rgba(15,23,42,.55), rgba(15,23,42,.75)), url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            color: #fff;
            padding: 6rem 0 8rem;
        }
        .hero-section h1 { font-weight: 800; letter-spacing: 1px; }
        .badge-pill { border-radius: 999px; }
        .card-news img { height: 190px; object-fit: cover; }
        .card-news .btn { border-radius: 999px; }
        .section-title { font-weight: 700; }
        footer { background:#0f172a; color:#cbd5e1; }
        footer a { color:#e2e8f0; text-decoration:none; }
        .kelurahan-card img { height:160px; object-fit:cover; }
    </style>
    @stack('styles')
</head>
<body>

<div class="social-topbar" id="socialTopbar">
    <div class="container d-flex align-items-center">
        <a href="#" class="social-circle" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" class="social-circle" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="social-circle" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="social-circle" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-3" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-padang.png') }}" alt="Logo Kota Padang" class="navbar-logo">
            <span class="navbar-brand-title">
                <span class="brand-main">Kecamatan Lubuk Kilangan</span>
                <span class="brand-sub">Pemerintah Kota Padang</span>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
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
                <li class="nav-item"><a class="nav-link" href="#">Dasawisma</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('galeri.index') }}">Galeri Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">PKK</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <img src="{{ asset('images/logo-padang.png') }}" alt="Logo Kota Padang" class="footer-logo">
                    <h5 class="text-white mb-0">Kecamatan Lubuk Kilangan</h5>
                </div>
                <p class="small mb-0">Sebuah Kecamatan di Kota Padang, Sumatera Barat, Indonesia.</p>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Tautan</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                    <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li><a href="{{ route('galeri.index') }}">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('admin.login') }}">Login Admin</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-white">Kontak</h6>
                <p class="small mb-0">Jl. Raya Indarung, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat</p>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <p class="small text-center mb-0">&copy; {{ date('Y') }} Kecamatan Lubuk Kilangan. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function () {
        const topbar = document.getElementById('socialTopbar');
        const navbar = document.getElementById('mainNavbar');
        const threshold = 30;

        function handleScroll() {
            const scrolled = window.scrollY > threshold;
            topbar.classList.toggle('is-collapsed', scrolled);
            navbar.classList.toggle('is-scrolled', scrolled);
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    })();
</script>
@stack('scripts')
</body>
</html>
