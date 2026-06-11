<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamOperasionalPPDB extends Model
{
    use HasFactory;

    protected $table = 'jam_operasional_ppdb';

    protected $fillable = [
        'hari',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
?>
