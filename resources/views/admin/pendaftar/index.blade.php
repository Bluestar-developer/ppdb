@extends('layouts.admin')

@section('title', 'Pendaftar')

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
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                    Manajemen
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Data Pendaftar</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola dan verifikasi data pendaftar PPDB</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="ml-auto inline-flex items-center gap-2 text-xs text-gray-400 bg-white px-4 py-2 rounded-xl border border-gray-200 shadow-sm">
                    <i class="fas fa-shield-alt text-emerald-500"></i>
                    <span>Total: <span class="font-bold text-gray-700">{{ $pendaftar->total() ?? 0 }}</span> pendaftar</span>
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
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" 
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                            placeholder="Nama atau No Pendaftaran...">
                    </div>
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status Verifikasi</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-filter"></i>
                        </div>
                        <select name="status_berkas" 
                            class="w-full pl-10 pr-10 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none appearance-none cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status_berkas') == 'pending' ? 'selected' : '' }}>Belum Verifikasi</option>
                            <option value="verified" {{ request('status_berkas') == 'verified' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="rejected" {{ request('status_berkas') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <div class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 flex gap-3">
                    <button type="submit" class="btn-premium flex-1 justify-center">
                        <i class="fas fa-filter text-xs"></i> Filter
                    </button>
                    <a href="{{ route('admin.verifikasi.index') }}" class="btn-outline-premium flex-1 justify-center">
                        <i class="fas fa-rotate-left text-xs"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Tabel Pendaftar -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">No Pendaftaran</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Jurusan</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status Verifikasi</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status PPDB</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($pendaftar as $p)
                        <tr class="group hover:bg-blue-50/30 transition-all duration-200">
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">
                                        <i class="fas fa-hashtag text-[10px]"></i>
                                    </div>
                                    <span class="font-mono text-xs font-semibold text-gray-700">{{ $p->registration_number }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                                        {{ strtoupper(substr($p->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $p->full_name }}</div>
                                        <div class="text-[11px] text-gray-400">{{ $p->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">
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
                                @if($p->status == 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200">
                                        <i class="fas fa-clock text-[10px]"></i> Pending
                                    </span>
                                @elseif($p->status == 'approved')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <i class="fas fa-check text-[10px]"></i> Diterima
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                        <i class="fas fa-times text-[10px]"></i> Ditolak
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.pendaftar.show', $p) }}" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-500 hover:bg-blue-500 hover:text-white hover:shadow-lg hover:shadow-blue-500/25 transition-all duration-300 flex items-center justify-center" title="Detail">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                    
                                    <div class="relative group/dropdown">
                                        <button type="button" class="w-8 h-8 rounded-lg bg-gray-50 text-gray-500 hover:bg-indigo-500 hover:text-white hover:shadow-lg hover:shadow-indigo-500/25 transition-all duration-300 flex items-center justify-center" title="Ubah Status">
                                            <i class="fas fa-pen-to-square text-xs"></i>
                                        </button>
                                        <div class="absolute right-0 top-full mt-2 w-40 bg-white border border-gray-200 rounded-xl shadow-xl z-50 hidden group-hover/dropdown:block p-1.5">
                                            <form action="{{ route('admin.pendaftar.updateStatus', $p) }}" method="POST" class="space-y-1">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="status" value="pending" class="w-full text-left px-3 py-2 rounded-lg text-xs font-semibold text-gray-600 hover:bg-amber-50 hover:text-amber-700 transition flex items-center gap-2">
                                                    <i class="fas fa-clock"></i> Pending
                                                </button>
                                                <button type="submit" name="status" value="approved" class="w-full text-left px-3 py-2 rounded-lg text-xs font-semibold text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition flex items-center gap-2">
                                                    <i class="fas fa-check"></i> Diterima
                                                </button>
                                                <button type="submit" name="status" value="rejected" class="w-full text-left px-3 py-2 rounded-lg text-xs font-semibold text-gray-600 hover:bg-rose-50 hover:text-rose-700 transition flex items-center gap-2">
                                                    <i class="fas fa-times"></i> Ditolak
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-folder-open text-3xl text-gray-300"></i>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">Tidak ada pendaftar</p>
                                <p class="text-gray-400 text-xs mt-1">Data akan muncul setelah ada pendaftaran masuk</p>
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
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        padding: 0.625rem 1.25rem;
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
        border-color: #2563eb;
        background: rgba(37, 99, 235, 0.05);
        color: #2563eb;
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

    /* Dropdown hover */
    .group\/dropdown:hover .group-hover\/dropdown\:block {
        display: block;
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