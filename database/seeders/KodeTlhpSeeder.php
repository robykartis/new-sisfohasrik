<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeTlhpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_tlhp')->insert([
            'kode' => 'BDG01',
            'nama' => 'Kode Tlhp Keuangan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_tlhp')->insert([
            'kode' => 'BDG02',
            'nama' => 'Kode Tlhp Kesehatan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_tlhp')->insert([
            'kode' => 'BDG03',
            'nama' => 'Kode Tlhp Pendidikan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
