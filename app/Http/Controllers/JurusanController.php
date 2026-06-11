<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Show detail page for a jurusan identified by its kode.
     */
    public function show($kode)
    {
        $jurusan = Jurusan::where('kode', $kode)->firstOrFail();
        return view('jurusan.show', compact('jurusan'));
    }
}
?>
