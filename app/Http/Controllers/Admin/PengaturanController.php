<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    // Menampilkan halaman pengaturan website
    public function index()
    {
        $pengaturan = [];
        $keys = [
            'nama_sekolah', 'logo', 'favicon', 'banner_home', 'banner_2', 'warna_tema',
            'info_ppdb', 'alamat', 'kontak', 'email', 'whatsapp',
            'instagram', 'facebook', 'youtube', 'sejarah', 'visi', 'misi', 'tujuan', 'jam_operasional', 'website'
        ];
        
        foreach ($keys as $key) {
            $pengaturan[$key] = Pengaturan::where('key', $key)->value('value');
        }
        
        return view('admin.pengaturan.index', compact('pengaturan'));
    }

    // Update pengaturan website
    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'info_ppdb'    => 'nullable|string',
            'alamat'       => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'email'        => 'nullable|email|max:100',
            'whatsapp'     => 'nullable|string|max:20',
            'website'      => 'nullable|url|max:255',
            'instagram'    => 'nullable|url|max:255',
            'facebook'     => 'nullable|url|max:255',
            'youtube'      => 'nullable|url|max:255',
            'sejarah'      => 'nullable|string',
            'visi'         => 'nullable|string',
            'misi'         => 'nullable|string',
            'tujuan'       => 'nullable|string',
            'jam_operasional' => 'nullable|string',
            // Gunakan array syntax agar '|' di dalam regex tidak dianggap pemisah rule
            'warna_tema'   => ['nullable', 'string', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'favicon'      => 'nullable|image|mimes:ico,png,jpg|max:1024',
            'banner_home'  => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'banner_2'     => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Format logo harus berupa JPG, JPEG, atau PNG.',
            'logo.max' => 'Ukuran logo tidak boleh lebih dari 2 MB.',
            'favicon.image' => 'Favicon harus berupa gambar.',
            'favicon.mimes' => 'Format favicon harus berupa ICO, PNG, atau JPG.',
            'favicon.max' => 'Ukuran favicon tidak boleh lebih dari 1 MB.',
            'banner_home.image' => 'Banner beranda harus berupa gambar.',
            'banner_home.mimes' => 'Format banner beranda harus berupa JPG, JPEG, atau PNG.',
            'banner_home.max' => 'Ukuran banner beranda tidak boleh lebih dari 3 MB.',
            'banner_2.image' => 'Banner 2 harus berupa gambar.',
            'banner_2.mimes' => 'Format banner 2 harus berupa JPG, JPEG, atau PNG.',
            'banner_2.max' => 'Ukuran banner 2 tidak boleh lebih dari 3 MB.',
            'warna_tema.regex' => 'Format warna tema harus berupa kode HEX yang valid (contoh: #2563eb).',
        ]);


        // Update atau buat data text
        $textFields = [
            'nama_sekolah', 'info_ppdb', 'alamat', 'kontak', 'email', 'whatsapp', 'website',
            'instagram', 'facebook', 'youtube', 'sejarah', 'visi', 'misi', 'tujuan', 'jam_operasional', 'warna_tema'
        ];
        
        foreach ($textFields as $field) {
            Pengaturan::updateOrCreate(
                ['key' => $field],
                ['value' => $request->$field]
            );
        }

        // Upload logo
        if ($request->hasFile('logo')) {
            $oldLogo = Pengaturan::where('key', 'logo')->value('value');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            $path = $request->file('logo')->store('pengaturan', 'public');
            Pengaturan::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        // Upload favicon
        if ($request->hasFile('favicon')) {
            $oldFavicon = Pengaturan::where('key', 'favicon')->value('value');
            if ($oldFavicon && Storage::disk('public')->exists($oldFavicon)) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $path = $request->file('favicon')->store('pengaturan', 'public');
            Pengaturan::updateOrCreate(['key' => 'favicon'], ['value' => $path]);
        }

        // Upload banner home
        if ($request->hasFile('banner_home')) {
            $oldBanner = Pengaturan::where('key', 'banner_home')->value('value');
            if ($oldBanner && Storage::disk('public')->exists($oldBanner)) {
                Storage::disk('public')->delete($oldBanner);
            }
            $path = $request->file('banner_home')->store('pengaturan', 'public');
            Pengaturan::updateOrCreate(['key' => 'banner_home'], ['value' => $path]);
        }

        // Upload banner 2
        if ($request->hasFile('banner_2')) {
            $oldBanner2 = Pengaturan::where('key', 'banner_2')->value('value');
            if ($oldBanner2 && Storage::disk('public')->exists($oldBanner2)) {
                Storage::disk('public')->delete($oldBanner2);
            }
            $path = $request->file('banner_2')->store('pengaturan', 'public');
            Pengaturan::updateOrCreate(['key' => 'banner_2'], ['value' => $path]);
        }

        return redirect()->route('admin.pengaturan.index')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}