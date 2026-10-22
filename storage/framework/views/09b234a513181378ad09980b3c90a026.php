<?php $__env->startSection('title', 'Profil PKK - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Kelola Profil & Sambutan PKK'); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.pkk-profil.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small">Nama Ketua TP PKK</label>
                    <input type="text" name="nama_ketua" value="<?php echo e(old('nama_ketua', $profil->nama_ketua)); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Foto Ketua TP PKK (opsional)</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <?php if($profil->foto): ?>
                        <img src="<?php echo e(asset('storage/'.$profil->foto)); ?>" class="mt-2 rounded" style="height:100px;">
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <label class="form-label small">Sambutan Ketua</label>
                    <textarea name="sambutan" class="form-control" rows="7"><?php echo e(old('sambutan', $profil->sambutan)); ?></textarea>
                    <div class="form-text">Tulis teks biasa, tekan Enter untuk ganti paragraf.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Visi PKK</label>
                    <textarea name="visi" class="form-control" rows="5"><?php echo e(old('visi', $profil->visi)); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label small">Misi PKK</label>
                    <textarea name="misi" class="form-control" rows="5"><?php echo e(old('misi', $profil->misi)); ?></textarea>
                    <div class="form-text">Setiap poin misi bisa ditulis di baris baru, akan tersusun otomatis di halaman publik.</div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark rounded-pill px-4">Simpan Perubahan</button>
                <a href="<?php echo e(route('pkk.index')); ?>" target="_blank" class="btn btn-outline-secondary rounded-pill px-4">Lihat Halaman PKK</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/pkk/profil.blade.php ENDPATH**/ ?>