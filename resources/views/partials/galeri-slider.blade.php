{{-- Slider Galeri - drop-in partial, style & script sudah menyatu (scoped di file ini).
     Menampilkan SEMUA foto pada koleksi $slides yang dikirim ke partial ini.
     Gambar utama besar di atas + tombol panah, strip thumbnail bisa digulir ke samping di bawah. --}}
@php($slides = $slides ?? collect())

<div class="gslider" data-gslider>
    @if($slides->isEmpty())
        <p class="text-center text-secondary">Belum ada dokumentasi.</p>
    @else
        <div class="gslider-main">
            <button type="button" class="gslider-arrow gslider-prev" data-gslider-prev aria-label="Sebelumnya">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div class="gslider-viewport">
                @foreach($slides as $i => $foto)
                    <div class="gslider-slide {{ $i === 0 ? 'active' : '' }}" data-gslider-slide data-index="{{ $i }}">
                        <img src="{{ $foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $foto->judul }}" loading="lazy">
                        <div class="gslider-caption">
                            <h5>{{ $foto->judul }}</h5>
                            @if($foto->tanggal_kegiatan)
                                <span>{{ $foto->tanggal_kegiatan->translatedFormat('d F Y') }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="gslider-arrow gslider-next" data-gslider-next aria-label="Berikutnya">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div class="gslider-thumbs" data-gslider-thumbs>
            @foreach($slides as $i => $foto)
                <button type="button" class="gslider-thumb {{ $i === 0 ? 'active' : '' }}" data-gslider-thumb data-index="{{ $i }}" aria-label="{{ $foto->judul }}">
                    <img src="{{ $foto->foto && $foto->foto !== 'default.jpg' ? asset('storage/'.$foto->foto) : 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=200&q=80' }}" alt="{{ $foto->judul }}" loading="lazy">
                </button>
            @endforeach
        </div>
    @endif
</div>

<style>
    .gslider-main {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        background: linear-gradient(160deg, #7f1d2e, #4a0e18);
        box-shadow: 0 20px 45px rgba(15,23,42,.18);
    }
    .gslider-viewport {
        position: relative;
        height: 440px;
    }
    .gslider-slide {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transform: scale(1.02);
        transition: opacity .55s ease, transform .55s ease, visibility .55s;
    }
    .gslider-slide.active {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }
    .gslider-slide img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .gslider-caption {
        position: absolute;
        left: 0; right: 0; bottom: 0;
        padding: 1.75rem 5.5rem 1.25rem 1.75rem;
        background: linear-gradient(0deg, rgba(0,0,0,.65), transparent);
        color: #fff;
        text-align: left;
    }
    .gslider-caption h5 {
        font-weight: 700;
        margin-bottom: .15rem;
    }
    .gslider-caption span {
        font-size: .82rem;
        color: #f1d9dd;
    }
    .gslider-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: none;
        background: rgba(255,255,255,.15);
        color: #fff;
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .25s ease, transform .25s ease;
    }
    .gslider-arrow:hover { background: #c9a55c; color: #4a0e18; transform: translateY(-50%) scale(1.08); }
    .gslider-prev { left: 16px; }
    .gslider-next { right: 16px; }

    .gslider-thumbs {
        display: flex;
        gap: .75rem;
        overflow-x: auto;
        scroll-behavior: smooth;
        margin-top: 1rem;
        padding-bottom: .6rem;
        cursor: grab;
        scrollbar-width: thin;
        scrollbar-color: #c9a55c #f1d9dd;
    }
    .gslider-thumbs.is-dragging { cursor: grabbing; scroll-behavior: auto; user-select: none; }
    .gslider-thumbs::-webkit-scrollbar { height: 7px; }
    .gslider-thumbs::-webkit-scrollbar-track { background: #f1d9dd; border-radius: 10px; }
    .gslider-thumbs::-webkit-scrollbar-thumb { background: #c9a55c; border-radius: 10px; }

    .gslider-thumb {
        flex: 0 0 auto;
        width: 96px;
        height: 68px;
        border-radius: .75rem;
        overflow: hidden;
        padding: 0;
        border: 3px solid transparent;
        opacity: .6;
        transition: opacity .25s ease, border-color .25s ease, transform .25s ease;
    }
    .gslider-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .gslider-thumb:hover { opacity: .9; transform: translateY(-2px); }
    .gslider-thumb.active { opacity: 1; border-color: #c9a55c; }

    @media (max-width: 576px) {
        .gslider-viewport { height: 260px; }
        .gslider-caption { padding: 1.1rem 3.5rem 1rem 1.1rem; }
        .gslider-thumb { width: 74px; height: 54px; }
    }
</style>

<script>
(function () {
    document.querySelectorAll('[data-gslider]').forEach(function (root) {
        var slides = root.querySelectorAll('[data-gslider-slide]');
        var thumbs = root.querySelectorAll('[data-gslider-thumb]');
        var thumbsWrap = root.querySelector('[data-gslider-thumbs]');
        if (!slides.length) return;

        var current = 0;
        var autoplayMs = 5000;
        var timer = null;

        function goTo(index) {
            current = (index + slides.length) % slides.length;
            slides.forEach(function (s, i) { s.classList.toggle('active', i === current); });
            thumbs.forEach(function (t, i) { t.classList.toggle('active', i === current); });

            var activeThumb = thumbs[current];
            if (activeThumb && thumbsWrap) {
                var target = activeThumb.offsetLeft - (thumbsWrap.clientWidth / 2) + (activeThumb.clientWidth / 2);
                thumbsWrap.scrollTo({ left: target, behavior: 'smooth' });
            }
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function startAutoplay() { stopAutoplay(); timer = setInterval(next, autoplayMs); }
        function stopAutoplay() { if (timer) clearInterval(timer); }

        var nextBtn = root.querySelector('[data-gslider-next]');
        var prevBtn = root.querySelector('[data-gslider-prev]');
        if (nextBtn) nextBtn.addEventListener('click', function () { next(); startAutoplay(); });
        if (prevBtn) prevBtn.addEventListener('click', function () { prev(); startAutoplay(); });

        thumbs.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                goTo(parseInt(thumb.getAttribute('data-index'), 10));
                startAutoplay();
            });
        });

        root.addEventListener('mouseenter', stopAutoplay);
        root.addEventListener('mouseleave', startAutoplay);

        // Geser strip thumbnail dengan mouse (drag-to-scroll) di desktop
        if (thumbsWrap) {
            var isDown = false, startX, scrollLeft;
            thumbsWrap.addEventListener('mousedown', function (e) {
                isDown = true;
                thumbsWrap.classList.add('is-dragging');
                startX = e.pageX - thumbsWrap.offsetLeft;
                scrollLeft = thumbsWrap.scrollLeft;
            });
            ['mouseleave', 'mouseup'].forEach(function (evt) {
                thumbsWrap.addEventListener(evt, function () {
                    isDown = false;
                    thumbsWrap.classList.remove('is-dragging');
                });
            });
            thumbsWrap.addEventListener('mousemove', function (e) {
                if (!isDown) return;
                e.preventDefault();
                var x = e.pageX - thumbsWrap.offsetLeft;
                thumbsWrap.scrollLeft = scrollLeft - (x - startX) * 1.4;
            });
        }

        goTo(0);
        startAutoplay();
    });
})();
</script>
