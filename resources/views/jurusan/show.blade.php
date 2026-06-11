<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurusan {{ $jurusan->nama }} | {{ $jurusan->kode }}</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --color-primary: {{ $pengaturan['warna_tema'] ?? '#2563eb' }};
        }
        * { font-family: 'Inter', sans-serif; }
        .card-modern { background: white; border-radius: 1.5rem; box-shadow: 0 20px 35px -10px rgba(0,0,0,.05); transition: all .3s ease; }
        .card-modern:hover { transform: translateY(-5px); box-shadow: 0 25px 40px -12px rgba(0,0,0,.1); }
        .btn-primary {
    background: var(--color-primary);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: .75rem;
    font-weight: 600;
    transition: transform .2s, background .2s, box-shadow .2s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.btn-primary:hover {
    transform: scale(1.04);
    background: color-mix(in srgb, var(--color-primary) 85%, black);
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}
.fade-in {
    animation: fadeIn 0.6s ease-out forwards;
    opacity: 0;
}
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .btn-primary:hover { transform: scale(1.02); }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center space-x-3">
                @if(isset($pengaturan['logo']) && Storage::disk('public')->exists($pengaturan['logo']))
                    <img src="{{ Storage::url($pengaturan['logo']) }}" alt="Logo" class="w-10 h-10 object-contain drop-shadow-sm">
                @else
                    <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-md">
                        <i class="fas fa-laptop-code text-white text-sm"></i>
                    </div>
                @endif
                <span class="font-extrabold text-gray-800 text-lg">{{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 transition">Beranda</a>
            </div>
        </div>
    </div>
</nav>

    <section class="py-12 max-w-4xl mx-auto">
        <div class="card-modern overflow-hidden">
            @if($jurusan->gambar && Storage::disk('public')->exists($jurusan->gambar))
                <img src="{{ Storage::url($jurusan->gambar) }}" alt="{{ $jurusan->nama }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-6xl text-blue-200"></i>
                </div>
            @endif
            <div class="p-6">
                <h1 class="text-3xl font-black text-gray-800 mb-2">{{ $jurusan->nama }} <span class="text-sm text-gray-500">({{ $jurusan->kode }})</span></h1>
                <p class="text-gray-600 mb-4">{{ $jurusan->deskripsi }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-[#8ab4d0] font-semibold">Kuota: {{ $jurusan->kuota ?? '40' }}</span>
                    <a href="{{ url('/') }}" class="btn-primary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            <p>© {{ date('Y') }} {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }}. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
