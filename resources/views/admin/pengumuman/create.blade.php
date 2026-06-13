@extends('layouts.admin')

@section('title', 'Tambah Pengumuman')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Back Navigation -->
        <div class="reveal">
            <a href="{{ route('admin.pengumuman.index') }}" class="group inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-white border border-gray-200 group-hover:border-blue-300 group-hover:shadow-sm flex items-center justify-center transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </div>
                <span class="font-medium">Kembali ke Manajemen Pengumuman</span>
            </a>
        </div>

        <!-- Header -->
        <div class="reveal reveal-delay-1">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Konten
            </div>
            <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Tambah Pengumuman Baru</h1>
            <p class="text-gray-500 text-sm mt-1">Buat pengumuman untuk siswa dan publik</p>
        </div>

        <!-- Error Alert -->
        @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 rounded-2xl p-5 reveal reveal-delay-1">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-rose-700">Terjadi kesalahan</h4>
                    <ul class="mt-1 space-y-1">
                        @foreach($errors->all() as $error)
                        <li class="text-xs text-rose-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Form Card Full Width -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden reveal reveal-delay-2">
            
            <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 lg:p-10">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">
                    
                    <!-- Left Column: Form Fields -->
                    <div class="lg:col-span-2 space-y-6">

                        <!-- Judul -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Judul Pengumuman <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                                <input type="text" name="judul" required placeholder="Masukkan judul pengumuman..."
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                    Tanggal Mulai <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="date" name="tanggal_mulai" value="{{ date('Y-m-d') }}" required
                                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                    Tanggal Selesai <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="date" name="tanggal_selesai" value="{{ date('Y-m-d') }}" required
                                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Isi Pengumuman <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                    </svg>
                                </div>
                                <textarea name="isi" rows="8" required placeholder="Tulis detail pengumuman di sini..."
                                          class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none placeholder:text-gray-400"></textarea>
                            </div>
                            <p class="text-xs text-gray-400 mt-1.5">Gunakan bahasa yang jelas dan informatif</p>
                        </div>

                        <!-- Toggle Publish -->
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50/80 border border-gray-100 max-w-md">
                            <div class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_published" id="is_published" value="1" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-500/10 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </div>
                            <div>
                                <label for="is_published" class="text-sm font-semibold text-gray-700 cursor-pointer">Publikasikan sekarang</label>
                                <p class="text-xs text-gray-500">Pengumuman akan langsung tampil di halaman publik</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Image Upload & Preview -->
                    <div class="lg:col-span-1">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Gambar Pengumuman</label>
                        
                        <div class="space-y-4">
                            <!-- Upload Area -->
                            <div class="relative border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-300 hover:bg-blue-50/30 transition-all cursor-pointer group" onclick="document.getElementById('gambar').click()">
                                <div class="w-16 h-16 rounded-2xl bg-gray-100 group-hover:bg-blue-100 flex items-center justify-center mx-auto mb-4 transition-colors">
                                    <svg class="w-8 h-8 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-700 font-semibold">Klik untuk unggah gambar</p>
                                <p class="text-xs text-gray-400 mt-1">atau drag & drop file di sini</p>
                                <p class="text-xs text-gray-400 mt-2">JPG, PNG, WEBP • Maks 2MB</p>
                            </div>
                            <input type="file" id="gambar" name="gambar" accept="image/*" class="hidden" onchange="previewImage(this)">

                            <!-- Preview Container -->
                            <div id="preview-container" class="hidden">
                                <div class="relative">
                                    <div class="aspect-[16/9] rounded-2xl overflow-hidden border border-gray-200 bg-gray-100">
                                        <img id="preview" class="w-full h-full object-cover" src="" alt="Preview Pengumuman">
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                                        <p class="text-white text-xs font-medium">Preview Gambar</p>
                                    </div>
                                    <button type="button" onclick="clearImage()" class="absolute top-3 right-3 w-8 h-8 bg-white/90 backdrop-blur-sm text-rose-500 rounded-xl flex items-center justify-center shadow-lg hover:bg-rose-500 hover:text-white transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Divider -->
                <div class="my-8 border-t border-gray-100"></div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn-outline-premium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-premium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan & Publikasikan
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@push('styles')
<style>
    .btn-premium {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        padding: 0.625rem 1.5rem;
        border-radius: 0.875rem;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 14px 0 rgba(37, 99, 235, 0.25);
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-premium:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 25px 0 rgba(37, 99, 235, 0.35);
        background: linear-gradient(135deg, #1d4ed8, #4338ca);
    }
    .btn-premium:active {
        transform: translateY(0) scale(0.98);
    }

    .btn-outline-premium {
        background: transparent;
        color: #475569;
        border: 1.5px solid #e2e8f0;
        padding: 0.625rem 1.5rem;
        border-radius: 0.875rem;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-outline-premium:hover {
        border-color: #2563eb;
        background: rgba(37, 99, 235, 0.05);
        color: #2563eb;
        transform: translateY(-2px);
    }

    .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }

    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    ::-webkit-scrollbar-track {
        background: transparent;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -20px 0px' });
        reveals.forEach(el => observer.observe(el));
    });

    // Image Preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview-container').classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function clearImage() {
        document.getElementById('gambar').value = '';
        document.getElementById('preview-container').classList.add('hidden');
    }

    // Drag & Drop
    const dropZone = document.querySelector('.border-dashed');
    if(dropZone) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-blue-400', 'bg-blue-50');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-blue-400', 'bg-blue-50');
            }, false);
        });

        dropZone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('gambar').files = files;
            previewImage(document.getElementById('gambar'));
        }, false);
    }
</script>
@endpush
@endsection