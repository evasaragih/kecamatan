<?php
    $pejabat = $pejabat ?? null;
?>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label small">Nama Lengkap (dengan gelar)</label>
        <input type="text" name="nama" value="<?php echo e(old('nama', $pejabat->nama ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Jabatan</label>
        <input type="text" name="jabatan" value="<?php echo e(old('jabatan', $pejabat->jabatan ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="<?php echo e(old('urutan', $pejabat->urutan ?? 0)); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto <?php echo e($pejabat ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <small class="text-muted">Disarankan foto portrait/vertikal agar tampilan kartu maksimal.</small>
        <?php if($pejabat && $pejabat->foto): ?>
            <img src="<?php echo e(asset('storage/'.$pejabat->foto)); ?>" class="mt-2 rounded" style="height:100px;">
        <?php endif; ?>
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi Singkat (muncul saat kartu di-hover)</label>
        <textarea name="deskripsi" class="form-control" rows="3"><?php echo e(old('deskripsi', $pejabat->deskripsi ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/pejabat/_form.blade.php ENDPATH**/ ?>