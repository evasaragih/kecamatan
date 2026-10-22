<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelurahanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Kelurahan Bandar Buat',
                'nama_lurah' => 'Drs. H. Yusrizal',
                'alamat_kantor' => 'Jl. Raya Indarung, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 15320,
                'luas_wilayah_km2' => 4,
                'deskripsi' => 'Kelurahan Bandar Buat merupakan salah satu kelurahan di Kecamatan Lubuk Kilangan yang menjadi pusat aktivitas ekonomi dan perdagangan warga.',
            ],
            [
                'nama' => 'Kelurahan Indarung',
                'nama_lurah' => 'Hj. Nurma Yunita, S.Sos',
                'alamat_kantor' => 'Jl. Raya Indarung No. 12, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 9870,
                'luas_wilayah_km2' => 6,
                'deskripsi' => 'Kelurahan Indarung dikenal sebagai kawasan industri karena keberadaan pabrik semen dan menjadi salah satu penyumbang pendapatan daerah.',
            ],
            [
                'nama' => 'Kelurahan Koto Lalang',
                'nama_lurah' => 'Ahmad Fauzi, S.STP',
                'alamat_kantor' => 'Jl. Koto Lalang, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 6210,
                'luas_wilayah_km2' => 5,
                'deskripsi' => 'Kelurahan Koto Lalang memiliki potensi wisata alam dan pertanian yang menjadi mata pencaharian sebagian besar warganya.',
            ],
            [
                'nama' => 'Kelurahan Padang Besi',
                'nama_lurah' => 'Rina Marlina, S.E',
                'alamat_kantor' => 'Jl. Padang Besi, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 7430,
                'luas_wilayah_km2' => 3,
                'deskripsi' => 'Kelurahan Padang Besi berbatasan langsung dengan Kabupaten Solok dan berperan sebagai pintu gerbang selatan Kota Padang.',
            ],
            [
                'nama' => 'Kelurahan Baringin',
                'nama_lurah' => 'Deni Kurniawan, S.Sos',
                'alamat_kantor' => 'Jl. Baringin, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 5120,
                'luas_wilayah_km2' => 4,
                'deskripsi' => 'Kelurahan Baringin merupakan kawasan permukiman yang terus berkembang dengan dukungan infrastruktur jalan yang memadai.',
            ],
            [
                'nama' => 'Kelurahan Batu Gadang',
                'nama_lurah' => 'Yulia Ningsih, S.Pd',
                'alamat_kantor' => 'Jl. Batu Gadang, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 4890,
                'luas_wilayah_km2' => 5,
                'deskripsi' => 'Kelurahan Batu Gadang memiliki bentang alam perbukitan dan menjadi kawasan penyangga hijau Kota Padang.',
            ],
            [
                'nama' => 'Kelurahan Tarantang',
                'nama_lurah' => 'Muhammad Rizki, S.STP',
                'alamat_kantor' => 'Jl. Tarantang, Kec. Lubuk Kilangan, Kota Padang',
                'jumlah_penduduk' => 3980,
                'luas_wilayah_km2' => 7,
                'deskripsi' => 'Kelurahan Tarantang dikenal dengan potensi wisata alam air terjun dan perkebunan warga.',
            ],
        ];

        foreach ($data as $item) {
            Kelurahan::create(array_merge($item, [
                'slug' => Str::slug($item['nama']),
            ]));
        }
    }
}
