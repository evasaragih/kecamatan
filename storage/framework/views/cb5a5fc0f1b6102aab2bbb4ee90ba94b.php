<?php $__env->startSection('title', 'Daftar Kelurahan - Kecamatan Lubuk Kilangan'); ?>
<?php $__env->startSection('body-class', 'is-immersive'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .kel-hero {
        position: relative;
        min-height: 82vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        background: linear-gradient(180deg, rgba(8,9,14,.4) 0%, rgba(8,9,14,.6) 55%, rgba(8,9,14,.94) 100%),
                    url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1800&q=80') center/cover no-repeat fixed;
        padding: 8rem 1.5rem 5rem;
    }
    .kel-hero .hero-inner { max-width: 760px; margin: 0 auto; }
    .kel-hero h1 {
        font-weight: 800;
        letter-spacing: -.02em;
        font-size: clamp(2.4rem, 5.4vw, 4.4rem);
        line-height: 1.1;
        margin: 1rem 0 1.1rem;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .25s forwards;
    }
    .kel-hero h1 .accent { color: var(--gold-soft); }
    .kel-hero .kicker { justify-content: center; opacity: 0; animation: heroFadeUp .8s var(--ease) .1s forwards; }
    .kel-hero p.lead-text {
        color: rgba(255,255,255,.82);
        max-width: 600px;
        margin: 0 auto 2.5rem;
        font-weight: 300;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .42s forwards;
    }
    .kel-stats {
        display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;
        opacity: 0; animation: heroFadeUp .8s var(--ease) .58s forwards;
    }
    .kel-stat-box {
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.14);
        border-radius: var(--radius-sm);
        padding: 1.4rem 2.2rem;
        min-width: 150px;
        backdrop-filter: blur(6px);
    }
    .kel-stat-box .num { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1; }
    .kel-stat-box .label { font-size: .8rem; color: var(--gold-soft); margin-top: .4rem; }

    .kel-list-section { background: var(--paper); padding: clamp(4rem, 8vw, 7rem) 0; }
    .kel-list-header h2 { font-size: clamp(2rem, 3.6vw, 2.8rem); font-weight: 800; letter-spacing: -.02em; }
    .kel-list-header .accent { color: var(--maroon); }
    .kel-list-header p { color: var(--muted); }

    .kel-row-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: 0 12px 34px rgba(15,10,10,.08);
        background: var(--surface);
        transition: box-shadow .4s var(--ease), transform .4s var(--ease);
    }
    .kel-row-card:hover { box-shadow: 0 26px 55px rgba(15,10,10,.15); transform: translateY(-4px); }
    .kel-row-media {
        position: relative; height: 100%; min-height: 240px;
        background: linear-gradient(155deg, var(--maroon), var(--maroon-deep));
    }
    .kel-row-media img { width: 100%; height: 100%; min-height: 240px; object-fit: cover; }
    .kel-row-initials {
        position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
        font-size: 3rem; font-weight: 800; color: rgba(255,255,255,.85);
    }
    .kel-row-badges { position: absolute; left: 1rem; bottom: 1rem; display: flex; gap: .5rem; }
    .kel-num-badge {
        background: rgba(11,12,16,.55); color: #fff; font-weight: 700; font-size: .8rem;
        padding: .35rem .7rem; border-radius: 999px; backdrop-filter: blur(2px);
    }
    .kel-status-badge {
        background: #2f7d4f; color: #fff; font-weight: 600; font-size: .78rem;
        padding: .35rem .8rem; border-radius: 999px; display: inline-flex; align-items: center; gap: .35rem;
    }
    .kel-status-badge i { font-size: .5rem; }

    .kel-row-body { padding: clamp(1.5rem, 3vw, 2.25rem); }
    .kel-tag {
        display: inline-flex; align-items: center; gap: .4rem;
        background: var(--maroon-tint); color: var(--maroon); font-size: .78rem; font-weight: 600;
        padding: .4rem .9rem; border-radius: 999px;
    }
    .kel-icon-box {
        width: 42px; height: 42px; border-radius: 12px;
        background: var(--maroon-tint); color: var(--maroon);
        display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;
    }
    .kel-info-line { font-size: .85rem; color: var(--muted); display: flex; align-items: center; gap: .45rem; margin-bottom: .25rem; }
    .kel-side-label { font-size: .85rem; font-weight: 700; color: var(--ink); display: flex; align-items: center; gap: .4rem; }
    .kel-side-count { font-size: .8rem; color: var(--muted-soft); font-weight: 600; }
    .kel-side-empty { font-size: .78rem; color: var(--muted-soft); font-style: italic; }
    .kel-detail-btn {
        border-radius: 999px; font-weight: 600; padding: .7rem 1.6rem;
        background: var(--maroon); border: none; transition: background .3s ease, transform .3s ease;
    }
    .kel-detail-btn:hover { background: var(--maroon-deep); transform: translateY(-3px); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="kel-hero">
    <div class="hero-inner">
        <span class="kicker kicker-light"><i class="fa-solid fa-map-location-dot me-1"></i> Wilayah Administratif</span>
        <h1>Kelurahan<br><span class="accent">Se-Kecamatan</span></h1>
        <p class="lead-text">Jelajahi informasi lengkap mengenai kelurahan di Kecamatan Lubuk Kilangan, Padang</p>
        <div class="kel-stats">
            <div class="kel-stat-box">
                <div class="num"><?php echo e($kelurahans->count()); ?></div>
                <div class="label">Kelurahan</div>
            </div>
            <div class="kel-stat-box">
                <div class="num">24</div>
                <div class="label">Jam Layanan</div>
            </div>
            <div class="kel-stat-box">
                <div class="num">100%</div>
                <div class="label">Dedikasi</div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.marquee', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="kel-list-section">
    <div class="container">
        <div class="kel-list-header text-center mb-5">
            <h2>Daftar <span class="accent">Kelurahan</span></h2>
            <p>Pilih kelurahan untuk melihat informasi lengkap, kegiatan, dan pengumuman terkini</p>
        </div>

        <div class="d-flex flex-column gap-4">
            <?php $__currentLoopData = $kelurahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelurahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="kel-row-card">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <div class="kel-row-media">
                                <?php if($kelurahan->foto): ?>
                                    <img src="<?php echo e(asset('storage/'.$kelurahan->foto)); ?>" alt="<?php echo e($kelurahan->nama); ?>">
                                <?php else: ?>
                                    <div class="kel-row-initials"><?php echo e(Str::upper(Str::substr($kelurahan->nama, 0, 2))); ?></div>
                                <?php endif; ?>
                                <div class="kel-row-badges">
                                    <span class="kel-num-badge"><?php echo e(sprintf('%02d', $loop->iteration)); ?></span>
                                    <span class="kel-status-badge"><i class="fa-solid fa-circle"></i> Aktif</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="kel-row-body">
                                <span class="kel-tag"><i class="fa-solid fa-location-dot"></i> Kelurahan <?php echo e($kelurahan->nama); ?></span>

                                <div class="d-flex justify-content-between flex-wrap gap-4 mt-3">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="kel-icon-box"><i class="fa-solid fa-building"></i></div>
                                            <h5 class="mb-0 fw-bold">Kelurahan <?php echo e($kelurahan->nama); ?></h5>
                                        </div>
                                        <p class="kel-info-line"><i class="fa-solid fa-user"></i> <?php echo e($kelurahan->nama_lurah ?? '-'); ?></p>
                                        <p class="kel-info-line mb-0"><i class="fa-solid fa-location-dot"></i> Kelurahan <?php echo e($kelurahan->nama); ?></p>
                                    </div>
                                    <div class="text-md-end">
                                        <p class="kel-side-label justify-content-md-end mb-1">
                                            <i class="fa-solid fa-calendar-check text-info"></i> Kegiatan Terbaru
                                            <span class="kel-side-count">0 kegiatan</span>
                                        </p>
                                        <p class="kel-side-empty mb-3">Belum ada kegiatan</p>
                                        <p class="kel-side-label justify-content-md-end mb-1">
                                            <i class="fa-solid fa-bullhorn text-warning"></i> Pengumuman
                                            <span class="kel-side-count">0 pengumuman</span>
                                        </p>
                                        <p class="kel-side-empty mb-0">Tidak ada pengumuman</p>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <a href="<?php echo e(route('kelurahan.show', $kelurahan->slug)); ?>" class="btn kel-detail-btn text-white">
                                        Lihat Detail Lengkap <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/kelurahan/index.blade.php ENDPATH**/ ?>