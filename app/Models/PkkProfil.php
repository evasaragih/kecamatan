<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkkProfil extends Model
{
    use HasFactory;

    protected $table = 'pkk_profils';

    protected $fillable = [
        'nama_ketua', 'sambutan', 'visi', 'misi', 'foto',
    ];
}
