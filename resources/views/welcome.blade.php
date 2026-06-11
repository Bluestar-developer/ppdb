<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PPDB | SMK ICB Cinta Teknika</title>

    <!-- Font & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: {{ $pengaturan['warna_tema'] ?? '#4361ee' }};
            --primary-soft: color-mix(in srgb, var(--primary) 10%, white);
            --primary-dark: color-mix(in srgb, var(--primary) 80%, black);
            --surface: rgba(255,255,255,0.65);
            --surface-border: rgba(255,255,255,0.5);
            --text: #0f172a;
            --text-secondary: #475569;
            --radius-2xl: 2rem;
            --radius-xl: 1.5rem;
            --radius-lg: 1rem;
            --shadow-glass: 0 25px 50px -12px rgba(0,0,0,0.15);
            --shadow-card: 0 10px 30px -8px rgba(0,0,0,0.08);
            --transition: 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        }

        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fe;
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Glassmorphism base */
        .glass {
            background: var(--surface);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--surface-border);
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            position: fixed;
            top: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            max-width: 1400px;
            z-index: 1000;
            border-radius: 100px;
            padding: 0.8rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,0.5);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255,255,255,0.6);
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.08);
            transition: var(--transition);
        }
        .navbar.scrolled {
            background: rgba(255,255,255,0.8);
            box-shadow: 0 25px 50px -15px rgba(0,0,0,0.12);
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .nav-brand img {
            height: 40px;
            width: auto;
            border-radius: 12px;
        }
        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }
        .nav-links a {
            text-decoration: none;
            font-weight: 500;
            color: var(--text-secondary);
            font-size: 0.95rem;
            position: relative;
            transition: color 0.2s;
        }
        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--primary);
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        .nav-links a:hover { color: var(--primary); }
        .nav-links a:hover::before { width: 70%; }
        .nav-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }
        .btn {
            padding: 0.7rem 1.8rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }
        .btn-outline {
            background: transparent;
            border: 1.5px solid rgba(0,0,0,0.1);
            color: var(--text);
        }
        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-soft);
        }
        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 25px -8px var(--primary);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 35px -12px var(--primary);
            background: var(--primary-dark);
        }
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text);
        }

        /* ===== HERO 2026 ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 0 4rem;
            position: relative;
            background: #0f172a;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.55;
        }
        .hero-container {
            max-width: 1300px;
            margin: 0 auto;
            width: 100%;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }
        .hero-content {
            max-width: 700px;
        }
        .hero-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1.5rem;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.85rem;
            color: #fff;
            margin-bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4.2rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.04em;
            margin-bottom: 1.5rem;
            color: #fff;
        }
        .hero-title span {
            color: #93c5fd;
            background: none;
            -webkit-background-clip: unset;
            -webkit-text-fill-color: unset;
        }
        .hero-text {
            font-size: 1.15rem;
            color: rgba(255,255,255,0.85);
            max-width: 550px;
            margin-bottom: 2.5rem;
            line-height: 1.7;
        }
        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        .hero-actions .btn {
            font-size: 0.95rem;
            padding: 0.8rem 2rem;
        }
        .hero-stats {
            display: flex;
            gap: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.15);
        }
        .hero-stat h3 {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
        }
        .hero-stat p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
        }

        /* ===== TICKER SLIM ===== */
        .ticker-bar {
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(15px);
            border-top: 1px solid rgba(0,0,0,0.04);
            border-bottom: 1px solid rgba(0,0,0,0.04);
            padding: 0.8rem 0;
            position: relative;
            overflow: hidden;
        }
        .ticker-track {
            display: flex;
            width: max-content;
            animation: ticker 30s linear infinite;
            gap: 3rem;
        }
        .ticker-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            color: #334155;
            white-space: nowrap;
        }
        .ticker-dot {
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
            box-shadow: 0 0 12px var(--primary);
        }
        @keyframes ticker {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ===== SECTIONS ===== */
        .section {
            padding: 7rem 2rem;
            position: relative;
        }
        .section-container {
            max-width: 1280px;
            margin: 0 auto;
        }
        .section-label {
            display: inline-block;
            background: var(--primary-soft);
            color: var(--primary);
            padding: 0.5rem 1.5rem;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .section-heading {
            font-size: clamp(2.4rem, 5vw, 3.5rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 1rem;
        }

        /* ===== CARDS MODERN ===== */
        .card-glass {
            background: rgba(255,255,255,0.5);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: var(--radius-2xl);
            padding: 2rem;
            transition: var(--transition);
            box-shadow: 0 10px 25px -8px rgba(0,0,0,0.05);
        }
        .card-glass:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 45px -15px rgba(0,0,0,0.12);
            background: rgba(255,255,255,0.7);
        }
        .jurusan-card {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            background: white;
            box-shadow: var(--shadow-card);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .jurusan-card:hover {
            transform: translateY(-10px) rotateX(4deg) rotateY(-2deg);
            box-shadow: 0 40px 60px -20px rgba(0,0,0,0.2);
        }
        .jurusan-img {
            height: 220px;
            object-fit: cover;
            width: 100%;
            transition: 0.5s;
        }
        .jurusan-card:hover .jurusan-img {
            transform: scale(1.05);
        }
        .jurusan-body {
            padding: 1.8rem;
            position: relative;
            background: white;
            z-index: 2;
        }
        .jurusan-badge {
            background: var(--primary);
            color: white;
            font-weight: 800;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            display: inline-block;
            font-size: 1rem;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            box-shadow: 0 8px 15px -5px var(--primary);
        }

        /* Steps */
        .step-item {
            text-align: center;
            padding: 2rem 1rem;
        }
        .step-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-soft);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.3rem;
            margin: 0 auto 1.2rem;
            transition: 0.3s;
        }
        .step-item:hover .step-circle {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        /* Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-auto-rows: 250px;
            grid-auto-flow: dense;
            gap: 1.5rem;
        }
        .gallery-card:nth-child(4n+1) {
            grid-column: span 2;
            grid-row: span 2;
        }
        @media (max-width: 768px) {
            .gallery-grid { grid-template-columns: 1fr 1fr; grid-auto-rows: 200px; }
            .gallery-card:nth-child(4n+1) { grid-column: span 1; grid-row: span 1; }
        }
        .gallery-card {
            border-radius: var(--radius-xl);
            overflow: hidden;
            position: relative;
            aspect-ratio: 4/3;
            cursor: pointer;
        }
        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }
        .gallery-card:hover img {
            transform: scale(1.1);
        }
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
            opacity: 0;
            transition: 0.4s;
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
        }
        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* Contact Map */
        .map-frame {
            border-radius: var(--radius-2xl);
            overflow: hidden;
            box-shadow: var(--shadow-glass);
            height: 350px;
        }

        /* Footer */
        .footer-modern {
            background: #0b1120;
            color: #94a3b8;
            padding: 3rem 2rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                width: 95%;
                padding: 0.8rem 1.5rem;
            }
            .nav-links {
                display: none;
            }
            .mobile-toggle {
                display: block;
            }
            .hero-container {
                grid-template-columns: 1fr;
            }
            .hero-visual {
                order: -1;
            }
            .section {
                padding: 4rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVIGATION GLASS ===== -->
    <nav class="navbar" id="navbar">
        <a href="#" class="nav-brand">
            @if(isset($pengaturan['logo']) && Storage::disk('public')->exists($pengaturan['logo']))
                <img src="{{ Storage::url($pengaturan['logo']) }}" alt="Logo">
            @else
                <div style="width:40px;height:40px;background:var(--primary);border-radius:12px;display:flex;align-items:center;justify-content:center;color:white;"><i class="fas fa-laptop-code"></i></div>
            @endif
            {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB' }}
        </a>
        <ul class="nav-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#profil">Profil</a></li>
            <li><a href="#jurusan">Jurusan</a></li>
            <li><a href="#alur">Alur</a></li>
            <li><a href="#info">Info</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
        <div class="nav-actions">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Login Siswa</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
            @endauth
            <button class="mobile-toggle" id="mobileToggle"><i class="fas fa-bars"></i></button>
        </div>
        <!-- Mobile dropdown -->
        <div id="mobileMenu" style="display:none; position:absolute; top:100%; left:0; right:0; background:white; backdrop-filter:blur(20px); border-radius:1.5rem; margin-top:0.5rem; padding:1.5rem; flex-direction:column; gap:1rem; box-shadow:0 20px 40px rgba(0,0,0,0.1);">
            <a href="#beranda" class="mobile-link">Beranda</a>
            <a href="#profil" class="mobile-link">Profil</a>
            <a href="#jurusan" class="mobile-link">Jurusan</a>
            <a href="#alur" class="mobile-link">Alur</a>
            <a href="#info" class="mobile-link">Info</a>
            <a href="#kontak" class="mobile-link">Kontak</a>
        </div>
    </nav>

    <!-- ===== HERO ASIMETRIS ===== -->
    <section id="beranda" class="hero">
        @if(isset($pengaturan['banner_home']) && Storage::disk('public')->exists($pengaturan['banner_home']))
            <img src="{{ Storage::url($pengaturan['banner_home']) }}" class="hero-bg" alt="Banner">
        @else
            <img src="https://picsum.photos/id/48/1920/1080" class="hero-bg" alt="Hero">
        @endif
        <div class="hero-container">
            <div class="hero-content" data-aos="fade-right">
                <div class="hero-chip">
                    <i class="fas fa-rocket"></i> PPDB 2025/2026
                </div>
                <h1 class="hero-title">
                    Wujudkan Masa Depan <br><span>di SMK ICB Cinta Teknika</span>
                </h1>
                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="btn btn-primary">Mulai Pendaftaran <i class="fas fa-arrow-right"></i></a>
                    <a href="#alur" class="btn btn-outline" style="border-color:rgba(255,255,255,0.4); color:white;">Lihat Panduan</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat"><h3>1.250+</h3><p>Siswa</p></div>
                    <div class="hero-stat"><h3>5</h3><p>Jurusan</p></div>
                    <div class="hero-stat"><h3>3.200+</h3><p>Alumni</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TICKER ===== -->
    <div style="margin-top:1.5rem;">
        <div style="background:#0b1120; color:white; font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; padding:0.6rem 2rem; text-align:center; display:flex; align-items:center; justify-content:center; gap:0.5rem;">
            <span style="display:inline-block; width:8px; height:8px; background:#ef4444; border-radius:50%; box-shadow:0 0 10px #ef4444;"></span> INFO TERBARU
        </div>
    <div class="ticker-bar">
        <div class="ticker-track">
            @php
                $infoPpdb = $pengaturan['info_ppdb'] ?? 'Pendaftaran PPDB 2025/2026 Resmi Dibuka — Daftar Sekarang!';
                $items = [
                    $infoPpdb,
                    'Pendaftaran online mudah, cepat, dan transparan',
                    ($pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika') . ' — Akreditasi A',
                    count($jurusan) . ' Jurusan Unggulan Tersedia',
                    'Hubungi: ' . ($pengaturan['kontak'] ?? '(022) 7234924'),
                ];
            @endphp
            @foreach(array_merge($items, $items) as $item)
                <span class="ticker-item"><span class="ticker-dot"></span> {{ $item }}</span>
            @endforeach
        </div>
    </div>

    <!-- ===== PROFIL ===== -->
    <section id="profil" class="section" style="background:white;">
        <div class="section-container">
            <div style="text-align:center; margin-bottom:4rem;" data-aos="fade-up">
                <span class="section-label">Tentang Kami</span>
                <h2 class="section-heading">SMK ICB Cinta Teknika</h2>
                <p style="color:#64748b; max-width:650px; margin:0 auto;">Pusat pendidikan vokasi dengan kurikulum industri 4.0, menghasilkan lulusan siap kerja dan technopreneur.</p>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:center;">
                <div data-aos="fade-right">
                    <p style="font-size:1.1rem; color:#334155; line-height:1.8;">
                        {{ $pengaturan['sejarah'] ?? 'Berdiri sejak 2010, SMK ICB Cinta Teknika berkomitmen menjadi pusat pendidikan vokasi terdepan di Indonesia. Dengan kurikulum berbasis industri 4.0, kami melahirkan lulusan yang siap kerja, technopreneur, dan berdaya saing global.' }}
                    </p>
                    <div style="margin-top:2rem; display:flex; flex-direction:column; gap:0.8rem;">
                        <div><i class="fas fa-check-circle" style="color:var(--primary);"></i> Akreditasi A (Unggul) – BAN SM</div>
                        <div><i class="fas fa-check-circle" style="color:var(--primary);"></i> Kerjasama 50+ DU/DI</div>
                        <div><i class="fas fa-check-circle" style="color:var(--primary);"></i> 85+ Guru Profesional</div>
                        <div><i class="fas fa-check-circle" style="color:var(--primary);"></i> Teaching Factory Modern</div>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <div style="border-radius:2rem; overflow:hidden; box-shadow:0 30px 50px rgba(0,0,0,0.1);">
                        @if(isset($pengaturan['banner_2']) && Storage::disk('public')->exists($pengaturan['banner_2']))
                            <img src="{{ Storage::url($pengaturan['banner_2']) }}" style="width:100%; display:block;">
                        @else
                            <img src="https://picsum.photos/id/20/600/400" style="width:100%;">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Visi Misi Tujuan -->
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px,1fr)); gap:2rem; margin-top:4rem;">
                <div class="card-glass" data-aos="fade-up" style="display:flex; flex-direction:column;">
                    <div style="font-size:2rem; color:var(--primary); margin-bottom:1rem;"><i class="fas fa-bullseye"></i></div>
                    <h3 style="font-weight:700; margin-bottom:0.5rem;">Visi</h3>
                    <p style="color:#475569;">{{ $pengaturan['visi'] ?? '"Menjadi sekolah vokasi berstandar internasional yang menghasilkan lulusan technopreneur."' }}</p>
                </div>
                <div class="card-glass" data-aos="fade-up" data-aos-delay="100" style="display:flex; flex-direction:column;">
                    <div style="font-size:2rem; color:#8b5cf6; margin-bottom:1rem;"><i class="fas fa-flag"></i></div>
                    <h3 style="font-weight:700; margin-bottom:0.5rem;">Tujuan</h3>
                    @php $tujuanLines = array_filter(explode("\n", $pengaturan['tujuan'] ?? '')); @endphp
                    <ul style="color:#475569; padding-left:1.5rem;">
                        @foreach($tujuanLines ?: ['Lulusan kompeten dan berdaya saing', 'Budaya inovasi dan technopreneurship', 'Kerjasama strategis industri'] as $line)
                            <li style="margin-bottom:0.4rem;">{{ trim($line) }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-glass" data-aos="fade-up" data-aos-delay="200" style="grid-column: 1 / -1; display:flex; flex-direction:column;">
                    <div style="font-size:2rem; color:#06b6d4; margin-bottom:1rem;"><i class="fas fa-list-check"></i></div>
                    <h3 style="font-weight:700; margin-bottom:0.5rem;">Misi</h3>
                    @php $misiLines = array_filter(explode("\n", $pengaturan['misi'] ?? '')); @endphp
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.5rem;">
                        <ul style="color:#475569; padding-left:1.5rem; margin:0;">
                            @foreach($misiLines ?: ['Teaching factory berbasis industri 4.0', 'Karakter disiplin, inovatif, kolaboratif', 'Kerjasama DUDI nasional & internasional'] as $line)
                                <li style="margin-bottom:0.5rem;">{{ trim($line) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== JURUSAN ===== -->
    <section id="jurusan" class="section" style="background:#f5f7fe;">
        <div class="section-container">
            <div style="text-align:center; margin-bottom:3rem;" data-aos="fade-up">
                <span class="section-label">Kompetensi Keahlian</span>
                <h2 class="section-heading">Pilih Jurusan Favorit</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px,1fr)); gap:2rem;">
                @forelse($jurusan as $j)
                    <div class="jurusan-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <div style="overflow:hidden;">
                            @if($j->gambar && Storage::disk('public')->exists($j->gambar))
                                <img src="{{ Storage::url($j->gambar) }}" class="jurusan-img" alt="{{ $j->nama }}">
                            @else
                                <div class="jurusan-img" style="background:linear-gradient(135deg, #e0e7ff, #c7d2fe); display:flex; align-items:center; justify-content:center;">
                                    <i class="fas fa-laptop-code" style="font-size:3rem; color:#818cf8;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="jurusan-body">
                            <div class="jurusan-badge">{{ $j->kode }}</div>
                            <p style="color:var(--text); font-weight:700; font-size:1.1rem;">{{ $j->nama }}</p>
                            <div class="desc-container">
                                <p style="color:#64748b; margin:0.8rem 0; font-size:0.95rem;">
                                    <span class="desc-short">{{ Str::limit($j->deskripsi, 80) }}</span>
                                    <span class="desc-full" style="display:none;">{{ $j->deskripsi }}</span>
                                    @if(strlen($j->deskripsi) > 80)
                                        <button type="button" onclick="let c = this.parentElement; c.querySelector('.desc-short').style.display='none'; c.querySelector('.desc-full').style.display='inline'; this.style.display='none';" style="background:none; border:none; color:var(--primary); font-weight:700; cursor:pointer; font-size:0.85rem; padding:0; margin-left:0.3rem;">Selengkapnya</button>
                                    @endif
                                </p>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:1.5rem; padding-top:1rem; border-top:1px solid #f1f5f9;">
                                <span style="font-size:0.85rem; color:#94a3b8; font-weight:600;"><i class="fas fa-users" style="color:var(--primary);"></i> Kuota: {{ $j->kuota ?? '40' }}</span>
                                <a href="{{ route('jurusan.show', $j->kode) }}" style="color:var(--primary); font-weight:700; text-decoration:none; display:flex; align-items:center; gap:0.3rem;">Detail <i class="fas fa-chevron-right" style="font-size:0.7rem;"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column:1/-1; text-align:center; color:#94a3b8;">Belum ada data jurusan</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== ALUR ===== -->
    <section id="alur" class="section" style="background:white;">
        <div class="section-container">
            <div style="text-align:center; margin-bottom:4rem;" data-aos="fade-up">
                <span class="section-label">Panduan</span>
                <h2 class="section-heading">Alur Pendaftaran</h2>
                <p style="color:#64748b; max-width:600px; margin:0 auto;">Ikuti langkah-langkah mudah berikut untuk menjadi bagian dari SMK ICB Cinta Teknika.</p>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px,1fr)); gap:2rem;">
                @php 
                    $steps = [
                        ['icon' => 'fa-user-plus', 'title' => 'Buat Akun', 'desc' => 'Daftar menggunakan email aktif dan password yang aman.'],
                        ['icon' => 'fa-file-signature', 'title' => 'Isi Formulir', 'desc' => 'Lengkapi biodata diri, data orang tua, dan pilih jurusan.'],
                        ['icon' => 'fa-cloud-arrow-up', 'title' => 'Upload Berkas', 'desc' => 'Unggah dokumen persyaratan (Ijazah, KK, Akta, dll).'],
                        ['icon' => 'fa-user-check', 'title' => 'Verifikasi', 'desc' => 'Tunggu admin memverifikasi kelengkapan berkas Anda.'],
                        ['icon' => 'fa-bullhorn', 'title' => 'Pengumuman', 'desc' => 'Cek status kelulusan melalui dashboard pendaftaran.'],
                        ['icon' => 'fa-id-card', 'title' => 'Daftar Ulang', 'desc' => 'Lakukan daftar ulang bagi yang dinyatakan lulus seleksi.']
                    ]; 
                @endphp
                @foreach($steps as $i => $step)
                    <div class="card-glass" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" style="position:relative; overflow:hidden;">
                        <div style="position:absolute; right:-20px; top:-20px; font-size:8rem; color:var(--primary); opacity:0.05; font-weight:900; line-height:1;">{{ $i+1 }}</div>
                        <div style="width:60px; height:60px; border-radius:1rem; background:var(--primary-soft); color:var(--primary); display:flex; align-items:center; justify-content:center; font-size:1.8rem; margin-bottom:1.5rem;">
                            <i class="fas {{ $step['icon'] }}"></i>
                        </div>
                        <h3 style="font-weight:700; font-size:1.2rem; margin-bottom:0.5rem; color:var(--text);">{{ $step['title'] }}</h3>
                        <p style="color:#64748b; font-size:0.95rem; line-height:1.5;">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== INFO & JADWAL ===== -->
    <section id="info" class="section" style="background:#f8fafc;">
        <div class="section-container">
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(350px,1fr)); gap:3rem;">
                <!-- Pengumuman -->
                <div data-aos="fade-right">
                    <div style="display:flex; align-items:center; gap:1rem; margin-bottom:2rem;">
                        <div style="width:50px; height:50px; border-radius:12px; background:#eff6ff; color:#3b82f6; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h2 style="font-size:2rem; font-weight:800; letter-spacing:-0.02em;">Pengumuman</h2>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        @forelse($pengumuman as $p)
                            <div class="card-glass" style="padding:1.5rem; display:flex; gap:1rem; align-items:flex-start;">
                                <div style="min-width:3px; background:var(--primary); align-self:stretch; border-radius:3px;"></div>
                                <div>
                                    <h4 style="font-weight:700; font-size:1.1rem; color:#0f172a; margin-bottom:0.3rem;">{{ $p->judul }}</h4>
                                    <p style="font-size:0.85rem; color:#64748b; display:flex; align-items:center; gap:0.5rem;">
                                        <i class="far fa-clock"></i> {{ $p->tanggal_mulai ? $p->tanggal_mulai->translatedFormat('d F Y') : '-' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="card-glass" style="text-align:center; padding:3rem 1rem;">
                                <i class="fas fa-inbox" style="font-size:3rem; color:#cbd5e1; margin-bottom:1rem;"></i>
                                <p style="color:#64748b; font-weight:500;">Belum ada pengumuman terbaru</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Jadwal -->
                <div data-aos="fade-left">
                    <div style="display:flex; align-items:center; gap:1rem; margin-bottom:2rem;">
                        <div style="width:50px; height:50px; border-radius:12px; background:#fef2f2; color:#ef4444; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h2 style="font-size:2rem; font-weight:800; letter-spacing:-0.02em;">Jadwal PPDB</h2>
                    </div>
                    <div class="card-glass" style="padding:0; overflow:hidden;">
                        @forelse($jadwal as $i => $j)
                            <div style="padding:1.5rem; display:flex; justify-content:space-between; align-items:center; border-bottom:{{ $loop->last ? 'none' : '1px solid #e2e8f0' }}; transition:var(--transition);" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                                <div style="font-weight:600; color:#1e293b;">{{ $j->nama_kegiatan }}</div>
                                <div style="background:var(--primary-soft); color:var(--primary); padding:0.4rem 1rem; border-radius:100px; font-size:0.85rem; font-weight:700;">
                                    {{ $j->tanggal_mulai->translatedFormat('d M Y') }}
                                </div>
                            </div>
                        @empty
                            <div style="text-align:center; padding:3rem 1rem;">
                                <i class="far fa-calendar-times" style="font-size:3rem; color:#cbd5e1; margin-bottom:1rem;"></i>
                                <p style="color:#64748b; font-weight:500;">Belum ada jadwal yang ditetapkan</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== GALERI ===== -->
    <section id="galeri" class="section" style="background:white;">
        <div class="section-container">
            <div style="text-align:center; margin-bottom:3rem;" data-aos="fade-up">
                <span class="section-label">Momen Terbaik</span>
                <h2 class="section-heading">Galeri Sekolah</h2>
            </div>
            <div class="gallery-grid">
                @forelse(collect($galeri)->take(8) as $g)
                    <div class="gallery-card" data-aos="fade-up">
                        <img src="{{ Storage::url($g->gambar) }}" alt="{{ $g->judul }}">
                        <div class="gallery-overlay"><span style="color:white; font-weight:600;">{{ $g->judul }}</span></div>
                    </div>
                @empty
                    <div style="grid-column:1/-1; text-align:center; color:#94a3b8;">Belum ada foto galeri</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== KONTAK ===== -->
    <section id="kontak" class="section" style="background:#f5f7fe;">
        <div class="section-container">
            <div style="text-align:center; margin-bottom:4rem;" data-aos="fade-up">
                <span class="section-label">Hubungi Kami</span>
                <h2 class="section-heading">Layanan Informasi PPDB</h2>
            </div>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(350px,1fr)); gap:3rem;">
                <div data-aos="fade-right" style="display:flex; flex-direction:column; gap:1.5rem;">
                    <div class="card-glass" style="display:flex; gap:1.5rem; align-items:center; padding:1.5rem;">
                        <div style="width:60px; height:60px; border-radius:50%; background:#eff6ff; color:#3b82f6; display:flex; align-items:center; justify-content:center; font-size:1.5rem; flex-shrink:0;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 style="font-weight:700; color:#0f172a; margin-bottom:0.2rem;">Alamat Lengkap</h4>
                            <p style="color:#64748b; font-size:0.95rem;">{{ $pengaturan['alamat'] ?? 'Jl. Pendidikan No.123, Kota Bandung' }}</p>
                        </div>
                    </div>
                    
                    <div class="card-glass" style="display:flex; gap:1.5rem; align-items:center; padding:1.5rem;">
                        <div style="width:60px; height:60px; border-radius:50%; background:#ecfdf5; color:#10b981; display:flex; align-items:center; justify-content:center; font-size:1.5rem; flex-shrink:0;">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <h4 style="font-weight:700; color:#0f172a; margin-bottom:0.2rem;">Telepon / WhatsApp</h4>
                            <p style="color:#64748b; font-size:0.95rem;">{{ $pengaturan['kontak'] ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </div>
                    
                    <div class="card-glass" style="display:flex; gap:1.5rem; align-items:center; padding:1.5rem;">
                        <div style="width:60px; height:60px; border-radius:50%; background:#f5f3ff; color:#8b5cf6; display:flex; align-items:center; justify-content:center; font-size:1.5rem; flex-shrink:0;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 style="font-weight:700; color:#0f172a; margin-bottom:0.2rem;">Email Official</h4>
                            <p style="color:#64748b; font-size:0.95rem;">{{ $pengaturan['email'] ?? 'ppdb@smkicb.sch.id' }}</p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left" style="display:flex; flex-direction:column; gap:1.5rem;">
                    <div class="map-frame" style="height:300px; flex-grow:1;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.208719365392!2d107.6274077145073!3d-6.914239944835365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7e82d986cbb%3A0x9ad00826cdd60f01!2sSMK%20ICB%20Cinta%20Teknika!5e0!3m2!1sen!2sid!4v1781097826867!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER FULL ===== -->
    <footer class="footer-modern" style="text-align:left;">
        <div class="section-container" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px,1fr)); gap:4rem; margin-bottom:3rem;">
            <!-- Brand & Info -->
            <div>
                <div style="display:flex; align-items:center; gap:1rem; margin-bottom:1.5rem;">
                    @if(isset($pengaturan['logo']) && Storage::disk('public')->exists($pengaturan['logo']))
                        <img src="{{ Storage::url($pengaturan['logo']) }}" alt="Logo" style="height:50px;">
                    @endif
                    <h3 style="color:white; font-size:1.5rem; font-weight:800;">{{ $pengaturan['nama_sekolah'] ?? 'SMK ICB' }}</h3>
                </div>
                <p style="color:#94a3b8; font-size:0.95rem; line-height:1.7; margin-bottom:1.5rem;">
                    Sistem Penerimaan Peserta Didik Baru (PPDB) Online. Membangun generasi cerdas, terampil, dan berkarakter industri 4.0.
                </p>
                <div style="display:flex; gap:1rem;">
                    @if(isset($pengaturan['instagram']) && $pengaturan['instagram'])
                        <a href="{{ $pengaturan['instagram'] }}" target="_blank" style="width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.05); color:white; display:flex; align-items:center; justify-content:center; transition:0.3s;" onmouseover="this.style.background='var(--primary)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(isset($pengaturan['facebook']) && $pengaturan['facebook'])
                        <a href="{{ $pengaturan['facebook'] }}" target="_blank" style="width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.05); color:white; display:flex; align-items:center; justify-content:center; transition:0.3s;" onmouseover="this.style.background='var(--primary)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(isset($pengaturan['youtube']) && $pengaturan['youtube'])
                        <a href="{{ $pengaturan['youtube'] }}" target="_blank" style="width:40px; height:40px; border-radius:50%; background:rgba(255,255,255,0.05); color:white; display:flex; align-items:center; justify-content:center; transition:0.3s;" onmouseover="this.style.background='#ef4444'" onmouseout="this.style.background='rgba(255,255,255,0.05)'"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>

            <!-- Tautan -->
            <div>
                <h4 style="color:white; font-size:1.1rem; font-weight:700; margin-bottom:1.5rem;">Tautan Cepat</h4>
                <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:0.8rem;">
                    <li><a href="#beranda" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Beranda</a></li>
                    <li><a href="#profil" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Profil Sekolah</a></li>
                    <li><a href="#jurusan" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Kompetensi Keahlian</a></li>
                    <li><a href="#alur" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#94a3b8'">Alur Pendaftaran</a></li>
                </ul>
            </div>

            <!-- Portal -->
            <div>
                <h4 style="color:white; font-size:1.1rem; font-weight:700; margin-bottom:1.5rem;">Portal Akses</h4>
                <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:0.8rem;">
                    <li><a href="{{ route('login') }}" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='#94a3b8'"><i class="fas fa-chevron-right" style="font-size:0.7rem; margin-right:0.5rem;"></i> Login Siswa</a></li>
                    <li><a href="{{ route('register') }}" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='#94a3b8'"><i class="fas fa-chevron-right" style="font-size:0.7rem; margin-right:0.5rem;"></i> Daftar Baru</a></li>
                    <li><a href="{{ url('/admin/login') }}" style="color:#94a3b8; text-decoration:none; transition:0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='#94a3b8'"><i class="fas fa-chevron-right" style="font-size:0.7rem; margin-right:0.5rem;"></i> Admin Panel</a></li>
                </ul>
            </div>

            <!-- Dukungan -->
            <div>
                <h4 style="color:white; font-size:1.1rem; font-weight:700; margin-bottom:1.5rem;">Dukungan Sistem</h4>
                <div style="background:rgba(255,255,255,0.03); padding:1.2rem; border-radius:1rem; border:1px solid rgba(255,255,255,0.05);">
                    <p style="font-size:0.85rem; color:#94a3b8; margin-bottom:1rem;">Platform pendaftaran online yang didesain untuk kemudahan dan kecepatan akses.</p>
                    <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                        <span style="background:rgba(255,255,255,0.1); padding:0.3rem 0.6rem; border-radius:4px; font-size:0.75rem; color:white;">Laravel</span>
                        <span style="background:rgba(255,255,255,0.1); padding:0.3rem 0.6rem; border-radius:4px; font-size:0.75rem; color:white;">MySQL</span>
                        <span style="background:rgba(255,255,255,0.1); padding:0.3rem 0.6rem; border-radius:4px; font-size:0.75rem; color:white;">Tailwind</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-container" style="border-top:1px solid rgba(255,255,255,0.1); padding-top:2rem; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:1rem;">
            <p style="margin:0; font-size:0.9rem;">&copy; {{ date('Y') }} PPDB {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}. All Rights Reserved.</p>
            <p style="margin:0; font-size:0.9rem;">Didesain oleh <span style="color:var(--primary); font-weight:600;">Blue Dev</span></p>
        </div>
    </footer>

    <!-- Floating Admin Button -->
    <a href="{{ url('/admin/login') }}" style="position:fixed; bottom:2rem; right:2rem; z-index:999; background:white; color:var(--text); padding:1rem 1.5rem; border-radius:100px; box-shadow:0 15px 30px rgba(0,0,0,0.1); font-weight:700; text-decoration:none; display:flex; align-items:center; gap:0.6rem; transition:0.3s; border:1px solid rgba(0,0,0,0.05);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.1)';">
        <i class="fas fa-user-shield" style="color:var(--primary); font-size:1.2rem;"></i> Admin Panel
    </a>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800, easing: 'ease-out' });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 30);
        });

        // Mobile toggle
        const toggle = document.getElementById('mobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        toggle.addEventListener('click', () => {
            mobileMenu.style.display = mobileMenu.style.display === 'flex' ? 'none' : 'flex';
        });
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => mobileMenu.style.display = 'none');
        });
    </script>
</body>
</html>