<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 1000; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('users')->insert([
                'name' => $faker->name,
                'image' => '123.jpg',
                'email' => $faker->email,
                'nip' => '123456789',
                'level' => 'readonly',
                'password' => bcrypt('12341234'),
            ]);
        }

        // $user = [
        //     [

        //         'name' => 'Admin',
        //         'image' => '123.jpg',
        //         'email' => 'admin@email.com',
        //         'nip' => '123456789',
        //         'level' => 'admin',
        //         'password' => bcrypt('12341234'),
        //     ],
        //     [

        //         'name' => 'Operator',
        //         'image' => '123.jpg',
        //         'email' => 'operator@email.com',
        //         'nip' => '123456789',
        //         'level' => 'operator',
        //         'password' => bcrypt('12341234'),
        //     ],
        //     [

        //         'name' => 'Read Only',
        //         'image' => '123.jpg',
        //         'email' => 'readonly@email.com',
        //         'nip' => '123456789',
        //         'level' => 'readonly',
        //         'password' => bcrypt('12341234'),
        //     ],
        // ];

        // foreach ($user as $key => $value) {
        //     User::create($value);
        // }
    }
}
