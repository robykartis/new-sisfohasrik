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

        for ($i = 1; $i < 10000; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'level' => 'readonly',
                'password' => bcrypt('12341234'),
            ]);
        }

        // $user = [
        //     [

        //         'name' => 'Admin',
        //         'email' => 'admin@email.com',
        //         'level' => 'admin',
        //         'password' => bcrypt('12341234'),
        //     ],
        //     [

        //         'name' => 'Operator',
        //         'email' => 'operator@email.com',
        //         'level' => 'operator',
        //         'password' => bcrypt('12341234'),
        //     ],
        //     [

        //         'name' => 'Read Only',
        //         'email' => 'readonly@email.com',
        //         'level' => 'readonly',
        //         'password' => bcrypt('12341234'),
        //     ],
        // ];

        // foreach ($user as $key => $value) {
        //     User::create($value);
        // }
    }
}
