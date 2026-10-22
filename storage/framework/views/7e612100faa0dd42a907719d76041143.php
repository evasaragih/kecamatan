<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

        <!-- Tailwind CSS (CDN) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'media',
                theme: {
                    extend: {
                        fontFamily: { sans: ['Nunito', 'sans-serif'] },
                        colors: {
                            brand: {
                                50: '#fef2f1', 100: '#fde3e0', 300: '#f79a90',
                                500: '#EF3B2D', 600: '#d92c1f', 700: '#b32319',
                            }
                        },
                        keyframes: {
                            'fade-up': {
                                '0%':   { opacity: 0, transform: 'translateY(24px)' },
                                '100%': { opacity: 1, transform: 'translateY(0)' },
                            },
                            'fade-in': {
                                '0%':   { opacity: 0 },
                                '100%': { opacity: 1 },
                            },
                            'scale-in': {
                                '0%':   { opacity: 0, transform: 'scale(0.9)' },
                                '100%': { opacity: 1, transform: 'scale(1)' },
                            },
                            float: {
                                '0%, 100%': { transform: 'translateY(0)' },
                                '50%': { transform: 'translateY(-10px)' },
                            }
                        },
                        animation: {
                            'fade-up': 'fade-up .7s ease-out forwards',
                            'fade-in': 'fade-in .8s ease-out forwards',
                            'scale-in': 'scale-in .6s ease-out forwards',
                            float: 'float 4s ease-in-out infinite',
                        }
                    }
                }
            }
        </script>

        <style>
            /* Elemen dengan class ini disembunyikan dulu, lalu dianimasikan saat masuk viewport */
            .reveal { opacity: 0; }
            .reveal.is-visible.reveal-up   { animation: fade-up .7s ease-out forwards; }
            .reveal.is-visible.reveal-in   { animation: fade-in .8s ease-out forwards; }
            .reveal.is-visible.reveal-scale{ animation: scale-in .6s ease-out forwards; }

            @keyframes fade-up  { 0%{opacity:0;transform:translateY(24px)} 100%{opacity:1;transform:translateY(0)} }
            @keyframes fade-in  { 0%{opacity:0} 100%{opacity:1} }
            @keyframes scale-in { 0%{opacity:0;transform:scale(.9)} 100%{opacity:1;transform:scale(1)} }

            /* Scroll progress bar */
            #scroll-progress { transform-origin: left; transform: scaleX(0); }

            ::-webkit-scrollbar { width: 10px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #EF3B2D; border-radius: 9999px; }
        </style>
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 font-sans">

        <!-- Scroll progress bar -->
        <div class="fixed top-0 left-0 w-full h-1 bg-transparent z-50">
            <div id="scroll-progress" class="h-full bg-brand-500 transition-transform duration-150 ease-out"></div>
        </div>

        <!-- NAVBAR -->
        <header class="fixed top-0 left-0 w-full z-40 backdrop-blur bg-white/70 dark:bg-gray-900/70 border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
                <a href="#hero" class="font-extrabold text-lg text-gray-800 dark:text-white">Laravel<span class="text-brand-500">.</span></a>
                <nav class="hidden sm:flex items-center gap-6 text-sm text-gray-600 dark:text-gray-300">
                    <a href="#fitur" class="hover:text-brand-500 transition-colors">Fitur</a>
                    <a href="#statistik" class="hover:text-brand-500 transition-colors">Statistik</a>
                    <a href="#kontak" class="hover:text-brand-500 transition-colors">Kontak</a>
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/home')); ?>" class="px-4 py-2 rounded-full bg-brand-500 text-white hover:bg-brand-600 transition-colors">Home</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="hover:text-brand-500 transition-colors">Log in</a>
                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 rounded-full bg-brand-500 text-white hover:bg-brand-600 transition-colors">Register</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </nav>
            </div>
        </header>

        <!-- HERO -->
        <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
            <!-- dekorasi blob melayang -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-300/30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-brand-500/20 rounded-full blur-3xl animate-float" style="animation-delay:1s"></div>

            <div class="relative max-w-4xl mx-auto px-6 text-center">
                <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-14 w-auto mx-auto text-gray-700 dark:text-gray-200 mb-8 animate-fade-in">
                    <g fill="#EF3B2D">
                        <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02z"/>
                    </g>
                </svg>

                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 dark:text-white animate-fade-up" style="animation-delay:.1s; opacity:0;">
                    Website yang <span class="text-brand-500">bergerak</span> saat Anda menggulir
                </h1>
                <p class="mt-5 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto animate-fade-up" style="animation-delay:.25s; opacity:0;">
                    Contoh implementasi animasi scroll menggunakan Tailwind CSS murni + IntersectionObserver, tanpa library tambahan.
                </p>
                <div class="mt-8 flex items-center justify-center gap-4 animate-fade-up" style="animation-delay:.4s; opacity:0;">
                    <a href="#fitur" class="px-6 py-3 rounded-full bg-brand-500 text-white font-semibold hover:bg-brand-600 hover:-translate-y-0.5 transition-all shadow-lg shadow-brand-500/30">Lihat Fitur</a>
                    <a href="#kontak" class="px-6 py-3 rounded-full border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:border-brand-500 hover:text-brand-500 transition-colors">Kontak</a>
                </div>

                <div class="mt-16 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
        </section>

        <!-- FITUR -->
        <section id="fitur" class="py-24 max-w-6xl mx-auto px-6">
            <div class="text-center mb-14 reveal reveal-up">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Fitur Utama</h2>
                <p class="mt-3 text-gray-500 dark:text-gray-400">Setiap kartu muncul dengan animasi saat masuk ke layar</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="reveal reveal-up p-6 rounded-2xl bg-white dark:bg-gray-800 shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300" style="transition-delay:0ms">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 dark:bg-brand-500/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#EF3B2D" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white">Dokumentasi</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Panduan lengkap dari dasar hingga mahir, cocok untuk semua level developer.</p>
                </div>

                <div class="reveal reveal-up p-6 rounded-2xl bg-white dark:bg-gray-800 shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300" style="transition-delay:120ms">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 dark:bg-brand-500/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#EF3B2D" class="w-6 h-6"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white">Video Tutorial</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Ribuan video pembelajaran untuk meningkatkan skill development Anda.</p>
                </div>

                <div class="reveal reveal-up p-6 rounded-2xl bg-white dark:bg-gray-800 shadow hover:shadow-xl hover:-translate-y-1 transition-all duration-300" style="transition-delay:240ms">
                    <div class="w-12 h-12 rounded-xl bg-brand-50 dark:bg-brand-500/10 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#EF3B2D" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white">Berita Terbaru</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update terbaru seputar ekosistem framework, tools, dan library pendukung.</p>
                </div>
            </div>
        </section>

        <!-- STATISTIK dengan angka berjalan saat scroll -->
        <section id="statistik" class="py-24 bg-white dark:bg-gray-800">
            <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="reveal reveal-scale">
                    <div class="counter text-4xl font-extrabold text-brand-500" data-target="1200">0</div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Pengguna Aktif</p>
                </div>
                <div class="reveal reveal-scale" style="transition-delay:100ms">
                    <div class="counter text-4xl font-extrabold text-brand-500" data-target="350">0</div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Proyek Selesai</p>
                </div>
                <div class="reveal reveal-scale" style="transition-delay:200ms">
                    <div class="counter text-4xl font-extrabold text-brand-500" data-target="99">0</div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">% Kepuasan</p>
                </div>
                <div class="reveal reveal-scale" style="transition-delay:300ms">
                    <div class="counter text-4xl font-extrabold text-brand-500" data-target="24">0</div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Jam Dukungan</p>
                </div>
            </div>
        </section>

        <!-- Alternating left/right reveal section -->
        <section class="py-24 max-w-5xl mx-auto px-6 space-y-20">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="flex-1 reveal reveal-left">
                    <h3 class="text-2xl font-extrabold text-gray-900 dark:text-white">Ringan tanpa library tambahan</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Semua animasi dibangun dari utility class Tailwind CSS ditambah sedikit JavaScript murni (IntersectionObserver), sehingga halaman tetap cepat.</p>
                </div>
                <div class="flex-1 reveal reveal-right">
                    <div class="h-40 rounded-2xl bg-gradient-to-br from-brand-500 to-brand-700 shadow-lg"></div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row-reverse items-center gap-10">
                <div class="flex-1 reveal reveal-left">
                    <h3 class="text-2xl font-extrabold text-gray-900 dark:text-white">Mudah dipasang di halaman lain</h3>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">Tinggal tambahkan class <code class="px-1.5 py-0.5 rounded bg-gray-200 dark:bg-gray-700 text-sm">reveal</code> + <code class="px-1.5 py-0.5 rounded bg-gray-200 dark:bg-gray-700 text-sm">reveal-up</code> pada elemen mana pun untuk membuatnya muncul saat digulir.</p>
                </div>
                <div class="flex-1 reveal reveal-right">
                    <div class="h-40 rounded-2xl bg-gradient-to-br from-gray-700 to-gray-900 shadow-lg"></div>
                </div>
            </div>
        </section>

        <!-- KONTAK / FOOTER -->
        <footer id="kontak" class="border-t border-gray-200 dark:border-gray-800 py-10">
            <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 reveal reveal-up">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
                </div>
                <div class="flex items-center gap-6 text-sm text-gray-500 dark:text-gray-400">
                    <a href="https://laravel.bigcartel.com" class="hover:text-brand-500 transition-colors">Shop</a>
                    <a href="https://github.com/sponsors/taylorotwell" class="hover:text-brand-500 transition-colors">Sponsor</a>
                </div>
            </div>
        </footer>

        <!-- Tombol back-to-top -->
        <button id="back-to-top" class="fixed bottom-6 right-6 w-11 h-11 rounded-full bg-brand-500 text-white shadow-lg flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hover:bg-brand-600" aria-label="Kembali ke atas">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // ====== 1) Scroll progress bar ======
            const progressBar = document.getElementById('scroll-progress');
            function updateProgress() {
                const scrollTop = window.scrollY;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const pct = docHeight > 0 ? scrollTop / docHeight : 0;
                progressBar.style.transform = `scaleX(${pct})`;
            }

            // ====== 2) Reveal on scroll (IntersectionObserver) ======
            const revealEls = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');

                        // arah kiri/kanan manual (tidak lewat keyframe global)
                        if (entry.target.classList.contains('reveal-left')) {
                            entry.target.style.transition = 'opacity .7s ease-out, transform .7s ease-out';
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'translateX(0)';
                        }
                        if (entry.target.classList.contains('reveal-right')) {
                            entry.target.style.transition = 'opacity .7s ease-out, transform .7s ease-out';
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'translateX(0)';
                        }
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            revealEls.forEach(el => {
                if (el.classList.contains('reveal-left')) {
                    el.style.opacity = 0;
                    el.style.transform = 'translateX(-24px)';
                }
                if (el.classList.contains('reveal-right')) {
                    el.style.opacity = 0;
                    el.style.transform = 'translateX(24px)';
                }
                revealObserver.observe(el);
            });

            // ====== 3) Angka berjalan (counter) saat statistik terlihat ======
            const counters = document.querySelectorAll('.counter');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.dataset.target, 10);
                        const duration = 1200;
                        const start = performance.now();

                        function tick(now) {
                            const progress = Math.min((now - start) / duration, 1);
                            const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
                            el.textContent = Math.floor(eased * target);
                            if (progress < 1) requestAnimationFrame(tick);
                            else el.textContent = target;
                        }
                        requestAnimationFrame(tick);
                        counterObserver.unobserve(el);
                    }
                });
            }, { threshold: 0.5 });
            counters.forEach(c => counterObserver.observe(c));

            // ====== 4) Tombol back-to-top ======
            const backToTop = document.getElementById('back-to-top');
            function toggleBackToTop() {
                if (window.scrollY > 400) {
                    backToTop.classList.remove('opacity-0', 'pointer-events-none');
                    backToTop.classList.add('opacity-100');
                } else {
                    backToTop.classList.add('opacity-0', 'pointer-events-none');
                    backToTop.classList.remove('opacity-100');
                }
            }
            backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

            window.addEventListener('scroll', () => {
                updateProgress();
                toggleBackToTop();
            });
            updateProgress();
        </script>
    </body>
</html>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/welcome.blade.php ENDPATH**/ ?>