<?php $__env->startSection('title', 'Berita - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Title text that runs sideways, back and forth like a ticker */
    .berita-ticker-mask {
        overflow: hidden;
        -webkit-mask-image: linear-gradient(90deg, transparent, #000 10%, #000 90%, transparent);
        mask-image: linear-gradient(90deg, transparent, #000 10%, #000 90%, transparent);
    }
    .berita-ticker-track {
        display: inline-flex;
        white-space: nowrap;
        animation: beritaTicker 9s linear infinite;
    }
    .berita-ticker-item {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 800;
        letter-spacing: -.02em;
        color: var(--ink);
        padding: 0 2rem;
    }
    .berita-ticker-item .accent { color: var(--maroon); }
    @keyframes beritaTicker {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }
    .berita-ticker-mask:hover .berita-ticker-track { animation-play-state: paused; }

    /* Card hover + click animation */
    .berita-card-link { text-decoration: none; color: inherit; display: block; }
    .card-news {
        position: relative;
        overflow: hidden;
        transition: transform .35s ease, box-shadow .35s ease;
    }
    .card-news:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 44px rgba(127,29,46,.18) !important;
    }
    .card-news.is-pressed {
        transform: scale(.96);
        transition: transform .15s ease;
    }
    .card-news-img-wrap { overflow: hidden; }
    .card-news-img-wrap img { transition: transform .5s ease; }
    .card-news:hover .card-news-img-wrap img { transform: scale(1.08); }
    .berita-btn {
        transition: background .3s ease, color .3s ease, border-color .3s ease;
    }
    .card-news:hover .berita-btn {
        background: #7f1d2e;
        color: #fff;
        border-color: #7f1d2e;
    }
    .ripple-effect {
        position: absolute;
        border-radius: 50%;
        background: rgba(127,29,46,.35);
        transform: scale(0);
        animation: rippleAnim .6s ease-out forwards;
        pointer-events: none;
    }
    @keyframes rippleAnim {
        to { transform: scale(3); opacity: 0; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="container section-pad">
    <div class="text-center mb-5">
        <span class="kicker d-inline-flex mb-2">Publikasi</span>
        <div class="berita-ticker-mask">
            <div class="berita-ticker-track">
                <span class="berita-ticker-item">Berita <span class="accent">&amp;</span> Publikasi</span>
                <span class="berita-ticker-item">Berita <span class="accent">&amp;</span> Publikasi</span>
            </div>
        </div>
        <p class="section-lede mx-auto mt-3">Informasi terkini seputar kegiatan dan perkembangan Kecamatan Lubuk Kilangan</p>
    </div>

    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <a href="<?php echo e(route('berita.show', $berita->slug)); ?>" class="berita-card-link">
                    <div class="card h-100 border-0 shadow-sm card-news">
                        <div class="card-news-img-wrap">
                            <img src="<?php echo e($berita->foto ? asset('storage/'.$berita->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=600&q=80'); ?>" class="card-img-top" alt="<?php echo e($berita->judul); ?>">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary-subtle text-secondary-emphasis mb-2 align-self-start"><?php echo e($berita->kategori); ?></span>
                            <h5 class="card-title"><?php echo e(Str::limit($berita->judul, 60)); ?></h5>
                            <p class="card-text text-secondary small flex-grow-1"><?php echo e(Str::limit($berita->ringkasan, 90)); ?></p>
                            <p class="text-muted small mb-3"><?php echo e($berita->tanggal_publish->translatedFormat('d F Y')); ?></p>
                            <span class="btn btn-outline-secondary w-100 berita-btn">Baca Selengkapnya</span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-secondary">Belum ada berita.</p>
        <?php endif; ?>
    </div>

    <div class="mt-5 d-flex justify-content-center">
        <?php echo e($beritas->links()); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.querySelectorAll('.berita-card-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const card = this.querySelector('.card-news');
            const rect = card.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);

            const ripple = document.createElement('span');
            ripple.className = 'ripple-effect';
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            card.appendChild(ripple);
            card.classList.add('is-pressed');

            const destination = this.href;
            setTimeout(function () {
                window.location.href = destination;
            }, 380);
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/berita/index.blade.php ENDPATH**/ ?>