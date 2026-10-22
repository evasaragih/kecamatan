<?php

namespace Database\Seeders;

use App\Models\KantorPemerintahan;
use Illuminate\Database\Seeder;

class KantorPemerintahanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Kantor Camat Lubuk Kilangan',
                'tipe' => 'camat',
                'alamat' => 'Jl. Raya Indarung, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat',
                'telepon' => '(0751) 779069',
                'email' => 'kecluki@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 1,
            ],
            [
                'nama' => 'Kelurahan Bandar Buat',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Raya Indarung, Bandar Buat, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'bandarbuat@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 2,
            ],
            [
                'nama' => 'Kelurahan Indarung',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Raya Indarung No. 12, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'indarung@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 3,
            ],
            [
                'nama' => 'Kelurahan Koto Lalang',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Koto Lalang, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'kotolalang@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 4,
            ],
            [
                'nama' => 'Kelurahan Padang Besi',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Padang Besi, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'padangbesi@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 5,
            ],
            [
                'nama' => 'Kelurahan Baringin',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Baringin, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'baringin@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 6,
            ],
            [
                'nama' => 'Kelurahan Batu Gadang',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Batu Gadang, RT 03 RW 01, Kecamatan Lubuk Kilangan, Kota Padang, Sumatera Barat',
                'telepon' => '-',
                'email' => 'batugadang@gmail.com',
                'instagram' => '@keclubukkilangan',
                'urutan' => 7,
            ],
            [
                'nama' => 'Kelurahan Tarantang',
                'tipe' => 'kelurahan',
                'alamat' => 'Jl. Tarantang, Kec. Lubuk Kilangan, Kota Padang',
                'telepon' => '-',
                'email' => 'tarantang@padang.go.id',
                'instagram' => '@keclubukkilangan',
                'urutan' => 8,
            ],
        ];

        foreach ($data as $item) {
            KantorPemerintahan::create($item);
        }
    }
}
