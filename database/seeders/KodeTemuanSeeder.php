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
                'kode' => 'A',
                'name' => 'PEMERIKSA SEKOLAH',

            ],
            [
                'kode' => 'B',
                'name' => 'PEMERIKSA RUMAH SAKIT',

            ],
            [
                'kode' => 'C',
                'name' => 'PEMERIKSA PEMBANGUAN',

            ],

        ];

        foreach ($data as $key => $value) {
            KodeTemuan::create($value);
        }
    }
}
