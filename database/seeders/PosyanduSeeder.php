<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PosyanduSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('posyandu')->insert([
                'nama' => 'Posyandu ' . substr($faker->city(), 0, 50),
                'alamat' => substr($faker->address(), 0, 255),
                'rt' => str_pad((string)rand(1, 20), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad((string)rand(1, 20), 2, '0', STR_PAD_LEFT),
                'kontak' => '08' . rand(1111111111, 9999999999), // AMAN
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
