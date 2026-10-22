<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorPemerintahan extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'nama', 'tipe', 'alamat', 'telepon', 'email', 'instagram', 'urutan',
    ];

    /**
     * URL embed Google Maps otomatis dari alamat, tanpa perlu API key.
     */
    public function getMapsEmbedUrlAttribute(): string
    {
        return 'https://www.google.com/maps?q='.urlencode($this->alamat).'&output=embed';
    }

    /**
     * URL Google Maps biasa (untuk tombol "Buka di Maps").
     */
    public function getMapsUrlAttribute(): string
    {
        return 'https://www.google.com/maps/search/?api=1&query='.urlencode($this->alamat);
    }
}
