<?php

namespace Database\Seeders;

use App\Models\KodeRekomendasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeRecomendasiSeeder extends Seeder
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
                'kode_rekomendasi' => 'KODE REKOMENDASI A',
                'name_rekomendasi' => 'KODE REKOMENDASI PEMERIKSA SEKOLAH',
            ],
            [
                'kode_rekomendasi' => 'KODE REKOMENDASI B',
                'name_rekomendasi' => 'KODE REKOMENDASI PEMERIKSA RUMAH SAKIT',
            ],
            [
                'kode_rekomendasi' => 'KODE REKOMENDASI C',
                'name_rekomendasi' => 'KODE REKOMENDASI PEMERIKSA PEMBANGUAN',
            ],

        ];

        foreach ($data as $key => $value) {
            KodeRekomendasi::create($value);
        }
    }
}
