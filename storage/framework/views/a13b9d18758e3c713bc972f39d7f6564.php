<?php
    $berita = $berita ?? null;
?>

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Judul Berita</label>
        <input type="text" name="judul" value="<?php echo e(old('judul', $berita->judul ?? '')); ?>" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Kategori</label>
        <select name="kategori" class="form-select" required>
            <?php $__currentLoopData = ['Berita', 'Pengumuman', 'Kegiatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($kategori); ?>" <?php echo e(old('kategori', $berita->kategori ?? '') === $kategori ? 'selected' : ''); ?>><?php echo e($kategori); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Tanggal Publish</label>
        <input type="datetime-local" name="tanggal_publish" value="<?php echo e(old('tanggal_publish', isset($berita->tanggal_publish) ? $berita->tanggal_publish->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i'))); ?>" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto <?php echo e($berita ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <?php if($berita && $berita->foto): ?>
            <img src="<?php echo e(asset('storage/'.$berita->foto)); ?>" class="mt-2 rounded" style="height:80px;">
        <?php endif; ?>
    </div>
    <div class="col-12">
        <label class="form-label small">Ringkasan Singkat</label>
        <textarea name="ringkasan" class="form-control" rows="2"><?php echo e(old('ringkasan', $berita->ringkasan ?? '')); ?></textarea>
    </div>
    <div class="col-12">
        <label class="form-label small">Isi Berita</label>
        <textarea name="isi" id="isi" class="form-control" rows="10" required><?php echo e(old('isi', $berita->isi ?? '')); ?></textarea>
        <small class="text-muted">Bisa menggunakan tag HTML sederhana seperti &lt;p&gt;, &lt;b&gt;, &lt;ul&gt;.</small>
    </div>
    <div class="col-12 form-check">
        <input type="checkbox" name="is_published" value="1" class="form-check-input" id="is_published" <?php echo e(old('is_published', $berita->is_published ?? true) ? 'checked' : ''); ?>>
        <label class="form-check-label" for="is_published">Terbitkan berita ini</label>
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/berita/_form.blade.php ENDPATH**/ ?>