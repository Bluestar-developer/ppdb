@extends('layouts.admin')

@section('title', 'Galeri Sekolah')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Header -->
        <div class="reveal">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                        Manajemen Konten
                    </div>
                    <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Galeri Foto</h1>
                    <p class="text-gray-500 text-sm mt-1">Kelola foto kegiatan dan fasilitas sekolah</p>
                </div>
                <a href="{{ route('admin.galeri.create') }}" class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/25 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Foto
                </a>
            </div>
        </div>

        <!-- Filter Album -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden reveal reveal-delay-1">
            <div class="px-6 md:px-8 py-5 border-b border-gray-100 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-gray-900">Filter Album</h3>
                        <p class="text-xs text-gray-500">Cari foto berdasarkan album</p>
                    </div>
                </div>
            </div>
            <div class="p-6 md:p-8">
                <form method="GET" class="flex flex-wrap gap-4 items-end">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pilih Album</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                </svg>
                            </div>
                            <select name="album" class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none appearance-none cursor-pointer">
                                <option value="">Semua Album</option>
                                @foreach($albums as $album)
                                    <option value="{{ $album }}" {{ request('album') == $album ? 'selected' : '' }}>{{ $album }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/25 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid Galeri -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 reveal reveal-delay-2">
            @forelse($galeri as $g)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <!-- Gambar dengan overlay hover -->
                <div class="relative overflow-hidden h-48">
                    <img src="{{ Storage::url($g->gambar) }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center gap-3">
                        <a href="{{ route('admin.galeri.edit', $g) }}" class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full flex items-center justify-center hover:bg-white hover:text-yellow-600 transition-all transform hover:scale-110">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST" class="inline" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-full flex items-center justify-center hover:bg-white hover:text-red-600 transition-all transform hover:scale-110">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-4">
                    <p class="font-semibold text-gray-800 text-sm truncate">{{ $g->judul }}</p>
                    @if($g->album)
                        <div class="inline-flex items-center gap-1.5 mt-2 px-2.5 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-medium">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            </svg>
                            {{ $g->album }}
                        </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-2xl mx-auto flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Belum ada foto</h3>
                    <p class="text-sm text-gray-500 mb-4">Tambahkan foto pertama ke galeri sekolah</p>
                    <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Upload foto pertama
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-4 reveal">
            {{ $galeri->appends(request()->query())->links() }}
        </div>

    </div>
</div>

@push('scripts')
<script>
    // Reveal animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const reveals = document.querySelectorAll('.reveal');
        reveals.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('revealed');
            }, index * 100);
        });
    });
</script>
@endpush

@endsection