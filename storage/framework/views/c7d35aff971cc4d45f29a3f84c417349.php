<?php $__env->startSection('title', 'Kelola Alamat Pemerintahan - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Alamat Pemerintahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.kantor.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kantor
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Kantor</th>
                    <th>Tipe</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $kantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($kantor->nama); ?></td>
                        <td>
                            <?php if($kantor->tipe === 'camat'): ?>
                                <span class="badge bg-danger-subtle text-danger-emphasis">Camat</span>
                            <?php else: ?>
                                <span class="badge bg-info-subtle text-info-emphasis">Kelurahan</span>
                            <?php endif; ?>
                        </td>
                        <td class="small"><?php echo e(Str::limit($kantor->alamat, 50)); ?></td>
                        <td><?php echo e($kantor->telepon ?? '-'); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.kantor.edit', $kantor)); ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?php echo e(route('admin.kantor.destroy', $kantor)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus data kantor ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data kantor.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/kantor/index.blade.php ENDPATH**/ ?>