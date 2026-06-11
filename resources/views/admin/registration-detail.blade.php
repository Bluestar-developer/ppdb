@extends('layouts.admin')

@section('title', 'Detail Pendaftaran')
@section('subtitle', 'Lihat detail lengkap pendaftar dan update status dengan cepat')

@section('content')
<div class="space-y-6">
    <div class="admin-card p-6 admin-card-hover">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Detail Pendaftaran</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $registration->full_name }}</p>
            </div>
            <a href="{{ route('admin.registrations') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-3xl shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="admin-card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Pribadi</h3>
            <div class="grid gap-4">
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">No Pendaftaran</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $registration->registration_number }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Nama Lengkap</p>
                    <p class="text-sm text-gray-700">{{ $registration->full_name }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">NIK</p>
                    <p class="text-sm text-gray-700">{{ $registration->nik }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Tempat, Tanggal Lahir</p>
                    <p class="text-sm text-gray-700">{{ $registration->place_of_birth }}, {{ \Carbon\Carbon::parse($registration->date_of_birth)->format('d/m/Y') }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Alamat</p>
                    <p class="text-sm text-gray-700">{{ $registration->address }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Asal Sekolah</p>
                    <p class="text-sm text-gray-700">{{ $registration->previous_school }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Jurusan Pilihan</p>
                    <p class="text-sm text-gray-700">{{ $registration->major_choice }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-xs uppercase tracking-wider text-gray-500">Status</p>
                    <p>
                        @if($registration->status == 'pending')
                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800">
                        @elseif($registration->status == 'approved')
                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold bg-green-100 text-green-800">
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold bg-red-100 text-red-800">
                        @endif
                                {{ ucfirst($registration->status) }}
                            </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status Pendaftaran</h3>
            <form action="{{ route('admin.registration.status', $registration) }}" method="POST" class="space-y-5">
                @csrf
                @method('PATCH')
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" required class="input-field mt-2">
                        <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $registration->status == 'approved' ? 'selected' : '' }}>Diterima</option>
                        <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div>
                    <label for="admin_note" class="block text-sm font-medium text-gray-700">Catatan (opsional)</label>
                    <textarea name="admin_note" id="admin_note" rows="4" class="input-field mt-2">{{ $registration->admin_note }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full justify-center">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection