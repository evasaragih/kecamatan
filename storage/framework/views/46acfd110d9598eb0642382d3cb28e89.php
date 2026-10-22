<?php
    $kelurahan = $kelurahan ?? null;
?>

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Kelurahan</label>
        <input type="text" name="nama" value="<?php echo e(old('nama', $kelurahan->nama ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Nama Lurah</label>
        <input type="text" name="nama_lurah" value="<?php echo e(old('nama_lurah', $kelurahan->nama_lurah ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Alamat Kantor</label>
        <input type="text" name="alamat_kantor" value="<?php echo e(old('alamat_kantor', $kelurahan->alamat_kantor ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Penduduk (jiwa)</label>
        <input type="number" name="jumlah_penduduk" value="<?php echo e(old('jumlah_penduduk', $kelurahan->jumlah_penduduk ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Luas Wilayah (km²)</label>
        <input type="number" name="luas_wilayah_km2" value="<?php echo e(old('luas_wilayah_km2', $kelurahan->luas_wilayah_km2 ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto <?php echo e($kelurahan ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <?php if($kelurahan && $kelurahan->foto): ?>
            <img src="<?php echo e(asset('storage/'.$kelurahan->foto)); ?>" class="mt-2 rounded" style="height:80px;">
        <?php endif; ?>
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?php echo e(old('deskripsi', $kelurahan->deskripsi ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/kelurahan/_form.blade.php ENDPATH**/ ?>