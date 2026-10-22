<?php
    $dasawisma = $dasawisma ?? null;
?>

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Dasawisma</label>
        <input type="text" name="nama" value="<?php echo e(old('nama', $dasawisma->nama ?? '')); ?>" class="form-control" placeholder="Contoh: Dasawisma Melati 1" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Kelurahan</label>
        <select name="kelurahan_id" class="form-select">
            <option value="">- Pilih Kelurahan -</option>
            <?php $__currentLoopData = $kelurahans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelurahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($kelurahan->id); ?>" <?php if(old('kelurahan_id', $dasawisma->kelurahan_id ?? '') == $kelurahan->id): echo 'selected'; endif; ?>>
                    <?php echo e($kelurahan->nama); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label small">Nama Ketua</label>
        <input type="text" name="nama_ketua" value="<?php echo e(old('nama_ketua', $dasawisma->nama_ketua ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Wilayah / RT-RW</label>
        <input type="text" name="wilayah" value="<?php echo e(old('wilayah', $dasawisma->wilayah ?? '')); ?>" class="form-control" placeholder="Contoh: RT 02 / RW 05">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Kepala Keluarga</label>
        <input type="number" name="jumlah_kk" value="<?php echo e(old('jumlah_kk', $dasawisma->jumlah_kk ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label small">Jumlah Anggota</label>
        <input type="number" name="jumlah_anggota" value="<?php echo e(old('jumlah_anggota', $dasawisma->jumlah_anggota ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label small">Foto <?php echo e($dasawisma ? '(kosongkan jika tidak ingin mengubah)' : ''); ?></label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        <?php if($dasawisma && $dasawisma->foto): ?>
            <img src="<?php echo e(asset('storage/'.$dasawisma->foto)); ?>" class="mt-2 rounded" style="height:80px;">
        <?php endif; ?>
    </div>
    <div class="col-12">
        <label class="form-label small">Kegiatan Rutin</label>
        <textarea name="kegiatan" class="form-control" rows="3" placeholder="Contoh: Arisan bulanan, gotong royong, posyandu balita"><?php echo e(old('kegiatan', $dasawisma->kegiatan ?? '')); ?></textarea>
    </div>
    <div class="col-12">
        <label class="form-label small">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?php echo e(old('deskripsi', $dasawisma->deskripsi ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/dasawisma/_form.blade.php ENDPATH**/ ?>