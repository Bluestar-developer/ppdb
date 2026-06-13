@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

        <!-- Back Navigation -->
        <div class="reveal mb-6">
            <a href="{{ route('admin.galeri.index') }}" class="group inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-white border border-gray-200 group-hover:border-blue-300 group-hover:shadow-sm flex items-center justify-center transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </div>
                <span class="font-medium">Kembali ke Galeri</span>
            </a>
        </div>

        <!-- Header -->
        <div class="reveal reveal-delay-1 mb-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold uppercase tracking-wider mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                Edit Konten
            </div>
            <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Edit Foto</h1>
            <p class="text-gray-500 text-sm mt-1">{{ $galeri->judul }}</p>
        </div>

        <!-- Error Alert -->
        @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 rounded-2xl p-5 mb-6 reveal reveal-delay-1">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-rose-700">Terjadi Kesalahan</h4>
                    <ul class="text-xs text-rose-600 mt-1 list-disc list-inside space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Form -->
        <div class="w-full reveal reveal-delay-2">
            <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                @csrf @method('PUT')
                <div class="p-6 md:p-8 space-y-6">

                    <!-- Judul Foto -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                            Judul Foto <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <input type="text" name="judul" value="{{ $galeri->judul }}" required placeholder="Masukkan judul foto..."
                                   class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                        </div>
                    </div>

                    <!-- Gambar Saat Ini -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Gambar Saat Ini</label>
                        <div class="p-3 bg-gray-50/80 border border-gray-200 rounded-2xl inline-block">
                            <img src="{{ Storage::url($galeri->gambar) }}" class="h-24 w-auto object-cover rounded-xl shadow-sm">
                        </div>
                    </div>

                    <!-- Ganti Gambar -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Ganti Gambar</label>
                        <div class="relative group">
                            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all cursor-pointer" onclick="document.getElementById('gambarInput').click()">
                                <input type="file" id="gambarInput" name="gambar" accept="image/*" class="hidden" onchange="previewImage(this, 'gambarPreview')">
                                <div id="gambarPreview" class="mb-3">
                                    <div class="w-20 h-20 bg-gray-100 rounded-xl mx-auto flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mb-1">Klik untuk ganti gambar</p>
                                <p class="text-[10px] text-gray-400">JPG, JPEG, PNG, WEBP (Max 10MB)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Album -->
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Album</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                </svg>
                            </div>
                            <input type="text" name="album" value="{{ $galeri->album }}" placeholder="Contoh: Kegiatan, Prestasi, Fasilitas..."
                                   class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                        </div>
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="px-6 md:px-8 py-5 bg-gray-50/50 border-t border-gray-100 flex items-center justify-end gap-4">
                    <a href="{{ route('admin.galeri.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/25 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@push('scripts')
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="h-20 w-auto object-contain mx-auto rounded-xl shadow-sm" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    }

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