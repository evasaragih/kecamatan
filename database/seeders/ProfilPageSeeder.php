<?php

namespace Database\Seeders;

use App\Models\ProfilPage;
use Illuminate\Database\Seeder;

class ProfilPageSeeder extends Seeder
{
    public function run(): void
    {
        ProfilPage::create([
            'judul' => 'Sejarah Kecamatan',
            'slug' => 'sejarah',
            'konten' => '<p>Kecamatan Lubuk Kilangan adalah salah satu dari 11 kecamatan di Kota Padang, Provinsi Sumatera Barat, Indonesia. Kecamatan ini terletak di bagian selatan Kota Padang dan berbatasan langsung dengan Kabupaten Solok.</p><p>Silakan ubah konten ini melalui panel admin sesuai data resmi kecamatan.</p>',
        ]);

        ProfilPage::create([
            'judul' => 'Visi dan Misi',
            'slug' => 'visi-misi',
            'konten' => '<h4>Visi</h4><p>Terwujudnya pelayanan publik yang prima, transparan, dan akuntabel di Kecamatan Lubuk Kilangan.</p><h4>Misi</h4><ol><li>Meningkatkan kualitas pelayanan administrasi kepada masyarakat.</li><li>Mendorong partisipasi masyarakat dalam pembangunan kecamatan.</li><li>Mewujudkan tata kelola pemerintahan yang bersih dari gratifikasi.</li></ol>',
        ]);

        ProfilPage::create([
            'judul' => 'Struktur Organisasi',
            'slug' => 'struktur-organisasi',
            'konten' => '<p>Struktur organisasi Kecamatan Lubuk Kilangan terdiri dari Camat, Sekretaris Kecamatan, dan beberapa Kepala Seksi (Kasi) serta Kepala Sub Bagian (Kasubag). Unggah bagan struktur organisasi melalui panel admin.</p>',
        ]);
    }
}
