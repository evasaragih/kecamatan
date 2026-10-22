<?php
    $pengurus = $pengurus ?? null;
?>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label small">Nama Lengkap</label>
        <input type="text" name="nama" value="<?php echo e(old('nama', $pengurus->nama ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Jabatan</label>
        <input type="text" name="jabatan" value="<?php echo e(old('jabatan', $pengurus->jabatan ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="<?php echo e(old('urutan', $pengurus->urutan ?? 0)); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto <?php echo e($pengurus ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <small class="text-muted">Disarankan foto portrait/vertikal agar tampilan kartu maksimal.</small>
        <?php if($pengurus && $pengurus->foto): ?>
            <img src="<?php echo e(asset('storage/'.$pengurus->foto)); ?>" class="mt-2 rounded" style="height:100px;">
        <?php endif; ?>
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi Singkat (opsional)</label>
        <textarea name="deskripsi" class="form-control" rows="3"><?php echo e(old('deskripsi', $pengurus->deskripsi ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/pkk/pengurus/_form.blade.php ENDPATH**/ ?>