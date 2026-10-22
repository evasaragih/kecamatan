<?php $__env->startSection('title', 'Alamat Pemerintahan - Kecamatan Lubuk Kilangan'); ?>

<?php $__env->startSection('content'); ?>
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
    <div class="text-center mb-12">
        <span class="kicker justify-center">Layanan Publik</span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-[#0b0c10] tracking-tight mt-3">Alamat Pemerintahan</h1>
        <p class="text-slate-500 mt-3 max-w-xl mx-auto">Daftar alamat kantor Kecamatan dan Kelurahan di lingkungan Lubuk Kilangan</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $kantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">

                <div class="bg-gradient-to-r <?php echo e($kantor->tipe === 'camat' ? 'from-brand-500 to-brand-700' : 'from-[#1c1f26] to-brand-600'); ?> px-6 py-5">
                    <h2 class="text-white text-lg sm:text-xl font-bold"><?php echo e($kantor->nama); ?></h2>
                </div>

                <div class="p-6">
                    <div class="relative rounded-xl overflow-hidden mb-6 border border-slate-100">
                        <a href="<?php echo e($kantor->maps_url); ?>" target="_blank" rel="noopener"
                           class="absolute top-3 left-3 z-10 bg-white/95 backdrop-blur px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 shadow flex items-center gap-1.5 hover:bg-white">
                            <i class="fa-solid fa-map-location-dot text-brand-500"></i> Maps
                            <i class="fa-solid fa-up-right-from-square text-[10px]"></i>
                        </a>
                        <iframe
                            src="<?php echo e($kantor->maps_embed_url); ?>"
                            class="w-full h-56 border-0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="space-y-5">
                        <div class="flex gap-3">
                            <div class="w-10 h-10 rounded-full bg-cyan-50 text-cyan-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="text-[11px] font-semibold tracking-wide text-slate-400 uppercase">Alamat</p>
                                <p class="text-slate-700 text-sm"><?php echo e($kantor->alamat); ?></p>
                            </div>
                        </div>

                        <?php if($kantor->telepon && $kantor->telepon !== '-'): ?>
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold tracking-wide text-slate-400 uppercase">Telepon</p>
                                    <p class="text-slate-700 text-sm"><?php echo e($kantor->telepon); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($kantor->email): ?>
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="text-[11px] font-semibold tracking-wide text-slate-400 uppercase">Email</p>
                                    <p class="text-slate-700 text-sm"><?php echo e($kantor->email); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($kantor->instagram): ?>
                            <div class="flex gap-3 items-center">
                                <div class="w-10 h-10 rounded-full bg-pink-50 text-pink-600 flex items-center justify-center shrink-0">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div class="flex-1 flex items-center justify-between">
                                    <div>
                                        <p class="text-[11px] font-semibold tracking-wide text-slate-400 uppercase">Instagram</p>
                                        <p class="text-slate-700 text-sm font-semibold"><?php echo e($kantor->instagram); ?></p>
                                    </div>
                                    <a href="https://instagram.com/<?php echo e(ltrim($kantor->instagram, '@')); ?>" target="_blank" rel="noopener" class="text-slate-400 hover:text-pink-600">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-slate-500 col-span-2 py-12">Belum ada data alamat pemerintahan.</p>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tailwind', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kecamatan\resources\views/alamat-pemerintahan/index.blade.php ENDPATH**/ ?>