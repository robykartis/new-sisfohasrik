<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temuan')->insert([
            'id_temuan' => '1',
            'id_lhp' => '1',
            'bidang_temuan' => '1',
            'no_temuan' => '1',
            'judul_temuan' => 'Temuan Keuangan 1',
            'urian_temuan' => 'Urian Temuan Keuangan 1',
            'kode_temuan' => '1',
            'jml_rnd_neg' => '100000',
            'jml_rnd_drh' => '50000',
            'jml_snd_neg' => '200000',
            'jml_snd_drh' => '100000',
            'keterangan' => 'Keterangan Temuan Keuangan 1',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('temuan')->insert([
            'id_temuan' => '2',
            'id_lhp' => '2',
            'bidang_temuan' => '2',
            'no_temuan' => '2',
            'judul_temuan' => 'Temuan Procurement 2',
            'urian_temuan' => 'Urian Temuan Procurement 2',
            'kode_temuan' => '2',
            'jml_rnd_neg' => '200000',
            'jml_rnd_drh' => '100000',
            'jml_snd_neg' => '300000',
            'jml_snd_drh' => '150000',
            'keterangan' => 'Keterangan Temuan Procurement 2',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);

        DB::table('temuan')->insert([
            'id_temuan' => '2',
            'id_lhp' => '3',
            'bidang_temuan' => 'SDM',
            'no_temuan' => '3',
            'judul_temuan' => 'Temuan SDM 3',
            'urian_temuan' => 'Urian Temuan SDM 3',
            'kode_temuan' => '3',
            'jml_rnd_neg' => '300000',
            'jml_rnd_drh' => '150000',
            'jml_snd_neg' => '400000',
            'jml_snd_drh' => '200000',
            'keterangan' => 'Keterangan Temuan SDM 3',
            'created_by' => 'admin',
            'created_by_id' => 1,
        ]);
    }
}
