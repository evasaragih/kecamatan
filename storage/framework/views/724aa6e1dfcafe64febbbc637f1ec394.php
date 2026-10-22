<?php $__env->startSection('title', $page->judul.' - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .profil-head { padding: clamp(7rem, 10vw, 9rem) 0 1rem; text-align: center; }
    .profil-head h1 { font-size: clamp(2rem, 4vw, 3.1rem); font-weight: 800; letter-spacing: -.02em; margin-top: .8rem; }
    .profil-cover { border-radius: var(--radius-lg); overflow: hidden; box-shadow: 0 24px 55px rgba(15,10,10,.12); margin-bottom: 2.25rem; }
    .profil-cover img { width: 100%; display: block; }
    .profil-content { font-size: 1.06rem; color: var(--ink-soft); line-height: 1.9; white-space: pre-line; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="container profil-head">
    <span class="kicker d-inline-flex">Profil</span>
    <h1><?php echo e($page->judul); ?></h1>
</section>

<section class="container pb-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <?php if($page->foto): ?>
                <div class="profil-cover">
                    <img src="<?php echo e(asset('storage/'.$page->foto)); ?>" alt="<?php echo e($page->judul); ?>">
                </div>
            <?php endif; ?>
            <div class="profil-content"><?php echo e($page->konten); ?></div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/profil/show.blade.php ENDPATH**/ ?>