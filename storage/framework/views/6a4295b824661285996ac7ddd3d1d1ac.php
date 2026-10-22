<?php $__env->startSection('title', 'Kelola Galeri - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Galeri Kegiatan'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.galeri.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Foto
    </a>
</div>

<div class="row g-4">
    <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm h-100">
                <img src="<?php echo e($foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=500&q=80'); ?>" class="card-img-top" style="height:140px;object-fit:cover;">
                <div class="card-body p-2">
                    <p class="small fw-semibold mb-1"><?php echo e(Str::limit($foto->judul, 35)); ?></p>
                    <p class="small text-muted mb-2"><?php echo e($foto->tanggal_kegiatan?->translatedFormat('d M Y')); ?></p>
                    <div class="d-flex gap-1">
                        <a href="<?php echo e(route('admin.galeri.edit', $foto)); ?>" class="btn btn-sm btn-outline-primary flex-grow-1"><i class="fa-solid fa-pen"></i></a>
                        <form action="<?php echo e(route('admin.galeri.destroy', $foto)); ?>" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="flex-grow-1">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger w-100"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-center text-secondary py-4">Belum ada foto galeri.</p>
    <?php endif; ?>
</div>

<div class="mt-4">
    <?php echo e($galeris->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>