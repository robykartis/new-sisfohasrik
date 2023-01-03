<?php

namespace Database\Seeders;

use App\Models\KodeTemuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeTemuanSeeder extends Seeder
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
                'kode' => 'KODE TEMUAN A',
                'name' => 'KODE TEMUAN PEMERIKSA SEKOLAH',
            ],
            [
                'kode' => 'KODE TEMUAN B',
                'name' => 'KODE TEMUAN PEMERIKSA RUMAH SAKIT',
            ],
            [
                'kode' => 'KODE TEMUAN C',
                'name' => 'KODE TEMUAN PEMERIKSA PEMBANGUAN',
            ],

        ];

        foreach ($data as $key => $value) {
            KodeTemuan::create($value);
        }
    }
}
