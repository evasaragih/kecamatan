<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kecamatan Lubuk Kilangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
            --blue-1:#1e3a8a;
            --blue-2:#2563eb;
            --blue-3:#3b82f6;
            --text-dark:#1e293b;
            --text-muted:#64748b;
            --border:#e2e8f0;
        }
        *{box-sizing:border-box;}
        body{
            font-family:'Poppins', sans-serif;
            margin:0;
            min-height:100vh;
            background:#f1f5f9;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:24px;
        }
        .login-card{
            width:100%;
            max-width:980px;
            min-height:600px;
            display:flex;
            background:#fff;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(15,23,42,0.15);
        }

        /* LEFT PANEL */
        .panel-left{
            flex:1 1 48%;
            position:relative;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            padding:48px 36px;
            color:#fff;
            overflow:hidden;
            background-image: url('{{ asset('images/hero-kantor.jpg') }}'),
                               linear-gradient(160deg, var(--blue-1) 0%, var(--blue-2) 55%, var(--blue-3) 100%);
            background-size:cover;
            background-position:center;
        }
        .panel-left::before{
            /* darken/blend overlay so text stays readable over any photo */
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(180deg, rgba(30,58,138,0.75) 0%, rgba(30,58,138,0.35) 45%, rgba(15,23,42,0.75) 100%);
        }
        .corner-pattern{
            position:absolute;
            top:0; left:0;
            width:220px; height:220px;
            opacity:0.15;
            z-index:1;
        }
        .skyline{
            position:absolute;
            bottom:0; left:0; right:0;
            width:100%;
            opacity:0.25;
            z-index:1;
        }
        .panel-left-content{
            position:relative;
            z-index:2;
        }
        .logo-box{
            width:88px;
            height:88px;
            background:#fff;
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 20px;
            box-shadow:0 8px 24px rgba(0,0,0,0.2);
            padding:10px;
        }
        .logo-box img{ width:100%; height:100%; object-fit:contain; }
        .panel-left-content h1{
            font-weight:800;
            font-size:1.55rem;
            line-height:1.3;
            margin-bottom:14px;
            text-shadow:0 2px 8px rgba(0,0,0,0.25);
        }
        .panel-left-content p{
            font-size:.9rem;
            opacity:0.9;
            max-width:300px;
            margin:0 auto;
            line-height:1.5;
        }

        /* RIGHT PANEL */
        .panel-right{
            flex:1 1 52%;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:48px 56px;
            background:#fff;
        }
        .form-wrap{ width:100%; max-width:380px; }
        .form-wrap h2{
            color:var(--blue-1);
            font-weight:800;
            font-size:1.6rem;
            margin-bottom:6px;
        }
        .form-wrap .subtitle{
            color:var(--text-muted);
            font-size:.88rem;
            line-height:1.5;
            margin-bottom:26px;
        }
        .field-label{
            display:block;
            font-size:.82rem;
            font-weight:600;
            color:var(--text-dark);
            margin-bottom:6px;
        }
        .input-icon{ position:relative; margin-bottom:18px; }
        .input-icon i.icon-left{
            position:absolute;
            left:14px; top:50%;
            transform:translateY(-50%);
            color:#94a3b8;
            font-size:.85rem;
        }
        .input-icon input{
            width:100%;
            background:#f8fafc;
            border:1px solid var(--border);
            color:var(--text-dark);
            border-radius:10px;
            padding:12px 16px 12px 40px;
            font-size:.9rem;
            outline:none;
            transition:border-color .2s, background .2s;
        }
        .input-icon input::placeholder{ color:#94a3b8; }
        .input-icon input:focus{ border-color:var(--blue-2); background:#fff; }
        .toggle-pass{
            position:absolute;
            right:14px; top:50%;
            transform:translateY(-50%);
            color:#94a3b8;
            cursor:pointer;
            background:none;
            border:none;
            font-size:.85rem;
        }

        .row-options{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:22px;
            font-size:.82rem;
        }
        .row-options label{ color:var(--text-muted); }
        .row-options a{ color:var(--blue-2); text-decoration:none; font-weight:500; }
        .row-options a:hover{ text-decoration:underline; }
        .form-check-input:checked{
            background-color:var(--blue-2);
            border-color:var(--blue-2);
        }

        .btn-login{
            width:100%;
            background:linear-gradient(135deg, var(--blue-1), var(--blue-3));
            border:none;
            color:#fff;
            font-weight:600;
            padding:13px;
            border-radius:10px;
            letter-spacing:.2px;
            transition:opacity .2s;
        }
        .btn-login:hover{ opacity:.92; color:#fff; }

        .divider{
            display:flex;
            align-items:center;
            gap:12px;
            margin:20px 0;
            color:#94a3b8;
            font-size:.78rem;
        }
        .divider::before, .divider::after{
            content:"";
            flex:1;
            height:1px;
            background:var(--border);
        }

        .btn-sso{
            width:100%;
            background:#fff;
            border:1px solid var(--border);
            color:var(--blue-2);
            font-weight:600;
            padding:11px;
            border-radius:10px;
            font-size:.86rem;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            text-decoration:none;
            transition:background .2s;
        }
        .btn-sso:hover{ background:#eff6ff; color:var(--blue-2); }

        .info-box{
            margin-top:22px;
            background:#f1f5f9;
            border-radius:12px;
            padding:14px 16px;
            display:flex;
            gap:10px;
            align-items:flex-start;
        }
        .info-box i{ color:var(--blue-2); margin-top:2px; }
        .info-box .txt{ font-size:.78rem; color:var(--text-muted); line-height:1.5; }
        .info-box .txt strong{ color:var(--text-dark); }

        .alert-danger{
            background:#fef2f2;
            border:1px solid #fecaca;
            color:#dc2626;
            border-radius:10px;
            font-size:.83rem;
            padding:10px 14px;
        }

        @media (max-width: 860px){
            .panel-left{ display:none; }
            .login-card{ border-radius:16px; }
            .panel-right{ padding:36px 28px; }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes cardIn{
            from{ opacity:0; transform:translateY(28px) scale(.98); }
            to{ opacity:1; transform:translateY(0) scale(1); }
        }
        @keyframes slideInLeft{
            from{ opacity:0; transform:translateX(-40px); }
            to{ opacity:1; transform:translateX(0); }
        }
        @keyframes slideUpFade{
            from{ opacity:0; transform:translateY(22px); }
            to{ opacity:1; transform:translateY(0); }
        }
        @keyframes popIn{
            0%{ opacity:0; transform:scale(.6) rotate(-8deg); }
            70%{ opacity:1; transform:scale(1.06) rotate(2deg); }
            100%{ opacity:1; transform:scale(1) rotate(0); }
        }
        @keyframes floatY{
            0%,100%{ transform:translateY(0); }
            50%{ transform:translateY(-14px); }
        }
        @keyframes floatX{
            0%,100%{ transform:translateX(0); }
            50%{ transform:translateX(10px); }
        }
        @keyframes drawSkyline{
            from{ opacity:0; transform:translateY(24px); }
            to{ opacity:.25; transform:translateY(0); }
        }
        @keyframes spinSlow{
            from{ transform:rotate(0deg); }
            to{ transform:rotate(360deg); }
        }
        @keyframes shimmer{
            0%{ background-position:-200% 0; }
            100%{ background-position:200% 0; }
        }
        @keyframes pulseRing{
            0%{ box-shadow:0 0 0 0 rgba(59,130,246,.35); }
            100%{ box-shadow:0 0 0 14px rgba(59,130,246,0); }
        }

        .login-card{
            opacity:0;
            animation:cardIn .7s cubic-bezier(.2,.8,.2,1) forwards;
        }

        .panel-left{ }
        .panel-left-content{
            opacity:0;
            animation:slideInLeft .8s .25s cubic-bezier(.2,.8,.2,1) forwards;
        }
        .logo-box{
            opacity:0;
            animation:popIn .7s .5s cubic-bezier(.34,1.56,.64,1) forwards,
                      floatY 4.5s 1.3s ease-in-out infinite;
        }
        .panel-left-content h1{
            opacity:0;
            animation:slideUpFade .6s .65s ease-out forwards;
        }
        .panel-left-content p{
            opacity:0;
            animation:slideUpFade .6s .8s ease-out forwards;
        }
        .corner-pattern{
            animation:spinSlow 40s linear infinite;
            transform-origin:20px 20px;
        }
        .skyline{
            opacity:0;
            animation:drawSkyline 1s .3s ease-out forwards;
        }

        .form-wrap > *{
            opacity:0;
            animation:slideUpFade .55s ease-out forwards;
        }
        .form-wrap h2{ animation-delay:.35s; }
        .form-wrap .subtitle{ animation-delay:.45s; }
        .form-wrap .alert-danger{ animation-delay:.5s; }
        .form-wrap form{ animation-delay:.55s; }
        .form-wrap .info-box{ animation-delay:.95s; }

        .input-icon{
            opacity:0;
            animation:slideUpFade .5s ease-out forwards;
        }
        .input-icon:nth-of-type(1){ animation-delay:.6s; }
        .input-icon:nth-of-type(2){ animation-delay:.7s; }
        .row-options{
            opacity:0;
            animation:slideUpFade .5s .8s ease-out forwards;
        }
        .btn-login{
            opacity:0;
            animation:slideUpFade .5s .9s ease-out forwards;
            position:relative;
            overflow:hidden;
            transform:translateY(0);
            transition:transform .25s ease, box-shadow .25s ease, opacity .25s ease;
        }
        .btn-login:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 24px rgba(37,99,235,.35);
        }
        .btn-login:active{ transform:translateY(-1px) scale(.99); }
        .btn-login::after{
            content:"";
            position:absolute;
            top:0; left:-75%;
            width:50%; height:100%;
            background:linear-gradient(120deg, transparent, rgba(255,255,255,.35), transparent);
            transform:skewX(-20deg);
            transition:left .6s ease;
        }
        .btn-login:hover::after{ left:130%; }

        .input-icon input{
            transition:border-color .2s, background .2s, transform .2s, box-shadow .2s;
        }
        .input-icon input:focus{
            transform:translateY(-2px);
            box-shadow:0 6px 16px rgba(37,99,235,.12);
        }

        .form-check-input{ transition:transform .15s ease; }
        .form-check-input:checked{ animation:none; transform:scale(1.08); }

        /* subtle continuous float on decorative blur circles behind the left panel */
        .panel-left::after{
            content:"";
            position:absolute;
            width:260px; height:260px;
            border-radius:50%;
            background:rgba(255,255,255,0.06);
            top:-60px; right:-80px;
            z-index:0;
            animation:floatY 7s ease-in-out infinite, floatX 9s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce){
            .login-card, .panel-left-content, .logo-box, .panel-left-content h1,
            .panel-left-content p, .skyline, .form-wrap > *, .input-icon, .row-options,
            .btn-login, .corner-pattern, .panel-left::after{
                animation:none !important;
                opacity:1 !important;
                transform:none !important;
            }
        }
    </style>
</head>
<body>
<div class="login-card">

    <!-- LEFT: branding / hero panel -->
    <div class="panel-left">
        <svg class="skyline" viewBox="0 0 500 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,100 L0,70 L20,70 L20,50 L40,50 L40,70 L60,70 L60,40 L70,40 L70,20 L80,20 L80,40 L90,40 L90,70 L120,70 L120,55 L140,55 L140,70 L170,70 L170,30 L180,30 L180,15 L190,15 L190,30 L200,30 L200,70 L230,70 L230,45 L250,45 L250,70 L280,70 L280,25 L295,25 L295,10 L305,10 L305,25 L320,25 L320,70 L350,70 L350,50 L365,50 L365,70 L400,70 L400,35 L415,35 L415,20 L425,20 L425,35 L440,35 L440,70 L470,70 L470,55 L500,55 L500,100 Z" fill="#ffffff"/>
        </svg>
        <svg class="corner-pattern" viewBox="0 0 220 220" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="100" fill="none" stroke="#ffffff" stroke-width="1"/>
            <circle cx="20" cy="20" r="70" fill="none" stroke="#ffffff" stroke-width="1"/>
            <circle cx="20" cy="20" r="40" fill="none" stroke="#ffffff" stroke-width="1"/>
        </svg>

        <div class="panel-left-content">
            <div class="logo-box">
                <img src="{{ asset('images/logo-padang.png') }}" alt="Logo">
            </div>
            <h1>PEMERINTAH<br>KECAMATAN LUBUK KILANGAN</h1>
            <p>Melayani Masyarakat dengan Integritas dan Profesionalitas</p>
        </div>
    </div>

    <!-- RIGHT: form panel -->
    <div class="panel-right">
        <div class="form-wrap">
            <h2>Selamat Datang</h2>
            <p class="subtitle">Silakan masuk untuk melanjutkan ke sistem<br>Admin Kecamatan Lubuk Kilangan</p>

            @if($errors->any())
                <div class="alert alert-danger mb-3">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf

                <label class="field-label" for="email">Email</label>
                <div class="input-icon">
                    <i class="fa-solid fa-user icon-left"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required autofocus>
                </div>

                <label class="field-label" for="password">Password</label>
                <div class="input-icon">
                    <i class="fa-solid fa-lock icon-left"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                    <button type="button" class="toggle-pass" onclick="togglePassword()">
                        <i class="fa-solid fa-eye" id="toggleIcon"></i>
                    </button>
                </div>

                <div class="row-options">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">Masuk <i class="fa-solid fa-arrow-right ms-1"></i></button>
            </form>

            <div class="info-box">
                <i class="fa-solid fa-shield-halved"></i>
                <div class="txt">
                    Sistem ini hanya untuk pengguna<br>
                    <strong>Kecamatan Lubuk Kilangan</strong><br>
                    &copy; {{ date('Y') }} Kecamatan Lubuk Kilangan
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
</body>
</html>
