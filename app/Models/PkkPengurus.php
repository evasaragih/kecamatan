<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkkPengurus extends Model
{
    use HasFactory;

    protected $table = 'pkk_pengurus';

    protected $fillable = [
        'nama', 'jabatan', 'deskripsi', 'foto', 'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];
}
