<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);

        Mahasiswa::create([
            'npm' => '2024000001',
            'nama' => 'Mahasiswa Demo',
        ]);
    }
}