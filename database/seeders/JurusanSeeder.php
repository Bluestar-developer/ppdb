<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $jurusan = [
            ['kode' => 'TSM', 'nama' => 'Teknik Sepeda Motor', 'kuota' => 100],
            ['kode' => 'TKR', 'nama' => 'Teknik Kendaraan Ringan', 'kuota' => 100],
            ['kode' => 'FRM', 'nama' => 'Farmasi', 'kuota' => 100],
            ['kode' => 'KPW', 'nama' => 'Keperawatan', 'kuota' => 100],
            ['kode' => 'RPL', 'nama' => 'Rekayasa Perangkat Lunak', 'kuota' => 120],
            ['kode' => 'TKJ', 'nama' => 'Teknik Komputer Jaringan', 'kuota' => 100],
        ];

        foreach ($jurusan as $j) {
            Jurusan::updateOrCreate(
                ['kode' => $j['kode']],
                ['nama' => $j['nama'], 'kuota' => $j['kuota']]
            );
        }
    }
}