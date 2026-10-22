<?php $__env->startSection('title', 'Dashboard - Admin Panel'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-newspaper fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0"><?php echo e($totalBerita); ?></h3>
                    <p class="text-secondary small mb-0">Total Berita</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-images fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0"><?php echo e($totalGaleri); ?></h3>
                    <p class="text-secondary small mb-0">Total Foto Galeri</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-city fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0"><?php echo e($totalKelurahan); ?></h3>
                    <p class="text-secondary small mb-0">Total Kelurahan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                    <i class="fa-solid fa-people-roof fs-5"></i>
                </div>
                <div>
                    <h3 class="mb-0"><?php echo e($totalDasawisma); ?></h3>
                    <p class="text-secondary small mb-0">Total Dasawisma</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-semibold">Berita Terbaru</div>
    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(Str::limit($berita->judul, 50)); ?></td>
                        <td><span class="badge bg-secondary-subtle text-secondary-emphasis"><?php echo e($berita->kategori); ?></span></td>
                        <td><?php echo e($berita->tanggal_publish?->translatedFormat('d M Y')); ?></td>
                        <td>
                            <?php if($berita->is_published): ?>
                                <span class="badge bg-success">Terbit</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Draft</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada berita.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>