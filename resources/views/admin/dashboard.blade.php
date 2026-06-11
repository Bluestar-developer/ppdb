@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @php
        /** @var array $labels */
        /** @var array $totalData */
        /** @var array $approvedData */
        /** @var array $rejectedData */
        /** @var int $totalPendaftar */
        /** @var int $totalDiterima */
        /** @var int $totalDitolak */

        $labels = $months ?? ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        $totalData = $counts ?? array_fill(0, 12, 0);
        $approvedData = $approvedCounts ?? array_fill(0, 12, 0);
        $rejectedData = $rejectedCounts ?? array_fill(0, 12, 0);
        $totalPendaftar = $totalPendaftar ?? 0;
        $totalDiterima = $totalDiterima ?? 0;
        $totalDitolak = $totalDitolak ?? 0;
    @endphp
    <div class="min-h-screen bg-[#f8fafc] relative overflow-hidden">

        <!-- Ambient Background -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 space-y-6 pb-12">

            <!-- Welcome Banner -->
            <div
                class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-700 p-6 md:p-8 text-white shadow-2xl shadow-blue-900/20 group reveal">
                <div class="absolute inset-0 opacity-10"
                    style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;">
                </div>
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-blue-400/20 rounded-full blur-2xl animate-pulse"
                    style="animation-delay: 1s;"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="space-y-1">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm border border-white/20 text-xs font-semibold tracking-wide uppercase">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            Admin Panel
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Selamat Datang, {{ Auth::user()->name }}!
                            👋</h1>
                        <p class="text-blue-100/80 text-sm md:text-base max-w-xl">Pantau perkembangan PPDB
                            {{ $pengaturan['nama_sekolah'] ?? 'SMK ICB Cinta Teknika' }} secara real-time.
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="hidden md:block text-right">
                            <div class="text-2xl font-bold" id="liveClock">00:00</div>
                            <div class="text-xs text-blue-200" id="liveDate">Loading...</div>
                        </div>
                        <div
                            class="w-12 h-12 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center shadow-lg">
                            <i class="fas fa-chalkboard-user text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard JSON data for JS (avoids Blade in inline JS) -->
            <script id="dashboard-data" type="application/json">
                {!! json_encode([
                    'labels' => $labels,
                    'totalData' => $totalData,
                    'approvedData' => $approvedData,
                    'rejectedData' => $rejectedData,
                    'totalPendaftar' => $totalPendaftar,
                    'totalDiterima' => $totalDiterima,
                    'totalDitolak' => $totalDitolak,
                ], JSON_PRETTY_PRINT) !!}
            </script>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $stats = [
                        ['label' => 'Total Pendaftar', 'value' => $totalPendaftar ?? 0, 'icon' => 'fa-user-graduate', 'color' => 'blue', 'trend' => '+12%'],
                        ['label' => 'Diterima', 'value' => $totalDiterima ?? 0, 'icon' => 'fa-check-circle', 'color' => 'emerald', 'trend' => '+8%'],
                        ['label' => 'Ditolak', 'value' => $totalDitolak ?? 0, 'icon' => 'fa-times-circle', 'color' => 'rose', 'trend' => '-2%'],
                        ['label' => 'Total Jurusan', 'value' => $totalJurusan ?? 0, 'icon' => 'fa-book-open', 'color' => 'violet', 'trend' => '0%'],
                    ];
                @endphp

                @foreach($stats as $i => $stat)
                    <div class="stat-card-3d reveal reveal-delay-{{ $i + 1 }}" data-tilt>
                        <div
                            class="relative bg-white rounded-2xl p-5 border border-gray-100/80 shadow-lg shadow-gray-200/50 overflow-hidden group hover:shadow-xl hover:shadow-{{ $stat['color'] }}-500/10 transition-all duration-500 h-full">
                            <div
                                class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-400 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                            </div>
                            <div
                                class="absolute -top-10 -right-10 w-32 h-32 bg-{{ $stat['color'] }}-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="space-y-1">
                                        <p class="text-gray-500 text-xs font-semibold uppercase tracking-wider">
                                            {{ $stat['label'] }}
                                        </p>
                                        <p class="text-2xl font-black text-gray-800 tracking-tight counter-stat"
                                            data-target="{{ $stat['value'] }}">0</p>
                                    </div>
                                    <div
                                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-{{ $stat['color'] }}-50 to-{{ $stat['color'] }}-100 flex items-center justify-center shadow-sm group-hover:scale-110 transition-all duration-300">
                                        <i class="fas {{ $stat['icon'] }} text-{{ $stat['color'] }}-600"></i>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-md bg-{{ $stat['color'] }}-50 text-{{ $stat['color'] }}-700 text-xs font-bold">
                                        {{ $stat['trend'] }}
                                    </span>
                                    <span class="text-xs text-gray-400">vs bulan lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- CHART & STATUS DONUT -->
            <div class="grid lg:grid-cols-3 gap-6 items-stretch">
                
                <!-- Bar Chart Kiri (Height Compact) -->
                <div class="lg:col-span-2 reveal">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:shadow-blue-900/5 transition-all duration-500 h-full flex flex-col">
                        <div class="p-5 md:p-6 border-b border-gray-50 flex flex-wrap justify-between items-center gap-3">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Statistik Pendaftaran {{ date('Y') }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">Perbandingan per bulan</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-2 text-xs font-semibold text-gray-600">
                                    <span class="w-4 h-4 rounded-sm bg-blue-500 inline-block mr-1"></span> Total
                                </span>
                                <span class="flex items-center gap-2 text-xs font-semibold text-gray-600">
                                    <span class="w-4 h-4 rounded-sm bg-emerald-500 inline-block mr-1"></span> Diterima
                                </span>
                                <span class="flex items-center gap-2 text-xs font-semibold text-gray-600">
                                    <span class="w-4 h-4 rounded-sm bg-rose-500 inline-block mr-1"></span> Ditolak
                                </span>
                                <span class="flex items-center gap-2 text-xs font-semibold text-gray-600">
                                    <span class="w-4 h-4 rounded-sm bg-amber-500 inline-block mr-1"></span> Pending
                                </span>
                            </div>
                        </div>
                        <div class="p-5 md:p-6 flex-1 min-h-0">
                            <div class="relative h-full w-full min-h-[16rem] flex items-center">
                                <canvas id="dashboardChart" class="w-full"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Donut Chart Status Kanan -->
                <div class="reveal reveal-delay-2">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:shadow-violet-900/5 transition-all duration-500 h-full flex flex-col">
                        <div class="p-5 md:p-6 border-b border-gray-50">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center text-white shadow-lg shadow-violet-500/20">
                                    <i class="fas fa-chart-pie text-xs"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-900">Status Pendaftaran</h3>
                                    <p class="text-xs text-gray-500">Ringkasan keseluruhan</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 flex-1 flex items-center justify-center min-h-0">
                            <div class="relative h-52 w-52 flex-shrink-0">
                                <canvas id="statusDonut"></canvas>
                            </div>
                        </div>
                        
                        <div class="px-6 pb-6 space-y-3">
                            <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center gap-2.5">
                                        <span class="w-3 h-3 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/30 inline-block"></span>
                                        <span class="text-sm font-medium text-gray-600">Diterima</span>
                                    </div>
                                <span class="text-sm font-bold text-gray-900">{{ $totalDiterima ?? 0 }}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-3 h-3 rounded-full bg-rose-500 shadow-sm shadow-rose-500/30 inline-block"></span>
                                    <span class="text-sm font-medium text-gray-600">Ditolak</span>
                                </div>
                                <span class="text-sm font-bold text-gray-900">{{ $totalDitolak ?? 0 }}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center gap-2.5">
                                    <span class="w-3 h-3 rounded-full bg-amber-500 shadow-sm shadow-amber-500/30 inline-block"></span>
                                    <span class="text-sm font-medium text-gray-600">Pending</span>
                                </div>
                                <span class="text-sm font-bold text-gray-900">{{ ($totalPendaftar ?? 0) - ($totalDiterima ?? 0) - ($totalDitolak ?? 0) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PENDAFTAR TERBARU -->
            <div class="reveal">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-500">
                    <div class="px-6 py-5 border-b border-gray-50 flex flex-wrap justify-between items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                                <i class="fas fa-list-ul text-xs"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-900">Pendaftar Terbaru</h3>
                                <p class="text-xs text-gray-500">{{ count($pendaftarTerbaru ?? []) }} pendaftar terakhir</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.pendaftar.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 hover:bg-blue-50 text-sm font-semibold text-gray-600 hover:text-blue-600 transition-all duration-300 group">
                            Lihat Semua
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50/80 border-b border-gray-100">
                                    <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">No Pendaftaran</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Jurusan</th>
                                    <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($pendaftarTerbaru ?? [] as $p)
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
                                                    <div class="text-[11px] text-gray-400">{{ $p->email ?? 'email@example.com' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3.5">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors">
                                                {{ $p->major_choice }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3.5">
                                            @if($p->status == 'pending')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                                    Pending
                                                </span>
                                            @elseif($p->status == 'approved')
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    Diterima
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                                    Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-3.5 text-center">
                                            <a href="{{ route('admin.pendaftar.show', $p) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-50 text-gray-500 hover:bg-blue-500 hover:text-white hover:shadow-lg hover:shadow-blue-500/25 transition-all duration-300" title="Detail">
                                                <i class="fas fa-eye text-xs"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                                <i class="fas fa-inbox text-2xl text-gray-300"></i>
                                            </div>
                                            <p class="text-gray-500 font-medium text-sm">Belum ada pendaftar</p>
                                            <p class="text-gray-400 text-xs mt-1">Data akan muncul setelah ada pendaftaran masuk</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(count($pendaftarTerbaru ?? []) > 0)
                        <div class="px-6 py-3 border-t border-gray-50 bg-gray-50/30 flex justify-between items-center">
                            <span class="text-xs text-gray-500">Menampilkan {{ count($pendaftarTerbaru ?? []) }} data terbaru</span>
                            <div class="flex gap-1">
                                <button class="w-7 h-7 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:border-gray-300 transition text-xs">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="w-7 h-7 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-gray-600 hover:border-gray-300 transition text-xs">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @php
        $labels = $months ?? ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        $totalData = $counts ?? array_fill(0, 12, 0);
        $approvedData = $approvedCounts ?? array_fill(0, 12, 0);
        $rejectedData = $rejectedCounts ?? array_fill(0, 12, 0);
    @endphp

    @push('styles')
        <style>
            /* 3D Card Effect */
            .stat-card-3d {
                perspective: 1000px;
                transform-style: preserve-3d;
            }
            .stat-card-3d > div {
                transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.4s ease;
                transform-style: preserve-3d;
            }
            .stat-card-3d:hover > div {
                transform: translateY(-4px) rotateX(2deg) rotateY(2deg);
            }

            /* Scroll Reveal */
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
            .reveal-delay-3 { transition-delay: 0.3s; }
            .reveal-delay-4 { transition-delay: 0.4s; }

            /* Custom Scrollbar for Jurusan Card */
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #e2e8f0;
                border-radius: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #cbd5e1;
            }

            /* Table Row Hover */
            tbody tr {
                transition: all 0.2s ease;
            }
            tbody tr:hover {
                transform: scale(1.002);
            }

            /* Progress Bar */
            .progress-bar-fill {
                transition: width 1.2s cubic-bezier(0.23, 1, 0.32, 1);
            }

            /* Global Scrollbar */
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Chart
                const ctx = document.getElementById('dashboardChart').getContext('2d');
                // Bar Chart
                const gradBlue = ctx.createLinearGradient(0, 0, 0, 256);
                gradBlue.addColorStop(0, '#3b82f6');
                gradBlue.addColorStop(1, '#60a5fa');

                const gradEmerald = ctx.createLinearGradient(0, 0, 0, 256);
                gradEmerald.addColorStop(0, '#10b981');
                gradEmerald.addColorStop(1, '#34d399');

                const gradRose = ctx.createLinearGradient(0, 0, 0, 256);
                gradRose.addColorStop(0, '#f43f5e');
                gradRose.addColorStop(1, '#fb7185');

                const gradAmber = ctx.createLinearGradient(0, 0, 0, 256);
                gradAmber.addColorStop(0, '#f59e0b');
                gradAmber.addColorStop(1, '#fbbf24');

                // Read data from the JSON script tag
                const raw = document.getElementById('dashboard-data')?.textContent || '{}';
                const dashboardData = JSON.parse(raw);
                const labels = dashboardData.labels || [];
                const totalData = dashboardData.totalData || [];
                const approvedData = dashboardData.approvedData || [];
                const rejectedData = dashboardData.rejectedData || [];

                const pendingData = totalData.map((v, idx) => {
                    const a = (approvedData[idx] || 0);
                    const r = (rejectedData[idx] || 0);
                    return Math.max(0, v - a - r);
                });

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            { 
                                label: 'Total', 
                                data: totalData, 
                                backgroundColor: gradBlue,
                                borderColor: '#3b82f6',
                                borderWidth: 0,
                                borderRadius: 6,
                                borderSkipped: false,
                                barPercentage: 0.6,
                                categoryPercentage: 0.8,
                                hoverBackgroundColor: '#2563eb'
                            },
                            { 
                                label: 'Diterima', 
                                data: approvedData, 
                                backgroundColor: gradEmerald,
                                borderColor: '#10b981',
                                borderWidth: 0,
                                borderRadius: 6,
                                borderSkipped: false,
                                barPercentage: 0.6,
                                categoryPercentage: 0.8,
                                hoverBackgroundColor: '#059669'
                            },
                            { 
                                label: 'Ditolak', 
                                data: rejectedData, 
                                backgroundColor: gradRose,
                                borderColor: '#f43f5e',
                                borderWidth: 0,
                                borderRadius: 6,
                                borderSkipped: false,
                                barPercentage: 0.6,
                                categoryPercentage: 0.8,
                                hoverBackgroundColor: '#e11d48'
                            }
                            ,{
                                label: 'Pending',
                                data: pendingData,
                                backgroundColor: gradAmber,
                                borderColor: '#f59e0b',
                                borderWidth: 0,
                                borderRadius: 6,
                                borderSkipped: false,
                                barPercentage: 0.6,
                                categoryPercentage: 0.8,
                                hoverBackgroundColor: '#d97706'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: { 
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                                titleColor: '#f8fafc',
                                bodyColor: '#f8fafc',
                                padding: 12,
                                cornerRadius: 10,
                                displayColors: true,
                                usePointStyle: true,
                                pointStyle: 'rectRounded',
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y + ' pendaftar';
                                    }
                                }
                            }
                        },
                        scales: { 
                            y: { 
                                beginAtZero: true, 
                                grid: { color: '#f1f5f9', drawBorder: false, borderDash: [4, 4] },
                                ticks: { color: '#94a3b8', font: { size: 11, family: "'Plus Jakarta Sans', sans-serif" }, padding: 8 },
                                border: { display: false }
                            }, 
                            x: { 
                                grid: { display: false },
                                ticks: { color: '#64748b', font: { size: 11, family: "'Plus Jakarta Sans', sans-serif", weight: '600' }, padding: 8 },
                                border: { display: false }
                            } 
                        },
                        animation: {
                            duration: 1500,
                            easing: 'easeOutQuart'
                        }
                    }
                });

                // Donut Chart Status
                const donutCtx = document.getElementById('statusDonut').getContext('2d');
                const totalPendaftar = dashboardData.totalPendaftar || 0;
                const diterima = dashboardData.totalDiterima || 0;
                const ditolak = dashboardData.totalDitolak || 0;
                const pending = totalPendaftar - diterima - ditolak;

                new Chart(donutCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Diterima', 'Ditolak', 'Pending'],
                        datasets: [{
                            data: [diterima, ditolak, pending],
                            backgroundColor: ['#10b981', '#f43f5e', '#f59e0b'],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        cutout: '72%',
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(15,23,42,0.9)', padding: 10, cornerRadius: 10,
                                callbacks: {
                                    label: function(context) {
                                        const pct = totalPendaftar > 0 ? Math.round((context.parsed / totalPendaftar) * 100) : 0;
                                        return context.label + ': ' + context.parsed + ' (' + pct + '%)';
                                    }
                                }
                            }
                        },
                        animation: { animateRotate: true, duration: 1500, easing: 'easeOutQuart' }
                    },
                    plugins: [{
                        id: 'centerText',
                        beforeDraw: function(chart) {
                            const {width, height, ctx} = chart;
                            ctx.restore();
                            ctx.font = 'bold 1.6em "Plus Jakarta Sans", sans-serif';
                            ctx.textBaseline = 'middle';
                            ctx.fillStyle = '#0f172a';
                            const text = totalPendaftar.toString();
                            const textX = Math.round((width - ctx.measureText(text).width) / 2);
                            ctx.fillText(text, textX, height / 2 - 8);
                            
                            ctx.font = '500 0.85em "Plus Jakarta Sans", sans-serif';
                            ctx.fillStyle = '#64748b';
                            const sub = 'Total';
                            const subX = Math.round((width - ctx.measureText(sub).width) / 2);
                            ctx.fillText(sub, subX, height / 2 + 14);
                            ctx.save();
                        }
                    }]
                });

                // Scroll Reveal
                const revealElements = document.querySelectorAll('.reveal');
                const revealObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -20px 0px' });
                revealElements.forEach(el => revealObserver.observe(el));

                // Counter Animation
                const counters = document.querySelectorAll('.counter-stat');
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const counter = entry.target;
                            const target = parseInt(counter.getAttribute('data-target'));
                            const duration = 1500;
                            const startTime = performance.now();

                            const updateCounter = (currentTime) => {
                                const elapsed = currentTime - startTime;
                                const progress = Math.min(elapsed / duration, 1);
                                const easeOut = 1 - Math.pow(1 - progress, 3);
                                counter.textContent = Math.floor(easeOut * target).toLocaleString();
                                if (progress < 1) requestAnimationFrame(updateCounter);
                                else counter.textContent = target.toLocaleString();
                            };
                            requestAnimationFrame(updateCounter);
                            counterObserver.unobserve(counter);
                        }
                    });
                }, { threshold: 0.5 });
                counters.forEach(counter => counterObserver.observe(counter));

                // Progress Bar Animation
                const progressBars = document.querySelectorAll('.progress-bar-fill');
                const progressObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const bar = entry.target;
                            setTimeout(() => { bar.style.width = bar.getAttribute('data-width'); }, 300);
                            progressObserver.unobserve(bar);
                        }
                    });
                }, { threshold: 0.5 });
                progressBars.forEach(bar => progressObserver.observe(bar));

                // 3D Tilt
                const tiltCards = document.querySelectorAll('[data-tilt]');
                tiltCards.forEach(card => {
                    card.addEventListener('mousemove', (e) => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;
                        const rotateX = ((y - centerY) / centerY) * -5;
                        const rotateY = ((x - centerX) / centerX) * 5;
                        card.querySelector('div').style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
                    });
                    card.addEventListener('mouseleave', () => {
                        card.querySelector('div').style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
                    });
                });

                // Live Clock
                function updateClock() {
                    const now = new Date();
                    const clockEl = document.getElementById('liveClock');
                    const dateEl = document.getElementById('liveDate');
                    if (clockEl) clockEl.textContent = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                    if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                }
                updateClock();
                setInterval(updateClock, 1000);
            });
        </script>
    @endpush
@endsection