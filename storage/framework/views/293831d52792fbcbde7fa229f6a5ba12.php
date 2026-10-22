<?php $__env->startSection('title', $berita->judul.' - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startSection('content'); ?>
<section class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <span class="badge bg-secondary-subtle text-secondary-emphasis mb-3"><?php echo e($berita->kategori); ?></span>
            <h1 class="fw-bold mb-3"><?php echo e($berita->judul); ?></h1>
            <p class="text-muted mb-4">
                <i class="fa-regular fa-calendar me-1"></i> <?php echo e($berita->tanggal_publish->translatedFormat('d F Y')); ?>

                &nbsp;&bull;&nbsp;
                <i class="fa-regular fa-eye me-1"></i> <?php echo e($berita->dilihat); ?> dilihat
            </p>
            <img src="<?php echo e($berita->foto ? asset('storage/'.$berita->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=1000&q=80'); ?>" class="img-fluid rounded-4 shadow-sm mb-4" alt="<?php echo e($berita->judul); ?>">
            <div class="fs-6">
                <?php echo $berita->isi; ?>

            </div>

            <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-outline-dark rounded-pill px-4 mt-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Berita
            </a>

            <?php if($terkait->count()): ?>
                <hr class="my-5">
                <h4 class="fw-bold mb-4">Berita Terkait</h4>
                <div class="row g-4">
                    <?php $__currentLoopData = $terkait; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm card-news">
                                <img src="<?php echo e($item->foto ? asset('storage/'.$item->foto) : 'https://images.unsplash.com/photo-1495020689067-958852a7765e?auto=format&fit=crop&w=600&q=80'); ?>" class="card-img-top" alt="<?php echo e($item->judul); ?>">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title"><?php echo e(Str::limit($item->judul, 50)); ?></h6>
                                    <a href="<?php echo e(route('berita.show', $item->slug)); ?>" class="btn btn-sm btn-outline-secondary w-100 mt-auto">Baca</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/berita/show.blade.php ENDPATH**/ ?>