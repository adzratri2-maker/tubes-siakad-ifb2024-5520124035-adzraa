<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@siakad.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Mahasiswa Demo',
            'email' => 'mahasiswa@siakad.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'npm' => '2024000001',
        ]);
    }
}