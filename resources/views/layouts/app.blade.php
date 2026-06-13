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
                    @if(request()->routeIs('student.*'))
                        <!-- Student Navigation -->
                        <a href="{{ route('student.beranda') }}" class="px-4 py-2 text-sm font-semibold {{ request()->routeIs('student.beranda') ? 'text-blue-600 bg-blue-50/50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/50' }} rounded-lg transition-all">Beranda</a>
                        <a href="{{ route('student.jadwal') }}" class="px-4 py-2 text-sm font-semibold {{ request()->routeIs('student.jadwal') ? 'text-blue-600 bg-blue-50/50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/50' }} rounded-lg transition-all">Jadwal</a>
                        <a href="{{ route('student.status') }}" class="px-4 py-2 text-sm font-semibold {{ request()->routeIs('student.status') ? 'text-blue-600 bg-blue-50/50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/50' }} rounded-lg transition-all">Status</a>
                        <a href="{{ route('student.pengumuman') }}" class="px-4 py-2 text-sm font-semibold {{ request()->routeIs('student.pengumuman') ? 'text-blue-600 bg-blue-50/50' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50/50' }} rounded-lg transition-all">Pengumuman</a>
                        
                        <!-- Profile Dropdown (Click to toggle) -->
                        <div class="ml-4 relative" id="profileDropdown">
                            <button id="profileToggle" class="flex items-center gap-2.5 px-3.5 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200 border border-gray-200 hover:border-blue-300">
                                <div class="w-7 h-7 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xs shadow-md">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold text-gray-700 hidden lg:inline">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-600"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="profileMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 z-50 overflow-hidden animate-in">
                                <!-- Header -->
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-4 py-3 border-b border-gray-100">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Akun Saya</p>
                                    <p class="text-sm font-bold text-gray-800 mt-1">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ Auth::user()->email }}</p>
                                </div>
                                
                                <!-- Menu Items -->
                                <div class="py-2">
                                    <a href="{{ route('student.profile') }}" class="flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-150 border-l-3 border-transparent hover:border-blue-600">
                                        <i class="fas fa-user-circle text-blue-500 w-4"></i>
                                        <div>
                                            <p class="text-sm font-semibold">Profil Saya</p>
                                            <p class="text-xs text-gray-500">Kelola informasi pribadi</p>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- Divider -->
                                <div class="h-px bg-gray-100"></div>
                                
                                <!-- Logout -->
                                <div class="py-2">
                                    <form method="POST" action="{{ route('logout') }}" class="block">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-150 border-l-3 border-transparent hover:border-red-600">
                                            <i class="fas fa-sign-out-alt text-red-500 w-4"></i>
                                            <div>
                                                <p class="text-sm font-semibold">Logout</p>
                                                <p class="text-xs text-gray-500">Keluar dari akun</p>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Default Navigation -->
                        <a href="{{ url('/') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Beranda</a>
                        <a href="{{ url('/#info') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Jadwal</a>
                        <a href="{{ url('/#info') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50/50 transition-all">Pengumuman</a>
                        <a href="#" onclick="event.preventDefault(); window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}';" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-500/20">Kembali</a>
                    @endif
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
                @if(request()->routeIs('student.*'))
                    <!-- Student Mobile Menu -->
                    <a href="{{ route('student.beranda') }}" class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('student.beranda') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} font-medium text-sm">Beranda</a>
                    <a href="{{ route('student.jadwal') }}" class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('student.jadwal') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} font-medium text-sm">Jadwal</a>
                    <a href="{{ route('student.status') }}" class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('student.status') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} font-medium text-sm">Status</a>
                    <a href="{{ route('student.pengumuman') }}" class="block px-4 py-2.5 rounded-lg {{ request()->routeIs('student.pengumuman') ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} font-medium text-sm">Pengumuman</a>
                    <hr class="my-3">
                    
                    <!-- Profile Section Mobile -->
                    <div class="px-4 py-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Profil</p>
                        <a href="{{ route('student.profile') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm transition-colors">
                            <i class="fas fa-user-circle text-blue-500"></i> Profil Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 font-medium text-sm transition-colors">
                                <i class="fas fa-sign-out-alt text-red-500"></i> Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Default Mobile Menu -->
                    <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Beranda</a>
                    <a href="{{ url('/#info') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Jadwal</a>
                    <a href="{{ url('/#info') }}" class="block px-4 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 font-medium text-sm">Pengumuman</a>
                @endif
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

        // Profile Dropdown Toggle
        const profileToggle = document.getElementById('profileToggle');
        const profileMenu = document.getElementById('profileMenu');
        const profileDropdown = document.getElementById('profileDropdown');

        if(profileToggle && profileMenu) {
            profileToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
                profileToggle.classList.toggle('bg-blue-50');
                profileToggle.classList.toggle('border-blue-300');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if(!profileDropdown.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                    profileToggle.classList.remove('bg-blue-50');
                    profileToggle.classList.remove('border-blue-300');
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
