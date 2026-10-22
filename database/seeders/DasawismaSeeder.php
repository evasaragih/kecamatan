<?php

namespace Database\Seeders;

use App\Models\Dasawisma;
use App\Models\Kelurahan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DasawismaSeeder extends Seeder
{
    public function run(): void
    {
        $bunga = ['Melati', 'Mawar', 'Anggrek', 'Kenanga', 'Dahlia', 'Seroja'];

        $kelurahans = Kelurahan::all();

        if ($kelurahans->isEmpty()) {
            return;
        }

        foreach ($kelurahans as $kelurahan) {
            foreach ([1, 2] as $i) {
                $namaBunga = $bunga[array_rand($bunga)];
                $nama = "Dasawisma {$namaBunga} {$i} - {$kelurahan->nama}";

                Dasawisma::create([
                    'kelurahan_id' => $kelurahan->id,
                    'nama' => $nama,
                    'slug' => Str::slug($nama).'-'.Str::random(4),
                    'nama_ketua' => 'Ibu '.fake()->name('female'),
                    'wilayah' => 'RT 0'.$i.' / RW 0'.$i,
                    'jumlah_kk' => rand(10, 25),
                    'jumlah_anggota' => rand(20, 60),
                    'kegiatan' => "Arisan bulanan, gotong royong lingkungan, posyandu balita dan lansia, serta pembinaan UP2K (Usaha Peningkatan Pendapatan Keluarga).",
                    'deskripsi' => "Dasawisma {$namaBunga} {$i} merupakan kelompok kerja PKK tingkat RT di {$kelurahan->nama} yang aktif menggerakkan 10 program pokok PKK di lingkungan warga.",
                ]);
            }
        }
    }
}
