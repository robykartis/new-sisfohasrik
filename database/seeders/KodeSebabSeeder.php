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
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_sebab')->insert([
            'kode' => 'BDG02',
            'nama' => 'Kode Penyebab Kesehatan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_sebab')->insert([
            'kode' => 'BDG03',
            'nama' => 'Kode Penyebab Pendidikan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
