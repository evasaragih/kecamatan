<?php

namespace Database\Seeders;

use App\Models\PkkKegiatan;
use App\Models\PkkPengurus;
use App\Models\PkkProfil;
use App\Models\PkkProgram;
use Illuminate\Database\Seeder;

class PkkSeeder extends Seeder
{
    public function run(): void
    {
        PkkProfil::firstOrCreate([], [
            'nama_ketua' => 'Ny. Hj. Rosdiana',
            'sambutan' => "Assalamu'alaikum warahmatullahi wabarakatuh.\n\nPKK (Pemberdayaan Kesejahteraan Keluarga) Kecamatan Lubuk Kilangan adalah gerakan masyarakat yang tumbuh dari, oleh, dan untuk keluarga guna mewujudkan keluarga yang sehat, sejahtera, maju, dan mandiri. Melalui 10 Program Pokok PKK, kami bersama seluruh kader dan Dasawisma di tingkat kelurahan dan RT terus bergerak mendampingi keluarga-keluarga di wilayah Lubuk Kilangan.\n\nKami mengajak seluruh warga untuk turut berpartisipasi aktif dalam setiap kegiatan PKK demi terwujudnya keluarga yang berkualitas.",
            'visi' => 'Terwujudnya keluarga yang sehat, sejahtera, maju, mandiri, dan berkeadilan gender dengan berlandaskan iman dan takwa kepada Tuhan Yang Maha Esa.',
            'misi' => "1. Meningkatkan kualitas iman dan takwa serta akhlak mulia dalam kehidupan keluarga.\n2. Meningkatkan pendidikan dan keterampilan keluarga.\n3. Meningkatkan derajat kesehatan dan gizi keluarga melalui posyandu dan kader kesehatan.\n4. Meningkatkan ekonomi keluarga melalui Usaha Peningkatan Pendapatan Keluarga (UP2K).\n5. Meningkatkan kelestarian lingkungan hidup dan perencanaan sehat.",
        ]);

        $pengurus = [
            ['nama' => 'Ny. Hj. Rosdiana', 'jabatan' => 'Ketua TP PKK Kecamatan', 'urutan' => 1],
            ['nama' => 'Ny. Hj. Mardiana Yusuf', 'jabatan' => 'Wakil Ketua TP PKK Kecamatan', 'urutan' => 2],
            ['nama' => 'Ny. Suryani', 'jabatan' => 'Sekretaris', 'urutan' => 3],
            ['nama' => 'Ny. Elviana', 'jabatan' => 'Bendahara', 'urutan' => 4],
            ['nama' => 'Ny. Nurbaiti', 'jabatan' => 'Ketua Pokja I - Penghayatan & Pengamalan Pancasila', 'urutan' => 5],
            ['nama' => 'Ny. Yusnidar', 'jabatan' => 'Ketua Pokja II - Pendidikan & Keterampilan', 'urutan' => 6],
            ['nama' => 'Ny. Hasnah', 'jabatan' => 'Ketua Pokja III - Pangan, Sandang & Perumahan', 'urutan' => 7],
            ['nama' => 'Ny. Ratna Sari', 'jabatan' => 'Ketua Pokja IV - Kesehatan & Lingkungan', 'urutan' => 8],
        ];

        foreach ($pengurus as $item) {
            PkkPengurus::firstOrCreate(
                ['nama' => $item['nama'], 'jabatan' => $item['jabatan']],
                ['urutan' => $item['urutan']]
            );
        }

        $programs = [
            ['judul' => 'Penghayatan dan Pengamalan Pancasila', 'icon' => 'fa-solid fa-hands-praying'],
            ['judul' => 'Gotong Royong', 'icon' => 'fa-solid fa-people-carry-box'],
            ['judul' => 'Pangan', 'icon' => 'fa-solid fa-wheat-awn'],
            ['judul' => 'Sandang', 'icon' => 'fa-solid fa-shirt'],
            ['judul' => 'Perumahan dan Tata Laksana Rumah Tangga', 'icon' => 'fa-solid fa-house-chimney'],
            ['judul' => 'Pendidikan dan Keterampilan', 'icon' => 'fa-solid fa-graduation-cap'],
            ['judul' => 'Kesehatan', 'icon' => 'fa-solid fa-heart-pulse'],
            ['judul' => 'Pengembangan Kehidupan Berkoperasi', 'icon' => 'fa-solid fa-handshake'],
            ['judul' => 'Kelestarian Lingkungan Hidup', 'icon' => 'fa-solid fa-leaf'],
            ['judul' => 'Perencanaan Sehat', 'icon' => 'fa-solid fa-clipboard-check'],
        ];

        foreach ($programs as $i => $item) {
            PkkProgram::firstOrCreate(
                ['judul' => $item['judul']],
                [
                    'deskripsi' => 'Salah satu dari 10 Program Pokok PKK yang dilaksanakan secara berjenjang mulai dari tingkat kecamatan, kelurahan, hingga Dasawisma.',
                    'icon' => $item['icon'],
                    'urutan' => $i + 1,
                ]
            );
        }

        $kegiatans = [
            [
                'judul' => 'Posyandu Balita dan Lansia',
                'keterangan' => 'Kegiatan rutin bulanan pemeriksaan kesehatan, penimbangan, dan pemberian vitamin bagi balita serta lansia di setiap kelurahan.',
                'tanggal_kegiatan' => now()->subDays(20)->toDateString(),
            ],
            [
                'judul' => 'Pelatihan UP2K Kader PKK',
                'keterangan' => 'Pelatihan keterampilan usaha peningkatan pendapatan keluarga bagi kader PKK dan anggota Dasawisma.',
                'tanggal_kegiatan' => now()->subDays(45)->toDateString(),
            ],
            [
                'judul' => 'Gotong Royong Kebersihan Lingkungan',
                'keterangan' => 'Aksi gotong royong bersama warga dan kader PKK dalam rangka menjaga kebersihan dan kelestarian lingkungan.',
                'tanggal_kegiatan' => now()->subDays(60)->toDateString(),
            ],
        ];

        foreach ($kegiatans as $item) {
            PkkKegiatan::firstOrCreate(['judul' => $item['judul']], $item);
        }
    }
}
