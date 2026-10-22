<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dasawisma extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelurahan_id', 'nama', 'slug', 'nama_ketua', 'wilayah',
        'jumlah_kk', 'jumlah_anggota', 'kegiatan', 'deskripsi', 'foto',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
