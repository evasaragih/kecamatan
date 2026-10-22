<?php $__env->startSection('title', 'Kelola Kelurahan - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Kelurahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.kelurahan.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kelurahan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Kelurahan</th>
                    <th>Lurah</th>
                    <th>Jumlah Penduduk</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $kelurahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelurahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($kelurahan->nama); ?></td>
                        <td><?php echo e($kelurahan->nama_lurah ?? '-'); ?></td>
                        <td><?php echo e($kelurahan->jumlah_penduduk ? number_format($kelurahan->jumlah_penduduk, 0, ',', '.') : '-'); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('kelurahan.show', $kelurahan->slug)); ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="<?php echo e(route('admin.kelurahan.edit', $kelurahan)); ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?php echo e(route('admin.kelurahan.destroy', $kelurahan)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus kelurahan ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada data kelurahan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <?php echo e($kelurahans->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/kelurahan/index.blade.php ENDPATH**/ ?>