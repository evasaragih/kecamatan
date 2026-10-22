<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkkProgram extends Model
{
    use HasFactory;

    protected $table = 'pkk_programs';

    protected $fillable = [
        'judul', 'deskripsi', 'icon', 'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];
}
