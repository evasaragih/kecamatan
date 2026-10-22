<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KelurahanSeeder::class,
            DasawismaSeeder::class,
            PkkSeeder::class,
            ProfilPageSeeder::class,
            PejabatSeeder::class,
            KantorPemerintahanSeeder::class,
            BeritaSeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
