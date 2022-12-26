<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'level' => 'admin',
                'password' => bcrypt('12341234'),
            ],
            [
                'username' => 'operator',
                'name' => 'Operator',
                'email' => 'operator@email.com',
                'level' => 'operator',
                'password' => bcrypt('12341234'),
            ],
            [
                'username' => 'readonly',
                'name' => 'Read Only',
                'email' => 'readonly@email.com',
                'level' => 'readonly',
                'password' => bcrypt('12341234'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
