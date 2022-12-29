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
                'id_level' => '1',

            ],
            [
                'kode' => 'B',
                'name' => 'PEMERIKSA RUMAH SAKIT',
                'id_level' => '1',

            ],
            [
                'kode' => 'C',
                'name' => 'PEMERIKSA PEMBANGUAN',
                'id_level' => '1',

            ],

        ];

        foreach ($data as $key => $value) {
            KodeTemuan::create($value);
        }
    }
}
