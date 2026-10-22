<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'slug', 'nama_lurah', 'alamat_kantor',
        'jumlah_penduduk', 'luas_wilayah_km2', 'deskripsi', 'foto',
    ];

    public function dasawismas()
    {
        return $this->hasMany(Dasawisma::class);
    }
}
