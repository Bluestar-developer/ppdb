<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PPDB') | {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .nav-glass {
            background: rgba(255,255,255,0.88);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(226,232,240,0.6);
        }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    </style>
    @stack('styles')
</head>
<body class="antialiased text-gray-900">

    <!-- Navbar -->
    <nav class="nav-glass fixed w-full top-0 z-50 transition-shadow duration-300" id="mainNav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 gap-4">
                <!-- Brand -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    @if(isset($pengaturan['logo']) && Storage::disk('public')->exists($pengaturan['logo']))
                        <img src="{{ Storage::url($pengaturan['logo']) }}" alt="Logo" class="w-10 h-10 object-contain drop-shadow-sm transition-transform group-hover:scale-110">
                    @else
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-laptop-code text-white text-sm"></i>
                        </div>
                    @endif
                    <span class="font-extrabold text-gray-800 text-lg tracking-tight">{{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Beranda</a>
                    <a href="{{ url('/#info') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Jadwal</a>
                    <a href="{{ url('/#info') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Pengumuman</a>
                    <a href="#" onclick="event.preventDefault(); window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}';" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-500/20">Kembali</a>
                </div>

                <!-- Mobile Toggle -->
                <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Beranda</a>
                <a href="{{ url('/#info') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Jadwal</a>
                <a href="{{ url('/#info') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Pengumuman</a>
            </div>
        </div>
    </nav>

    <!-- Spacer -->
    <div class="h-16"></div>

    <main>
        @yield('content')
    </main>

    <script>
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        if(btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }
    </script>
    @stack('scripts')
</body>
</html>
