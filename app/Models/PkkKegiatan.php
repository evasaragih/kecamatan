<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkkKegiatan extends Model
{
    use HasFactory;

    protected $table = 'pkk_kegiatans';

    protected $fillable = [
        'judul', 'keterangan', 'foto', 'tanggal_kegiatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kegiatan' => 'date',
        ];
    }
}
