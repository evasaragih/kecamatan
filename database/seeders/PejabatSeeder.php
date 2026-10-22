<?php

namespace Database\Seeders;

use App\Models\Pejabat;
use Illuminate\Database\Seeder;

class PejabatSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Nurul Widya Siska Usman, S.H., M.Si',
                'jabatan' => 'Camat',
                'deskripsi' => 'Memimpin penyelenggaraan pemerintahan, pembangunan, dan pelayanan masyarakat di Kecamatan Lubuk Kilangan.',
                'urutan' => 1,
            ],
            [
                'nama' => 'Ahmad Zaki, S.STP',
                'jabatan' => 'Sekretaris Kecamatan',
                'deskripsi' => 'Berkomitmen dalam memberikan pelayanan prima dan inovasi untuk kemajuan masyarakat Lubuk Kilangan.',
                'urutan' => 2,
            ],
            [
                'nama' => 'Drs. H. Yusrizal',
                'jabatan' => 'Kepala Seksi Pemerintahan',
                'deskripsi' => 'Menangani urusan administrasi pemerintahan dan kependudukan di tingkat kecamatan.',
                'urutan' => 3,
            ],
            [
                'nama' => 'Hj. Nurma Yunita, S.Sos',
                'jabatan' => 'Kepala Seksi Kesejahteraan Sosial',
                'deskripsi' => 'Mengkoordinasikan program kesejahteraan sosial dan pemberdayaan masyarakat.',
                'urutan' => 4,
            ],
        ];

        foreach ($data as $item) {
            Pejabat::create(array_merge($item, ['foto' => null]));
        }
    }
}
