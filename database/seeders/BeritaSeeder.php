<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $data = [
            [
                'judul' => 'BNN Pusat Gelar Press Conference Pengungkapan "Clandestine Lab" Narkotika di Tarantang',
                'kategori' => 'Berita',
                'ringkasan' => 'BNN Pusat menggelar Press Conference Pengungkapan "Clandestine Lab" Narkotika di Kelurahan Tarantang, Kecamatan Lubuk Kilangan.',
                'isi' => '<p>Badan Narkotika Nasional (BNN) Pusat menggelar konferensi pers terkait pengungkapan laboratorium narkotika tersembunyi (clandestine lab) yang berlokasi di wilayah Kelurahan Tarantang, Kecamatan Lubuk Kilangan. Kegiatan ini turut dihadiri oleh unsur muspika kecamatan sebagai bentuk dukungan terhadap penegakan hukum di wilayah setempat.</p>',
                'tanggal_publish' => now()->subDays(13),
                'foto' => 'berita/berita-1.jpg',
            ],
            [
                'judul' => 'Pasca-Hujan Lebat, Camat Lubuk Kilangan Langsung Tinjau Titik Longsor',
                'kategori' => 'Berita',
                'ringkasan' => 'Menindaklanjuti hujan lebat yang mengguyur Kota Padang, Camat Lubuk Kilangan langsung meninjau titik longsor di wilayahnya.',
                'isi' => '<p>Menindaklanjuti hujan lebat yang mengguyur Kota Padang beberapa hari terakhir, Camat Lubuk Kilangan bersama tim BPBD dan unsur terkait langsung meninjau titik-titik yang berpotensi longsor guna memastikan keselamatan warga sekitar.</p>',
                'tanggal_publish' => now()->subDays(16),
                'foto' => 'berita/berita-2.jpg',
            ],
            [
                'judul' => 'Pastikan Keamanan & Aksesibilitas, Camat Lubuk Kilangan Monitoring Pemasangan Jembatan',
                'kategori' => 'Berita',
                'ringkasan' => 'Camat Lubuk Kilangan, Ibu Nurul Widya Siska Usman, memantau langsung proses pemasangan jembatan penghubung antar kelurahan.',
                'isi' => '<p>Camat Lubuk Kilangan, Ibu Nurul Widya Siska Usman, S.H., M.Si, meninjau langsung proses pemasangan jembatan yang menghubungkan dua kelurahan guna memastikan keamanan dan aksesibilitas warga terjaga selama masa pengerjaan.</p>',
                'tanggal_publish' => now()->subDays(27),
                'foto' => 'berita/berita-3.jpg',
            ],
            [
                'judul' => 'Selamat Atas Pelantikan Wali Kota dan Wakil Wali Kota Padang Periode 2025-2030',
                'kategori' => 'Pengumuman',
                'ringkasan' => 'Segenap jajaran Kecamatan Lubuk Kilangan mengucapkan selamat atas pelantikan Wali Kota dan Wakil Wali Kota Padang periode 2025-2030.',
                'isi' => '<p>Segenap jajaran Kecamatan Lubuk Kilangan turut mengucapkan selamat atas pelantikan Wali Kota dan Wakil Wali Kota Padang periode 2025-2030 yang dilaksanakan di Istana Negara, Jakarta.</p>',
                'tanggal_publish' => now()->subDays(45),
                'foto' => 'berita/berita-4.jpg',
            ],
        ];

        foreach ($data as $item) {
            Berita::create(array_merge($item, [
                'slug' => Str::slug($item['judul']).'-'.Str::random(5),
                'user_id' => $admin?->id,
                'is_published' => true,
            ]));
        }
    }
}
