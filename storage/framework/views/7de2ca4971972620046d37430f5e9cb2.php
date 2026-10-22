<?php $__env->startSection('title', 'Kelola Pengurus PKK - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Pengurus PKK'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.pkk-pengurus.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Pengurus
    </a>
</div>

<div class="row g-4">
    <?php $__empty_1 = true; $__currentLoopData = $pengurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm h-100">
                <img src="<?php echo e($item->foto ? asset('storage/'.$item->foto) : 'https://ui-avatars.com/api/?name='.urlencode($item->nama).'&background=7f1d2e&color=fff&size=300'); ?>" class="card-img-top" style="height:180px;object-fit:cover;">
                <div class="card-body p-3">
                    <span class="badge bg-secondary-subtle text-secondary-emphasis mb-1"><?php echo e($item->jabatan); ?></span>
                    <p class="fw-semibold mb-1"><?php echo e($item->nama); ?></p>
                    <p class="small text-muted mb-2">Urutan: <?php echo e($item->urutan); ?></p>
                    <div class="d-flex gap-1">
                        <a href="<?php echo e(route('admin.pkk-pengurus.edit', $item)); ?>" class="btn btn-sm btn-outline-primary flex-grow-1"><i class="fa-solid fa-pen"></i></a>
                        <form action="<?php echo e(route('admin.pkk-pengurus.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Hapus data pengurus ini?')" class="flex-grow-1">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger w-100"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center text-secondary py-4">Belum ada data pengurus PKK.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/pkk/pengurus/index.blade.php ENDPATH**/ ?>