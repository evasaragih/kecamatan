<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@lubukkilangan.padang.go.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Operator Konten',
            'email' => 'operator@lubukkilangan.padang.go.id',
            'password' => Hash::make('operator123'),
            'role' => 'operator',
        ]);
    }
}
