@extends('layouts.admin')

@section('title', 'Manajemen Pengumuman')

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
                    Konten
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Manajemen Pengumuman</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola pengumuman untuk siswa dan publik</p>
            </div>
            <a href="{{ route('admin.pengumuman.create') }}" class="btn-premium inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Pengumuman
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 reveal reveal-delay-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pengumuman</p>
                        <p class="text-xl font-bold text-gray-900">{{ $pengumuman->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Dipublikasi</p>
                        <p class="text-xl font-bold text-gray-900">{{ $pengumuman->where('is_published', true)->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Draft</p>
                        <p class="text-xl font-bold text-gray-900">{{ $pengumuman->where('is_published', false)->count() ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Pengumuman -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($pengumuman as $p)
                        <tr class="group hover:bg-blue-50/30 transition-all duration-200">
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                                        {{ strtoupper(substr($p->judul, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="text-sm font-semibold text-gray-900">{{ $p->judul }}</span>
                                        <p class="text-[11px] text-gray-400 mt-0.5">{{ Str::limit($p->isi ?? '-', 50) }}</p>
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
                                    <span class="text-xs font-medium text-gray-600">{{ $p->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                @if($p->is_published)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Dipublikasi
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center justify-center gap-2">
                                    <form action="{{ route('admin.pengumuman.publish', $p) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                                class="w-8 h-8 rounded-lg {{ $p->is_published ? 'bg-blue-50 text-blue-600 hover:bg-blue-500 hover:text-white hover:shadow-blue-500/25' : 'bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white hover:shadow-emerald-500/25' }} hover:shadow-lg transition-all duration-300 flex items-center justify-center border {{ $p->is_published ? 'border-blue-100 hover:border-blue-500' : 'border-emerald-100 hover:border-emerald-500' }}"
                                                title="{{ $p->is_published ? 'Sembunyikan' : 'Publikasikan' }}">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                @if($p->is_published)
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                                @else
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                @endif
                                            </svg>
                                        </button>
                                    </form>
                                    
                                    <a href="{{ route('admin.pengumuman.edit', $p) }}"
                                       class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 flex items-center justify-center border border-amber-100 hover:border-amber-500"
                                       title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST" class="inline" id="deleteForm-{{ $p->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button"
                                                onclick="openDeleteModal(document.getElementById('deleteForm-{{ $p->id }}'), '{{ $p->judul }}')"
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
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">Belum ada pengumuman</p>
                                <p class="text-gray-400 text-xs mt-1">Klik "Tambah Pengumuman" untuk mulai</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($pengumuman->hasPages())
            <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-gray-500">Menampilkan {{ $pengumuman->firstItem() ?? 0 }} - {{ $pengumuman->lastItem() ?? 0 }} dari {{ $pengumuman->total() ?? 0 }} data</span>
                <div class="flex items-center gap-2">
                    {{ $pengumuman->appends(request()->query())->links() }}
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
                    <h3 class="text-lg font-bold text-gray-900" id="modal-title">Hapus Pengumuman</h3>
                </div>
                <div class="px-6 py-6">
                    <p class="text-sm text-gray-600 text-center leading-relaxed">
                        Apakah Anda yakin ingin menghapus pengumuman <span id="deleteItemName" class="font-semibold text-gray-900"></span>? 
                        Tindakan ini tidak dapat dibatalkan.
                    </p>
                    <div class="mt-4 p-3 rounded-xl bg-amber-50 border border-amber-100 flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <p class="text-xs text-amber-700 font-medium">Pengumuman yang sudah dipublikasi akan hilang dari tampilan publik.</p>
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