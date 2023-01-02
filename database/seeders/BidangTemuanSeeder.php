<?php

namespace Database\Seeders;

use App\Models\BidangTemuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangTemuanSeeder extends Seeder
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
                'kode_bidang' => 'A',
                'name_bidang' => 'PEMERIKSA SEKOLAH',

            ],
            [
                'kode_bidang' => 'B',
                'name_bidang' => 'PEMERIKSA RUMAH SAKIT',

            ],
            [
                'kode_bidang' => 'C',
                'name_bidang' => 'PEMERIKSA PEMBANGUAN',

            ],

        ];

        foreach ($data as $key => $value) {
            BidangTemuan::create($value);
        }
    }
}
