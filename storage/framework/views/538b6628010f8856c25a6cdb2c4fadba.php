<?php
    $kantor = $kantor ?? null;
?>

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label small">Nama Kantor</label>
        <input type="text" name="nama" value="<?php echo e(old('nama', $kantor->nama ?? '')); ?>" class="form-control" placeholder="Contoh: Kantor Camat Lubuk Kilangan / Kelurahan Bandar Buat" required>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Tipe</label>
        <select name="tipe" class="form-select" required>
            <option value="camat" <?php echo e(old('tipe', $kantor->tipe ?? '') === 'camat' ? 'selected' : ''); ?>>Kantor Camat</option>
            <option value="kelurahan" <?php echo e(old('tipe', $kantor->tipe ?? 'kelurahan') === 'kelurahan' ? 'selected' : ''); ?>>Kantor Kelurahan</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label small">Alamat Lengkap</label>
        <input type="text" name="alamat" value="<?php echo e(old('alamat', $kantor->alamat ?? '')); ?>" class="form-control" required>
        <small class="text-muted">Alamat ini otomatis dipakai untuk menampilkan peta Google Maps di halaman publik — pastikan penulisannya jelas dan akurat.</small>
    </div>
    <div class="col-md-4">
        <label class="form-label small">Telepon</label>
        <input type="text" name="telepon" value="<?php echo e(old('telepon', $kantor->telepon ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Email</label>
        <input type="text" name="email" value="<?php echo e(old('email', $kantor->email ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Instagram (contoh: @keclubukkilangan)</label>
        <input type="text" name="instagram" value="<?php echo e(old('instagram', $kantor->instagram ?? '')); ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label small">Urutan Tampil</label>
        <input type="number" name="urutan" value="<?php echo e(old('urutan', $kantor->urutan ?? 0)); ?>" class="form-control">
    </div>
</div>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/kantor/_form.blade.php ENDPATH**/ ?>