<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Kecamatan Lubuk Kilangan'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui'] },
                    colors: {
                        brand: {
                            50: '#fbeced', 100: '#f1d9dd', 300: '#c9808d', 500: '#7f1d2e', 600: '#5e0f1e', 700: '#4a0e18',
                        },
                        gold: {
                            300: '#e7d2a1', 500: '#c9a55c',
                        },
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #faf8f6; }
        h1, h2, h3, h4, h5, h6 { letter-spacing: -0.01em; }
        .kicker { display: inline-flex; align-items: center; gap: .55rem; font-size: .74rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: #7f1d2e; }
        .kicker::before { content: ''; width: 26px; height: 2px; background: #c9a55c; display: inline-block; }
        .tw-navbar { transition: box-shadow .35s ease, background .35s ease; }
        .tw-navbar.is-scrolled { box-shadow: 0 10px 30px rgba(15,10,10,.08); }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-[#faf8f6] text-[#1c1f26]">

<nav class="tw-navbar bg-white/90 backdrop-blur-md border-b border-[#ece7e4] sticky top-0 z-50" id="twNavbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                <img src="<?php echo e(asset('images/logo-padang.png')); ?>" alt="Logo Kota Padang" class="w-11 h-11 object-contain">
                <div class="leading-tight">
                    <span class="block text-[11px] tracking-wide text-slate-500">Kecamatan</span>
                    <span class="block font-bold text-[#1c1f26]">LUBUK KILANGAN</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-brand-500 transition-colors">
                        Profil <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                        <a href="<?php echo e(route('profil.show', 'sejarah')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500">Sejarah</a>
                        <a href="<?php echo e(route('profil.show', 'visi-misi')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500">Visi &amp; Misi</a>
                        <a href="<?php echo e(route('profil.show', 'struktur-organisasi')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500">Struktur Organisasi</a>
                        <a href="<?php echo e(route('pejabat.index')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500">Pejabat Struktural</a>
                        <a href="<?php echo e(route('alamat-pemerintahan.index')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500 text-brand-500">Alamat Pemerintahan</a>
                    </div>
                </div>
                <div class="relative group">
                    <button class="flex items-center gap-1 hover:text-brand-500 transition-colors">
                        Publikasi <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </button>
                    <div class="absolute left-0 mt-2 w-44 bg-white rounded-xl shadow-xl border border-slate-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                        <a href="<?php echo e(route('berita.index')); ?>" class="block px-4 py-2 hover:bg-[#fbeced] hover:text-brand-500">Berita</a>
                    </div>
                </div>
                <a href="<?php echo e(route('kelurahan.index')); ?>" class="hover:text-brand-500 transition-colors">Kelurahan</a>
                <a href="#" class="hover:text-brand-500 transition-colors">Dasawisma</a>
                <a href="<?php echo e(route('galeri.index')); ?>" class="hover:text-brand-500 transition-colors">Galeri Kegiatan</a>
                <a href="#" class="hover:text-brand-500 transition-colors">PKK</a>
            </div>

            <button class="lg:hidden text-slate-600" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </div>

        <div id="mobileMenu" class="hidden lg:hidden pb-4 space-y-1 text-sm font-medium">
            <a href="<?php echo e(route('profil.show', 'sejarah')); ?>" class="block py-2">Sejarah</a>
            <a href="<?php echo e(route('pejabat.index')); ?>" class="block py-2">Pejabat Struktural</a>
            <a href="<?php echo e(route('alamat-pemerintahan.index')); ?>" class="block py-2">Alamat Pemerintahan</a>
            <a href="<?php echo e(route('kelurahan.index')); ?>" class="block py-2">Kelurahan</a>
            <a href="<?php echo e(route('berita.index')); ?>" class="block py-2">Berita</a>
            <a href="<?php echo e(route('galeri.index')); ?>" class="block py-2">Galeri Kegiatan</a>
        </div>
    </div>
</nav>

<?php echo $__env->yieldContent('content'); ?>

<footer class="bg-[#0b0c10] text-[#a9aab0] mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-3 gap-8 text-sm">
            <div>
                <h5 class="text-white font-semibold mb-2">Kecamatan Lubuk Kilangan</h5>
                <p class="text-[#8b8c92]">Sebuah Kecamatan di Kota Padang, Sumatera Barat, Indonesia.</p>
            </div>
            <div>
                <h6 class="text-white font-semibold mb-2">Tautan</h6>
                <ul class="space-y-1 text-[#8b8c92]">
                    <li><a href="<?php echo e(route('kelurahan.index')); ?>" class="hover:text-white transition-colors">Kelurahan</a></li>
                    <li><a href="<?php echo e(route('alamat-pemerintahan.index')); ?>" class="hover:text-white transition-colors">Alamat Pemerintahan</a></li>
                    <li><a href="<?php echo e(route('admin.login')); ?>" class="hover:text-white transition-colors">Login Admin</a></li>
                </ul>
            </div>
            <div>
                <h6 class="text-white font-semibold mb-2">Kontak</h6>
                <p class="text-[#8b8c92]">Jl. Raya Indarung, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat</p>
            </div>
        </div>
        <hr class="border-white/10 my-6">
        <p class="text-center text-[#6b6c72] text-xs">&copy; <?php echo e(date('Y')); ?> Kecamatan Lubuk Kilangan. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>

<script>
    (function () {
        const nav = document.getElementById('twNavbar');
        function onScroll() { nav.classList.toggle('is-scrolled', window.scrollY > 30); }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    })();
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/layouts/tailwind.blade.php ENDPATH**/ ?>