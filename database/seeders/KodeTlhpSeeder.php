<?php

namespace Database\Seeders;

use App\Models\KodeTlhp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeTlhpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_tlhp' => 'KODE TLHP A',
                'name_tlhp' => 'KODE TLHP PEMERIKSA SEKOLAH',
            ],
            [
                'kode_tlhp' => 'KODE TLHP B',
                'name_tlhp' => 'KODE TLHP PEMERIKSA RUMAH SAKIT',
            ],
            [
                'kode_tlhp' => 'KODE TLHP C',
                'name_tlhp' => 'KODE TLHP PEMERIKSA PEMBANGUAN',
            ],

        ];

        foreach ($data as $key => $value) {
            KodeTlhp::create($value);
        }
    }
}
