<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LhpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lhp')->insert([
            'no_lhp' => 'LHP001',
            'tahun' => '2022',
            'obrik' => '1',
            'klarifikasi' => '1',
            'tgl_lhp' => '2022-01-01',
            'jns_pemeriksaan' => 'Pemeriksaan Keuangan',
            'uraian' => 'Uraian Pemeriksaan Keuangan',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('lhp')->insert([
            'no_lhp' => 'LHP002',
            'tahun' => '2022',
            'obrik' => '2',
            'klarifikasi' => '2',
            'tgl_lhp' => '2022-02-01',
            'jns_pemeriksaan' => 'Pemeriksaan Procurement',
            'uraian' => 'Uraian Pemeriksaan Procurement',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('lhp')->insert([
            'no_lhp' => 'LHP003',
            'tahun' => '2022',
            'obrik' => '1',
            'klarifikasi' => '2',
            'tgl_lhp' => '2022-03-01',
            'jns_pemeriksaan' => 'Pemeriksaan SDM',
            'uraian' => 'Uraian Pemeriksaan SDM',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);
    }
}
