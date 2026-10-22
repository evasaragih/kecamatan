<?php $__env->startSection('title', 'Kelola Program Pokok PKK - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola 10 Program Pokok PKK'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?php echo e(route('admin.pkk-program.create')); ?>" class="btn btn-dark rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Tambah Program
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:60px;">Urutan</th>
                    <th style="width:60px;">Ikon</th>
                    <th>Judul Program</th>
                    <th>Deskripsi</th>
                    <th class="text-end" style="width:120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($program->urutan); ?></td>
                        <td><i class="<?php echo e($program->icon ?: 'fa-solid fa-star'); ?> text-danger"></i></td>
                        <td class="fw-semibold"><?php echo e($program->judul); ?></td>
                        <td class="small text-muted"><?php echo e(Str::limit($program->deskripsi, 80)); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('admin.pkk-program.edit', $program)); ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?php echo e(route('admin.pkk-program.destroy', $program)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus program ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">Belum ada data program pokok PKK.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/pkk/program/index.blade.php ENDPATH**/ ?>