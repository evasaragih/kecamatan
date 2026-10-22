<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background:#f1f5f9; }
        .sidebar { min-height:100vh; background:#0f172a; color:#e2e8f0; width:250px; }
        .sidebar a { color:#cbd5e1; text-decoration:none; display:block; padding:.65rem 1.25rem; border-radius:.5rem; }
        .sidebar a.active, .sidebar a:hover { background:#1e293b; color:#fff; }
        .wrapper { display:flex; }
        .content { flex:1; padding:2rem; }
        .topbar { background:#fff; border-bottom:1px solid #e2e8f0; }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<div class="wrapper">
    <aside class="sidebar p-3">
        <div class="d-flex align-items-center gap-2 mb-4 px-2">
            <img src="<?php echo e(asset('images/logo-padang.png')); ?>" alt="Logo Kota Padang" style="width:38px;height:38px;object-fit:contain;">
            <div>
                <small class="d-block text-uppercase" style="font-size:.65rem;">Admin Panel</small>
                <strong>Lubuk Kilangan</strong>
            </div>
        </div>
        <nav class="nav flex-column gap-1">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
            <a href="<?php echo e(route('admin.berita.index')); ?>" class="<?php echo e(request()->routeIs('admin.berita.*') ? 'active' : ''); ?>"><i class="fa-solid fa-newspaper me-2"></i> Berita</a>
            <a href="<?php echo e(route('admin.galeri.index')); ?>" class="<?php echo e(request()->routeIs('admin.galeri.*') ? 'active' : ''); ?>"><i class="fa-solid fa-images me-2"></i> Galeri Kegiatan</a>
            <a href="<?php echo e(route('admin.kelurahan.index')); ?>" class="<?php echo e(request()->routeIs('admin.kelurahan.*') ? 'active' : ''); ?>"><i class="fa-solid fa-city me-2"></i> Kelurahan</a>
            <a href="<?php echo e(route('admin.dasawisma.index')); ?>" class="<?php echo e(request()->routeIs('admin.dasawisma.*') ? 'active' : ''); ?>"><i class="fa-solid fa-people-roof me-2"></i> Dasawisma</a>
            <a href="<?php echo e(route('admin.pkk-profil.edit')); ?>" class="<?php echo e(request()->routeIs('admin.pkk-profil.*') ? 'active' : ''); ?>"><i class="fa-solid fa-book-open me-2"></i> PKK - Profil &amp; Sambutan</a>
            <a href="<?php echo e(route('admin.pkk-pengurus.index')); ?>" class="<?php echo e(request()->routeIs('admin.pkk-pengurus.*') ? 'active' : ''); ?>"><i class="fa-solid fa-user-group me-2"></i> PKK - Pengurus</a>
            <a href="<?php echo e(route('admin.pkk-program.index')); ?>" class="<?php echo e(request()->routeIs('admin.pkk-program.*') ? 'active' : ''); ?>"><i class="fa-solid fa-list-check me-2"></i> PKK - Program Pokok</a>
            <a href="<?php echo e(route('admin.pkk-kegiatan.index')); ?>" class="<?php echo e(request()->routeIs('admin.pkk-kegiatan.*') ? 'active' : ''); ?>"><i class="fa-solid fa-calendar-days me-2"></i> PKK - Kegiatan</a>
            <a href="<?php echo e(route('admin.pejabat.index')); ?>" class="<?php echo e(request()->routeIs('admin.pejabat.*') ? 'active' : ''); ?>"><i class="fa-solid fa-user-tie me-2"></i> Pejabat Struktural</a>
            <a href="<?php echo e(route('admin.kantor.index')); ?>" class="<?php echo e(request()->routeIs('admin.kantor.*') ? 'active' : ''); ?>"><i class="fa-solid fa-building me-2"></i> Alamat Pemerintahan</a>
            <a href="<?php echo e(route('admin.profil.index')); ?>" class="<?php echo e(request()->routeIs('admin.profil.*') ? 'active' : ''); ?>"><i class="fa-solid fa-id-card me-2"></i> Halaman Profil</a>
            <hr class="border-secondary">
            <a href="<?php echo e(route('home')); ?>" target="_blank"><i class="fa-solid fa-globe me-2"></i> Lihat Website</a>
            <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-link nav p-0 w-100 text-start text-decoration-none" style="color:#cbd5e1;">
                    <span class="d-block px-3 py-2"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <div class="content">
        <div class="topbar d-flex justify-content-between align-items-center px-3 py-3 rounded-3 mb-4">
            <h5 class="mb-0"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h5>
            <span class="text-secondary small"><?php echo e(auth()->user()->name); ?> (<?php echo e(ucfirst(auth()->user()->role)); ?>)</span>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/layouts/admin.blade.php ENDPATH**/ ?>