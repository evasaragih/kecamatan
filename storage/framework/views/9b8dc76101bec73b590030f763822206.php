
<div class="marquee-strip" role="presentation" aria-hidden="true">
    <div class="marquee-track-wrap">
        <div class="marquee-track">
            <?php for($i = 0; $i < 2; $i++): ?>
                <span class="marquee-item">KECAMATAN LUBUK KILANGAN</span>
                <span class="marquee-sep"><i class="fa-solid fa-sparkle"></i></span>
                <span class="marquee-item marquee-outline">PADANG, SUMATERA BARAT</span>
                <span class="marquee-sep"><i class="fa-solid fa-sparkle"></i></span>
                <span class="marquee-item">KECAMATAN LUBUK KILANGAN</span>
                <span class="marquee-sep"><i class="fa-solid fa-sparkle"></i></span>
                <span class="marquee-item marquee-outline">PADANG, SUMATERA BARAT</span>
                <span class="marquee-sep"><i class="fa-solid fa-sparkle"></i></span>
            <?php endfor; ?>
        </div>
    </div>
</div>

<style>
    .marquee-strip {
        position: relative;
        transform: skewY(-2.5deg);
        background: #fff;
        border-top: 3px solid #c9a55c;
        border-bottom: 3px solid #c9a55c;
        overflow: hidden;
        margin: clamp(3rem, 6vw, 5rem) 0;
        box-shadow: 0 14px 34px rgba(15, 12, 10, .08);
    }
    .marquee-track-wrap {
        transform: skewY(2.5deg);
        padding: 20px 0;
    }
    .marquee-track {
        display: flex;
        align-items: center;
        width: max-content;
        white-space: nowrap;
        animation: marqueeScroll 26s linear infinite;
    }
    .marquee-strip:hover .marquee-track {
        animation-play-state: paused;
    }
    @keyframes marqueeScroll {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }
    .marquee-item {
        display: inline-block;
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: clamp(1.3rem, 2.4vw, 2.1rem);
        letter-spacing: -.01em;
        color: #7f1d2e;
        padding: 0 1.4rem;
    }
    .marquee-item.marquee-outline {
        color: transparent;
        -webkit-text-stroke: 1.4px #c9a55c;
        text-stroke: 1.4px #c9a55c;
    }
    .marquee-sep {
        color: #c9a55c;
        font-size: 1.1rem;
        padding: 0 .3rem;
    }

    @media (max-width: 576px) {
        .marquee-strip { margin: 2.25rem 0; }
        .marquee-track-wrap { padding: 14px 0; }
    }

    @media (prefers-reduced-motion: reduce) {
        .marquee-track { animation: none; }
    }
</style>
<?php /**PATH C:\laragon\www\kecamatan\resources\views/partials/marquee.blade.php ENDPATH**/ ?>