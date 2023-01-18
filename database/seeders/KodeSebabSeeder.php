<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeSebabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_sebab')->insert([
            'kode' => 'BDG01',
            'nama' => 'Kode Penyebab Keuangan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_sebab')->insert([
            'kode' => 'BDG02',
            'nama' => 'Kode Penyebab Kesehatan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_sebab')->insert([
            'kode' => 'BDG03',
            'nama' => 'Kode Penyebab Pendidikan',
            'created_by' => 'admin',
            'created_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
