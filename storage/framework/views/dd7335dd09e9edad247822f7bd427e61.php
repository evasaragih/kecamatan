<?php $__env->startSection('title', 'Edit Kelurahan - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Edit Kelurahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.kelurahan.update', $kelurahan)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.kelurahan._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Kelurahan</button>
                <a href="<?php echo e(route('admin.kelurahan.index')); ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/kelurahan/edit.blade.php ENDPATH**/ ?>