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
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('klarifikasi_obrik')->insert([
            'kode' => 'BDG02',
            'nama' => 'Klarifikasi Obrik Kesehatan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('klarifikasi_obrik')->insert([
            'kode' => 'BDG03',
            'nama' => 'Klarifikasi Obrik Pendidikan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
