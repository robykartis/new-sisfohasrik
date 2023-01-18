<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obrik')->insert([
            'tahun' => '2022',
            'kode' => '001',
            'klarifikasi' => '1',
            'nama' => 'Obrik 1',
            'induk' => 'Obrik Utama',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('obrik')->insert([
            'tahun' => '2022',
            'kode' => '002',
            'klarifikasi' => '2',
            'nama' => 'Obrik 2',
            'induk' => 'Obrik Utama',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('obrik')->insert([
            'tahun' => '2022',
            'kode' => '003',
            'klarifikasi' => '3',
            'nama' => 'Obrik 3',
            'induk' => 'Obrik Utama',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);
    }
}
