<?php

namespace Database\Seeders;

use App\Models\KlarifikasiObrik;
use App\Models\PendaftaranObrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftaranObrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        // PendaftaranObrik::create([
        //     'tahun' => '2020',
        //     'kode' => 'P001',
        //     'klarifikasi' => 1,
        //     'nama' => 'Obrik A',
        //     'induk' => '001',
        // ]);

        // PendaftaranObrik::create([
        //     'tahun' => '2020',
        //     'kode' => 'P002',
        //     'klarifikasi' => 2,
        //     'nama' => 'Obrik B',
        //     'induk' => '002',
        // ]);




        $klarifikasi_obrik = KlarifikasiObrik::create([
            'kode_obrik' => 'K004',
            'name_obrik' => 'Obrik D',
        ]);
        // $klarifikasi_obrik = KlarifikasiObrik::create([
        //     'kode_obrik' => 'K003',
        //     'name_obrik' => 'Obrik C',
        // ]);
        // PendaftaranObrik::create([
        //     'tahun' => '2020',
        //     'kode' => 'P003',
        //     'klarifikasi' => $klarifikasi_obrik->id,
        //     'nama' => 'Obrik C',
        //     'induk' => '003',
        // ]);
        PendaftaranObrik::create([
            'tahun' => '2021',
            'kode' => 'P004',
            'klarifikasi' => $klarifikasi_obrik->id,
            'nama' => 'Obrik D',
            'induk' => '004',
        ]);
    }
}
