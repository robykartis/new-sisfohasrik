<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KodeRekomendasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AkunSeeder::class);
        $this->call(BidangTemuanSeeder::class);
        $this->call(KodeTemuanSeeder::class);
        $this->call(KodeRecomendasiSeeder::class);
        $this->call(KodePenyebabSeeder::class);
        $this->call(KodeTlhpSeeder::class);
        // $this->call(KlarifikasiObrikSeeder::class);
        $this->call(PendaftaranObrikSeeder::class);
    }
}
