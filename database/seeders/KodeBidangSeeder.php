<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_bidang')->insert([
            'kode' => 'BDG01',
            'nama' => 'Bidang Keuangan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_bidang')->insert([
            'kode' => 'BDG02',
            'nama' => 'Bidang Kesehatan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_bidang')->insert([
            'kode' => 'BDG03',
            'nama' => 'Bidang Pendidikan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
