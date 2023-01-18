<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlarifikasiObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klarifikasi_obrik')->insert([
            'kode' => 'BDG01',
            'nama' => 'Klarifikasi Obrik Keuangan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('klarifikasi_obrik')->insert([
            'kode' => 'BDG02',
            'nama' => 'Klarifikasi Obrik Kesehatan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('klarifikasi_obrik')->insert([
            'kode' => 'BDG03',
            'nama' => 'Klarifikasi Obrik Pendidikan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
