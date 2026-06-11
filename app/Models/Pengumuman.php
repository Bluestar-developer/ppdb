<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman'; // penting: nama tabel benar

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'is_published',
        'published_at',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}