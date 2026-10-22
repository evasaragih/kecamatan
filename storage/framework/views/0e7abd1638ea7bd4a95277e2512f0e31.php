<?php $__env->startSection('title', $dasawisma->nama.' - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .dw-show-hero {
        position: relative;
        min-height: 46vh;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        color: #fff;
        padding: 8rem 0 3.5rem;
    }
    .dw-show-hero .hero-bg-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; }
    .dw-show-hero .hero-bg-overlay {
        position: absolute; inset: 0; z-index: 1;
        background: linear-gradient(180deg, rgba(11,12,16,.15) 0%, rgba(11,12,16,.88) 100%);
    }
    .dw-show-hero .container { position: relative; z-index: 2; }
    .dw-show-hero .kicker { color: var(--gold-soft); }
    .dw-show-hero .kicker::before { background: var(--gold-soft); }
    .dw-show-hero h1 { color: #fff; font-size: clamp(2.2rem, 4.6vw, 3.6rem); font-weight: 800; letter-spacing: -.02em; margin-top: .6rem; }

    .dw-detail-body { padding: clamp(3rem, 6vw, 5rem) 0; }
    .dw-fact-card {
        background: var(--surface);
        border-radius: var(--radius-md);
        box-shadow: 0 20px 45px rgba(15,10,10,.08);
        padding: clamp(1.75rem, 3vw, 2.5rem);
    }
    .dw-fact-row { display: flex; justify-content: space-between; gap: 1rem; padding: .95rem 0; border-bottom: 1px solid var(--line); }
    .dw-fact-row:last-child { border-bottom: none; }
    .dw-fact-label { color: var(--muted); font-size: .88rem; }
    .dw-fact-value { font-weight: 600; text-align: right; color: var(--ink); font-size: .92rem; }
    .dw-desc-title { font-size: 1.6rem; font-weight: 700; letter-spacing: -.01em; }
    .dw-desc-text { color: var(--muted); font-size: 1.02rem; white-space: pre-line; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="dw-show-hero">
    <img src="<?php echo e($dasawisma->foto ? asset('storage/'.$dasawisma->foto) : 'https://images.unsplash.com/photo-1591189824344-1b0c9f1f6df1?auto=format&fit=crop&w=1600&q=80'); ?>" alt="<?php echo e($dasawisma->nama); ?>" class="hero-bg-img">
    <div class="hero-bg-overlay"></div>
    <div class="container">
        <span class="kicker">Kelompok Dasawisma</span>
        <h1><?php echo e($dasawisma->nama); ?></h1>
    </div>
</section>

<section class="dw-detail-body">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="dw-desc-title mb-3">Tentang Kelompok</h2>
                <p class="dw-desc-text"><?php echo e($dasawisma->deskripsi ?: 'Belum ada deskripsi untuk kelompok dasawisma ini.'); ?></p>

                <?php if($dasawisma->kegiatan): ?>
                    <h2 class="dw-desc-title mb-3 mt-5">Kegiatan Rutin</h2>
                    <p class="dw-desc-text"><?php echo e($dasawisma->kegiatan); ?></p>
                <?php endif; ?>

                <a href="<?php echo e(route('dasawisma.index')); ?>" class="btn btn-outline-dark rounded-pill px-4 mt-4">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Dasawisma
                </a>
            </div>
            <div class="col-lg-5">
                <div class="dw-fact-card">
                    <div class="dw-fact-row">
                        <span class="dw-fact-label">Ketua Dasawisma</span>
                        <span class="dw-fact-value"><?php echo e($dasawisma->nama_ketua ?? '-'); ?></span>
                    </div>
                    <div class="dw-fact-row">
                        <span class="dw-fact-label">Kelurahan</span>
                        <span class="dw-fact-value"><?php echo e($dasawisma->kelurahan->nama ?? '-'); ?></span>
                    </div>
                    <div class="dw-fact-row">
                        <span class="dw-fact-label">Wilayah / RT-RW</span>
                        <span class="dw-fact-value"><?php echo e($dasawisma->wilayah ?? '-'); ?></span>
                    </div>
                    <div class="dw-fact-row">
                        <span class="dw-fact-label">Jumlah Kepala Keluarga</span>
                        <span class="dw-fact-value"><?php echo e($dasawisma->jumlah_kk ? $dasawisma->jumlah_kk.' KK' : '-'); ?></span>
                    </div>
                    <div class="dw-fact-row">
                        <span class="dw-fact-label">Jumlah Anggota</span>
                        <span class="dw-fact-value"><?php echo e($dasawisma->jumlah_anggota ? $dasawisma->jumlah_anggota.' orang' : '-'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/dasawisma/show.blade.php ENDPATH**/ ?>