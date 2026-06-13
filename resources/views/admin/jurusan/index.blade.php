@extends('layouts.admin')

@section('title', 'Manajemen Jurusan')

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
                    Master Data
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Manajemen Jurusan</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola data jurusan, kuota, dan status penerimaan</p>
            </div>
            <a href="{{ route('admin.jurusan.create') }}" class="btn-premium inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jurusan
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 reveal reveal-delay-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Jurusan</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jurusan->count() ?? 0 }}</p>
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
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Aktif</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jurusan->where('is_active', true)->count() ?? 0 }}</p>
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
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Kuota</p>
                        <p class="text-xl font-bold text-gray-900">{{ $jurusan->sum('kuota') ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Jurusan -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Kode</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Nama Jurusan</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Kuota</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Pendaftar</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($jurusan as $j)
                        <tr class="group hover:bg-blue-50/30 transition-all duration-200">
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                    </div>
                                    <span class="font-mono text-xs font-semibold text-gray-700">{{ $j->kode }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                                        {{ strtoupper(substr($j->nama, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900">{{ $j->nama }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">
                                    {{ $j->kuota }} siswa
                                </span>
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-24 bg-gray-100 rounded-full h-1.5">
                                        <div class="bg-indigo-500 h-1.5 rounded-full transition-all" data-width="{{ $j->kuota > 0 ? min(($j->registrations_count / $j->kuota) * 100, 100) : 0 }}"></div>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-600">{{ $j->registrations_count ?? 0 }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3.5">
                                @if($j->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Tidak Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.jurusan.edit', $j) }}"
                                       class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 flex items-center justify-center border border-amber-100 hover:border-amber-500"
                                       title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.jurusan.destroy', $j) }}" method="POST" class="inline" id="delete-form-{{ $j->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button" data-delete-name="{{ $j->nama }}"
                                            onclick='openDeleteModal(document.getElementById("delete-form-{{ $j->id }}"), this.dataset.deleteName)'
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium text-sm">Belum ada jurusan</p>
                                <p class="text-gray-400 text-xs mt-1">Silakan tambah jurusan baru untuk memulai</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($jurusan->hasPages())
            <div class="px-6 py-4 border-t border-gray-50 bg-gray-50/30 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="text-xs text-gray-500">Menampilkan {{ $jurusan->firstItem() ?? 0 }} - {{ $jurusan->lastItem() ?? 0 }} dari {{ $jurusan->total() ?? 0 }} data</span>
                <div class="flex items-center gap-2">
                    {{ $jurusan->links() }}
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

@push('styles')
<style>
    /* Premium Button */
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

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <div id="modalBackdrop" class="absolute inset-0 bg-black/50 opacity-0 transition-opacity"></div>
    <div id="modalPanel" class="relative bg-white rounded-2xl shadow-lg w-full max-w-lg mx-4 transform transition-all duration-300 opacity-0 scale-95">
        <div class="p-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">Hapus Jurusan</h3>
                    <p class="text-sm text-gray-600 mt-1">Apakah Anda yakin ingin menghapus jurusan <span id="deleteItemName" class="font-medium"></span>? Tindakan ini tidak dapat dibatalkan dan semua data terkait akan terhapus permanen.</p>
                </div>
            </div>

            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-100 rounded-md text-sm text-yellow-700">
                Data pendaftar yang memilih jurusan ini juga akan terpengaruh.
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm font-medium">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="px-4 py-2 bg-rose-600 text-white rounded-lg text-sm font-semibold">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

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

        // Apply dynamic widths from data-width attributes
        document.querySelectorAll('[data-width]').forEach(el => {
            const v = el.getAttribute('data-width');
            if (v !== null) el.style.width = v + '%';
        });

        // Attach modal-related listeners if elements exist
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        const backdrop = document.getElementById('modalBackdrop');
        const deleteModal = document.getElementById('deleteModal');

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                if (window._deleteFormRef) {
                    window._deleteFormRef.submit();
                }
            });
        }

        if (backdrop) backdrop.addEventListener('click', closeDeleteModal);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && deleteModal && !deleteModal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        });
    });

    // Modal Delete Logic
    let deleteForm = null;

    function openDeleteModal(form, itemName) {
        deleteForm = form;
        window._deleteFormRef = form; // fallback reference used by confirm button
        const nameEl = document.getElementById('deleteItemName');
        if (nameEl) nameEl.textContent = itemName || 'ini';

        const modal = document.getElementById('deleteModal');
        const backdrop = document.getElementById('modalBackdrop');
        const panel = document.getElementById('modalPanel');

        if (!modal || !backdrop || !panel) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // small timeout to trigger transitions
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

        if (!modal || !backdrop || !panel) return;

        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'scale-100');
        panel.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            deleteForm = null;
            window._deleteFormRef = null;
        }, 300);
    }
</script>
@endpush
@endsection