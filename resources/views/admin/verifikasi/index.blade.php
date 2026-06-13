@extends('layouts.admin')

@section('title', 'Verifikasi Berkas')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 space-y-6 pb-12">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                    Manajemen
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Verifikasi Berkas</h1>
                <p class="text-gray-500 text-sm mt-1">Periksa dan verifikasi kelengkapan dokumen pendaftar</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="inline-flex items-center gap-2 text-xs text-gray-400 bg-white px-4 py-2 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Total: <span class="font-bold text-gray-700">{{ $pendaftar->total() ?? 0 }}</span> perlu verifikasi</span>
                </div>
            </div>
        </div>

        <!-- Filter Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 reveal reveal-delay-1">
            <form method="GET" action="{{ route('admin.verifikasi.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pencarian</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                            placeholder="Nama atau No Pendaftaran...">
                    </div>
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status Verifikasi</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                        </div>
                        <select name="status_berkas"
                            class="w-full pl-10 pr-10 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none appearance-none cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status_berkas') == 'pending' ? 'selected' : '' }}>Belum Verifikasi</option>
                            <option value="verified" {{ request('status_berkas') == 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="rejected" {{ request('status_berkas') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <div class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 flex gap-3">
                    <button type="submit" class="btn-premium flex-1 justify-center">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filter
                    </button>
                    <a href="{{ route('admin.verifikasi.index') }}" class="btn-outline-premium flex-1 justify-center">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Tabel Verifikasi -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">No Pendaftaran</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Jurusan</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status Verifikasi</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($pendaftar as $p)
                        <tr class="group hover:bg-indigo-50/30 transition-all duration-200">
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                    </div>
                                    <span class="font-mono text-xs font-semibold text-gray-700">{{ $p->registration_number }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-indigo-700 font-bold text-xs">
                                        {{ strtoupper(substr($p->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $p->full_name }}</div>
                                        <div class="text-[11px] text-gray-400">{{ $p->nik ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold group-hover:bg-indigo-50 group-hover:text-indigo-700 transition-colors">
                                    {{ $p->major_choice }}
                                </span>
                            </td>
                            <td class="px-6 py-3.5">
                                @if($p->berkas_verified)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Terverifikasi
                                    </span>
                                @elseif($p->berkas_verified === false && $p->catatan_verifikasi)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Ditolak
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Belum Verifikasi
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('admin.verifikasi.show', $p) }}"
                                       class="inline-flex items-center gap-1.5 bg-indigo-50 hover:bg-indigo-500 text-indigo-700 hover:text-white px-3 py-2 rounded-xl text-xs font-bold transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/25 border border-indigo-100 hover:border-indigo-500">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Lihat Berkas
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">Tidak ada pendaftar</p>
                                <p class="text-gray-400 text-xs mt-1">Belum ada data yang perlu diverifikasi</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-gray-500">Menampilkan {{ $pendaftar->firstItem() ?? 0 }} - {{ $pendaftar->lastItem() ?? 0 }} dari {{ $pendaftar->total() ?? 0 }} data</span>
                <div class="flex items-center gap-2">
                    {{ $pendaftar->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@push('styles')
<style>
    /* Premium Buttons */
    .btn-premium {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 0.875rem;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 14px 0 rgba(79, 70, 229, 0.25);
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-premium:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 25px 0 rgba(79, 70, 229, 0.35);
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    .btn-premium:active {
        transform: translateY(0) scale(0.98);
    }

    .btn-outline-premium {
        background: transparent;
        color: #475569;
        border: 1.5px solid #e2e8f0;
        padding: 0.625rem 1.25rem;
        border-radius: 0.875rem;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-outline-premium:hover {
        border-color: #4f46e5;
        background: rgba(79, 70, 229, 0.05);
        color: #4f46e5;
        transform: translateY(-2px);
    }

    /* Animations */
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

    /* Custom Scrollbar */
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

    /* Table Row */
    tbody tr {
        transition: all 0.2s ease;
    }
    tbody tr:hover {
        transform: scale(1.002);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll Reveal
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
</script>
@endpush
@endsection