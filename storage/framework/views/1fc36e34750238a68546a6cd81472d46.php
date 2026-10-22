<?php $__env->startSection('title', 'Kecamatan Lubuk Kilangan - Beranda'); ?>
<?php $__env->startSection('body-class', 'is-immersive'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* ---------- Welcome / story panel ---------- */
    .welcome-panel {
        margin-top: -7rem;
        position: relative;
        z-index: 3;
    }
    .welcome-card {
        background: var(--surface);
        border-radius: var(--radius-lg);
        box-shadow: 0 30px 70px rgba(15,10,10,.16);
        padding: clamp(2.25rem, 5vw, 4rem);
    }
    .welcome-card h2 {
        font-size: clamp(1.8rem, 3.4vw, 2.6rem);
        margin: .9rem 0 1.1rem;
    }
    .welcome-card p { color: var(--muted); font-size: 1.02rem; max-width: 720px; }
    .stat-row { display: flex; flex-wrap: wrap; gap: clamp(1.5rem, 4vw, 3rem); margin-top: 2.25rem; padding-top: 2rem; border-top: 1px solid var(--line); }
    .stat-item .num { font-size: clamp(1.8rem, 3vw, 2.4rem); font-weight: 800; color: var(--maroon); line-height: 1; }
    .stat-item .label { font-size: .82rem; color: var(--muted); margin-top: .35rem; letter-spacing: .02em; }

    /* ---------- Section headers ---------- */
    .home-section-head { max-width: 640px; margin: 0 auto clamp(2.5rem, 5vw, 3.5rem); text-align: center; }

    /* ---------- News cards ---------- */
    .card-news { border-radius: var(--radius-md); overflow: hidden; }
    .card-news .card-img-top { height: 210px; object-fit: cover; }
    .card-news .card-body { display: flex; flex-direction: column; }

    /* ---------- Immersive "Kelurahan" CTA band ---------- */
    .kelurahan-band {
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-lg);
        min-height: 420px;
        display: flex;
        align-items: center;
        background: linear-gradient(150deg, #12151c 0%, var(--maroon-deep) 130%);
        color: #fff;
        padding: clamp(2.5rem, 6vw, 5rem);
    }
    .kelurahan-band::before {
        content: '';
        position: absolute; inset: 0;
        background: url('https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
        opacity: .18;
    }
    .kelurahan-band .band-content { position: relative; z-index: 2; max-width: 560px; }
    .kelurahan-band .band-num {
        font-size: clamp(3.5rem, 8vw, 6rem);
        font-weight: 800;
        line-height: .95;
        background: linear-gradient(90deg, #fff, var(--gold-soft));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .kelurahan-band h2 { color: #fff; font-size: clamp(1.7rem, 3.2vw, 2.4rem); margin: .6rem 0 1rem; }
    .kelurahan-band p { color: rgba(255,255,255,.78); max-width: 480px; }

    /* ---------- Gallery grid ---------- */
    .gallery-tile { position: relative; border-radius: var(--radius-sm); overflow: hidden; aspect-ratio: 4/5; }
    .gallery-tile img { width: 100%; height: 100%; object-fit: cover; transition: transform .6s var(--ease); }
    .gallery-tile:hover img { transform: scale(1.08); }
    .gallery-tile .tile-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(0deg, rgba(11,12,16,.85) 0%, rgba(11,12,16,0) 55%);
        display: flex; align-items: flex-end; padding: 1rem;
        opacity: 0; transition: opacity .35s ease;
    }
    .gallery-tile:hover .tile-overlay { opacity: 1; }
    .gallery-tile .tile-overlay p { color: #fff; font-size: .85rem; font-weight: 600; margin: 0; line-height: 1.35; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="hero-section text-center">
    <div class="hero-inner">
        <span class="kicker">Selamat Datang</span>
        <h1>Kecamatan<br>Lubuk Kilangan</h1>
        <p class="lead">Sebuah kecamatan di Kota Padang, Sumatera Barat — melayani warga dengan transparansi, dedikasi, dan semangat gotong royong.</p>
        <a href="<?php echo e(route('kelurahan.index')); ?>" class="btn btn-success rounded-pill px-4 py-3 mt-3">
            Jelajahi Wilayah Kami <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="scroll-cue"><i class="fa-solid fa-chevron-down"></i></div>
</section>

<section class="container welcome-panel">
    <div class="welcome-card">
        <span class="kicker">Pesan Selamat Datang</span>
        <h2>Website Resmi untuk Warga Lubuk Kilangan</h2>
        <p>Kami hadir untuk memberikan kemudahan akses informasi seputar profil, layanan administrasi, kelurahan, dan kegiatan Kecamatan Lubuk Kilangan kepada seluruh masyarakat — kapan pun, di mana pun.</p>

        <div class="stat-row">
            <div class="stat-item">
                <div class="num"><?php echo e($totalKelurahan); ?></div>
                <div class="label">Kelurahan</div>
            </div>
            <div class="stat-item">
                <div class="num">24 Jam</div>
                <div class="label">Akses Informasi</div>
            </div>
            <div class="stat-item">
                <div class="num">100%</div>
                <div class="label">Dedikasi Pelayanan</div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.marquee', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="container section-pad">
    <div class="home-section-head">
        <span class="kicker">Publikasi Terkini</span>
        <h2 class="section-title-xl mt-2">Berita Terbaru</h2>
        <p class="section-lede mx-auto mt-3">Informasi terkini seputar kegiatan dan perkembangan Kecamatan Lubuk Kilangan.</p>
    </div>

    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-news">
                    <img src="<?php echo e($berita->foto ? asset('storage/'.$berita->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=600&q=80'); ?>" class="card-img-top" alt="<?php echo e($berita->judul); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e(Str::limit($berita->judul, 60)); ?></h5>
                        <p class="card-text text-secondary small flex-grow-1"><?php echo e(Str::limit($berita->ringkasan, 90)); ?></p>
                        <p class="text-muted small mb-3"><?php echo e($berita->tanggal_publish->translatedFormat('d F Y')); ?></p>
                        <a href="<?php echo e(route('berita.show', $berita->slug)); ?>" class="btn btn-outline-secondary w-100">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-secondary">Belum ada berita.</p>
        <?php endif; ?>
    </div>

    <div class="text-center mt-5">
        <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-outline-dark rounded-pill px-4">Lihat Semua Berita</a>
    </div>
</section>

<section class="container pb-5">
    <div class="kelurahan-band reveal-target">
        <div class="band-content">
            <div class="band-num"><?php echo e($totalKelurahan); ?></div>
            <h2>Kelurahan yang Kami Layani</h2>
            <p>Setiap kelurahan memiliki karakter dan potensi masing-masing. Jelajahi profil lengkap, data kependudukan, dan informasi kontak setiap kelurahan di Lubuk Kilangan.</p>
            <a href="<?php echo e(route('kelurahan.index')); ?>" class="btn btn-light rounded-pill px-4 py-3 mt-3 fw-semibold">
                Lihat Semua Kelurahan <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<section class="container section-pad">
    <div class="home-section-head">
        <span class="kicker">Dokumentasi</span>
        <h2 class="section-title-xl mt-2">Galeri Kegiatan</h2>
        <p class="section-lede mx-auto mt-3">Momen dan dokumentasi kegiatan Kecamatan Lubuk Kilangan.</p>
    </div>

    <div class="row g-3">
        <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-6 col-md-3">
                <div class="gallery-tile">
                    <img src="<?php echo e($foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80'); ?>" alt="<?php echo e($foto->judul); ?>" loading="lazy">
                    <div class="tile-overlay">
                        <p><?php echo e(Str::limit($foto->judul, 40)); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-secondary">Belum ada dokumentasi.</p>
        <?php endif; ?>
    </div>

    <div class="text-center mt-5">
        <a href="<?php echo e(route('galeri.index')); ?>" class="btn btn-outline-dark rounded-pill px-4">Lihat Semua Galeri</a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/home.blade.php ENDPATH**/ ?>