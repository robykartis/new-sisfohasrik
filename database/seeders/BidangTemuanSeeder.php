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
                'kode_bidang' => 'BIDANG TEMUAN A',
                'name_bidang' => 'BIDANG TEMUAN PEMERIKSA SEKOLAH',
            ],
            [
                'kode_bidang' => 'BIDANG TEMUAN B',
                'name_bidang' => 'BIDANG TEMUAN PEMERIKSA RUMAH SAKIT',
            ],
            [
                'kode_bidang' => 'BIDANG TEMUAN C',
                'name_bidang' => 'BIDANG TEMUAN PEMERIKSA PEMBANGUAN',
            ],

        ];

        foreach ($data as $key => $value) {
            BidangTemuan::create($value);
        }
    }
}
