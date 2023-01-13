<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeTemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_temuan')->insert([
            'kode' => 'BDG01',
            'nama' => 'Temuan Keuangan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_temuan')->insert([
            'kode' => 'BDG02',
            'nama' => 'Temuan Kesehatan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kode_temuan')->insert([
            'kode' => 'BDG03',
            'nama' => 'Temuan Pendidikan',
            'create_by' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
