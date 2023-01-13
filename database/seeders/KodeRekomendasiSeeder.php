<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeRekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_rekomendasi')->insert([
            'kode' => 'BDG01',
            'nama' => 'Kode Rekomendasi Keuangan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_rekomendasi')->insert([
            'kode' => 'BDG02',
            'nama' => 'Kode Rekomendasi Kesehatan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_rekomendasi')->insert([
            'kode' => 'BDG03',
            'nama' => 'Kode Rekomendasi Pendidikan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
