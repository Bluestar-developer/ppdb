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
            'nama_sekolah', 'logo', 'favicon', 'banner_home', 'warna_tema',
            'info_ppdb', 'alamat', 'kontak', 'email', 'whatsapp',
            'instagram', 'facebook', 'youtube', 'sejarah', 'visi', 'misi', 'website'
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
            // Gunakan array syntax agar '|' di dalam regex tidak dianggap pemisah rule
            'warna_tema'   => ['nullable', 'string', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'favicon'      => 'nullable|image|mimes:ico,png,jpg|max:1024',
            'banner_home'  => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);


        // Update atau buat data text
        $textFields = [
            'nama_sekolah', 'info_ppdb', 'alamat', 'kontak', 'email', 'whatsapp', 'website',
            'instagram', 'facebook', 'youtube', 'sejarah', 'visi', 'misi', 'warna_tema'
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

        return redirect()->route('admin.pengaturan.index')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}