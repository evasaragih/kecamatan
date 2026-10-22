<?php $__env->startSection('title', 'Pejabat Struktural - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .pejabat-hero { text-align:center; padding: clamp(6rem, 10vw, 8rem) 0 2rem; }
    .pejabat-hero .kicker { justify-content: center; }
    .pejabat-hero h1 { font-weight: 800; letter-spacing: -.02em; font-size: clamp(2rem, 3.6vw, 3rem); color: var(--ink); margin: .8rem 0 .5rem; }
    .pejabat-hero p { color: var(--muted); }

    .pejabat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: clamp(1.5rem, 3vw, 2.25rem);
    }

    .pejabat-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        height: 400px;
        background: linear-gradient(160deg, var(--ink-soft), var(--ink));
        box-shadow: 0 14px 34px rgba(11,12,16,.14);
        opacity: 0;
        transform: translateY(24px);
        transition: opacity .6s ease, transform .6s ease, box-shadow .35s ease;
    }
    .pejabat-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .pejabat-card:hover {
        box-shadow: 0 26px 55px rgba(11,12,16,.32);
        transform: translateY(-6px);
    }

    .pejabat-photo {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }
    .pejabat-card:hover .pejabat-photo {
        transform: scale(1.08);
    }

    .pejabat-noimg {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: rgba(255,255,255,.25);
        background: linear-gradient(160deg, var(--ink-soft), var(--ink));
    }

    .pejabat-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(11,12,16,.95) 0%, rgba(11,12,16,.55) 45%, rgba(11,12,16,0) 75%);
    }

    .pejabat-info {
        position: absolute;
        left: 0; right: 0; bottom: 0;
        padding: 1.5rem;
        color: #fff;
        transition: transform .4s ease;
    }
    .pejabat-jabatan {
        display: inline-block;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: var(--gold-soft);
        margin-bottom: .35rem;
    }
    .pejabat-nama {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: .6rem;
        line-height: 1.3;
    }
    .pejabat-desk {
        font-size: .85rem;
        color: #cbd5e1;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: max-height .4s ease, opacity .4s ease, margin-top .4s ease;
    }
    .pejabat-card:hover .pejabat-desk {
        max-height: 140px;
        opacity: 1;
        margin-top: .25rem;
    }

    .pejabat-dots {
        display:flex;
        gap:.4rem;
        margin-top: 1rem;
    }
    .pejabat-dots span {
        width: 8px; height: 8px; border-radius: 50%;
        background: rgba(255,255,255,.25);
        transition: background .3s ease, transform .3s ease;
    }
    .pejabat-card:hover .pejabat-dots span:nth-child(1) { background: var(--gold-soft); transform:scale(1.2); }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="container">
    <div class="pejabat-hero">
        <span class="kicker">Struktur Organisasi</span>
        <h1>Pejabat Struktural</h1>
        <p>Pemerintah Kecamatan Lubuk Kilangan</p>
    </div>

    <div class="pejabat-grid pb-5" id="pejabatGrid">
        <?php $__empty_1 = true; $__currentLoopData = $pejabats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pejabat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="pejabat-card">
                <?php if($pejabat->foto): ?>
                    <img src="<?php echo e(asset('storage/'.$pejabat->foto)); ?>" class="pejabat-photo" alt="<?php echo e($pejabat->nama); ?>">
                <?php else: ?>
                    <div class="pejabat-noimg"><i class="fa-solid fa-user"></i></div>
                <?php endif; ?>
                <div class="pejabat-overlay"></div>
                <div class="pejabat-info">
                    <span class="pejabat-jabatan"><?php echo e($pejabat->jabatan); ?></span>
                    <div class="pejabat-nama"><?php echo e($pejabat->nama); ?></div>
                    <?php if($pejabat->deskripsi): ?>
                        <p class="pejabat-desk"><?php echo e($pejabat->deskripsi); ?></p>
                    <?php endif; ?>
                    <div class="pejabat-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-secondary py-5">Data pejabat struktural belum tersedia.</p>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    const cards = document.querySelectorAll('.pejabat-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('in-view'), i * 90);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });
    cards.forEach(card => observer.observe(card));
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/pejabat/index.blade.php ENDPATH**/ ?>