<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'kategori', 'ringkasan', 'isi',
        'foto', 'user_id', 'tanggal_publish', 'is_published', 'dilihat',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_publish' => 'datetime',
            'is_published' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('tanggal_publish', '<=', now());
    }
}
