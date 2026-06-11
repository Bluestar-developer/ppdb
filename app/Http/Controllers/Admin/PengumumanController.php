<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class PengumumanController extends Controller
{
    // Menampilkan daftar pengumuman
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    // Form tambah pengumuman
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    // Simpan pengumuman baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'isi.required' => 'Deskripsi pengumuman wajib diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus berupa JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('pengumuman', 'public');
            $data['gambar'] = $path;
        }

        if ($request->has('is_published')) {
            $data['is_published'] = true;
            $data['published_at'] = Carbon::now();
        } else {
            $data['is_published'] = false;
            $data['published_at'] = null;
        }

        Pengumuman::create($data);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    // Form edit pengumuman
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    // Update pengumuman
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'isi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'judul.required' => 'Judul pengumuman wajib diisi.',
            'isi.required' => 'Deskripsi pengumuman wajib diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'gambar.image' => 'Berkas harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus berupa JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ]);

        $data = $request->except('gambar');
        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar) {
                Storage::disk('public')->delete($pengumuman->gambar);
            }
            $path = $request->file('gambar')->store('pengumuman', 'public');
            $data['gambar'] = $path;
        }

        if ($request->has('is_published')) {
            $data['is_published'] = true;
            if (!$pengumuman->is_published) {
                $data['published_at'] = Carbon::now();
            }
        } else {
            $data['is_published'] = false;
            $data['published_at'] = null;
        }

        $pengumuman->update($data);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    // Hapus pengumuman
    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->gambar) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    // Toggle publish/unpublish
    public function togglePublish(Pengumuman $pengumuman)
    {
        $pengumuman->is_published = !$pengumuman->is_published;
        if ($pengumuman->is_published) {
            $pengumuman->published_at = Carbon::now();
        } else {
            $pengumuman->published_at = null;
        }
        $pengumuman->save();

        $status = $pengumuman->is_published ? 'dipublikasikan' : 'disembunyikan';
        return redirect()->back()->with('success', "Pengumuman berhasil {$status}.");
    }
}