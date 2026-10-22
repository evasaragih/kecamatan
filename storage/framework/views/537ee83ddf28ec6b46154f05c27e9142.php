<?php $__env->startSection('title', 'Kelola Berita - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.berita.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Berita
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Dilihat</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(Str::limit($berita->judul, 50)); ?></td>
                        <td><span class="badge bg-secondary-subtle text-secondary-emphasis"><?php echo e($berita->kategori); ?></span></td>
                        <td><?php echo e($berita->tanggal_publish?->translatedFormat('d M Y')); ?></td>
                        <td>
                            <?php if($berita->is_published): ?>
                                <span class="badge bg-success">Terbit</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($berita->dilihat); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.berita.edit', $berita)); ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?php echo e(route('admin.berita.destroy', $berita)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="text-center text-secondary py-4">Belum ada berita.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <?php echo e($beritas->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>