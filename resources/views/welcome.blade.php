<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PPDB | SMK ICB Cinta Teknika</title>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --color-primary:
                {{ $pengaturan['warna_tema'] ?? '#2563eb' }}
            ;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f8fafc;
        }

        .card-modern {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: var(--color-primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: .75rem;
            font-weight: 600;
            transition: transform .2s, background .2s;
        }

        .btn-primary:hover {
            transform: scale(1.04);
            background: color-mix(in srgb, var(--color-primary) 85%, black);
        }

        background: linear-gradient(105deg, var(--color-primary) 0%, color-mix(in srgb, var(--color-primary) 80%, black) 100%);
        box-shadow: 0 8px 20px -6px color-mix(in srgb, var(--color-primary) 50%, transparent);
        }

        .btn-gradient:hover {
            transform: scale(1.02);
        }

        .text-gradient-primary {
            background: linear-gradient(135deg, var(--color-primary), #06b6d4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .tab-light {
            border-bottom: 3px solid transparent;
            transition: 0.2s;
        }

        .tab-light.active {
            border-bottom-color: var(--color-primary);
            color: var(--color-primary);
        }

        .hero-bg {
            background: linear-gradient(135deg, #eff6ff 0%, #ffffff 50%, #f0f9ff 100%);
        }

        /* Premium Announcement Ticker */
        .ticker-section {
            background: linear-gradient(90deg, color-mix(in srgb, var(--color-primary) 6%, #f8fafc) 0%, color-mix(in srgb, var(--color-primary) 12%, #f8fafc) 50%, color-mix(in srgb, var(--color-primary) 6%, #f8fafc) 100%);
            border-top: 1px solid color-mix(in srgb, var(--color-primary) 15%, #e2e8f0);
            border-bottom: 1px solid color-mix(in srgb, var(--color-primary) 15%, #e2e8f0);
            position: relative;
            overflow: hidden;
        }

        .ticker-section::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 120px;
            background: linear-gradient(90deg, color-mix(in srgb, var(--color-primary) 6%, #f8fafc), transparent);
            z-index: 2;
            pointer-events: none;
        }

        .ticker-section::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 120px;
            background: linear-gradient(-90deg, color-mix(in srgb, var(--color-primary) 6%, #f8fafc), transparent);
            z-index: 2;
            pointer-events: none;
        }

        .ticker-label {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            padding: 0 1.25rem 0 1rem;
            background: var(--color-primary);
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: white;
            z-index: 10;
            clip-path: polygon(0 0, 90% 0, 100% 50%, 90% 100%, 0 100%);
        }

        .ticker-track {
            display: flex;
            width: max-content;
            animation: ticker 30s linear infinite;
            will-change: transform;
            white-space: nowrap;
        }

        .ticker-item {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0 2rem;
            color: color-mix(in srgb, var(--color-primary) 70%, #1e293b);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .ticker-item .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--color-primary);
            flex-shrink: 0;
            box-shadow: 0 0 8px var(--color-primary);
        }

        @keyframes ticker {
            0% {
                transform: translate3d(0, 0, 0);
            }

            100% {
                transform: translate3d(-50%, 0, 0);
            }
        }
    </style>
    <style>
        /* Tilt, float, gradient shine */
        .card-tilt {
            perspective: 1000px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: float 6s ease-in-out infinite;
        }
        .card-tilt:hover {
            transform: rotateY(5deg) rotateX(5deg);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }
        .card-tilt::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .card-tilt:hover::before {
            opacity: 1;
        }
        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        /* Scroll reveal */
        .reveal { opacity: 0; transform: translateY(20px); transition: all 0.6s ease; }
        .reveal-visible { opacity: 1; transform: none; }
    </style>
</head>

<body class="antialiased">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    @if(isset($pengaturan['logo']) && Storage::disk('public')->exists($pengaturan['logo']))
                        <img src="{{ Storage::url($pengaturan['logo']) }}" alt="Logo SMK ICB"
                            class="w-10 h-10 object-contain drop-shadow-sm">
                    @else
                        <div
                            class="w-9 h-9 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-laptop-code text-white text-sm"></i>
                        </div>
                    @endif
                    <span
                        class="font-extrabold text-gray-800 text-lg">{{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}</span>
                </div>
                <div class="hidden md:flex space-x-8 text-gray-700 font-medium">
                    <a href="#home" class="text-gray-600 hover:text-blue-600 transition">Beranda</a>
                    <a href="#profil" class="hover:text-blue-600 transition">Profil</a>
                    <a href="#jurusan" class="hover:text-blue-600 transition">Jurusan</a>
                    <a href="#alur" class="hover:text-blue-600 transition">Alur</a>
                    <a href="#info" class="hover:text-blue-600 transition">Info & Jadwal</a>
                    <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition shadow-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium">Login Siswa</a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition shadow-md">Daftar</a>
                        <a href="{{ url('/admin/login') }}"
                            class="px-4 py-2 bg-gray-800 text-white rounded-xl text-sm font-semibold hover:bg-gray-900 transition shadow-md"><i
                                class="fas fa-user-shield mr-1"></i> Admin</a>
                    @endauth
                </div>
                <div class="md:hidden">
                    <button id="mobileMenuBtn" class="text-gray-700 text-2xl"><i class="fas fa-bars"></i></button>
                </div>
            </div>
        </div>
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t py-3 px-4 space-y-2 shadow-lg">
            <a href="#home" class="block py-2 text-gray-700 hover:text-blue-600">Beranda</a>
            <a href="#profil" class="block py-2 text-gray-700 hover:text-blue-600">Profil</a>
            <a href="#jurusan" class="block py-2 text-gray-700 hover:text-blue-600">Jurusan</a>
            <a href="#alur" class="block py-2 text-gray-700 hover:text-blue-600">Alur</a>
            <a href="#info" class="block py-2 text-gray-700 hover:text-blue-600">Info & Jadwal</a>
            <a href="#kontak" class="block py-2 text-gray-700 hover:text-blue-600">Kontak</a>
        </div>
    </nav>

    <!-- ========== HERO SECTION - CERAH & MODERN ========== -->
    <section id="home" class="hero-bg py-20 md:py-28 relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagmonds-light.png')] opacity-30">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span
                        class="text-blue-600 font-semibold text-sm tracking-wider uppercase bg-blue-100 px-3 py-1 rounded-full inline-block">PPDB
                        2025/2026</span>
                    <h1 class="text-5xl md:text-7xl font-black mt-4 leading-tight">
                        <span class="text-gray-800">Selamat Datang di</span><br>
                        <span class="text-gradient-primary">SMK ICB Cinta Teknika</span>
                    </h1>
                    <p class="text-gray-600 text-lg mt-4 max-w-lg">Membentuk generasi unggul, kreatif, dan berkarakter
                        di era digital.</p>
                    <div class="flex flex-wrap gap-4 mt-8">
                        <a href="{{ route('register') }}"
                            class="btn-gradient px-6 py-3 rounded-full font-bold text-white flex items-center gap-2"><i
                                class="fas fa-arrow-right"></i> Daftar Sekarang</a>
                        <a href="#alur"
                            class="border border-blue-300 px-6 py-3 rounded-full font-semibold text-blue-600 hover:bg-blue-50 transition">Lihat
                            Panduan <i class="fas fa-play ml-1 text-xs"></i></a>
                    </div>
                    <div class="mt-8 flex gap-6">
                        <div><span class="text-2xl font-bold text-blue-600">1.250+</span>
                            <p class="text-gray-500 text-sm">Siswa</p>
                        </div>
                        <div><span class="text-2xl font-bold text-blue-600">5</span>
                            <p class="text-gray-500 text-sm">Jurusan</p>
                        </div>
                        <div><span class="text-2xl font-bold text-blue-600">3.200+</span>
                            <p class="text-gray-500 text-sm">Alumni</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        @if(isset($pengaturan['banner_home']) && $pengaturan['banner_home'] && Storage::disk('public')->exists($pengaturan['banner_home']))
                            <img src="{{ Storage::url($pengaturan['banner_home']) }}" alt="Banner"
                                class="w-full h-auto object-cover">
                        @else
                            <img src="https://picsum.photos/id/48/600/400" alt="Hero" class="w-full h-auto object-cover">
                        @endif
                    </div>
                    <div class="absolute -bottom-5 -left-5 bg-white rounded-xl shadow-lg p-3 border border-gray-100">
                        <i class="fas fa-quote-left text-blue-400 text-xl"></i>
                        <p class="text-sm font-medium max-w-xs">Akreditasi A (Unggul)</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wave decoration -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg viewBox="0 0 1200 120" class="relative block w-full h-10 md:h-16" preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    fill="#ffffff"></path>
            </svg>
        </div>
    </section>

    <!-- ========== PREMIUM ANNOUNCEMENT TICKER ========== -->
    <div class="ticker-section py-3">
        <div class="ticker-label">&#x1F4E3; INFO</div>
        <div class="overflow-hidden ml-24">
            <div class="ticker-track">
                @php
                    $infoPpdb = $pengaturan['info_ppdb'] ?? 'Pendaftaran PPDB 2025/2026 Resmi Dibuka — Daftar Sekarang dan Raih Masa Depanmu!';
                    // Repeat for seamless loop
                    $items = [
                        $infoPpdb,
                        'Pendaftaran online mudah, cepat, dan transparan',
                        ($pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika') . ' — Akreditasi A (Unggul)',
                        count($jurusan) . ' Jurusan Unggulan Tersedia — Pilih Sesuai Minatmu',
                        'Hubungi kami: ' . ($pengaturan['kontak'] ?? '(022) 7234924'),
                    ];
                @endphp
                @foreach(array_merge($items, $items) as $item)
                    <span class="ticker-item">
                        <span class="dot"></span>
                        {{ $item }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ========== PROFIL SEKOLAH ========== -->
    <section id="profil" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold uppercase text-sm bg-blue-100 px-3 py-1 rounded-full">About
                    Us</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-4">SMK ICB Cinta Teknika</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <p class="text-gray-600 leading-relaxed text-lg">
                        {{ $pengaturan['sejarah'] ?? 'Berdiri sejak 2010, SMK ICB Cinta Teknika berkomitmen menjadi pusat pendidikan vokasi terdepan di Indonesia. Dengan kurikulum berbasis industri 4.0, kami melahirkan lulusan yang siap kerja, technopreneur, dan berdaya saing global.' }}
                    </p>
                    <div class="mt-6 space-y-3">
                        <div class="flex items-center gap-3"><i
                                class="fas fa-check-circle text-blue-500 text-xl"></i><span>Akreditasi A (Unggul) – BAN
                                SM</span></div>
                        <div class="flex items-center gap-3"><i
                                class="fas fa-check-circle text-blue-500 text-xl"></i><span>Kerjasama dengan 50+ DU/DI
                                nasional & internasional</span></div>
                        <div class="flex items-center gap-3"><i
                                class="fas fa-check-circle text-blue-500 text-xl"></i><span>85+ guru profesional &
                                bersertifikasi</span></div>
                        <div class="flex items-center gap-3"><i
                                class="fas fa-check-circle text-blue-500 text-xl"></i><span>Fasilitas laboratorium
                                modern & teaching factory</span></div>
                    </div>
                </div>
                <div class="order-1 md:order-2">
                    <div class="card-modern p-1">
                        @if(isset($pengaturan['banner_2']) && $pengaturan['banner_2'] && Storage::disk('public')->exists($pengaturan['banner_2']))
                            <img src="{{ Storage::url($pengaturan['banner_2']) }}" alt="Profil"
                                class="rounded-xl w-full object-cover">
                        @else
                            <img src="https://picsum.photos/id/20/600/400" alt="Profil" class="rounded-xl w-full">
                        @endif
                    </div>
                </div>
            </div>
            <!-- Visi Misi Tujuan -->
            <div class="grid md:grid-cols-3 gap-6 mt-16">
                <!-- Visi -->
                <div
                    class="relative bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100/50 hover:shadow-lg transition-all duration-300 group overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-blue-200/20 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="relative">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md mb-4">
                            <i class="fas fa-bullseye text-white text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Visi</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $pengaturan['visi'] ?? '"Menjadi sekolah vokasi berstandar internasional yang menghasilkan lulusan technopreneur."' }}
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div
                    class="relative bg-gradient-to-br from-cyan-50 to-teal-50 rounded-2xl p-6 border border-cyan-100/50 hover:shadow-lg transition-all duration-300 group overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-cyan-200/20 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="relative">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-xl flex items-center justify-center shadow-md mb-4">
                            <i class="fas fa-list-check text-white text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Misi</h3>
                        @php
                            $misiLines = array_filter(explode("\n", $pengaturan['misi'] ?? ''));
                        @endphp
                        @if(count($misiLines) > 0)
                            <ul class="text-gray-600 space-y-2">
                                @foreach($misiLines as $line)
                                    <li class="flex items-start gap-2">
                                        <i class="fas fa-chevron-right text-cyan-500 text-xs mt-1.5 flex-shrink-0"></i>
                                        <span>{{ trim($line) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="text-gray-600 space-y-2">
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-cyan-500 text-xs mt-1.5 flex-shrink-0"></i><span>Mengimplementasikan
                                        teaching factory berbasis industri 4.0</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-cyan-500 text-xs mt-1.5 flex-shrink-0"></i><span>Mengembangkan
                                        karakter disiplin, inovatif, dan kolaboratif</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-cyan-500 text-xs mt-1.5 flex-shrink-0"></i><span>Memperluas
                                        kerjasama dengan DUDI nasional & internasional</span></li>
                            </ul>
                        @endif
                    </div>
                </div>

                <!-- Tujuan -->
                <div
                    class="relative bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 border border-indigo-100/50 hover:shadow-lg transition-all duration-300 group overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-200/20 rounded-full -translate-y-8 translate-x-8 group-hover:scale-150 transition-transform duration-500">
                    </div>
                    <div class="relative">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md mb-4">
                            <i class="fas fa-flag text-white text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Tujuan</h3>
                        @php
                            $tujuanLines = array_filter(explode("\n", $pengaturan['tujuan'] ?? ''));
                        @endphp
                        @if(count($tujuanLines) > 0)
                            <ul class="text-gray-600 space-y-2">
                                @foreach($tujuanLines as $line)
                                    <li class="flex items-start gap-2">
                                        <i class="fas fa-chevron-right text-indigo-500 text-xs mt-1.5 flex-shrink-0"></i>
                                        <span>{{ trim($line) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="text-gray-600 space-y-2">
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-indigo-500 text-xs mt-1.5 flex-shrink-0"></i><span>Mencetak
                                        lulusan yang kompeten dan berdaya saing tinggi</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-indigo-500 text-xs mt-1.5 flex-shrink-0"></i><span>Membangun
                                        budaya inovasi dan technopreneurship</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fas fa-chevron-right text-indigo-500 text-xs mt-1.5 flex-shrink-0"></i><span>Menjalin
                                        kerjasama strategis dengan dunia industri</span></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== JURUSAN ========== -->
    <section id="jurusan" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold uppercase text-sm bg-blue-100 px-3 py-1 rounded-full">Kompetensi
                    Keahlian</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-4">Pilih Jurusan Favoritmu</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($jurusan as $j)
                    <div class="card-modern overflow-hidden card-tilt reveal">
                        @if($j->gambar && Storage::disk('public')->exists($j->gambar))
                            <img src="{{ Storage::url($j->gambar) }}" class="w-full h-48 object-cover">
                        @else
                            <div
                                class="w-full h-48 bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                                <i class="fas fa-laptop-code text-5xl text-blue-200"></i>
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-xl font-bold">{{ $j->kode }}</h3>
                            <p class="text-gray-500 text-sm">{{ $j->nama }}</p>
                            <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($j->deskripsi, 80) }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-[#8ab4d0] font-semibold">{{ $j->kuota ?? '40' }} Kuota</span>
                                <a href="{{ route('jurusan.show', $j->kode) }}"
                                    class="text-xs text-[#2563eb] font-bold flex items-center gap-1 hover:underline">
                                    Detail <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-500">
                        <i class="fas fa-exclamation-circle text-3xl mb-3 opacity-50"></i>
                        <p>Belum ada data jurusan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ========== ALUR PENDAFTARAN ========== -->
    <section id="alur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span
                    class="text-blue-600 font-bold uppercase text-sm bg-blue-100 px-3 py-1 rounded-full">Panduan</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-4">Alur Pendaftaran</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        01</div>
                    <h3 class="text-xl font-bold">Buat Akun</h3>
                    <p class="text-gray-600 mt-2">Registrasi dengan email dan password.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        02</div>
                    <h3 class="text-xl font-bold">Isi Formulir</h3>
                    <p class="text-gray-600 mt-2">Lengkapi data pribadi & pilih jurusan.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        03</div>
                    <h3 class="text-xl font-bold">Upload Berkas</h3>
                    <p class="text-gray-600 mt-2">Ijazah, rapor, KK, pas foto.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        04</div>
                    <h3 class="text-xl font-bold">Verifikasi & Seleksi</h3>
                    <p class="text-gray-600 mt-2">Admin verifikasi, lalu tes online.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        05</div>
                    <h3 class="text-xl font-bold">Pengumuman</h3>
                    <p class="text-gray-600 mt-2">Hasil kelulusan via website & email.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl font-black mb-4">
                        06</div>
                    <h3 class="text-xl font-bold">Daftar Ulang</h3>
                    <p class="text-gray-600 mt-2">Lengkapi administrasi & menjadi siswa baru.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== INFO & JADWAL ========== -->
    <section id="info" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <h3 class="text-2xl font-bold flex items-center gap-2"><i class="fas fa-bullhorn text-blue-500"></i>
                        Pengumuman Terbaru</h3>
                    <div class="mt-6 space-y-4">
                        @forelse($pengumuman as $i => $p)
                            @php
                                $colors = ['blue', 'yellow', 'green', 'purple', 'red'];
                                $color = $colors[$i % count($colors)];
                            @endphp
                            <div class="border-l-4 border-{{ $color }}-500 pl-4">
                                <p class="font-semibold">{{ $p->judul }}</p>
                                <p class="text-gray-500 text-sm">
                                    @if($p->tanggal_mulai)
                                        {{ $p->tanggal_mulai->translatedFormat('d F Y') }}
                                        @if($p->tanggal_selesai && $p->tanggal_selesai != $p->tanggal_mulai)
                                            - {{ $p->tanggal_selesai->translatedFormat('d F Y') }}
                                        @endif
                                    @else
                                        {{ $p->created_at ? $p->created_at->translatedFormat('d F Y') : '-' }}
                                    @endif
                                </p>
                            </div>
                        @empty
                            <div class="text-center py-6 text-gray-400">
                                <i class="fas fa-bullhorn text-3xl mb-2 opacity-50"></i>
                                <p>Belum ada pengumuman</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm">
                    <h3 class="text-2xl font-bold flex items-center gap-2"><i
                            class="fas fa-calendar-alt text-blue-500"></i> Jadwal PPDB
                        {{ date('Y') }}/{{ date('Y') + 1 }}</h3>
                    <div class="overflow-x-auto mt-6">
                        <table class="min-w-full text-sm">
                            <thead class="border-b">
                                <tr>
                                    <th class="text-left py-2">Kegiatan</th>
                                    <th class="text-left py-2">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwal as $j)
                                    <tr class="border-b">
                                        <td class="py-2">{{ $j->nama_kegiatan }}</td>
                                        <td class="py-2">
                                            {{ $j->tanggal_mulai->translatedFormat('d M Y') }}
                                            @if($j->tanggal_selesai && $j->tanggal_selesai != $j->tanggal_mulai)
                                                - {{ $j->tanggal_selesai->translatedFormat('d M Y') }}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-6 text-gray-400">Belum ada jadwal PPDB</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== GALERI ========== -->
    <section id="galeri" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold uppercase text-sm bg-blue-100 px-3 py-1 rounded-full">Momen
                    Terbaik</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-800 mt-4">Galeri Sekolah</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @forelse($galeri as $g)
                    <div class="relative group overflow-hidden rounded-xl h-40 shadow hover:shadow-lg transition">
                        <img src="{{ Storage::url($g->gambar) }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white text-sm font-medium px-2 text-center">{{ $g->judul }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-500">
                        <i class="fas fa-images text-3xl mb-3 opacity-50"></i>
                        <p>Belum ada foto galeri</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ========== KONTAK & LOKASI ========== -->
    <section id="kontak" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Kontak & Lokasi</h3>
                    <div class="mt-6 space-y-4 text-gray-700">
                        <div class="flex items-center gap-3"><i
                                class="fas fa-map-marker-alt text-blue-500 w-6 text-center"></i>
                            {{ $pengaturan['alamat'] ?? 'Jl. Pendidikan No.123, Cinta Teknika, Bandung' }}</div>
                        <div class="flex items-center gap-3"><i
                                class="fab fa-whatsapp text-green-500 w-6 text-center"></i>
                            {{ $pengaturan['kontak'] ?? '+62 812-3456-7890' }}</div>
                        <div class="flex items-center gap-3"><i
                                class="fas fa-envelope text-blue-500 w-6 text-center"></i> {{ $pengaturan['email'] ??
                            'ppdb@smkicb.sch.id' }}</div>
                        @if(isset($pengaturan['website']) && $pengaturan['website'])
                            <div class="flex items-center gap-3"><i class="fas fa-globe text-blue-500 w-6 text-center"></i>
                                {{ $pengaturan['website'] }}</div>
                        @endif
                    </div>
                    <div class="mt-8 p-4 bg-blue-50 rounded-xl">
                        <p class="font-semibold mb-1">Jam Operasional PPDB</p>
                        @if(isset($jam_operasional) && $jam_operasional->count() > 0)
                            @foreach($jam_operasional as $jam)
                                <p class="text-sm">
                                    <span
                                        class="font-medium text-gray-800">{{ $jam->hari }}</span>{{ $jam->tanggal ? ' (' . \Carbon\Carbon::parse($jam->tanggal)->format('d/m/Y') . ')' : '' }}:
                                    <span class="text-gray-600">{{ substr($jam->jam_mulai, 0, 5) }} -
                                        {{ substr($jam->jam_selesai, 0, 5) }} WIB</span>
                                </p>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-500 italic"><i class="fas fa-info-circle mr-1"></i>Belum ada
                                informasi jam operasional.</p>
                        @endif
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden h-64 shadow-md">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.208719365392!2d107.6274077145073!3d-6.914239944835365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7e82d986cbb%3A0x9ad00826cdd60f01!2sSMK%20ICB%20Cinta%20Teknika!5e0!3m2!1sen!2sid!4v1781097826867!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-white border-t border-gray-200 py-10">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            <div class="flex justify-center space-x-6 mb-4">
                @if(isset($pengaturan['instagram']) && $pengaturan['instagram'])
                    <a href="{{ $pengaturan['instagram'] }}" target="_blank" class="hover:text-pink-500 transition"><i
                            class="fab fa-instagram text-xl"></i></a>
                @endif
                @if(isset($pengaturan['facebook']) && $pengaturan['facebook'])
                    <a href="{{ $pengaturan['facebook'] }}" target="_blank" class="hover:text-blue-600 transition"><i
                            class="fab fa-facebook text-xl"></i></a>
                @endif
                @if(isset($pengaturan['youtube']) && $pengaturan['youtube'])
                    <a href="{{ $pengaturan['youtube'] }}" target="_blank" class="hover:text-red-500 transition"><i
                            class="fab fa-youtube text-xl"></i></a>
                @endif
                @if(!isset($pengaturan['instagram']) && !isset($pengaturan['facebook']) && !isset($pengaturan['youtube']))
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-youtube text-xl"></i></a>
                @endif
            </div>
            <p>© {{ date('Y') }} PPDB {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}. All Rights Reserved.
            </p>
            <p class="text-xs mt-1">#FutureReady #VokasiHebat</p>
        </div>
    </footer>

    <script>
        const menuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        if (menuBtn) menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    </script>
    <script>
        // Scroll reveal using IntersectionObserver (moved from head)
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            revealElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>