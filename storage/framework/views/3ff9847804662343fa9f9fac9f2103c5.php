<?php $__env->startSection('title', 'Edit Foto Galeri - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Edit Foto Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.galeri.update', $galeri)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label small">Judul</label>
                    <input type="text" name="judul" value="<?php echo e(old('judul', $galeri->judul)); ?>" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" value="<?php echo e(old('tanggal_kegiatan', $galeri->tanggal_kegiatan?->format('Y-m-d'))); ?>" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label small">Foto (kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <?php if($galeri->foto && $galeri->foto !== 'default.jpg'): ?>
                        <img src="<?php echo e(asset('storage/'.$galeri->foto)); ?>" class="mt-2 rounded" style="height:80px;">
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <label class="form-label small">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"><?php echo e(old('keterangan', $galeri->keterangan)); ?></textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Perbarui Foto</button>
                <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/galeri/edit.blade.php ENDPATH**/ ?>