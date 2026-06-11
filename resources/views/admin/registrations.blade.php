@extends('layouts.admin')

@section('title', 'Manajemen Pendaftar')
@section('subtitle', 'Kelola semua data pendaftar dan ekspor data dengan cepat')

@section('content')
<div class="space-y-8">
    <div class="admin-card p-6 admin-card-hover">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Daftar Pendaftar</h2>
                <p class="text-sm text-gray-500 mt-1">Pantau status pendaftar dan kelola data dengan mudah.</p>
            </div>
            <a href="{{ route('admin.export.csv') }}" class="btn-primary">
                <i class="fas fa-file-csv"></i> Export CSV
            </a>
        </div>
    </div>

    <div class="table-card admin-card-hover">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No Pendaftaran</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jurusan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tgl Daftar</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($registrations as $reg)
                    <tr class="transition duration-200 hover:bg-blue-50/50 hover:shadow-inner">
                        <td class="px-6 py-4 text-sm font-mono text-gray-700">{{ $reg->registration_number }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $reg->full_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->nik }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->major_choice }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($reg->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold shadow-sm bg-yellow-100 text-yellow-800">
                            @elseif($reg->status == 'approved')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold shadow-sm bg-green-100 text-green-800">
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold shadow-sm bg-red-100 text-red-800">
                            @endif
                                {{ ucfirst($reg->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $reg->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.registration.show', $reg) }}" class="inline-flex items-center justify-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">Detail</a>
                            <form action="{{ route('admin.registration.destroy', $reg) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:bg-red-100">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center text-gray-400">
                            <i class="fas fa-inbox text-5xl mb-3 block"></i>
                            Belum ada pendaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            {{ $registrations->links() }}
        </div>
    </div>
</div>
@endsection