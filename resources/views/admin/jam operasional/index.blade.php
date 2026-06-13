@extends('layouts.admin')

@section('title', 'Jam Operasional PPDB')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                    Master Data
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Jam Operasional PPDB</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola jam operasional pelayanan Penerimaan Peserta Didik Baru</p>
            </div>
            <a href="{{ route('admin.jam_operasional.create') }}" class="btn-premium inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jam Operasional
            </a>
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 reveal reveal-delay-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Jadwal</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jamOperasional->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Hari Ini</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jamOperasional->where('hari', now()->locale('id')->dayName)->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Jam/Hari</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jamOperasional->count() > 0 ? round($jamOperasional->count() / 7, 1) : 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Jam Operasional -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Hari</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Jam Mulai</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Jam Selesai</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Durasi</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($jamOperasional as $jam)
                        @php
                            $jamMulai = \Carbon\Carbon::parse($jam->jam_mulai);
                            $jamSelesai = \Carbon\Carbon::parse($jam->jam_selesai);
                            $durasi = $jamMulai->diffInHours($jamSelesai);
                            $isToday = $jam->tanggal && \Carbon\Carbon::parse($jam->tanggal)->isToday();
                        @endphp
                        <tr class="group hover:bg-blue-50/30 transition-all duration-200">
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                                        {{ strtoupper(substr($jam->hari, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="text-sm font-semibold text-gray-900">{{ $jam->hari }}</span>
                                        @if($isToday)
                                            <span class="ml-2 inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700">Hari Ini</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium text-gray-600">
                                        {{ $jam->tanggal ? \Carbon\Carbon::parse($jam->tanggal)->format('d M Y') : '-' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ substr($jam->jam_mulai, 0, 5) }}
                                </span>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 border border-indigo-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ substr($jam->jam_selesai, 0, 5) }}
                                </span>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-16 bg-gray-100 rounded-full h-1.5">
                                        <div class="bg-emerald-500 h-1.5 rounded-full" data-width="{{ min(($durasi / 12) * 100, 100) }}"></div>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-600">{{ $durasi }}j</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.jam_operasional.edit', $jam->id) }}"
                                       class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 flex items-center justify-center border border-amber-100 hover:border-amber-500"
                                       title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.jam_operasional.destroy', $jam->id) }}" method="POST" class="inline" id="deleteForm-{{ $jam->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button"
                                                onclick="openDeleteModal(document.getElementById('deleteForm-{{ $jam->id }}'), '{{ $jam->hari }}')"
                                                class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white hover:shadow-lg hover:shadow-rose-500/25 transition-all duration-300 flex items-center justify-center border border-rose-100 hover:border-rose-500"
                                                title="Hapus">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">Belum ada data jam operasional</p>
                                <p class="text-gray-400 text-xs mt-1">Klik "Tambah Jam Operasional" untuk memulai</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($jamOperasional->hasPages())
            <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-gray-500">Menampilkan {{ $jamOperasional->firstItem() ?? 0 }} - {{ $jamOperasional->lastItem() ?? 0 }} dari {{ $jamOperasional->total() ?? 0 }} data</span>
                <div class="flex items-center gap-2">
                    {{ $jamOperasional->appends(request()->query())->links() }}
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

{{-- Modal Konfirmasi Hapus --}}
<div id="deleteModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md opacity-0 scale-95" id="modalPanel">
                <div class="bg-rose-50 px-6 py-8 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-2xl bg-white shadow-lg shadow-rose-200 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900" id="modal-title">Hapus Jam Operasional</h3>
                </div>
                <div class="px-6 py-6">
                    <p class="text-sm text-gray-600 text-center leading-relaxed">
                        Apakah Anda yakin ingin menghapus jam operasional <span id="deleteItemName" class="font-semibold text-gray-900"></span>? 
                        Tindakan ini tidak dapat dibatalkan.
                    </p>
                    <div class="mt-4 p-3 rounded-xl bg-amber-50 border border-amber-100 flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <p class="text-xs text-amber-700 font-medium">Jam operasional yang dihapus tidak akan muncul di informasi publik.</p>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50/50 flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 inline-flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-700 hover:text-gray-900 hover:border-gray-300 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 hover:shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </button>
                    <button type="button" id="confirmDeleteBtn" class="flex-1 inline-flex items-center justify-center gap-2 bg-rose-600 hover:bg-rose-700 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 hover:shadow-lg hover:shadow-rose-200 active:scale-[0.98]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Ya, Hapus
                    </button>
                </div>
            </div>
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

        // Apply widths for progress bars using data-width to avoid inline CSS with Blade
        document.querySelectorAll('[data-width]').forEach(el => {
            const val = el.getAttribute('data-width');
            if (val !== null && val !== '') {
                el.style.width = val + '%';
            }
        });
    });

    let deleteForm = null;

    function openDeleteModal(form, itemName) {
        deleteForm = form;
        document.getElementById('deleteItemName').textContent = itemName || 'ini';
        
        const modal = document.getElementById('deleteModal');
        const backdrop = document.getElementById('modalBackdrop');
        const panel = document.getElementById('modalPanel');
        
        modal.classList.remove('hidden');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            panel.classList.remove('opacity-0', 'scale-95');
            panel.classList.add('opacity-100', 'scale-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        const backdrop = document.getElementById('modalBackdrop');
        const panel = document.getElementById('modalPanel');
        
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'scale-100');
        panel.classList.add('opacity-0', 'scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            deleteForm = null;
        }, 300);
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteForm) {
            deleteForm.submit();
        }
    });

    document.getElementById('modalBackdrop').addEventListener('click', closeDeleteModal);
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('deleteModal').classList.contains('hidden')) {
            closeDeleteModal();
        }
    });
</script>
@endpush
@endsection