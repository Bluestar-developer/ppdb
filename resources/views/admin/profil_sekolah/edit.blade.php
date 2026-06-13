@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

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
            <a href="{{ route('admin.dashboard') }}" class="group inline-flex items-center gap-2 text-sm text-gray-500 hover:text-blue-600 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-white border border-gray-200 group-hover:border-blue-300 group-hover:shadow-sm flex items-center justify-center transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </div>
                <span class="font-medium">Kembali ke Dashboard</span>
            </a>
        </div>

        <!-- Header -->
        <div class="reveal reveal-delay-1">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                Pengaturan
            </div>
            <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Profil Sekolah</h1>
            <p class="text-gray-500 text-sm mt-1">Kelola informasi, identitas, dan konten profil sekolah</p>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-5 reveal reveal-delay-1">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-emerald-700">Berhasil</h4>
                    <p class="text-xs text-emerald-600 mt-1">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('admin.profil_sekolah.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6 reveal reveal-delay-2">
            @csrf
            @method('PUT')

            <!-- Section 1: Informasi Dasar -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 md:px-8 py-5 border-b border-gray-100 bg-gray-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Informasi Dasar</h3>
                            <p class="text-xs text-gray-500">Data utama sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Nama Sekolah <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="text" name="nama_sekolah" value="{{ $profil['nama_sekolah'] ?? '' }}" required placeholder="Nama lengkap sekolah..."
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Email <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="email" name="email" value="{{ $profil['email'] ?? '' }}" required placeholder="email@sekolah.sch.id"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Kontak (Telepon) <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <input type="text" name="kontak" value="{{ $profil['kontak'] ?? '' }}" required placeholder="021-12345678"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">WhatsApp</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="text" name="whatsapp" value="{{ $profil['whatsapp'] ?? '' }}" placeholder="0812-3456-7890"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                                Alamat <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <textarea name="alamat" rows="3" required placeholder="Alamat lengkap sekolah..."
                                          class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none placeholder:text-gray-400">{{ $profil['alamat'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Konten Profil -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 md:px-8 py-5 border-b border-gray-100 bg-gray-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Konten Profil</h3>
                            <p class="text-xs text-gray-500">Sejarah, visi misi, dan sambutan</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 md:p-8 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sejarah Sekolah</label>
                        <textarea name="sejarah" rows="4" placeholder="Tuliskan sejarah singkat sekolah..."
                                  class="w-full px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none no-scrollbar placeholder:text-gray-400">{{ $profil['sejarah'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Visi & Misi</label>
                        <textarea name="visi_misi" rows="5" placeholder="Tuliskan visi dan misi sekolah..."
                                  class="w-full px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none no-scrollbar placeholder:text-gray-400">{{ $profil['visi_misi'] ?? '' }}</textarea>
                        <p class="text-[10px] text-gray-400 mt-1">Pisahkan visi dan misi dengan baris baru</p>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sambutan Kepala Sekolah</label>
                        <textarea name="sambutan_kepsek" rows="4" placeholder="Tuliskan sambutan kepala sekolah..."
                                  class="w-full px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none no-scrollbar placeholder:text-gray-400">{{ $profil['sambutan_kepsek'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Section 3: Media Sosial -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 md:px-8 py-5 border-b border-gray-100 bg-gray-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-pink-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Media Sosial</h3>
                            <p class="text-xs text-gray-500">Tautan akun media sosial sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Instagram</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01M7.5 3h9a4.5 4.5 0 014.5 4.5v9a4.5 4.5 0 01-4.5 4.5h-9A4.5 4.5 0 013 16.5v-9A4.5 4.5 0 017.5 3z"/>
                                    </svg>
                                </div>
                                <input type="text" name="instagram" value="{{ $profil['instagram'] ?? '' }}" placeholder="@namasekolah"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Facebook</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                                    </svg>
                                </div>
                                <input type="text" name="facebook" value="{{ $profil['facebook'] ?? '' }}" placeholder="facebook.com/namasekolah"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">YouTube</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="text" name="youtube" value="{{ $profil['youtube'] ?? '' }}" placeholder="youtube.com/@namasekolah"
                                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-gray-400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Logo & Branding -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 md:px-8 py-5 border-b border-gray-100 bg-gray-50/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Logo & Branding</h3>
                            <p class="text-xs text-gray-500">Upload logo dan favicon sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Logo Upload -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Logo Sekolah</label>
                            <div class="relative group">
                                <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all cursor-pointer" onclick="document.getElementById('logoInput').click()">
                                    <input type="file" id="logoInput" name="logo" accept="image/*" class="hidden" onchange="previewImage(this, 'logoPreview', 'logo')">
                                    <div id="logoPreview" class="mb-3">
                                        @if(isset($profil['logo']) && $profil['logo'])
                                            <img src="{{ Storage::url($profil['logo']) }}" alt="Logo" class="h-24 w-auto object-contain mx-auto rounded-xl shadow-sm">
                                        @else
                                            <div class="w-24 h-24 bg-gray-100 rounded-xl mx-auto flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1">Klik untuk upload logo</p>
                                    <p class="text-[10px] text-gray-400">Format: PNG, JPG, SVG (Max 2MB)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Favicon Upload -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Favicon</label>
                            <div class="relative group">
                                <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all cursor-pointer" onclick="document.getElementById('faviconInput').click()">
                                    <input type="file" id="faviconInput" name="favicon" accept="image/x-icon,image/png,image/jpg" class="hidden" onchange="previewImage(this, 'faviconPreview', 'favicon')">
                                    <div id="faviconPreview" class="mb-3">
                                        @if(isset($profil['favicon']) && $profil['favicon'])
                                            <img src="{{ Storage::url($profil['favicon']) }}" alt="Favicon" class="h-16 w-16 object-contain mx-auto rounded-lg shadow-sm">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg mx-auto flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-500 mb-1">Klik untuk upload favicon</p>
                                    <p class="text-[10px] text-gray-400">Format: ICO, PNG (32x32px)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4 pt-4">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
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

@push('scripts')
<script>
    function previewImage(input, previewId, type) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const sizeClass = type === 'favicon' ? 'h-16 w-16' : 'h-24 w-auto';
                preview.innerHTML = `<img src="${e.target.result}" class="${sizeClass} object-contain mx-auto rounded-xl shadow-sm" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    }

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