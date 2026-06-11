@extends('layouts.app')

@section('title', 'Formulir Pendaftaran')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-slate-100 to-white">
    
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-16 left-1/2 -translate-x-1/2 w-[720px] h-[720px] bg-gradient-to-r from-sky-400/10 via-indigo-300/10 to-emerald-400/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-8 right-12 w-[340px] h-[340px] bg-white/40 ring-1 ring-slate-200 rounded-full blur-2xl"></div>
        <div class="absolute inset-x-0 top-0 h-24 bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.12),transparent_55%)]"></div>
    </div>

    <div class="relative z-10 max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">
        
        <!-- Header -->
        <div class="mb-8 text-center reveal">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                PPDB 2025/2026
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">Formulir Pendaftaran</h1>
            <p class="text-gray-500 mt-2">Lengkapi data dengan benar sesuai dokumen asli.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden reveal">
            
            <!-- Form Header -->
            <div class="px-6 md:px-10 py-5 border-b border-slate-200 bg-slate-50/80 backdrop-blur-sm flex flex-col gap-4 sm:flex-row items-start sm:items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-3xl bg-gradient-to-br from-sky-500 to-indigo-600 flex items-center justify-center text-white shadow-2xl shadow-sky-500/20">
                        <i class="fas fa-user-edit text-base"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900">Data Calon Siswa</h2>
                        <p class="text-sm text-slate-500">Isi semua field yang bertanda <span class="text-rose-500">*</span></p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center justify-between gap-4 rounded-[2rem] bg-slate-950/95 border border-slate-800/70 px-4 py-3 shadow-2xl shadow-slate-950/10">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-2xl bg-sky-500/15 ring-1 ring-sky-500/20 flex items-center justify-center text-sky-300">
                            <i class="fas fa-chart-line text-sm"></i>
                        </div>
                        <div class="space-y-0.5">
                            <p class="text-[11px] uppercase tracking-[0.32em] text-slate-400">Data Insight</p>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-semibold text-white">94%</span>
                                <span class="text-xs text-slate-500">valid</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-1 items-end">
                        <span class="block h-2.5 rounded-full bg-gradient-to-t from-sky-500 to-sky-300"></span>
                        <span class="block h-4 rounded-full bg-gradient-to-t from-indigo-500 to-indigo-300"></span>
                        <span class="block h-3 rounded-full bg-gradient-to-t from-emerald-500 to-emerald-300"></span>
                        <span class="block h-5 rounded-full bg-gradient-to-t from-cyan-500 to-cyan-300"></span>
                    </div>
                </div>
            </div>

            <form action="{{ auth()->check() ? route('student.store.register') : route('student.register.store') }}" method="POST" class="p-6 md:p-10" id="registrationForm">
                @csrf

                @if ($errors->any())
                <div class="mb-8 bg-rose-50 border border-rose-200 rounded-2xl p-4 flex items-start gap-3 animate-shake">
                    <div class="w-8 h-8 rounded-full bg-rose-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <i class="fas fa-exclamation-circle text-rose-500 text-sm"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-rose-800 mb-1">Terdapat {{ $errors->count() }} kesalahan</h4>
                        <ul class="text-sm text-rose-700 space-y-0.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- DATA PRIBADI -->
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center"><i class="fas fa-id-card text-xs"></i></div>
                        <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Data Pribadi</h3>
                        <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5">
                        <!-- Nama -->
                        <div class="lg:col-span-2 form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-user"></i></div>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="Nama sesuai ijazah" required>
                            </div>
                        </div>

                        <!-- NISN -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">NISN <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-hashtag"></i></div>
                                <input type="text" name="nisn" value="{{ old('nisn') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-mono"
                                    placeholder="10 digit angka" maxlength="10" inputmode="numeric" required>
                            </div>
                            <p class="mt-1 text-[11px] text-gray-400 flex items-center gap-1"><i class="fas fa-info-circle text-blue-400 text-[10px]"></i> NISN harus 10 digit angka</p>
                        </div>

                        <!-- NIK -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">NIK <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-id-badge"></i></div>
                                <input type="text" name="nik" value="{{ old('nik') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none font-mono"
                                    placeholder="16 digit angka" maxlength="16" inputmode="numeric" required>
                            </div>
                            <p class="mt-1 text-[11px] text-gray-400 flex items-center gap-1"><i class="fas fa-info-circle text-blue-400 text-[10px]"></i> NIK harus 16 digit angka sesuai KTP/KK</p>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tempat Lahir <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-map-marker-alt"></i></div>
                                <input type="text" name="place_of_birth" value="{{ old('place_of_birth') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="Kota/Kabupaten" required>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Lahir <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-calendar-alt"></i></div>
                                <input type="text" name="date_of_birth" id="datePicker" value="{{ old('date_of_birth') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="Pilih tanggal" required readonly>
                            </div>
                        </div>

                        <!-- Jenis Kelamin CUSTOM -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jenis Kelamin <span class="text-rose-500">*</span></label>
                            <div class="relative custom-dropdown-wrapper" id="genderWrapper">
                                                <button type="button" class="custom-dropdown-trigger w-full flex items-center gap-3 px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm hover:bg-white transition-all text-left focus:outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10" data-target="genderDropdown">
                                    <span class="trigger-icon text-slate-400 w-5 text-center"><i class="fas fa-venus-mars"></i></span>
                                    <span class="trigger-text text-slate-500 flex-1">Pilih Jenis Kelamin</span>
                                    <i class="fas fa-chevron-down text-xs text-slate-400 transition-transform duration-200 arrow-icon"></i>
                                </button>
                                <div class="custom-dropdown-menu hidden absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5" id="genderDropdown">
                                    <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all" data-value="L" data-icon="fa-mars" data-label="Laki-laki">
                                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500 text-sm"><i class="fas fa-mars"></i></div>
                                        <div class="flex-1"><div class="text-sm font-semibold text-gray-800">Laki-laki</div></div>
                                        <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                    </div>
                                    <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all" data-value="P" data-icon="fa-venus" data-label="Perempuan">
                                        <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center text-pink-500 text-sm"><i class="fas fa-venus"></i></div>
                                        <div class="flex-1"><div class="text-sm font-semibold text-gray-800">Perempuan</div></div>
                                        <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                    </div>
                                </div>
                                <input type="hidden" name="gender" id="genderInput" value="{{ old('gender') }}">
                            </div>
                        </div>

                        <!-- Agama CUSTOM -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Agama <span class="text-rose-500">*</span></label>
                            <div class="relative custom-dropdown-wrapper" id="religionWrapper">
                                <button type="button" class="custom-dropdown-trigger w-full flex items-center gap-3 px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm hover:bg-white transition-all text-left focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" data-target="religionDropdown">
                                    <span class="trigger-icon text-gray-400 w-5 text-center"><i class="fas fa-pray"></i></span>
                                    <span class="trigger-text text-gray-500 flex-1">Pilih Agama</span>
                                    <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200 arrow-icon"></i>
                                </button>
                                <div class="custom-dropdown-menu hidden absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5 max-h-60 overflow-y-auto" id="religionDropdown">
                                    @php $religions = ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu']; @endphp
                                    @foreach($religions as $rel)
                                    <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all" data-value="{{ $rel }}" data-icon="fa-place-of-worship" data-label="{{ $rel }}">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 text-sm"><i class="fas fa-place-of-worship"></i></div>
                                        <div class="flex-1"><div class="text-sm font-semibold text-gray-800">{{ $rel }}</div></div>
                                        <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="religion" id="religionInput" value="{{ old('religion') }}">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2 lg:col-span-3 form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-3 text-gray-400 pointer-events-none"><i class="fas fa-home"></i></div>
                                <textarea name="address" rows="2" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none"
                                    placeholder="Jl. Nama Jalan No. RT/RW, Kelurahan, Kecamatan, Kota/Kab" required>{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KONTAK & SEKOLAH -->
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center"><i class="fas fa-school text-xs"></i></div>
                        <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Kontak & Asal Sekolah</h3>
                        <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5">
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">No. HP (WhatsApp) <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-mobile-alt"></i></div>
                                <input type="tel" name="phone" value="{{ old('phone') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="08xxxxxxxxxx" required>
                            </div>
                        </div>

                        <div class="form-group lg:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Asal Sekolah <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-graduation-cap"></i></div>
                                <input type="text" name="previous_school" value="{{ old('previous_school') }}" 
                                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="SMP/MTs asal" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JURUSAN -->
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-7 h-7 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center"><i class="fas fa-book-open text-xs"></i></div>
                        <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Pilihan Jurusan</h3>
                        <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                    </div>

                    @php
                        $iconMap = [
                            'tkj' => 'fa-network-wired', 'rpl' => 'fa-laptop-code',
                            'farmasi' => 'fa-pills', 'keperawatan' => 'fa-user-nurse',
                            'tkr' => 'fa-car', 'tbsm' => 'fa-motorcycle',
                            'tl' => 'fa-bolt', 'tata busana' => 'fa-tshirt',
                            'akuntansi' => 'fa-calculator', 'perkantoran' => 'fa-briefcase',
                            'multimedia' => 'fa-photo-video', 'dkv' => 'fa-palette',
                            'perhotelan' => 'fa-hotel', 'kuliner' => 'fa-utensils',
                            'default' => 'fa-microchip'
                        ];
                    @endphp

                    <div class="max-w-xl">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Jurusan <span class="text-rose-500">*</span></label>
                        
                        <div class="relative custom-dropdown-wrapper" id="majorWrapper">
                            <button type="button" class="custom-dropdown-trigger w-full flex items-center gap-3 px-4 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm hover:bg-white transition-all text-left focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10" data-target="majorDropdown">
                                <span class="trigger-icon text-gray-400 w-5 text-center"><i class="fas fa-award"></i></span>
                                <span class="trigger-text text-gray-500 flex-1">-- Pilih Jurusan --</span>
                                <i class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200 arrow-icon"></i>
                            </button>
                            
                            <div class="custom-dropdown-menu hidden absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-xl z-50 p-1.5 max-h-72 overflow-y-auto" id="majorDropdown">
                                @foreach($jurusan as $j)
                                    @php
                                        $key = strtolower($j->kode);
                                        $name = strtolower($j->nama);
                                        $icon = $iconMap['default'];
                                        foreach($iconMap as $k => $v) {
                                            if(str_contains($key, $k) || str_contains($name, $k)) { $icon = $v; break; }
                                        }
                                    @endphp
                                    <div class="custom-option flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer hover:bg-blue-50 transition-all" 
                                         data-value="{{ $j->kode }}" 
                                         data-icon="{{ $icon }}" 
                                         data-label="{{ $j->nama }} ({{ $j->kode }})">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 text-sm transition-all"><i class="fas {{ $icon }}"></i></div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-semibold text-gray-800 truncate">{{ $j->nama }}</div>
                                            <div class="text-xs text-gray-400">{{ $j->kode }}</div>
                                        </div>
                                        <i class="fas fa-check text-blue-500 text-xs opacity-0 check-icon"></i>
                                    </div>
                                @endforeach
                            </div>
                            
                            <input type="hidden" name="major_choice" id="majorInput" value="{{ old('major_choice') }}">
                        </div>

                        <div id="majorPreview" class="mt-3 hidden">
                            <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-xl bg-gradient-to-r from-violet-50 to-indigo-50 border border-violet-100">
                                <div class="w-9 h-9 rounded-lg bg-white shadow-sm flex items-center justify-center text-violet-600">
                                    <i id="majorPreviewIcon" class="fas fa-microchip"></i>
                                </div>
                                <div>
                                    <div class="text-[10px] text-violet-600 font-bold uppercase tracking-wider">Terpilih</div>
                                    <div id="majorPreviewName" class="text-sm font-bold text-gray-900">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD -->
                @if(!auth()->check())
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center"><i class="fas fa-lock text-xs"></i></div>
                        <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider">Akun & Keamanan</h3>
                        <div class="flex-1 h-px bg-gray-100 ml-2"></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-6 gap-y-5">
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-key"></i></div>
                                <input type="password" name="password" id="password"
                                    class="pwd-field w-full pl-10 pr-11 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="Minimal 8 karakter" minlength="8" required>
                                <button type="button" id="togglePwd" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition w-5 h-5 flex items-center justify-center">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                            </div>
                            <div class="mt-2 flex gap-1.5">
                                <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors duration-300" id="strength-1"></div>
                                <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors duration-300" id="strength-2"></div>
                                <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors duration-300" id="strength-3"></div>
                                <div class="h-1.5 flex-1 rounded-full bg-gray-200 transition-colors duration-300" id="strength-4"></div>
                            </div>
                            <p class="mt-1 text-[11px] text-gray-400" id="strengthText">Masukkan minimal 8 karakter</p>
                        </div>

                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Password <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"><i class="fas fa-key"></i></div>
                                <input type="password" name="password_confirmation" id="passwordConfirm"
                                    class="pwd-field w-full pl-10 pr-11 py-2.5 bg-gray-50/80 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                                    placeholder="Ulangi password" minlength="8" required>
                                <button type="button" id="togglePwdConfirm" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition w-5 h-5 flex items-center justify-center">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                            </div>
                            <p class="mt-1 text-[11px] hidden" id="matchText"></p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Submit -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-100">
                    <p class="text-xs text-gray-400 flex items-center gap-1.5">
                        <i class="fas fa-info-circle text-[10px]"></i>
                        Pastikan data sudah benar sebelum disimpan
                    </p>
                    <div class="flex gap-3">
                        <button type="reset" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-bold text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all">
                            Reset
                        </button>
                        <button type="submit" class="group px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold shadow-lg shadow-blue-500/20 hover:shadow-xl hover:shadow-blue-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center gap-2">
                            <span>Simpan & Lanjutkan</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform text-xs"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* ===== HAPUS ICON EYE BAWAAN BROWSER ===== */
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear { display: none !important; }
    input[type="password"]::-webkit-textfield-decoration-container { display: none !important; }
    input[type="password"]::-webkit-contacts-auto-fill-button,
    input[type="password"]::-webkit-credentials-auto-fill-button { visibility: hidden !important; display: none !important; pointer-events: none !important; position: absolute !important; right: 0 !important; }
    .pwd-field { -webkit-text-security: none !important; }

    /* ===== CUSTOM DROPDOWN STYLES ===== */
    .custom-dropdown-menu {
        animation: dropdownIn 0.2s ease-out;
    }
    @keyframes dropdownIn {
        from { opacity: 0; transform: translateY(-8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .custom-option:hover .w-8 { background: #dbeafe !important; color: #2563eb !important; }
    .custom-option.selected { background: #eff6ff; }
    .custom-option.selected .w-8 { background: #3b82f6 !important; color: white !important; }
    .custom-option.selected .check-icon { opacity: 1 !important; }

    /* ===== FLATPICKR BLUE NAVY THEME ===== */
    .flatpickr-calendar {
        border-radius: 1rem !important;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15) !important;
        border: 1px solid #e2e8f0 !important;
        background: #ffffff !important;
        overflow: hidden !important;
    }
    .flatpickr-months {
        background: #1e3a5f !important;
        padding: 0.75rem 0 !important;
    }
    .flatpickr-month {
        color: #ffffff !important;
        fill: #ffffff !important;
    }
    .flatpickr-current-month {
        font-size: 1rem !important;
        font-weight: 700 !important;
        color: #ffffff !important;
    }
    .flatpickr-current-month input.cur-year {
        font-weight: 700 !important;
        color: #ffffff !important;
    }
    .flatpickr-current-month .numInputWrapper {
        background: rgba(255,255,255,0.1) !important;
        border-radius: 0.5rem !important;
        padding: 0 0.5rem !important;
    }
    .flatpickr-months .flatpickr-prev-month,
    .flatpickr-months .flatpickr-next-month {
        color: #ffffff !important;
        fill: #ffffff !important;
        padding: 0.75rem !important;
    }
    .flatpickr-months .flatpickr-prev-month:hover,
    .flatpickr-months .flatpickr-next-month:hover {
        color: #60a5fa !important;
        fill: #60a5fa !important;
    }
    .flatpickr-weekdays {
        background: #f8fafc !important;
        border-bottom: 1px solid #f1f5f9 !important;
    }
    .flatpickr-weekday {
        color: #1e3a5f !important;
        font-weight: 700 !important;
        font-size: 0.75rem !important;
    }
    .flatpickr-days {
        background: #ffffff !important;
    }
    .flatpickr-day {
        color: #334155 !important;
        border-radius: 0.75rem !important;
        font-weight: 500 !important;
        transition: all 0.15s ease !important;
    }
    .flatpickr-day:hover {
        background: #eff6ff !important;
        color: #1e3a5f !important;
        border-color: transparent !important;
    }
    .flatpickr-day.today {
        border: 2px solid #1e3a5f !important;
        color: #1e3a5f !important;
        font-weight: 700 !important;
        background: transparent !important;
    }
    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange,
    .flatpickr-day.selected.inRange,
    .flatpickr-day.startRange.inRange,
    .flatpickr-day.endRange.inRange {
        background: #1e3a5f !important;
        border-color: #1e3a5f !important;
        color: #ffffff !important;
        font-weight: 700 !important;
        box-shadow: 0 4px 12px -2px rgba(30,58,95,0.3) !important;
    }
    .flatpickr-day.selected:hover,
    .flatpickr-day.startRange:hover,
    .flatpickr-day.endRange:hover {
        background: #152a45 !important;
        border-color: #152a45 !important;
    }
    .flatpickr-day.inRange {
        background: #dbeafe !important;
        border-color: #dbeafe !important;
        color: #1e3a5f !important;
    }
    .flatpickr-day.prevMonthDay,
    .flatpickr-day.nextMonthDay {
        color: #cbd5e1 !important;
    }
    .flatpickr-day.disabled {
        color: #e2e8f0 !important;
    }
    .flatpickr-time {
        border-top: 1px solid #f1f5f9 !important;
    }
    .flatpickr-time input {
        color: #1e3a5f !important;
        font-weight: 600 !important;
    }
    .flatpickr-time .flatpickr-time-separator {
        color: #94a3b8 !important;
    }
    .flatpickr-time .flatpickr-am-pm {
        color: #1e3a5f !important;
        font-weight: 600 !important;
    }
    .flatpickr-time .numInputWrapper {
        background: #f8fafc !important;
        border-radius: 0.5rem !important;
    }
    .flatpickr-time .numInputWrapper:hover {
        background: #eff6ff !important;
    }
    .flatpickr-time .arrowUp,
    .flatpickr-time .arrowDown {
        color: #1e3a5f !important;
    }
    .flatpickr-innerContainer {
        background: #ffffff !important;
    }
    .flatpickr-rContainer {
        background: #ffffff !important;
    }
    .flatpickr-day.flatpickr-disabled {
        color: #e2e8f0 !important;
    }
    span.flatpickr-weekday {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    /* ===== ANIMATIONS ===== */
    .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-3px); }
        20%, 40%, 60%, 80% { transform: translateX(3px); }
    }
    .animate-shake { animation: shake 0.4s ease-in-out; }

    /* Focus glow */
    .form-group:focus-within label { color: #2563eb; }
    .form-group:focus-within i.text-gray-400 { color: #2563eb; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Form JS loaded');

        // Scroll Reveal
        document.querySelectorAll('.reveal').forEach(el => {
            new IntersectionObserver((entries, obs) => {
                entries.forEach(e => { 
                    if(e.isIntersecting) { 
                        e.target.classList.add('active'); 
                        obs.unobserve(e.target); 
                    } 
                });
            }, { threshold: 0.1 }).observe(el);
        });

        // Flatpickr - Blue Navy Theme
        flatpickr("#datePicker", {
            locale: "id",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d F Y",
            allowInput: false,
            maxDate: new Date()
        });

        // ========== UNIVERSAL CUSTOM DROPDOWN ==========
        function initCustomDropdown(wrapperId) {
            const wrapper = document.getElementById(wrapperId);
            if(!wrapper) return;

            const trigger = wrapper.querySelector('.custom-dropdown-trigger');
            const menu = wrapper.querySelector('.custom-dropdown-menu');
            const input = wrapper.querySelector('input[type="hidden"]');
            const arrow = trigger.querySelector('.arrow-icon');
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

                    input.value = value;
                    console.log('Selected:', wrapperId, value);

                    triggerText.textContent = label;
                    triggerText.classList.remove('text-gray-500');
                    triggerText.classList.add('text-gray-900', 'font-medium');
                    if(icon) triggerIcon.innerHTML = `<i class="fas ${icon} text-blue-500"></i>`;

                    menu.querySelectorAll('.custom-option').forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');

                    close();
                });
            });

            document.addEventListener('click', function(e) {
                if(!wrapper.contains(e.target)) close();
            });

            // Restore old value
            const oldVal = input.value;
            if(oldVal) {
                const oldOption = menu.querySelector(`[data-value="${oldVal}"]`);
                if(oldOption) oldOption.click();
            }
        }

        // Init all dropdowns
        initCustomDropdown('genderWrapper');
        initCustomDropdown('religionWrapper');
        initCustomDropdown('majorWrapper');

        // Major preview
        const majorInput = document.getElementById('majorInput');
        const majorPreview = document.getElementById('majorPreview');
        const majorPreviewIcon = document.getElementById('majorPreviewIcon');
        const majorPreviewName = document.getElementById('majorPreviewName');
        
        // Override major click to show preview
        const majorMenu = document.getElementById('majorDropdown');
        if(majorMenu) {
            majorMenu.querySelectorAll('.custom-option').forEach(option => {
                option.addEventListener('click', function() {
                    const icon = this.getAttribute('data-icon');
                    const label = this.getAttribute('data-label');
                    majorPreviewIcon.className = `fas ${icon}`;
                    majorPreviewName.textContent = label;
                    majorPreview.classList.remove('hidden');
                });
            });
        }

        // ========== TOGGLE PASSWORD ==========
        function setupToggle(btnId, inputId) {
            const btn = document.getElementById(btnId);
            const input = document.getElementById(inputId);
            if(!btn || !input) return;
            
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                if(input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        }
        setupToggle('togglePwd', 'password');
        setupToggle('togglePwdConfirm', 'passwordConfirm');

        // ========== PASSWORD STRENGTH ==========
        const pwdInput = document.getElementById('password');
        const confirmInput = document.getElementById('passwordConfirm');
        const strengthText = document.getElementById('strengthText');
        const matchText = document.getElementById('matchText');

        if(pwdInput) {
            pwdInput.addEventListener('input', function() {
                const val = this.value;
                const bars = [
                    document.getElementById('strength-1'),
                    document.getElementById('strength-2'),
                    document.getElementById('strength-3'),
                    document.getElementById('strength-4')
                ];

                let score = 0;
                if(val.length >= 8) score++;
                if(/[A-Z]/.test(val)) score++;
                if(/[0-9]/.test(val)) score++;
                if(/[^A-Za-z0-9]/.test(val)) score++;

                const colors = ['bg-gray-200', 'bg-rose-400', 'bg-amber-400', 'bg-blue-500', 'bg-emerald-500'];
                const labels = ['Sangat lemah', 'Lemah', 'Sedang', 'Kuat', 'Sangat kuat'];

                bars.forEach((bar, i) => {
                    if(bar) bar.className = 'h-1.5 flex-1 rounded-full transition-colors duration-300 ' + (i < score ? colors[score] : 'bg-gray-200');
                });

                if(strengthText) {
                    strengthText.textContent = val.length > 0 ? labels[score] : 'Masukkan minimal 8 karakter';
                    strengthText.className = 'mt-1 text-[11px] ' + (score <= 1 ? 'text-rose-500' : score === 2 ? 'text-amber-500' : 'text-emerald-600');
                }

                checkMatch();
            });
        }

        if(confirmInput) {
            confirmInput.addEventListener('input', checkMatch);
        }

        function checkMatch() {
            if(!pwdInput || !confirmInput || !matchText) return;
            if(confirmInput.value.length > 0) {
                matchText.classList.remove('hidden');
                if(pwdInput.value === confirmInput.value) {
                    matchText.innerHTML = '<i class="fas fa-check-circle text-emerald-500 mr-1"></i>Password cocok';
                    matchText.className = 'mt-1 text-[11px] text-emerald-600';
                } else {
                    matchText.innerHTML = '<i class="fas fa-times-circle text-rose-500 mr-1"></i>Password tidak cocok';
                    matchText.className = 'mt-1 text-[11px] text-rose-500';
                }
            } else {
                matchText.classList.add('hidden');
            }
        }

        // ========== NUMERIC ONLY ==========
        const nisnInput = document.querySelector('input[name="nisn"]');
        const nikInput = document.querySelector('input[name="nik"]');
        const phoneInput = document.querySelector('input[name="phone"]');

        if(nisnInput) {
            nisnInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 10);
            });
        }
        if(nikInput) {
            nikInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 16);
            });
        }
        if(phoneInput) {
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 15);
            });
        }
    });
</script>
@endpush