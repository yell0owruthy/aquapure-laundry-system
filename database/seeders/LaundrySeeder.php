<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LaundrySeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@laundry.test'],
            [
                'name' => 'Admin Laundry',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'kasir@laundry.test'],
            [
                'name' => 'Kasir Laundry',
                'password' => Hash::make('password'),
                'role' => 'kasir',
            ]
        );

        $layanans = [
            ['nama_layanan' => 'Reguler', 'harga_per_kg' => 7000, 'estimasi' => '3-4 hari'],
            ['nama_layanan' => 'Ekspress', 'harga_per_kg' => 12000, 'estimasi' => '1-2 hari'],
            ['nama_layanan' => 'Superkilat', 'harga_per_kg' => 25000, 'estimasi' => '5 jam selesai'],
        ];

        foreach ($layanans as $item) {
            Layanan::updateOrCreate(
                ['nama_layanan' => $item['nama_layanan']],
                $item
            );
        }
    }
}