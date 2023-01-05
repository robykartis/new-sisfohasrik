<?php

namespace Database\Seeders;

use App\Models\JenisPemeriksaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_pemeriksaans = [
            ['kode' => 'P', 'nama' => 'Pemeriksaan', 'singkatan' => 'PM', 'bobot' => '100'],
            ['kode' => 'K', 'nama' => 'Klarifikasi', 'singkatan' => 'KL', 'bobot' => '50'],
            ['kode' => 'L', 'nama' => 'Lapangan', 'singkatan' => 'LP', 'bobot' => '80'],
            ['kode' => 'D', 'nama' => 'Desk', 'singkatan' => 'DK', 'bobot' => '60'],
        ];

        foreach ($jenis_pemeriksaans as $jenis_pemeriksaan) {
            JenisPemeriksaan::create($jenis_pemeriksaan);
        }
    }
}
