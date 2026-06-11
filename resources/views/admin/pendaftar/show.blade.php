@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">
    
    <!-- Ambient Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10 space-y-6 pb-12">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 reveal">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="fas fa-user text-[10px]"></i>
                    Detail
                </div>
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Detail Pendaftar</h1>
                <p class="text-gray-500 text-sm mt-1">Informasi lengkap calon siswa</p>
            </div>
            <a href="{{ route('admin.pendaftar.index') }}" class="btn-premium self-start">
                <i class="fas fa-arrow-left text-xs"></i> Kembali
            </a>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="p-6 md:p-8 border-b border-gray-50 bg-gradient-to-r from-blue-50/50 to-indigo-50/50">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-blue-500/20">
                        {{ strtoupper(substr($pendaftar->full_name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $pendaftar->full_name }}</h2>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="font-mono text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-md">{{ $pendaftar->registration_number }}</span>
                            @if($pendaftar->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                    <span class="w-1 h-1 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                </span>
                            @elseif($pendaftar->status == 'approved')
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                    <span class="w-1 h-1 rounded-full bg-emerald-500"></span> Diterima
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                    <span class="w-1 h-1 rounded-full bg-rose-500"></span> Ditolak
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Data Pribadi + Tanggal Daftar -->
                    <div class="space-y-5">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                                <i class="fas fa-id-card text-xs"></i>
                            </div>
                            <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Data Pribadi</h3>
                            <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 mt-0.5">
                                    <i class="fas fa-id-badge text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">NIK</div>
                                    <div class="text-sm font-bold text-gray-900 font-mono">{{ $pendaftar->nik }}</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 mt-0.5">
                                    <i class="fas fa-birthday-cake text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tempat, Tgl Lahir</div>
                                    <div class="text-sm font-bold text-gray-900">{{ $pendaftar->place_of_birth }}, {{ \Carbon\Carbon::parse($pendaftar->date_of_birth)->translatedFormat('d F Y') }}</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 mt-0.5">
                                    <i class="fas fa-home text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Alamat</div>
                                    <div class="text-sm font-bold text-gray-900 leading-relaxed">{{ $pendaftar->address }}</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 mt-0.5">
                                    <i class="fas fa-graduation-cap text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Asal Sekolah</div>
                                    <div class="text-sm font-bold text-gray-900">{{ $pendaftar->previous_school }}</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 mt-0.5">
                                    <i class="fas fa-book-open text-xs"></i>
                                </div>
                                <div>
                                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Jurusan Pilihan</div>
                                    <div class="text-sm font-bold text-gray-900">{{ $pendaftar->major_choice }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Daftar di bagian bawah Data Pribadi -->
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100 mt-4">
                            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Tanggal Daftar</div>
                            <div class="text-sm font-bold text-gray-900">{{ $pendaftar->created_at->translatedFormat('d F Y') }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $pendaftar->created_at->format('H:i') }} WIB</div>
                        </div>
                    </div>

                    <!-- Berkas & Info + Catatan Admin -->
                    <div class="space-y-5">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-7 h-7 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center">
                                <i class="fas fa-folder-open text-xs"></i>
                            </div>
                            <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Berkas & Informasi</h3>
                            <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                        </div>

                        <div class="space-y-3">
                            @php
                                $fileMap = [
                                    'ijazah' => ['icon' => 'fa-file-lines', 'label' => 'Ijazah'],
                                    'rapor' => ['icon' => 'fa-file-lines', 'label' => 'Rapor'],
                                    'kk' => ['icon' => 'fa-file-lines', 'label' => 'Kartu Keluarga'],
                                    'foto' => ['icon' => 'fa-image', 'label' => 'Pas Foto'],
                                ];
                            @endphp
                            @foreach($fileMap as $file => $meta)
                            <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50/50 border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all duration-300 group">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-white shadow-sm flex items-center justify-center text-gray-400 group-hover:text-blue-500 transition-colors">
                                        <i class="fas {{ $meta['icon'] }} text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-800">{{ $meta['label'] }}</div>
                                        @if($pendaftar->$file)
                                            <div class="text-[10px] text-emerald-600 font-bold flex items-center gap-1">
                                                <i class="fas fa-check-circle"></i> Tersedia
                                            </div>
                                        @else
                                            <div class="text-[10px] text-gray-400 font-medium">Belum diupload</div>
                                        @endif
                                    </div>
                                </div>
                                @if($pendaftar->$file)
                                    <a href="{{ Storage::url($pendaftar->$file) }}" target="_blank" class="w-8 h-8 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-blue-600 hover:border-blue-300 hover:shadow-md transition-all duration-300 flex items-center justify-center">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                @else
                                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-300">
                                        <i class="fas fa-minus text-xs"></i>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <!-- Catatan Admin di bagian bawah Berkas & Info -->
                        <div class="p-4 rounded-xl {{ $pendaftar->admin_note ? 'bg-amber-50 border border-amber-100' : 'bg-gray-50 border border-gray-100' }} mt-4">
                            <div class="text-xs font-semibold {{ $pendaftar->admin_note ? 'text-amber-600' : 'text-gray-400' }} uppercase tracking-wider mb-1">Catatan Admin</div>
                            <div class="text-sm {{ $pendaftar->admin_note ? 'font-medium text-gray-800' : 'text-gray-400 italic' }}">
                                {{ $pendaftar->admin_note ?? 'Belum ada catatan' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Status Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500 reveal">
            <div class="p-6 md:p-8">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-pen-to-square text-xs"></i>
                    </div>
                    <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Update Status Penerimaan</h3>
                    <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                </div>

                <form action="{{ route('admin.pendaftar.updateStatus', $pendaftar) }}" method="POST" class="grid md:grid-cols-12 gap-4 items-end">
                    @csrf
                    @method('PATCH')
                    
                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Status</label>
                        <div class="relative custom-dropdown-wrapper" id="statusWrapper">
                            <button type="button" class="custom-dropdown-trigger w-full flex items-center gap-3 px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm hover:bg-white transition-all text-left focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" data-target="statusDropdown">
                                <span class="trigger-icon text-gray-400 w-5 text-center">
                                    @if($pendaftar->status == 'pending')
                                        <i class="fas fa-clock text-amber-500"></i>
                                    @elseif($pendaftar->status == 'approved')
                                        <i class="fas fa-check text-emerald-500"></i>
                                    @else
                                        <i class="fas fa-times text-rose-500"></i>
                                    @endif
                                </span>
                                <span class="trigger-text text-gray-900 font-medium flex-1">
                                    @if($pendaftar->status == 'pending') Pending (Belum Diputuskan)
                                    @elseif($pendaftar->status == 'approved') Diterima
                                    @else Ditolak
                                    @endif
                                </span>
                                <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200 arrow-icon"></i>
                            </button>
                            
                            <!-- Dropdown ke ATAS -->
                            <div class="custom-dropdown-menu hidden absolute bottom-full left-0 right-0 mb-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5" id="statusDropdown">
                                <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all {{ $pendaftar->status == 'pending' ? 'selected' : '' }}" data-value="pending" data-icon="fa-clock" data-label="Pending (Belum Diputuskan)" data-color="amber">
                                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-500 text-sm"><i class="fas fa-clock"></i></div>
                                    <div class="flex-1"><div class="text-sm font-semibold text-gray-800">Pending (Belum Diputuskan)</div></div>
                                    <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                </div>
                                <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all {{ $pendaftar->status == 'approved' ? 'selected' : '' }}" data-value="approved" data-icon="fa-check" data-label="Diterima" data-color="emerald">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500 text-sm"><i class="fas fa-check"></i></div>
                                    <div class="flex-1"><div class="text-sm font-semibold text-gray-800">Diterima</div></div>
                                    <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                </div>
                                <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all {{ $pendaftar->status == 'rejected' ? 'selected' : '' }}" data-value="rejected" data-icon="fa-times" data-label="Ditolak" data-color="rose">
                                    <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center text-rose-500 text-sm"><i class="fas fa-times"></i></div>
                                    <div class="flex-1"><div class="text-sm font-semibold text-gray-800">Ditolak</div></div>
                                    <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                </div>
                            </div>
                            
                            <input type="hidden" name="status" id="statusInput" value="{{ $pendaftar->status }}">
                        </div>
                    </div>

                    <div class="md:col-span-6">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Catatan (opsional)</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fas fa-comment"></i>
                            </div>
                            <input type="text" name="admin_note" value="{{ $pendaftar->admin_note }}" 
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                placeholder="Alasan diterima/ditolak...">
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <button type="submit" class="btn-premium w-full justify-center">
                            <i class="fas fa-save text-xs"></i> Simpan Status
                        </button>
                    </div>
                </form>
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

    /* Custom Dropdown ke ATAS */
    .custom-dropdown-menu {
        animation: dropdownUp 0.2s ease-out;
    }
    @keyframes dropdownUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .custom-option:hover .w-8 { background: #dbeafe !important; color: #2563eb !important; }
    .custom-option.selected { background: #eff6ff; }
    .custom-option.selected .w-8 { background: #3b82f6 !important; color: white !important; }
    .custom-option.selected .check-icon { opacity: 1 !important; }

    .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
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

        // Custom Dropdown Status - ke ATAS
        const wrapper = document.getElementById('statusWrapper');
        if(wrapper) {
            const trigger = wrapper.querySelector('.custom-dropdown-trigger');
            const menu = wrapper.querySelector('.custom-dropdown-menu');
            const arrow = trigger.querySelector('.arrow-icon');
            const input = document.getElementById('statusInput');
            const triggerText = trigger.querySelector('.trigger-text');
            const triggerIcon = trigger.querySelector('.trigger-icon');

            function open() {
                menu.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
                trigger.classList.add('border-blue-500', 'ring-4', 'ring-blue-500/10');
            }
            function close() {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
                trigger.classList.remove('border-blue-500', 'ring-4', 'ring-blue-500/10');
            }

            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if(menu.classList.contains('hidden')) open(); else close();
            });

            menu.querySelectorAll('.custom-option').forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const value = this.getAttribute('data-value');
                    const icon = this.getAttribute('data-icon');
                    const label = this.getAttribute('data-label');
                    const color = this.getAttribute('data-color');

                    input.value = value;
                    triggerText.textContent = label;
                    triggerIcon.innerHTML = `<i class="fas ${icon} text-${color}-500"></i>`;

                    menu.querySelectorAll('.custom-option').forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');

                    close();
                });
            });

            document.addEventListener('click', function(e) {
                if(!wrapper.contains(e.target)) close();
            });
        }
    });
</script>
@endpush
@endsection