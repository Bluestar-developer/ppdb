@extends('layouts.admin')

@section('title', 'Verifikasi Berkas - ' . $registration->full_name)

@section('content')
<div class="min-h-screen bg-gray-50/50 p-4 md:p-8">
    <div class="max-w-6xl mx-auto space-y-6">

        {{-- Header Navigation --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.verifikasi.index') }}"
                   class="group flex items-center justify-center w-10 h-10 rounded-xl bg-white shadow-sm border border-gray-200/60 hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Verifikasi Berkas</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Detail dan validasi dokumen pendaftar</p>
                </div>
            </div>

            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-white shadow-sm border border-gray-200/60">
                <span class="w-2 h-2 rounded-full {{ $registration->berkas_verified ? 'bg-emerald-500' : 'bg-amber-500' }} animate-pulse"></span>
                <span class="text-sm font-medium text-gray-700">
                    {{ $registration->berkas_verified ? 'Terverifikasi' : 'Menunggu Verifikasi' }}
                </span>
            </div>
        </div>

        {{-- Main Profile Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200/60 overflow-hidden">
            <div class="p-6 md:p-8">
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start">

                    {{-- Avatar & Quick Info --}}
                    <div class="flex-shrink-0 flex flex-col items-center md:items-start gap-4">
                        <div class="relative">
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-indigo-200">
                                {{ strtoupper(substr($registration->full_name, 0, 1)) }}
                            </div>
                            @if($registration->berkas_verified)
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="text-center md:text-left">
                            <h2 class="text-xl font-bold text-gray-900">{{ $registration->full_name }}</h2>
                            <p class="text-sm text-gray-500 mt-1">No. {{ $registration->registration_number }}</p>
                        </div>
                    </div>

                    {{-- Info Grid --}}
                    <div class="flex-1 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="group p-4 rounded-xl bg-gray-50/80 border border-gray-100 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all duration-300">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">NIK</span>
                            </div>
                            <p class="text-sm font-medium text-gray-900 font-mono">{{ $registration->nik }}</p>
                        </div>

                        <div class="group p-4 rounded-xl bg-gray-50/80 border border-gray-100 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all duration-300">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Jurusan Pilihan</span>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ $registration->major_choice }}</p>
                        </div>

                        <div class="group p-4 rounded-xl bg-gray-50/80 border border-gray-100 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all duration-300">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Status Berkas</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $registration->berkas_verified ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $registration->berkas_verified ? 'Terverifikasi' : 'Belum Verifikasi' }}
                            </span>
                        </div>

                        @if($registration->catatan_verifikasi)
                        <div class="group p-4 rounded-xl bg-gray-50/80 border border-gray-100 hover:border-indigo-200 hover:bg-indigo-50/30 transition-all duration-300 sm:col-span-2 lg:col-span-3">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Catatan Terakhir</span>
                            </div>
                            <p class="text-sm text-gray-700 italic">"{{ $registration->catatan_verifikasi }}"</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Kelengkapan Berkas — DI ATAS DOKUMEN --}}
        <div class="bg-white rounded-xl border border-gray-200/60 shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">Kelengkapan Berkas</p>
                        <p class="text-xs text-gray-500 mt-0.5">
                            {{ collect(['ijazah', 'rapor', 'kk', 'foto'])->filter(fn($f) => $registration->$f)->count() }} dari 4 dokumen telah diunggah
                        </p>
                    </div>
                </div>
                <div class="w-full sm:w-72">
                    <div class="flex justify-between text-xs font-medium text-gray-600 mb-2">
                        <span>Progress</span>
                        <span>{{ (collect(['ijazah', 'rapor', 'kk', 'foto'])->filter(fn($f) => $registration->$f)->count() / 4) * 100 }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5">
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2.5 rounded-full transition-all duration-500"
                             data-width="{{ (collect(['ijazah', 'rapor', 'kk', 'foto'])->filter(fn($f) => $registration->$f)->count() / 4) * 100 }}"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dokumen Unggahan — FULL WIDTH --}}
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                    </svg>
                    Dokumen Unggahan
                </h3>
                <span class="text-xs text-gray-500 bg-white px-3 py-1 rounded-full shadow-sm border border-gray-200/60 font-medium">
                    {{ collect(['ijazah', 'rapor', 'kk', 'foto'])->filter(fn($f) => $registration->$f)->count() }} dari 4 Berkas
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                    $files = [
                        'ijazah' => ['label' => 'Ijazah', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z'],
                        'rapor' => ['label' => 'Rapor', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                        'kk' => ['label' => 'Kartu Keluarga', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        'foto' => ['label' => 'Foto', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01']
                    ];
                @endphp

                @foreach($files as $field => $meta)
                <div class="group relative bg-white rounded-xl border border-gray-200/60 shadow-sm hover:shadow-md hover:border-indigo-300 transition-all duration-300 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center group-hover:bg-indigo-100 transition-colors">
                                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $meta['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">{{ $meta['label'] }}</h4>
                                    <p class="text-xs text-gray-500 mt-0.5">PDF/JPG/PNG</p>
                                </div>
                            </div>
                            @if($registration->$field)
                                <span class="w-2 h-2 rounded-full bg-emerald-500 ring-2 ring-emerald-100"></span>
                            @else
                                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                            @endif
                        </div>

                        @if($registration->$field)
                            <div class="space-y-3">
                                <div class="h-28 rounded-lg bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <a href="{{ Storage::url($registration->$field) }}" target="_blank"
                                   class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-indigo-50 text-indigo-700 text-sm font-medium hover:bg-indigo-100 transition-colors group-hover:shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat Dokumen
                                </a>
                            </div>
                        @else
                            <div class="h-28 rounded-lg bg-gray-50 border-2 border-dashed border-gray-200 flex flex-col items-center justify-center gap-2">
                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span class="text-xs text-gray-400">Belum diunggah</span>
                            </div>
                        @endif
                    </div>

                    @if($registration->$field)
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        {{-- Tindakan Verifikasi — FULL WIDTH di bawah dokumen --}}
        <div class="space-y-4">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Tindakan Verifikasi
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Accept Form --}}
                <form action="{{ route('admin.verifikasi.verify', $registration) }}" method="POST"
                      class="bg-white rounded-xl border border-emerald-200/60 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    @csrf
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Terima Berkas</h4>
                                <p class="text-xs text-gray-500">Verifikasi dan setujui dokumen</p>
                            </div>
                        </div>

                        <textarea name="catatan" rows="4"
                                  class="w-full rounded-lg border-gray-200 bg-gray-50/50 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all resize-none"
                                  placeholder="Catatan opsional untuk pendaftar..."></textarea>
                    </div>
                    <div class="px-6 py-4 bg-emerald-50/50 border-t border-emerald-100">
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-emerald-200 active:scale-[0.98]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Verifikasi & Terima
                        </button>
                    </div>
                </form>

                {{-- Reject Form --}}
                <form action="{{ route('admin.verifikasi.reject', $registration) }}" method="POST"
                      class="bg-white rounded-xl border border-rose-200/60 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    @csrf
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Tolak Berkas</h4>
                                <p class="text-xs text-gray-500">Berikan alasan penolakan</p>
                            </div>
                        </div>

                        <textarea name="catatan" rows="4" required
                                  class="w-full rounded-lg border-gray-200 bg-gray-50/50 text-sm focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all resize-none"
                                  placeholder="Jelaskan alasan penolakan dengan jelas..."></textarea>
                    </div>
                    <div class="px-6 py-4 bg-rose-50/50 border-t border-rose-100">
                        <button type="submit"
                                class="w-full flex items-center justify-center gap-2 bg-rose-600 hover:bg-rose-700 text-white font-medium py-2.5 rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-rose-200 active:scale-[0.98]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            Tolak & Beri Catatan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Verification History --}}
        @php
            $riwayat = \App\Models\VerifikasiBerkas::where('registration_id', $registration->id)->with('admin')->latest()->get();
        @endphp

        @if($riwayat->count())
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200/60 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Riwayat Verifikasi
                </h3>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($riwayat as $rv)
                <div class="p-6 hover:bg-gray-50/50 transition-colors duration-200">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full {{ $rv->status == 'verified' ? 'bg-emerald-100' : 'bg-rose-100' }} flex items-center justify-center">
                                @if($rv->status == 'verified')
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-semibold text-sm {{ $rv->status == 'verified' ? 'text-emerald-700' : 'text-rose-700' }}">
                                        {{ $rv->status == 'verified' ? 'Diverifikasi' : 'Ditolak' }}
                                    </span>
                                    <span class="text-xs text-gray-400">•</span>
                                    <span class="text-xs text-gray-500">Oleh {{ $rv->admin->name }}</span>
                                </div>
                                @if($rv->catatan)
                                    <p class="text-sm text-gray-600 mt-1 leading-relaxed">{{ $rv->catatan }}</p>
                                @endif
                            </div>
                        </div>
                        <time class="flex-shrink-0 text-xs text-gray-400 font-medium bg-gray-100 px-2.5 py-1 rounded-md">
                            {{ $rv->created_at->format('d M Y, H:i') }}
                        </time>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-width]').forEach(el => {
            const v = el.getAttribute('data-width');
            if (v !== null) el.style.width = v + '%';
        });
    });
</script>
@endpush