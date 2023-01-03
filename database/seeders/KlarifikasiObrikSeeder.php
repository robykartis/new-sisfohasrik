<?php

namespace Database\Seeders;

use App\Models\KlarifikasiObrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlarifikasiObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KlarifikasiObrik::create([
            'kode_obrik' => 'K001',
            'name_obrik' => 'Obrik A',
        ]);

        KlarifikasiObrik::create([
            'kode_obrik' => 'K002',
            'name_obrik' => 'Obrik B',
        ]);
    }
}
