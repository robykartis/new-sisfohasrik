<?php

namespace Database\Seeders;

use App\Models\KodePenyebab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodePenyebabSeeder extends Seeder
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
                'kode_penyebab' => 'KODE PENYEBAB A',
                'name_penyebab' => 'KODE PENYEBAB PEMERIKSA SEKOLAH',
            ],
            [
                'kode_penyebab' => 'KODE PENYEBAB B',
                'name_penyebab' => 'KODE PENYEBAB PEMERIKSA RUMAH SAKIT',
            ],
            [
                'kode_penyebab' => 'KODE PENYEBAB C',
                'name_penyebab' => 'KODE PENYEBAB PEMERIKSA PEMBANGUAN',
            ],

        ];

        foreach ($data as $key => $value) {
            KodePenyebab::create($value);
        }
    }
}
