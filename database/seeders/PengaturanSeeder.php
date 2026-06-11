<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    public function run()
    {
        $defaults = [
            ['key' => 'nama_sekolah', 'value' => 'SMK ICB Cinta Teknika'],
            ['key' => 'logo', 'value' => '/storage/logo.png'],
            ['key' => 'favicon', 'value' => '/storage/favicon.ico'],
            ['key' => 'banner_home', 'value' => '/storage/banner.jpg'],
            ['key' => 'warna_tema', 'value' => '#2563eb'],
            ['key' => 'info_ppdb', 'value' => 'Pendaftaran dibuka 1 April - 30 Juni 2025'],
            ['key' => 'alamat', 'value' => 'Jl. Pendidikan No.123, Bandung'],
            ['key' => 'kontak', 'value' => '(022) 1234567'],
            ['key' => 'email', 'value' => 'info@smkicb.sch.id'],
            ['key' => 'whatsapp', 'value' => '6281234567890'],
            ['key' => 'instagram', 'value' => 'smkicb'],
            ['key' => 'facebook', 'value' => 'smkicb'],
            ['key' => 'youtube', 'value' => 'smkicb'],
            ['key' => 'sejarah', 'value' => 'Berdiri sejak 2010, SMK ICB Cinta Teknika berkomitmen menjadi pusat pendidikan vokasi terdepan di Indonesia. Dengan kurikulum berbasis industri 4.0, kami melahirkan lulusan yang siap kerja, technopreneur, dan berdaya saing global.'],
            ['key' => 'banner_2', 'value' => ''],
        ];
        foreach ($defaults as $data) {
            Pengaturan::updateOrCreate(['key' => $data['key']], $data);
        }
    }
}