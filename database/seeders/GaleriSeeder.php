<?php

namespace Database\Seeders;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $data = [
            ['judul' => 'Pelepasan Peserta Jambore KSB Kota Padang dari FKSB Kecamatan', 'keterangan' => 'Dokumentasi pelepasan peserta Jambore KSB Kota Padang dari FKSB Kecamatan Lubuk Kilangan.'],
            ['judul' => 'Press Conference Badan Narkotika Nasional Pusat', 'keterangan' => 'Dokumentasi konferensi pers pengungkapan clandestine lab narkotika di Tarantang.'],
            ['judul' => 'Monitoring Titik Longsor Pasca Hujan Lebat', 'keterangan' => 'Dokumentasi peninjauan titik longsor bersama BPBD Kota Padang.'],
            ['judul' => 'Kunjungan Kerja Wali Kota Padang', 'keterangan' => 'Dokumentasi kegiatan kunjungan kerja di wilayah Kecamatan Lubuk Kilangan.'],
        ];

        foreach ($data as $item) {
            Galeri::create(array_merge($item, [
                'foto' => 'default.jpg',
                'tanggal_kegiatan' => now()->subDays(rand(1, 60)),
                'user_id' => $admin?->id,
            ]));
        }
    }
}
