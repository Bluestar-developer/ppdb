<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JamOperasionalPPDB;
use Illuminate\Http\Request;

class JamOperasionalController extends Controller
{
    // Menampilkan daftar jam operasional
    public function index()
    {
        $jamOperasional = JamOperasionalPPDB::orderBy('id', 'asc')->paginate(10);
        return view('admin.jam operasional.index', compact('jamOperasional'));
    }

    // Form tambah jam operasional
    public function create()
    {
        return view('admin.jam operasional.create');
    }

    // Simpan jam operasional baru
    public function store(Request $request)
    {
        $request->validate([
            'hari'        => 'required|string|max:255',
            'tanggal'     => 'nullable|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ], [
            'hari.required'        => 'Hari wajib diisi.',
            'jam_mulai.required'   => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
        ]);

        // Custom validation to ensure jam_mulai < jam_selesai
        if ($request->jam_mulai >= $request->jam_selesai) {
            return back()->withErrors(['jam_selesai' => 'Jam selesai harus setelah jam mulai.'])->withInput();
        }

        JamOperasionalPPDB::create($request->all());

        return redirect()->route('admin.jam_operasional.index')
            ->with('success', 'Jam operasional berhasil ditambahkan.');
    }

    // Form edit jam operasional
    public function edit($id)
    {
        $jam = JamOperasionalPPDB::findOrFail($id);
        return view('admin.jam operasional.edit', compact('jam'));
    }

    // Update jam operasional
    public function update(Request $request, $id)
    {
        $jam = JamOperasionalPPDB::findOrFail($id);

        $request->validate([
            'hari'        => 'required|string|max:255',
            'tanggal'     => 'nullable|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ], [
            'hari.required'        => 'Hari wajib diisi.',
            'jam_mulai.required'   => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
        ]);

        if ($request->jam_mulai >= $request->jam_selesai) {
            return back()->withErrors(['jam_selesai' => 'Jam selesai harus setelah jam mulai.'])->withInput();
        }

        $jam->update($request->all());

        return redirect()->route('admin.jam_operasional.index')
            ->with('success', 'Jam operasional berhasil diperbarui.');
    }

    // Hapus jam operasional
    public function destroy($id)
    {
        $jam = JamOperasionalPPDB::findOrFail($id);
        $jam->delete();

        return redirect()->route('admin.jam_operasional.index')
            ->with('success', 'Jam operasional berhasil dihapus.');
    }
}
